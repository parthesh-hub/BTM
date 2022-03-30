<?php
session_start();
include('config.php');

$orgDate = $_POST['date']; 
$date = date("Y-m-d", strtotime($orgDate));      


$empuname = $_SESSION['userid'];
$sql11 = "SELECT Emp_ID from employees where Username='$empuname'";
$res11 = mysqli_query($db,$sql11);
$res11 = mysqli_fetch_array($res11,MYSQLI_ASSOC);
$empid = $res11['Emp_ID'];

                
    

$sql="SELECT appointments.Appt_ID, appointments.Cust_ID, appointments.Date, rendered_services.Status, 
rendered_services.Timeslot, rendered_services.Service_ID FROM rendered_services 
INNER JOIN appointments ON rendered_services.Appt_ID = appointments.Appt_ID WHERE 
rendered_services.Emp_ID='$empid' and rendered_services.Date ='$date'";

$prj= mysqli_query($db, $sql);
$res = array();
while($row = mysqli_fetch_assoc($prj)){
    $res[] = $row;
}


for($i=0; $i<count($res); $i++){?>

    <tr>
        <th scope="row"><?php echo $res[$i]['Appt_ID'] ?></th>
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
                $sid = $res[$i]['Service_ID'];
                $sq2 = "SELECT ServiceName FROM services where Service_ID='$sid' ";
                $re2 = mysqli_query($db,$sq2);
                $sname = mysqli_fetch_array($re2, MYSQLI_ASSOC);
            
                echo $sname['ServiceName'] 
            ?>
        </td>
        <td>
            <?php 
                $orgDate = $res[$i]['Date'];  
                echo date("d-m-Y", strtotime($orgDate));
            ?>
        </td>
        <td><?php echo $res[$i]['Timeslot'] ?></td>
        
        <td><?php echo $res[$i]['Status'] ?></td>

        <?php 
            if($_SESSION['emptype']=='Home'){
                
                $cid = $res[$i]['Cust_ID'];   
                $sq5 = "SELECT Address, Pincode from prime where Cust_ID='$cid'";
                $re5 = mysqli_query($db, $sq5);
                $custname = mysqli_fetch_array($re5, MYSQLI_ASSOC);?>

                <td><?php echo $custname['Address']; ?></td>
                <td><?php echo $custname['Pincode']; ?></td>
        <?php
            }
        ?>
        
    </tr>
<?php 
} 
?>
        
  






