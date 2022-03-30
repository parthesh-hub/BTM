<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Password Reset Page</title>
    <link rel="stylesheet" type="text/css" href="static/css/forgot-pass-style.css?v=<?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</head>
<body>
	<div class="container1">
        <a href="#" id="logo" style="padding-left:40px;">BEYOND THE MIRROR</a>
        <a id="login" href="register.php">Register</a>
        <a id="register" href="login.php" id="nav-right">Log In</a>
        <a href="index.php">Home</a>
    </div>


    <div class = "hero">
		<div class="form-box">
            <div class="title-form">Forgot Password?</div>
			<form id="fgtpass" class="input-group" method="POST" action='sendmail.php'>
				<input type="text" class="input-field" placeholder="Enter Username"  name='user1' id='username'>
				<input type="email" class="input-field" placeholder="Enter Email"  name='email1' id='email'>
                <button type="submit" class="submit-btn" style="margin-top: 30px;">Reset Password</button>
                <div class='errmsgdiv'>
                    <h3 class='fgtmsg' style="color:red;"> </h3>
                </div>
				<p>Not Registered?<a href="register.php" id="gotoreg">Register Here</a></p>
			</form>
		</div>
	</div>

</body>


<script>

    $(document).ready(function(){

        $('#fgtpass').on('submit', function(e) { //use on if jQuery 1.7+
            e.preventDefault();  //prevent form from submitting

            $('.fgtmsg').html(null);
            
            var user1 = document.getElementById('username').value;
            var email1 = document.getElementById('email').value;
            console.log("hello");
            if(user1 && email1){

                $('.fgtmsg').html(null);
                console.log("hello11");

                $.ajax({
                    type:"POST",
                    cache:false,
                    url:"sendmail.php",
                    data:{'username': user1, 'email':email1}, 
                    success: function (responsedata) {
                        $('.fgtmsg').html(responsedata);
                    
                    }
                });
                console.log("hello33");

            }
            else{
                console.log("filldetails");
                $('.fgtmsg').html("Fill the details");
            }
        });


    });
        

    

</script>
</html>