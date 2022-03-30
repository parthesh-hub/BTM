<?php
session_start();
include('config.php');



    
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['completed']) && $_POST['apptid'] && $_POST['serviceid'] && $_POST['paymentmode']){
    
        $apptid = $_POST['apptid'];
        $serviceid = $_POST['serviceid'];
        $paymentmode = $_POST['paymentmode'];

        $sql = "UPDATE rendered_services SET Status='Completed' where Appt_ID='$apptid' and Service_ID='$serviceid'";
        $res= mysqli_query($db, $sql);

        if($res){
            echo "Successfully Updated";
        }
        else{
            echo "Error... Please try again!!";
        }
    }
    elseif(isset($_POST['unattended']) && $_POST['apptid'] && $_POST['serviceid'] && $_POST['paymentmode']){
    
        $apptid = $_POST['apptid'];
        $serviceid = $_POST['serviceid'];
        $paymentmode = $_POST['paymentmode'];

        $sql = "UPDATE rendered_services SET Status='Unattended' where Appt_ID='$apptid' and Service_ID='$serviceid'";
        $res= mysqli_query($db, $sql);

        if($res){
            echo "Successfully Updated";
        }
        else{
            echo "Error... Please try again!!";
        }
    }
    else{
        echo "Error... Please try again!!";
    }
}


?>



