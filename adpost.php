<?php
session_start();
include('config.php');


$type = $_POST['type'];
$sql="SELECT appointments.Appt_ID, appointments.Cust_ID, appointments.Date, appointments.PaymentMode, rendered_services.Status, 
rendered_services.Emp_ID, rendered_services.Timeslot, rendered_services.Service_ID, rendered_services.ServiceCost, 
rendered_services.Type FROM rendered_services LEFT JOIN appointments 
ON rendered_services.Appt_ID = appointments.Appt_ID WHERE rendered_services.Status='Pending' and
appointments.Status='Booked' and appointments.Type='$type'  ORDER BY rendered_services.Date";
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
            <td>
                <input class="complete-btn btn btn-success" name='completed' id=<?php echo $res[$i]['Appt_ID'].",".$sid.",".$res[$i]['PaymentMode'] ?> type='button' value='Completed' 
                style="width:150px;padding:5px; margin:5px;">&nbsp;
                <input class="unattended-btn btn btn-warning" name='unattended' id=<?php echo $res[$i]['Appt_ID'].",".$sid.",".$res[$i]['PaymentMode'] ?> type='button' value='Unattended' 
                style="width:150px;padding:5px; margin:5px;" ></a>
            </td>
        </tr>
<?php } 
?>
        
  






