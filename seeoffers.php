<?php
session_start();
include('config.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST['gender']) && !empty($_POST['type']))
    $servicetype = $_POST['type'];
    $gender =  $_POST['gender'];


    if($servicetype=='Home' && $gender=='Male'){
        $sql="SELECT services.Service_ID, services.ServiceName, services.ActualPrice, offers.Date, offers.Discount  FROM services RIGHT JOIN offers ON services.Service_ID = offers.Service_ID WHERE services.HomeServicesMaleFlag=1 ORDER BY offers.Date ";
    }
    elseif($servicetype=='Home' && $gender=='Female'){
        $sql="SELECT services.Service_ID, services.ServiceName, services.ActualPrice, offers.Date, offers.Discount  FROM services RIGHT JOIN offers ON services.Service_ID = offers.Service_ID WHERE services.HomeServicesFemaleFlag=1 ORDER BY offers.Date";
    }
    elseif($servicetype=='Shop' && $gender=='Male'){
        $sql="SELECT services.Service_ID, services.ServiceName, services.ActualPrice, offers.Date, offers.Discount  FROM services RIGHT JOIN offers ON services.Service_ID = offers.Service_ID WHERE services.ShopServicesMaleFlag=1 ORDER BY offers.Date";
    }
    else{
        $sql="SELECT services.Service_ID , services.ServiceName , services.ActualPrice, offers.Date , offers.Discount FROM services RIGHT JOIN offers ON services.Service_ID = offers.Service_ID WHERE services.ShopServicesFemaleFlag=1 ORDER BY offers.Date";
    }

    $prj= mysqli_query($db, $sql);
    $res = array();
    while($row = mysqli_fetch_assoc($prj)){
        $res[] = $row;
    }?>

    <thead class="thead-dark">
        <tr>
        <th style="position: sticky; top: 0;" scope="col">Sr. No.</th>
        <th style="position: sticky; top: 0;" scope="col">ServiceId</th>
        <th style="position: sticky; top: 0;" scope="col">Service Name</th>
        <th style="position: sticky; top: 0;" scope="col">Date</th>
        <th style="position: sticky; top: 0;" scope="col">Actual price</th>
        <th style="position: sticky; top: 0;" scope="col">Discount</th>
        <th style="position: sticky; top: 0;" scope="col">Final Price</th>
        </tr>
    </thead>
    
    <tbody class="seeofferstable"><?php          
        echo count($res);
        for($i=0; $i<count($res); $i++){?>

            <tr>
                <th scope="row"><?php echo $i+1; ?></th>
                <td><?php echo $res[$i]['Service_ID']; ?></td>
                <td><?php echo $res[$i]['ServiceName']; ?></td>
                <td><?php echo $res[$i]['Date']; ?></td>
                <td><?php echo $res[$i]['ActualPrice']; ?></td>
                <td><?php echo $res[$i]['Discount']; ?></td>
                <td><?php echo $res[$i]['ActualPrice']-$res[$i]['Discount']; ?></td>
            </tr><?php } ?>
    </tbody><?php
}
?>