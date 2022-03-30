<?php 
session_start();
include('config.php');
if(!isset($_SESSION['userid'])){
  header('location:login.php');
}


if(isset($_SESSION['userid'])){
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // --------------------------------male shop --------

        if(!empty($_POST['aptcnfrmbtnmaleshop'])){
            
            if(!empty($_POST['select'])) {

                if(count($_POST['select'])<=3){

                    if(!isset($_SESSION['data'])){
                        $_SESSION['data']=array();
                    }
                    $x=0;
                    
                    foreach($_POST['select'] as $selected) {
    
    
                        $serviceid = $selected;
    
                        $sql1= "SELECT ServiceName, ActualPrice from services where Service_ID='$selected'";
                        $result1 = mysqli_query($db,$sql1);
                        $res1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
                        $servicename = $res1['ServiceName'];
                        $serviceprice = $res1['ActualPrice'];
    
    
                        $orgDate = $_SESSION['selected_date'];  
                        $servicedate = date("Y-m-d", strtotime($orgDate));
                        $sql2 = "SELECT Discount from offers where Service_ID='$serviceid' and Date='$servicedate'";
                        $result2 = mysqli_query($db, $sql2);
                        $res2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    
                        if($res2){
                            $servicediscount = $res2['Discount'];
                        }
                        else{
                            $servicediscount = 0;
                        }
    
                        $servicefinalcost = $serviceprice-$servicediscount;
    
    
    
                        $_SESSION['data'][$x] = array('serviceid'=>$serviceid, 'servicename' => $servicename, 
                        'servicedate' => $servicedate,'servicetype' => $_SESSION['service_type'], 
                        'serviceprice' => $serviceprice, 'servicediscount' => $servicediscount, 
                        'servicefinalcost' => $servicefinalcost, 'timeslot'=>'null');
                        
                        $x++;
                       
                    }
                    header('location:newapt3.php');
    
                
                }
                else{
                    
                    header('location:newapt2.php');
                    
                    // echo "<h2>Please select at max 3 services.</h2>";

                }

            }
            else{
            
                header('location:newapt2.php');
                // echo "<h2>Please select at least 1 service.</h2>";
    
            }
        }
            
        // --------------------------------female shop --------

        else if(!empty($_POST['aptcnfrmbtnfemaleshop'])){
            
            if(!empty($_POST['select'])) {

                if(count($_POST['select'])<=3){

                    if(!isset($_SESSION['data'])){
                        $_SESSION['data']=array();
                    }
                    $x=0;
                    
                    foreach($_POST['select'] as $selected) {
    
    
                        $serviceid = $selected;
    
                        $sql1= "SELECT ServiceName, ActualPrice from services where Service_ID='$selected'";
                        $result1 = mysqli_query($db,$sql1);
                        $res1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
                        $servicename = $res1['ServiceName'];
                        $serviceprice = $res1['ActualPrice'];
    
    
                        $orgDate = $_SESSION['selected_date'];  
                        $servicedate = date("Y-m-d", strtotime($orgDate));                      
    
                        $sql2 = "SELECT Discount from offers where Service_ID='$serviceid' and Date='$servicedate'";
                        $result2 = mysqli_query($db, $sql2);
                        $res2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    
                        if($res2){
                            $servicediscount = $res2['Discount'];
                        }
                        else{
                            $servicediscount = 0;
                        }
    
                        $servicefinalcost = $serviceprice-$servicediscount;
    
    
    
                        $_SESSION['data'][$x] = array('serviceid'=>$serviceid, 'servicename' => $servicename, 
                        'servicedate' => $servicedate,'servicetype' => $_SESSION['service_type'], 
                        'serviceprice' => $serviceprice, 'servicediscount' => $servicediscount, 
                        'servicefinalcost' => $servicefinalcost, 'timeslot'=>'null');
                        
                        $x++;
                       
                    }
    
                    header('location:newapt3.php');
    
                }
                else{
                    header('location:newapt2.php');
                    // echo "<h2>Please select at max 3 services.</h2>";

                }

            }
            else{
                header('location:newapt2.php');
                echo "<h2>Please select at least 1 service.</h2>";
    
            }
        }

        // --------------------------------female home --------

        else if(!empty($_POST['aptcnfrmbtnfemalehome'])){
            
            if(!empty($_POST['select'])) {

                if(count($_POST['select'])==1){

                    if(!isset($_SESSION['data'])){
                        $_SESSION['data']=array();
                    }
                    $x=0;
                    
                    foreach($_POST['select'] as $selected) {
    
    
                        $serviceid = $selected;
    
                        $sql1= "SELECT ServiceName, ActualPrice from services where Service_ID='$selected'";
                        $result1 = mysqli_query($db,$sql1);
                        $res1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
                        $servicename = $res1['ServiceName'];
                        $serviceprice = $res1['ActualPrice'];
    
    
                        $orgDate = $_SESSION['selected_date'];  
                        $servicedate = date("Y-m-d", strtotime($orgDate));                      
    
                        $sql2 = "SELECT Discount from offers where Service_ID='$serviceid' and Date='$servicedate'";
                        $result2 = mysqli_query($db, $sql2);
                        $res2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    
                        if($res2){
                            $servicediscount = $res2['Discount'];
                        }
                        else{
                            $servicediscount = 0;
                        }
    
                        $servicefinalcost = $serviceprice-$servicediscount;
    
    
    
                        $_SESSION['data'][$x] = array('serviceid'=>$serviceid, 'servicename' => $servicename, 
                        'servicedate' => $servicedate,'servicetype' => $_SESSION['service_type'], 
                        'serviceprice' => $serviceprice, 'servicediscount' => $servicediscount, 
                        'servicefinalcost' => $servicefinalcost, 'timeslot'=>'null');
                        
                        $x++;
                       
                    }
    
                    header('location:newapt3.php');
    
                }
                else{
                    echo "<h2>Please select at max 1 service.</h2>";

                }

            }
            else{
                echo "<h2>Please select at least 1 service.</h2>";
    
            }
        }

        // --------------------------------male home --------

        else if(!empty($_POST['aptcnfrmbtnmalehome'])){
            
            if(!empty($_POST['select'])) {

                if(count($_POST['select'])==1){

                    if(!isset($_SESSION['data'])){
                        $_SESSION['data']=array();
                    }
                    $x=0;
                    
                    foreach($_POST['select'] as $selected) {
    
    
                        $serviceid = $selected;
    
                        $sql1= "SELECT ServiceName, ActualPrice from services where Service_ID='$selected'";
                        $result1 = mysqli_query($db,$sql1);
                        $res1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
                        $servicename = $res1['ServiceName'];
                        $serviceprice = $res1['ActualPrice'];
    
    
                        $orgDate = $_SESSION['selected_date'];  
                        $servicedate = date("Y-m-d", strtotime($orgDate));                      
    
                        $sql2 = "SELECT Discount from offers where Service_ID='$serviceid' and Date='$servicedate'";
                        $result2 = mysqli_query($db, $sql2);
                        $res2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    
                        if($res2){
                            $servicediscount = $res2['Discount'];
                        }
                        else{
                            $servicediscount = 0;
                        }
    
                        $servicefinalcost = $serviceprice-$servicediscount;
    
    
    
                        $_SESSION['data'][$x] = array('serviceid'=>$serviceid, 'servicename' => $servicename, 
                        'servicedate' => $servicedate,'servicetype' => $_SESSION['service_type'], 
                        'serviceprice' => $serviceprice, 'servicediscount' => $servicediscount, 
                        'servicefinalcost' => $servicefinalcost, 'timeslot'=>'null');
                        
                        $x++;
                       
                    }
    
                    header('location:newapt3.php');
    
                }
                else{
                    echo "<h2>Please select at max 1 service.</h2>";

                }

            }
            else{
                echo "<h2>Please select at least 1 service.</h2>";
    
            }
        }





    }

        
}

?>