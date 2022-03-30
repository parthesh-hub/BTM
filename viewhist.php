<?php
session_start();
include('config.php');



    
if($_SERVER["REQUEST_METHOD"] == "POST"){

    

    if(!empty($_POST['date'])){
        
    
        $servicetype = $_POST['type'];
        $hdate = $_POST['date'];
        $date = str_replace('/', '-', $hdate);
        $date = date("Y-m-d", strtotime($date)); 


        $sql="SELECT appointments.Appt_ID, appointments.Cust_ID, appointments.Date,
         appointments.PaymentMode, rendered_services.Status, rendered_services.Emp_ID, 
         rendered_services.Timeslot, rendered_services.Service_ID, rendered_services.ServiceCost, 
         rendered_services.Type FROM rendered_services LEFT JOIN appointments ON rendered_services.Appt_ID = appointments.Appt_ID 
         WHERE rendered_services.Status!='Pending' and appointments.Date='$date' and rendered_services.Type = '$servicetype'  
         ORDER BY rendered_services.Date";
        $prj= mysqli_query($db, $sql);
        $res = array();
        while($row = mysqli_fetch_assoc($prj)){
            $res[] = $row;
        }

        
        for($i=0; $i<count($res); $i++){?>

            <tr>
                <th scope="row"><?php echo $res[$i]['Appt_ID'] ?></th>
                <td><?php echo $res[$i]['Cust_ID'] ?></td>
                <td>
                    <?php
                        $cid = $res[$i]['Cust_ID'];   
                        $sq5 = "SELECT FirstName, LastName from customers where Cust_ID='$cid'";
                        $re5 = mysqli_query($db, $sq5);
                        $custname = mysqli_fetch_array($re5, MYSQLI_ASSOC);
                        echo $custname['FirstName']." ".$custname['LastName'];
                    ?>
                </td>
                <td>
                    <?php 
                        $empid = $res[$i]['Emp_ID'];
                        $sq1 = "SELECT FirstName, LastName from employees where Emp_ID='$empid'";
                        $re1 = mysqli_query($db, $sq1);
                        $empname = mysqli_fetch_array($re1, MYSQLI_ASSOC);
                        echo  $empname['FirstName']." ".$empname['LastName'] 
                    ?>    
                </td>
                <td>
                    <?php 
                        $orgDate = $res[$i]['Date'];  
                        echo date("d-m-Y", strtotime($orgDate));
                    ?>
                </td>
                <td><?php echo $res[$i]['Timeslot'] ?></td>
                <td>
                    <?php 
                        $sid = $res[$i]['Service_ID'];
                        $sq2 = "SELECT ServiceName FROM services where Service_ID='$sid' ";
                        $re2 = mysqli_query($db,$sq2);
                        $sname = mysqli_fetch_array($re2, MYSQLI_ASSOC);
                    
                        echo $sname['ServiceName'] 
                    ?>
                </td>
                <td><?php echo $res[$i]['ServiceCost'] ?></td>
                <td><?php echo $res[$i]['PaymentMode'] ?></td>
                <td><?php echo $res[$i]['Status'] ?></td>
            </tr>
        <?php } 
        
        
    }

    elseif(!empty($_POST['cust'])){

        
        $servicetype = $_POST['type'];
        $custid = $_POST['cust'];

        $sql="SELECT appointments.Appt_ID, appointments.Cust_ID, appointments.Date, appointments.PaymentMode, rendered_services.Status, rendered_services.Emp_ID, rendered_services.Timeslot, rendered_services.Service_ID, rendered_services.ServiceCost, rendered_services.Type FROM rendered_services LEFT JOIN appointments ON rendered_services.Appt_ID = appointments.Appt_ID WHERE rendered_services.Status!='Pending' and appointments.Cust_ID='$custid' and rendered_services.Type='$servicetype'  ORDER BY rendered_services.Date";
        $prj= mysqli_query($db, $sql);
        $res = array();
        while($row = mysqli_fetch_assoc($prj)){
            $res[] = $row;
        }

        for($i=0; $i<count($res); $i++){?>

            <tr>
                <th scope="row"><?php echo $res[$i]['Appt_ID'] ?></th>
                <td><?php echo $res[$i]['Cust_ID'] ?></td>
                <td>
                    <?php
                        $cid = $res[$i]['Cust_ID'];   
                        $sq5 = "SELECT FirstName, LastName from customers where Cust_ID='$cid'";
                        $re5 = mysqli_query($db, $sq5);
                        $custname = mysqli_fetch_array($re5, MYSQLI_ASSOC);
                        echo $custname['FirstName']." ".$custname['LastName'];
                    ?>
                </td>
                <td>
                    <?php 
                        $empid = $res[$i]['Emp_ID'];
                        $sq1 = "SELECT FirstName, LastName from employees where Emp_ID='$empid'";
                        $re1 = mysqli_query($db, $sq1);
                        $empname = mysqli_fetch_array($re1, MYSQLI_ASSOC);
                        echo  $empname['FirstName']." ".$empname['LastName'] 
                    ?>    
                </td>
                <td>
                    <?php 
                        $orgDate = $res[$i]['Date'];  
                        echo date("d-m-Y", strtotime($orgDate));
                    ?>
                </td>
                <td><?php echo $res[$i]['Timeslot'] ?></td>
                <td>
                    <?php 
                        $sid = $res[$i]['Service_ID'];
                        $sq2 = "SELECT ServiceName FROM services where Service_ID='$sid' ";
                        $re2 = mysqli_query($db,$sq2);
                        $sname = mysqli_fetch_array($re2, MYSQLI_ASSOC);
                    
                        echo $sname['ServiceName'] 
                    ?>
                </td>
                <td><?php echo $res[$i]['ServiceCost'] ?></td>
                <td><?php echo $res[$i]['PaymentMode'] ?></td>
                <td><?php echo $res[$i]['Status'] ?></td>
            </tr>
        <?php } 
        
    }

    elseif(!empty($_POST['emp'])){

        $servicetype = $_POST['type'];
        $empid = $_POST['emp'];

        $sql="SELECT appointments.Appt_ID, appointments.Cust_ID, appointments.Date, appointments.PaymentMode, rendered_services.Status, rendered_services.Emp_ID, rendered_services.Timeslot, rendered_services.Service_ID, rendered_services.ServiceCost, rendered_services.Type FROM rendered_services LEFT JOIN appointments ON rendered_services.Appt_ID = appointments.Appt_ID WHERE rendered_services.Status!='Pending' and rendered_services.Emp_ID='$empid' and rendered_services.Type='$servicetype'  ORDER BY rendered_services.Date";
        $prj= mysqli_query($db, $sql);
        $res = array();
        while($row = mysqli_fetch_assoc($prj)){
            $res[] = $row;
        }

        for($i=0; $i<count($res); $i++){?>

            <tr>
                <th scope="row"><?php echo $res[$i]['Appt_ID'] ?></th>
                <td><?php echo $res[$i]['Cust_ID'] ?></td>
                <td>
                    <?php
                        $cid = $res[$i]['Cust_ID'];   
                        $sq5 = "SELECT FirstName, LastName from customers where Cust_ID='$cid'";
                        $re5 = mysqli_query($db, $sq5);
                        $custname = mysqli_fetch_array($re5, MYSQLI_ASSOC);
                        echo $custname['FirstName']." ".$custname['LastName'];
                    ?>
                </td>
                <td>
                    <?php 
                        $empid = $res[$i]['Emp_ID'];
                        $sq1 = "SELECT FirstName, LastName from employees where Emp_ID='$empid'";
                        $re1 = mysqli_query($db, $sq1);
                        $empname = mysqli_fetch_array($re1, MYSQLI_ASSOC);
                        echo  $empname['FirstName']." ".$empname['LastName'] 
                    ?>    
                </td>
                <td>
                    <?php 
                        $orgDate = $res[$i]['Date'];  
                        echo date("d-m-Y", strtotime($orgDate));
                    ?>
                </td>
                <td><?php echo $res[$i]['Timeslot'] ?></td>
                <td>
                    <?php 
                        $sid = $res[$i]['Service_ID'];
                        $sq2 = "SELECT ServiceName FROM services where Service_ID='$sid' ";
                        $re2 = mysqli_query($db,$sq2);
                        $sname = mysqli_fetch_array($re2, MYSQLI_ASSOC);
                    
                        echo $sname['ServiceName'] 
                    ?>
                </td>
                <td><?php echo $res[$i]['ServiceCost'] ?></td>
                <td><?php echo $res[$i]['PaymentMode'] ?></td>
                <td><?php echo $res[$i]['Status'] ?></td>
            </tr>
        <?php } 
        
        
    }
    
    // elseif(!empty($_POST['histfilterbtn'])){
    //     if($_POST['filtertype']=='thisweek'){

    //         $record = $_SESSION['adminviewhistory'];
            
    //         $sq1 = "SELECT * from '' where  "

    //     }
    //     elseif($_POST['filtertype']=='thismonth'){
            
    //     }
    // }
}


?>



