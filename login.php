
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<title>Login Page</title>
<link rel="stylesheet" type="text/css" href="static/css/login-style.css?v=<?php echo time(); ?>">




</head>
<body>
	<div class="container1">
        <a href="#" id="logo" style="padding-left:40px;">BEYOND THE MIRROR</a>
        <a id="register"href="register.php">Register</a>
        <a id="login"href="login.php" id="nav-right" class="active">Log In</a>
        <a id="home"href="index.php">Home</a>
    </div>


    <div class = "hero">

		<div class="form-box">
		<div class="title-form">Login</div>
			<div class="button-box">
					<div id="btn"></div>
					<button type="button" class="toggle-btn" onclick="prime()">Prime</button>
					<button type="button" class="toggle-btn" onclick="regular()">Regular</button>
			</div>
			<div class="social-icons">
				<img src="static/images/social/fb.png">
				<img src="static/images/social/tw.png">
				<img src="static/images/social/gp.png">
			</div>
			<form id="prime" class="input-group" method='POST' action='validation.php'>
				<input type="text" class="input-field" placeholder="Username" name="username">
				<input type="password"class="input-field" placeholder="Enter Password" name="pass"><br>
				<input type="checkbox" class="check-box"><span>Remember Me</span>
				<input type="submit" name='prime_login' class="submit-btn" value="Login"></button>

				<span class="error_msg"style="position:absolute; padding-top:50px;"><?php
					session_start();
					if(isset($_SESSION['errmsg'])){
						echo $_SESSION['errmsg'];
						unset($_SESSION['errmsg']);
					}
					 ?>
				</span>

				<a href="forgot-password.php" id="forgot" >Forgot Password?</a>
				<p>Not Registered?<a href="register.php" id="gotoreg">Register Here</a></p>
			</form>

			<form id="regular" class="input-group" method='POST' action='validation.php'>
				<input type="text" class="input-field" placeholder="Username" name="username1" >
				<input type="password"class="input-field" placeholder="Enter Password" name="pass1" ><br>
				<span class="error_msg" style="position:absolute; padding-top:50px;"><?php

					if(isset($_SESSION['errmsg'])){
						echo $_SESSION['errmsg'];
						unset($_SESSION['errmsg']);
					}
					?>
				</span>
				<input type="checkbox" class="check-box"><span>Remember Me</span>
				<input type="submit" name='regular_login' class="submit-btn" value="Login"></button>

				

				<a href="forgot-password.php" id="forgot" >Forgot Password?</a>
				<p>Not Registered?<a href="register.php" id="gotoreg">Register Here</a></p>

			</form>
		</div>
	</div>

</body>

<script type="text/javascript" src="static/js/login.js">

</script>
<script>
	var x = document.getElementById("prime");
	var y = document.getElementById("regular");
	var z = document.getElementById("btn");

	function regular() {
		x.style.left = "-400px";
		y.style.left = "50px";
		z.style.left = "110px";
	}

	function prime() {
		x.style.left = "50px";
		y.style.left = "450px";
		z.style.left = "0px";
	}


	function forgotpass(){
		if(document.getElementById('fusername').value && document.getElementById('femail').value){
			alert('Mail has been sent to your EmailID')
		}
		else{
			alert('Fill the details')
		}
	}

</script>
</html>
