<?php
   include("config.php");
   session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST") {

		
		if(!empty($_POST['regular_register_submit'])){

			$myfirstname = mysqli_real_escape_string($db,$_POST['fname1']);
			$mylastname = mysqli_real_escape_string($db,$_POST['lname1']);
			$myusername = mysqli_real_escape_string($db,$_POST['username1']); 
			$mypassword = mysqli_real_escape_string($db,$_POST['pass1']);
			$myemail = mysqli_real_escape_string($db,$_POST['email1']);
			$myphone = mysqli_real_escape_string($db,$_POST['phone1']);
			$mydob = mysqli_real_escape_string($db,$_POST['dob1']);
			$mygender = mysqli_real_escape_string($db,$_POST['gender1']);

			$sql = "SELECT * FROM customers WHERE Username = '$myusername'";
			$result = mysqli_query($db,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			$count = mysqli_num_rows($result);
			
				
			if($count ==1) {
				$_SESSION['regmessage'] = "User Already Exists!";
				header('location:register.php');
			}
			else if(substr($myusername,0,3)=="EMP"){
				$_SESSION['regmessage'] = "You are not allowed to take this username!";
				header('location:register.php');
			}
			else {

				$mypassword = password_hash($mypassword, PASSWORD_DEFAULT);  

				// Attempt insert query execution
				$sqlins = "INSERT INTO customers (Firstname, Lastname, Email, Gender, Username, Password,
				DateofBirth, Phone, Cust_Type,Profile_Picture ) VALUES
				('$myfirstname', '$mylastname', '$myemail', '$mygender', '$myusername', '$mypassword',
					'$mydob', '$myphone', 'Regular','upload/zaynya.png')";

				if(mysqli_query($db, $sqlins)){
					$_SESSION['regmessage'] = "Records added successfully Regular";
					header('location:register.php');
				}	
				else{
					$_SESSION['regmessage'] = "ERROR: Could not able to execute $sqlins. " . mysqli_error($db);
					header('location:register.php');
				}
			}
		}
				
		
		else if(!empty($_POST['prime_register_submit'])){
			
			$myfirstname = mysqli_real_escape_string($db,$_POST['fname']);
			$mylastname = mysqli_real_escape_string($db,$_POST['lname']);
			$myusername = mysqli_real_escape_string($db,$_POST['username']); 
			$mypassword = mysqli_real_escape_string($db,$_POST['pass']);
			$myemail = mysqli_real_escape_string($db,$_POST['email']);
			$myphone = mysqli_real_escape_string($db,$_POST['phone']);
			$mydob = mysqli_real_escape_string($db,$_POST['dob']);
			$mygender = mysqli_real_escape_string($db,$_POST['gender']);
			$myaadhar = mysqli_real_escape_string($db,$_POST['aadhar']);
			$mypincode = mysqli_real_escape_string($db,$_POST['pincode']);
			$myaddress = mysqli_real_escape_string($db,$_POST['address']);

			$sql = "SELECT * FROM customers WHERE username = '$myusername'";
			$result = mysqli_query($db,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$count = mysqli_num_rows($result);
			
				
			if($count == 1) {
				$_SESSION['regmessage'] = "User Already Exists!";
				header('location:register.php');

			}
			else if(substr($myusername,0,3)=="EMP"){
				$_SESSION['regmessage'] = "You are not allowed to take this username!";
				header('location:register.php');
			}
			else {

				$mypassword = password_hash($mypassword, PASSWORD_DEFAULT);  
				// Attempt insert query execution
				$sqlins = "INSERT INTO customers (Firstname, Lastname, Email, Gender, Username, Password,
				DateofBirth, Phone, Cust_Type, Profile_Picture ) VALUES
				('$myfirstname', '$mylastname', '$myemail', '$mygender', '$myusername', '$mypassword',
				 '$mydob', '$myphone', 'Prime', 'upload/zaynya.png')";

				if(mysqli_query($db, $sqlins)){

					$kid = "Select Cust_ID from customers where Username='$myusername'";
					$result1 = mysqli_query($db,$kid);
					$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
					$cid = $row1['Cust_ID'];

					$sqlins2 = "INSERT INTO prime (Cust_ID, AadharCard, Address, Pincode ) VALUES
					('$cid','$myaadhar', '$myaddress','$mypincode')";

					if(mysqli_query($db, $sqlins2)){
						$_SESSION['regmessage'] = "Records added successfully Prime";
						header('location:register.php');

					}
					else{
						$_SESSION['regmessage'] = "ERROR: Could not able to execute $sqlins2. " . mysqli_error($db);
						header('location:register.php');

					}

				} 
				else{
					$_SESSION['regmessage'] = "ERROR: Could not able to execute $sqlins. " . mysqli_error($db);
					header('location:register.php');

				}
			}
		}

 	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Registration Page</title>
	<script type="text/javascript" src="static/js/register.js">	</script>

	<link rel="stylesheet" type="text/css" href="static/css/register-style.css?v=<?php echo time(); ?>">
	
