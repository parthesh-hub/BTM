<?php

include('config.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "SELECT * from customers where Username='$username' and Email='$email'";
    $res = mysqli_query($db,$sql);
    
    if(mysqli_num_rows($res)>0){
        $to_email = $email;
        $subject = "Password Reset";
        $body = "Hello, User. You recently requested to reset your Password for your Beyond The Mirror Website Account. 
        We have provided you a temporary password (YE@29n69fu2) to login. Kindly change the password once you login to your account.";
        $headers = "From: beyondthemirrorsaloon@gmail.com";

        if (mail($to_email, $subject, $body, $headers)) {
            $mypassword = password_hash("YE@29n69fu2", PASSWORD_DEFAULT);  
            $sql1 = "UPDATE customers SET Password='$mypassword' where Username='$username' and Email='$email'";
            $res1 = mysqli_query($db,$sql1);
            ?>
            <?php echo "Email has been sent to your mail..." ?><?php
        } else {   ?>
            <?php  echo "Email sending failed..." ?> <?php
        }
    }
    else{?>
        <?php echo "Invalid Credentials" ?><?php
    }

}
    ?>

