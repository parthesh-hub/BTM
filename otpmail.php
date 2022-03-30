<?php 
session_start();
unset($_SESSION['Offline']);
unset($_SESSION['Online']);
include('config.php');
if(!isset($_SESSION['userid'])){
  header('location:login.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){

    if(!empty($_POST['otp'])){
        echo $_POST['otp'];
         $u = $_SESSION["userid"];
        $sql = "SELECT Email FROM customers where Username = '$u'";
        $res = mysqli_query($db,$sql);
        $res2 = mysqli_fetch_array($res,MYSQLI_ASSOC);
        $email = $res2['Email'];
        $onetimepassword = mt_rand(100000, 999999);

        $to_email = $email;

       

        $subject = "OTP for Payment to BeyondTheMirror";
        $body = "Hello, User. Your OTP for the 'Beyond The Mirror' Salon Appointment is '$onetimepassword'.
         Kindly use this OTP to confirm your online payment.";
        $headers = "From: beyondthemirrorsaloon@gmail.com";

        if (mail($to_email, $subject, $body, $headers)) {
            $_SESSION['otpforpayment'] = $onetimepassword;
            return "True" ;
        } 
        else {  
            return "False" ;
        }
    }
    
    if(!empty($_POST['otp1'])){
        if (isset($_SESSION['otpforpayment'])) {
            if($_SESSION['otpforpayment'] == $_POST['otp1']){
                $_SESSION['Online']=1;
                unset($_SESSION['otpforpayment']);
                echo 'Processing...';
            }
            else{
                echo "Incorrect otp" ;
            }
        } 
        else {  
            echo "Incorrect otp" ;
        }
    }
    
    if(!empty($_POST['offline'])){
        $_SESSION['Offline']=1;
        echo "Success";
    }
}
?>
