<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Switch To Prime Page</title>
  <link rel="stylesheet" type="text/css" href="static/css/switch-form-style.css?v=<?php echo time(); ?>">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</head>
<body>
	<div class="container1">
        <a href="#" id="logo" style="padding-left:40px;">BEYOND THE MIRROR</a>
        <a id="login" href="login.php">Login</a>
        <a href="switchform.php" class="active">Switch To Prime</a>

    </div>


    <div class = "hero">
		<div class="form-box">
      <div class="title-form">Switch To Prime</div>
			<form id="prime" class="input-group" method="POST" action="">
				<input type="text" class="input-field" placeholder="Enter Username" required name='s2pusername' id='s2pusername'>
                <input type="password"class="input-field" placeholder="Enter Password" required name='s2ppasswd' id='s2ppasswd'>
                <input type="text"class="input-field" placeholder="Enter Address" required name='s2paddress' id='s2paddress'>
                <input type="text" class="input-field" placeholder="Aadhar Card No." required name='s2paadhar' id='s2paadhar'>
                <div style="margin-top: 20px;">
                <label style="color:#333; font-size: 15px;">Pincode: &nbsp;  </label>
                <select name="s2ppincode" id="s2ppincode">
                  <option value="initial" selected='' disabled=''>Pincode</option>
                  <option value="410102">410102</option>
                  <option value="410103">410103</option>
                  <option value="410104">410104</option>
                </select> <br><br></div>
                
        <input value="Submit" id="s2p" type="submit" class="submit-btn" style="margin-top: 20px;">
        <div class='switchprimemsg' id='switchprimemsg'></div>
      </form>
		</div>
	</div>

</body>


<script>
 
	$(document).ready(function() {

    $("#s2p").click(function(e){
        
        e.preventDefault();
        var username = $("#s2pusername").val();
        var passwd = $("#s2ppasswd").val();
        var address = $("#s2paddress").val();
        var aadhar = $("#s2paadhar").val();
        var pincode = $("#s2ppincode").val();

        $(".switchprimemsg").html(null);

        if(username=="" || username==null){
            $(".switchprimemsg").html("Enter Username");
        }
        else{
            if(passwd=="" || passwd==null){
                $(".switchprimemsg").html("Enter Password");
            }
            else{
                if(address=="" || address==null){
                    $(".switchprimemsg").html("Enter Address");
                }
                else{
                    if(aadhar=="" || aadhar==null){
                        $(".switchprimemsg").html("Enter Aadhar");
                    }
                    else{
                        if(pincode=="" || pincode==null){
                            $(".switchprimemsg").html("Select Pin");
                        }
                        else{
                            var aadhartest = new RegExp("^[0-9]{12}$");

                            if(!aadhartest.test(aadhar)){
                                $(".switchprimemsg").html("Enter Valid Aadhar Number"); 
                            }
                            else{
                                $.ajax({
                                    type:"POST",
                                    cache:false,
                                    url:"switchprime.php",
                                    data:{"s2p":1, "uname": username, "passwd":passwd, "address":address, "aadhar":aadhar, "pincode":pincode} , 
                                    success: function (responsedata) {
                                    $(".switchprimemsg").html(responsedata); 
                                    }
                                });                                
                            }
                        }
                    }
                }
            }
            
        }       
        
                  
    });

});
  
</script>
</html>

