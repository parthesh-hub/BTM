<?php
session_start();
include('config.php');


if(isset($_SESSION['userid'])){
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(!empty($_POST['availservice1'])){

            $orgDate = $_SESSION['selected_date'];  
            $date = date("Y-m-d", strtotime($orgDate)); 
            $serviceid = $_SESSION['data'][0]['serviceid'];
            $tslot = $_POST['shopservices1'];
            $sername = $_SESSION['data'][0]['servicename'];

            if($sername=='Make Up' || $sername=='Beard Shave'){
                $sql= "SELECT * from rendered_services where Service_ID='$serviceid'
                    and Date='$date' and Timeslot='$tslot'  ";
            }
            else{
                $sql= "SELECT * from rendered_services where Service_ID in 
                    (SELECT Service_ID from Services where ServiceName='$sername')
                    and Date='$date' and Timeslot='$tslot'  ";
            }


            $prj= mysqli_query($db, $sql);
            $res = array();
            while($row = mysqli_fetch_assoc($prj)){
                $res[] = $row;
            }
            if(count($res)<2){
                
                echo 'Available';
            }
            else{
               echo 'Not Available';
            }
            // echo "S0";
            // header('location: newapt3.php');
        }
        elseif(!empty($_POST['availservice2'])){
            
            $orgDate = $_SESSION['selected_date'];  
            $date = date("Y-m-d", strtotime($orgDate));
            $serviceid = $_SESSION['data'][1]['serviceid'];
            $tslot = $_POST['shopservices2'];
            $sername = $_SESSION['data'][0]['servicename'];

            if($sername=='Make Up' || $sername=='Beard Shave'){
                $sql= "SELECT * from rendered_services where Service_ID='$serviceid'
                    and Date='$date' and Timeslot='$tslot'  ";
            }
            else{
                $sql= "SELECT * from rendered_services where Service_ID in 
                    (SELECT Service_ID from Services where ServiceName='$sername')
                    and Date='$date' and Timeslot='$tslot'  ";
            }

            $prj= mysqli_query($db, $sql);
            $res = array();
            while($row = mysqli_fetch_assoc($prj)){
                $res[] = $row;
            }
            if(count($res)<2){
                echo'Available';
            }
            else{
                 echo 'Not Available';
            }
            // echo "S1";
            // header('location: newapt3.php');
        }
        elseif(!empty($_POST['availservice3'])){
            
            $orgDate = $_SESSION['selected_date'];  
            $date = date("Y-m-d", strtotime($orgDate));
            $serviceid = $_SESSION['data'][2]['serviceid'];
            $tslot = $_POST['shopservices3'];
            $sername = $_SESSION['data'][0]['servicename'];

            if($sername=='Make Up' || $sername=='Beard Shave'){
                $sql= "SELECT * from rendered_services where Service_ID='$serviceid'
                    and Date='$date' and Timeslot='$tslot'  ";
            }
            else{
                $sql= "SELECT * from rendered_services where Service_ID in 
                    (SELECT Service_ID from Services where ServiceName='$sername')
                    and Date='$date' and Timeslot='$tslot'  ";
            }

            $prj= mysqli_query($db, $sql);
            $res = array();
            while($row = mysqli_fetch_assoc($prj)){
                $res[] = $row;
            }
            if(count($res)<2){
                echo 'Available';
            }
            else{
                echo 'Not Available';
            }
            // echo "S2";
            // header('location: newapt3.php');
        }
        elseif(!empty($_POST['availservicehome'])){
            
            $orgDate = $_SESSION['selected_date'];  
            $date = date("Y-m-d", strtotime($orgDate));
            $serviceid = $_SESSION['data'][0]['serviceid'];
            $tslot = $_POST['homeservices'];

            $sql= "SELECT * from rendered_services where Date='$date' and Timeslot='$tslot'";
            $prj= mysqli_query($db, $sql);
            $res = array();
            while($row = mysqli_fetch_assoc($prj)){
                $res[] = $row;
            }
            if(count($res)<5){
               echo 'Available';
            }
            else{
                echo  'Not Available';
            }
            
            // header('location: newapt3.php');
        }

        elseif(!empty($_POST['clear'])){
            unset($_SESSION['data']);
            // echo "back";
            header('location:newapt2.php');
        }
        
        elseif(!empty($_POST['serviceconfirmationbtn'])){
            unset($_SESSION['sametimeerr']);
            unset($_SESSION['sametimeerrmsg']);
            unset($_SESSION['total_discount']);
            unset($_SESSION['total_cost']);


            $totaldiscount =0;
            $totalcost =0;
            $orgDate = $_SESSION['selected_date'];  
            $service_date = date("Y-m-d", strtotime($orgDate));  
            $service_type = $_SESSION['service_type'];

            if($_SESSION['service_type']=='shop'){
                if(count($_SESSION['data'])>0){
                    $timeslots1 = $_POST['shopservices1'];
                    $_SESSION['data'][0]['timeslot'] = $timeslots1;
                    $totaldiscount = $totaldiscount + $_SESSION['data'][0]['servicediscount']; 
                    $totalcost = $totalcost + $_SESSION['data'][0]['servicefinalcost'];
                    
                    $service_id = $_SESSION['data'][0]['serviceid'];

                    $snamequery = "SELECT ServiceName from services where Service_ID='$service_id'";
                    $sname = mysqli_query($db,$snamequery);
                    $sname = mysqli_fetch_array($sname,MYSQLI_ASSOC);
                    $sername = $sname['ServiceName'];
                    $service_id = (int)$service_id;

                    if($sername=='Make Up' || $sername=='Beard Shave'){
                        $empquery = "SELECT Emp_ID from Employees where Emp_ID not in 
                        (SELECT Emp_ID from rendered_services where Date='$service_date' and Service_ID=$service_id
                        and Timeslot='$timeslots1') and Specialization='$sername'";
                    }
                    else{
                        $empquery = "SELECT Emp_ID from Employees where Emp_ID not in 
                        (SELECT Emp_ID from rendered_services where Date='$service_date' and (Service_ID=$service_id
                        or Service_ID=$service_id+2000)
                        and Timeslot='$timeslots1') and Specialization='$sername'";
                    }
                    

                    $prj= mysqli_query($db, $empquery);
                    $empid1 = array();
                    $empid2 = array();
                    if(mysqli_num_rows($prj)!=0){
                        while($row = mysqli_fetch_assoc($prj)){
                            $empid1[] = $row;
                        }
                        
                        for($i=0; $i<count($empid1); $i++){
                            array_push($empid2, $empid1[$i]['Emp_ID']);
                        }

                        $emp_id = $empid2[array_rand($empid2)];
                        $_SESSION['data'][0]['employee'] = $emp_id;
                    }
                }

                if(count($_SESSION['data'])>1){
                    $timeslots2 = $_POST['shopservices2'];
                    $_SESSION['data'][1]['timeslot'] = $timeslots2;
                    $totaldiscount = $totaldiscount + $_SESSION['data'][1]['servicediscount']; 
                    $totalcost = $totalcost + $_SESSION['data'][1]['servicefinalcost'];

                    $service_id = $_SESSION['data'][1]['serviceid'];

                    $snamequery = "SELECT ServiceName from services where Service_ID='$service_id'";
                    $sname = mysqli_query($db,$snamequery);
                    $sname = mysqli_fetch_array($sname,MYSQLI_ASSOC);
                    $sername = $sname['ServiceName'];
                    $service_id = (int)$service_id;

                    if($sername=='Make Up' || $sername=='Beard Shave'){
                        $empquery = "SELECT Emp_ID from Employees where Emp_ID not in 
                        (SELECT Emp_ID from rendered_services where Date='$service_date' and Service_ID=$service_id
                        and Timeslot='$timeslots2') and Specialization='$sername'";
                    }
                    else{
                        $empquery = "SELECT Emp_ID from Employees where Emp_ID not in 
                        (SELECT Emp_ID from rendered_services where Date='$service_date' and (Service_ID=$service_id
                        or Service_ID=$service_id+2000)
                        and Timeslot='$timeslots2') and Specialization='$sername'";
                    }

                    $prj= mysqli_query($db, $empquery);
                    $empid1 = array();
                    $empid2 = array();
                    if(mysqli_num_rows($prj)!=0){
                        while($row = mysqli_fetch_assoc($prj)){
                            $empid1[] = $row;
                        }
                        
                        for($i=0; $i<count($empid1); $i++){
                            array_push($empid2, $empid1[$i]['Emp_ID']);
                        }

                        $emp_id = $empid2[array_rand($empid2)];
                        $_SESSION['data'][1]['employee'] = $emp_id;
                    }

                    if($_SESSION['data'][0]['timeslot']==$_SESSION['data'][1]['timeslot']){
                        $_SESSION['sametimeerr'] =1;
                        $_SESSION['sametimeerrmsg'] = 'Choose Different Timeslots for individual services';
                        header('location:newapt3.php');
                    }
                }

                if(count($_SESSION['data'])>2){
                    $timeslots3 = $_POST['shopservices3'];
                    $_SESSION['data'][2]['timeslot'] = $timeslots3;
                    $totaldiscount = $totaldiscount + $_SESSION['data'][2]['servicediscount']; 
                    $totalcost = $totalcost + $_SESSION['data'][2]['servicefinalcost'];

                    $service_id = $_SESSION['data'][2]['serviceid'];

                    $snamequery = "SELECT ServiceName from services where Service_ID='$service_id'";
                    $sname = mysqli_query($db,$snamequery);
                    $sname = mysqli_fetch_array($sname,MYSQLI_ASSOC);
                    $sername = $sname['ServiceName'];
                    $service_id = (int)$service_id;

                    if($sername=='Make Up' || $sername=='Beard Shave'){
                        $empquery = "SELECT Emp_ID from Employees where Emp_ID not in 
                        (SELECT Emp_ID from rendered_services where Date='$service_date' and Service_ID=$service_id
                        and Timeslot='$timeslots3') and Specialization='$sername'";
                    }
                    else{
                        $empquery = "SELECT Emp_ID from Employees where Emp_ID not in 
                        (SELECT Emp_ID from rendered_services where Date='$service_date' and (Service_ID=$service_id
                        or Service_ID=$service_id+2000)
                        and Timeslot='$timeslots3') and Specialization='$sername'";
                    }

                    $prj= mysqli_query($db, $empquery);
                    $empid1 = array();
                    $empid2 = array();
                    if(mysqli_num_rows($prj)!=0){
                        while($row = mysqli_fetch_assoc($prj)){
                            $empid1[] = $row;
                        }
                        
                        for($i=0; $i<count($empid1); $i++){
                            array_push($empid2, $empid1[$i]['Emp_ID']);
                        }

                        $emp_id = $empid2[array_rand($empid2)];
                        $_SESSION['data'][2]['employee'] = $emp_id;
                    }
                    
                    if($_SESSION['data'][0]['timeslot']==$_SESSION['data'][1]['timeslot']||
                    $_SESSION['data'][0]['timeslot']==$_SESSION['data'][2]['timeslot']||
                    $_SESSION['data'][1]['timeslot']==$_SESSION['data'][2]['timeslot']){
                        $_SESSION['sametimeerr'] =1;
                        $_SESSION['sametimeerrmsg'] = 'Choose Different Timeslots for individual services';
                        header('location:newapt3.php');
                    }
                }

                if(empty($_SESSION['sametimeerr'])){
                    $_SESSION['total_cost']=$totalcost;
                    $_SESSION['total_discount']=$totaldiscount;   
                    header('location:payment.php');
                }
            }
            elseif($_SESSION['service_type']=='home'){
                if(count($_SESSION['data'])==1){
                    $timeslots1 = $_POST['homeservices'];
                    $_SESSION['data'][0]['timeslot'] = $timeslots1;
                    $totaldiscount = $totaldiscount + $_SESSION['data'][0]['servicediscount']; 
                    $totalcost = $totalcost + $_SESSION['data'][0]['servicefinalcost'];
                    
                    $service_id = $_SESSION['data'][0]['serviceid'];

                    $snamequery = "SELECT ServiceName from services where Service_ID='$service_id'";
                    $sname = mysqli_query($db,$snamequery);
                    $sname = mysqli_fetch_array($sname,MYSQLI_ASSOC);
                    $sername = $sname['ServiceName'];
                    $service_id = (int)$service_id;
                    $empquery = "SELECT Emp_ID from Employees where Emp_ID not in 
                    (SELECT Emp_ID from rendered_services where Date='$service_date' 
                    and Timeslot='$timeslots1' and Type='home') and Type='Home'";

                    $prj= mysqli_query($db, $empquery);
                    $empid1 = array();
                    $empid2 = array();
                    if(mysqli_num_rows($prj)!=0){
                        while($row = mysqli_fetch_assoc($prj)){
                            $empid1[] = $row;
                        }
                        
                        for($i=0; $i<count($empid1); $i++){
                            array_push($empid2, $empid1[$i]['Emp_ID']);
                        }

                        $emp_id = $empid2[array_rand($empid2)];
                        $_SESSION['data'][0]['employee'] = $emp_id;
                    }

                    $_SESSION['total_cost']=$totalcost;
                    $_SESSION['total_discount']=$totaldiscount;   
                    header('location:payment.php');

                }
            }

        
        }
    }
}

else{
    header('location:logout.php');
}

?>



