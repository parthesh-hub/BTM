<?php 

session_start();
include('config.php');

if(isset($_SESSION['userid'])){
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $apptid = $_POST['apptid'];

     
        $sql = "UPDATE appointments set Status='Cancelled' where Appt_ID='$apptid' ";
        $sql1 = "DELETE from rendered_services where Appt_ID='$apptid'";
      
        $res = mysqli_query($db, $sql);
        $res1 = mysqli_query($db, $sql1);

       $sql5 = "SELECT * from appointments where Appt_ID='$apptid'";
        $res5= mysqli_query($db,$sql5);
        $res5 = mysqli_fetch_array($res5,MYSQLI_ASSOC);
        $apptdate = $res5['Date'];

        $mode = $res5['PaymentMode'];

        if($res1){
            
        $u = $_SESSION["userid"];
        $sql = "SELECT FirstName, Email FROM customers where Username = '$u'";
        $res = mysqli_query($db,$sql);
        $res2 = mysqli_fetch_array($res,MYSQLI_ASSOC);
        $email = $res2['Email'];
        $fname = $res2['FirstName'];

        $to_email = $email;
        $subject = "Appointment Cancellation";
        if($mode=='Online'){
            $body = "Hello '$fname' ! Your 'Beyond The Mirror' appointment is cancelled.
                Appointment ID: '$apptid' ,
                Date : '$apptdate',
                Your money will be refunded in your account in 2-3 business days!";
        }
        else{
            $body = "Hello '$fname' ! Your 'Beyond The Mirror' appointment is cancelled.
                Appointment ID: '$apptid',
                Date : '$apptdate'";
        }
        
        $headers = "From: beyondthemirrorsaloon@gmail.com";

        mail($to_email, $subject, $body, $headers);
          
        }
       

        
    }
}
else{
    header('location:login.php');
}
?>