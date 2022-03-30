<?php
session_start();
include('config.php');

    
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if($_POST['date'] && $_POST['serviceid'] && $_POST['discount']){
        
        $orgDate = $_POST['date'];
        $offer_date = date("Y-m-d", strtotime($orgDate));
        $offer_serviceid = $_POST['serviceid'];
        $offer_discount = $_POST['discount'];

        
        $sql = "INSERT into offers values('$offer_serviceid', '$offer_discount', '$offer_date')";
        $result = mysqli_query($db,$sql);
        
        if($result){
            echo "Updated Successfully";
        }
        else{
            echo "Unable to update... Please try again!!";
        }
        
    }
    else{
        echo "Error... Please Try Agail!!";
    }

    
}


?>



