<?php 
session_start();

include('config.php');
if(!isset($_SESSION['userid'])){
  header('location:login.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if(isset($_SESSION['otpforpayment'])){
        if(!empty($_POST['onlinepayotp'])){
        
            if($_POST['onlinepayotp'] == $_SESSION['otpforpayment']){
                echo "correctotp";
                unset($_SESSION['otpforpayment']);
            }
            else{
                echo "wrongotp";
            }
        }
        else{
            echo "enter the otp";
        }
    }
    else{
        echo "Error... Please Try Again";
    }

    
    
}
?>
