<?php

include('config.php');
if(!isset($_SESSION['userid'])){
    header('location:login.php');
}


if(!empty($_POST['serviceid']) && !empty($_POST['date'])){

    $serviceid= $_POST['serviceid'];
    $date= $_POST['date'];

    $sql="DELETE from offers where Service_ID='$serviceid' and Date='$date'";
    $res = mysqli_query($db, $sql);

    if($res){
        echo "Offer removed successfully";
    }
    else{
        echo "Error.. Please try again!!";
    }

}
else{
    echo "Error.. Please try again!!";
}


?>