</head>
<body>

	<div class="container1">
        <a href="#" id="logo" style="padding-left:40px;">BEYOND THE MIRROR</a>
        <a id="register"href="register.php"  id="nav-right" class="active">Register</a>
        <a id="login" href="login.php">Log In</a>
        <a id="home"href="index.php">Home</a>
      </div>




	<div class = "hero" >

		<div class="form-box">
		<div class="title-form">Registration</div>
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" onclick="prime()">Prime</button>
				<button type="button" class="toggle-btn" onclick="regular()">Regular</button>
			</div>


			<form id="prime1" class="input-group1" name="prime1" method='POST' onsubmit="return primesub();" action="register.php" >
				<input type="text" id="fname" class="input-field" placeholder="First Name" name="fname" autocomplete="off" >
				<input type="email" id="email" class="input-field" placeholder="Email ID" name="email" autocomplete="off">
				<input type="text"class="input-field" placeholder="Enter Username" id="username" name="username"style="margin-bottom: 20px" autocomplete="off">
				<label for="gender" id="input-field">Gender:</label>
					<input type="radio" id="male" name="gender" value="male" >
  				<label for="male">Male</label>
    				<input type="radio" id="female" name="gender" value="female">
  				<label for="female">Female</label>
  				<input type="number" class="input-field" placeholder="Phone" id="phone"name="phone"style="margin-top: 20px" autocomplete="off">
  				<input type="text" class="input-field" placeholder="Address" id="address"name="address" autocomplete="off">

				<input type="text" class="input-field input-group2" placeholder="Last Name" id="lname"name="lname" style="margin-bottom: 50px; top:0;" autocomplete="off">
				<input type="password"class="input-field input-group2" placeholder="Enter Password" id="pass"name="pass" style="top:50px;" autocomplete="off">				
				<input type="text" class="input-field input-group2" placeholder="Date Of Birth" id='dob' name="dob" onfocus="(this.type='date')" style="top:100px;" autocomplete="off">
				<input type="text" class="input-field input-group2" placeholder="Aadhar Card No." id="aadhar"name="aadhar"  style="top:150px;" autocomplete="off">
				<!-- <input type="text" class="input-field input-group2" placeholder="Pincode" id="pincode"name="pincode"  style="top:200px;" autocomplete="off"> -->
				<select class="input-field input-group2" style="top:200px;" name="pincode" id="pincode">
					<option value="initial" selected='' disabled=''>Pincode</option>
					<option value="410102">410102</option>
					<option value="410103">410103</option>
					<option value="410104">410104</option>
				</select> 
				<input type="submit" name="prime_register_submit" value="Register" id="sub1" class="submit-btn" style="margin-top: 40px;width: 80%;margin-left: 235px;">		
				<div id='error_message' class="error" style="width: 570px;text-align: center;color: red;margin-left: 80px;" ></div>

			</form>

			<form id="regular1" name="regular1" name="regular1" class="input-group1" method="POST" onsubmit="return regularsub();" action="register.php">
				<input type="text" class="input-field" placeholder="First Name" name="fname1" id="fname1" autocomplete="off" >
				<input type="email" class="input-field" placeholder="Email ID" name="email1" id="email1" autocomplete="off">
				<input type="text"class="input-field" placeholder="Enter Username" name="username1" id="username1" style="margin-bottom: 20px" autocomplete="off">
				<label for="gender1" id="input-field-gender">Gender:</label>
				  <input type="radio" id="male" name="gender1" value="male">
  				  <label for="male">Male</label>
    			  <input type="radio" id="female" name="gender1" value="female">
  				  <label for="female">Female</label>
				<input type="number" class="input-field" placeholder="Phone" name="phone1" id="phone1" style="margin-top: 20px" autocomplete="off">
				<input type="text" class="input-field input-group2" name="lname1" placeholder="Last Name" id="lname1"style="margin-bottom: 50px;top:1px;" autocomplete="off">
				<input type="password"class="input-field input-group2" name="pass1" placeholder="Enter Password" id="pass1" style="top:50px;" autocomplete="off">
				<input type="text" class="input-field input-group2" placeholder="Date Of Birth" id='dob1' name="dob1" onfocus="(this.type='date')" style="top:100px;" required>
				<input type="submit" name="regular_register_submit" value="Register" id="sub2" class="submit-btn" style="margin-left: 235px;margin-top: 80px;width: 80%;" >
				<div id='error_message1' class="error" style="width: 570px;text-align: center;color: red;margin-left: 80px;">

			</div>


			</form>
			

			<div >
				<?php 
					if(isset($_SESSION['regmessage'])){
						echo $_SESSION['regmessage'];
						unset($_SESSION['regmessage']);
					}
				?>
			</div>
             
		<div class="submit-div1">
			<p>Already Registered?<a href="login.php" id="gotoreg">Login Here</a></p></div>
        
		</div>


		</div>
	
	<script type="text/javascript" src="static/js/register.js">	</script>

	</body>
</html>



