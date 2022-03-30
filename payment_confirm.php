<?php 
session_start();

include('config.php');
if(!isset($_SESSION['userid'])){
  header('location:login.php');
}


$orgDate = $_SESSION['selected_date'];  
$serdate = date("Y-m-d", strtotime($orgDate)); 
$sertype= $_SESSION['service_type'];
$totaldiscount=$_SESSION['total_discount'];
$totalcost = $_SESSION['total_cost'];
$usernm = $_SESSION['userid'];
$sql1 = "SELECT Cust_ID from customers where Username='$usernm'";
$res1 = mysqli_query($db, $sql1);
$custid = mysqli_fetch_array($res1, MYSQLI_ASSOC);
$cust_id = $custid['Cust_ID'];

if(!empty($_SESSION['Online'])){

    $sqlnew = "INSERT INTO appointments(Cust_ID,Date,Type,Status,TotalDiscount,TotalCost,PaymentMode)
    VALUES('$cust_id','$serdate','$sertype','Booked','$totaldiscount','$totalcost','Online')";
}
elseif(!empty($_SESSION['Offline'])){
        
    $sqlnew = "INSERT INTO appointments(Cust_ID,Date,Type,Status,TotalDiscount,TotalCost,PaymentMode)
    VALUES('$cust_id','$serdate','$sertype','Booked','$totaldiscount','$totalcost','Offline')";
}
$res = mysqli_query($db, $sqlnew);
    

$sqln1 = "SELECT * from appointments where Cust_ID='$cust_id' ORDER BY Appt_ID DESC LIMIT 1";
$resn1 = mysqli_query($db, $sqln1);
$apptid = mysqli_fetch_array($resn1, MYSQLI_ASSOC);
$appt_id = $apptid['Appt_ID']; 
$_SESSION['checkapptid'] = $appt_id;



$c =0;
for($i=0; $i<count($_SESSION['data']); $i++){

    $service_id = $_SESSION['data'][$i]['serviceid'];
    $timeslot = $_SESSION['data'][$i]['timeslot'];
    $servicefinalcost = $_SESSION['data'][$i]['servicefinalcost'];
    
    $employee_id =$_SESSION['data'][$i]['employee'];
    // $employee_id = 102;

    $in1 = "INSERT INTO rendered_services values('$appt_id','$service_id','$employee_id', 
    '$serdate','$sertype','$timeslot','$servicefinalcost','Pending')";
    $resfinal = mysqli_query($db, $in1);

    
    $c+=1;
}


// --------------------mail -----------------------


$u = $_SESSION["userid"];
$sql = "SELECT FirstName, Email FROM customers where Username = '$u'";
$res = mysqli_query($db,$sql);
$res2 = mysqli_fetch_array($res,MYSQLI_ASSOC);
$email = $res2['Email'];
$fname = $res2['FirstName'];
$to_email = $email;
$subject = "Appointment Confirmation";
$body = "Hello '$fname' ! Your 'Beyond The Mirror' appointment is confirmed.
        Appointment ID: '$appt_id',
        Date : '$orgDate'
        Thank You For Booking!!";
$headers = "From: beyondthemirrorsaloon@gmail.com";
mail($to_email, $subject, $body, $headers);


?>

<html>
<head>
<title>Payment Gateway</title>
<link rel="stylesheet" href="static/css/payment-confirm-style.css">
</head>
<body onload="setTimeout(myFunction, 3000)">
    <div class = "app-container">
        <div class = "top-box">
            <p>CONFIRMATION</p>
        </div>
        
        <div class = "middle-box">
        <h1><?php echo $_SESSION['total_cost'] ?><span>&#x20B9;</span></h1>
        <p>Paid to Beyond The Mirror &copy</p>
        </div>
        <div class = "bottom-box">
        <div class = 'process'id='loading'>
        <h2>Processing...</h2>
        <span>Please do not reload!</span>
        <img src="static/images/payment_anim.gif" alt="Processing" height="250px" width="350px">  
        </div>
        <div class = 'paid' id='success'>
            <p>Your transaction was successful!</p>
            <div id="redirect" style="visibility: hidden">
            <h4>You will be redirected to the homepage in <span id="countdown">5</span> second(s)...</h4>
            </div>
        </div>
        </div>
        </div>


         
<script>
 function myFunction() {
  document.getElementById('loading').style.display = "none";
  document.getElementById('success').style.display = "block";
  sleep();
}
        function showRedirect() {
            document.getElementById("redirect").style.visibility = "visible";
        }

        function sleep() {
            setTimeout(countdown, 1000);
            setTimeout("showRedirect()", 1000);
        }
                var ss = 6;
                function countdown() {
                    ss = ss-1;
                    if (ss<0) {
                        window.location="apt.php";
                    }
                    else {
                        document.getElementById("countdown").innerHTML=ss;
                        window.setTimeout("countdown()", 1000);
                    }
                }
</script>
</body>
<script type="text/javascript"> 
        window.history.forward(); 
        function noBack() { 
            window.history.forward(); 
        } 
    </script> 
</html>

<?php
unset($_SESSION['Offline']);
unset($_SESSION['Online']);
unset($_SESSION['data']);
unset($_SESSION['service_type']);
unset($_SESSION['selected_date']);
unset($_SESSION['total_discount']);
unset($_SESSION['total_cost']);
?>