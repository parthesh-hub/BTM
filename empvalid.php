<?php
include('config.php');


// if(!empty($_POST['prime_login'])){

$userid = mysqli_real_escape_string($db,$_POST['username']);
$password = mysqli_real_escape_string($db,$_POST['pass']);
$mypassword = password_hash($password, PASSWORD_DEFAULT);

$sqllogin = "UPDATE employees set Password='$mypassword' where  Username='$userid'";
$result = mysqli_query($db, $sqllogin);
header('location:sampleemp.php');
// }

    


?>