<?php
session_start();
include('config.php');
if(!isset($_SESSION['userid'])){
    header('location:login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Employee</title>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="static/css/stylesemp.css?v=<?php echo time(); ?>">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <!-- Bootstrap Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://mdbootstrap.com/docs/jquery/navigation/footer/#gentlygray"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>

  
<!---------------------------------------- NAV CONTAINER ---------------------------------------------->

    <div class="container1">
        <a id="logo" style="padding-left:3%;">BEYOND THE MIRROR</a>
        <a href="logout.php">Sign Out</a>
        <a href="emp.php" class="active">Profile</a>
    </div>
<!---------------------------------------- NAV CONTAINER ENDS------------------------------------------->


<!---------------------------------------- BODY CONTAINER ---------------------------------------------->

    <div class="split" style="width: 100%;">

        <!--------------------------------- LEFT CONTAINER ------------------------------------->

        <div class="left" style="width: 15%;float: left; background: #1a1c20;height:100%;">

            <?php

                $currentuser = $_SESSION['userid'];
                $query = "select * from employees where Username='$currentuser'";
                $result = mysqli_query($db,$query);
                $name = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $firstname = $name['FirstName'];
                $lastname = $name['LastName'];
                $email = $name['Email'];
                $phone = $name['Phone'];
                $gender = $name['Gender'];
                $custid = $name['Emp_ID'];
                $image = $name['Profile_Picture'];
                $specialization=$name['Specialization'];
                $emp_type = $name['Type'];
                $_SESSION['emptype']=$emp_type;

            ?>

            <form method="post" action="" enctype="multipart/form-data" id="myform">

                <div class="preview">
                    <img id="img" src="<?php echo $image; ?>" alt="" style="width:65%;margin-left:17%;
                    margin-top:10%;margin-bottom:25px;">
                </div>
            </form>

            <span style="color:#f4f4f4;margin-left:20%; margin-top:70%;margin-bottom:-5%;"><b>Welcome <?php echo $firstname; ?>
            </b></span>

            <div class="editing" style="padding-top:35%;">
                <hr style="border:1px solid;color:#f4f4f4; margin-bottom:18%;opacity:0.5;">
                <h5><a href="" id="uploadimage" data-toggle="modal" data-target="#uploadModal"
                style="color:gold;margin-left:20%;width:50%;">Edit Profile Image</a></h5>

                <hr style="border:1px solid;color:#f4f4f4;margin-bottom:18%;opacity:0.5;">
                <h5><a href="" data-toggle="modal" data-target="#editphonemodal"
                style="color:gold;margin-left:20%;width:50%;">Edit Phone</a></h5>

                <!-- <hr style="border:1px solid;color:#f4f4f4;margin-bottom:18%;opacity:0.5;">
                <h5><a href="" data-toggle="modal" data-target="#editemailmodal"
                style="color:gold;margin-left:20%;width:50%;">Edit Email</a></h5> -->


                <hr style="border:1px solid;color:#f4f4f4;margin-bottom:18%;opacity:0.5;">
                <h5><a href="" data-toggle="modal" data-target="#passwdchngmodal"
                style="color:gold;margin-left:20%;width:50%;">Change Password</a></h5>

                <hr style="border:1px solid;color:#f4f4f4;margin-bottom:5%;opacity:0.5;">
                <!-- <img id="side-logo" src="static/images/logo2.jpg" style="display:none;"> -->
            </div>
        </div>

        
        <!--------------------------------- RIGHT CONTAINER ------------------------------------->

        <div class="right" style="margin-left: 15%;">
            <div class="user">
                <p id="p" style="margin-left: 40px;">Name:</p>
                <p id="p" style="margin-left: 25px;width:10%;"><?php echo $firstname ." " .$lastname  ?></p>

                <p id="p" style="margin-left: 240px;">Email:</p>
                <p id="p" style="margin-left: 25px;"><?php echo $email ?></p>

                <p id="p" style="margin-left: 280px;">Phone:</p>
                <p id="p" style="margin-left: 25px;"><?php echo $phone ?></p><br>

                <p id="p" style="margin-top:20px;margin-left: 40px;">Type:</p>
                <p id="p" style="margin-left: 25px;width:10%"><?php echo $emp_type ?></p>

                <?php
                    if($emp_type=='Shop'){?>
                        <p id="p" style="margin-top: 20px;margin-left: 240px;">Specialization:</p>
                        <p id="p" style="width:40%;margin-top: 25px;margin-left: 48px;margin-bottom: 40px;">
                        <?php echo $specialization ?></p><br>
                    <?php
                    }?>

            </div>

            <div class="book">
                <h4 style="margin-left: 40px;padding-bottom:15px;">Check Your Schedule.</h4>
                <section id="notice">
                    <h5>You can check at most 4 days ahead.</h5>
                </section>

                <div id="welcomeDiv" style="display:block;" class="dates">
                    <input class="btn btn-dark" style="margin-left:40px;padding:5px 8px 5px 8px;margin-bottom:18px;" type="button" name="date" value="Get Available Dates" onclick="getdate()" />
                    <div id="showdate" style="display:none;">
                        <input id="date1" type="button" class="btn btn-dark" value="d1" name="first" style="margin-left: 20%;" onclick="gettable(this.value)">
                        <label for="first" id="datelabel1"></label>

                        <input id="date2" type="button" class="btn btn-dark" value="d2" name="first" style="margin-left: 10%;" onclick="gettable(this.value)">
                        <label for="second" id="datelabel2"></label>

                        <input id="date3" type="button" class="btn btn-dark" value="d3" name="first" style="margin-left: 10%;" onclick="gettable(this.value)">
                        <label for="third" id="datelabel3"></label>

                        <input id="date4" type="button" class="btn btn-dark" value="d4" name="first" style="margin-left: 10%;" onclick="gettable(this.value)">
                        <label for="fourth" id="datelabel4"></label>
                    </div>
                </div>

                <div class="apptable" id="table">
                    <div class="apptablehead">
                        <h2>Your Appointments for <span id="appdate"></span></h2>
                    </div>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <table id="Ta" class="table table-striped" style="margin-bottom: 0px;">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="position: sticky; top: 0;" scope="col">Appointment ID</th>
                                    <th style="position: sticky; top: 0;" scope="col">Customer Name</th>
                                    <th style="position: sticky; top: 0;" scope="col">Service</th>
                                    <th style="position: sticky; top: 0;" scope="col">Date</th>
                                    <th style="position: sticky; top: 0;" scope="col">Time</th>
                                    <th style="position: sticky; top: 0;" scope="col">Status</th>
                                    <?php 
                                        if($_SESSION['emptype']=='Home'){?>
                                            <th style="position: sticky; top: 0;" scope="col">Address</th>
                                            <th style="position: sticky; top: 0;" scope="col">Pincode</th>
                                    <?php
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody id='empappts'>
                                
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>

    </div>

<!--------------------------------------------- Footer ------------------------------------------------->
    <footer class="footer">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2022 Copyright:
            <span>Beyond The Mirror</span>
        </div>
        <!-- Copyright -->

    </footer>
    



<!-------------------------------------MODALS ------------------------------------------------------->

                <!-- Upload Image modal -->

 <div id="uploadModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Profile Picture</h4>
      </div>
      <div class="modal-body">
        <!-- Form -->
        <form method='post' action='' enctype="multipart/form-data">
          Select Image : <input type='file' name='file' id='file' class='form-control' ><br>
          <input type='button' class='btn btn-info' value='Upload' id='btn_upload'>
        </form>

      </div>

    </div>

  </div>
</div>

<script>
  $(document).ready(function(){
    $("#btn_upload").click(function(){
      
      var fd = new FormData();
      var files = $('#file')[0].files;

      // Check file selected or not
      if(files.length > 0 ){
         fd.append('file',files[0]);

         $.ajax({
            url: 'upload1.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
               if(response != 0){
                  $("#img").attr("src",response);
                  $(".preview img").show(); // Display image element
               }else{
                  alert('file not uploaded');
               }
            },
         });
      }else{
         alert("Please select a file.");
      }
  });
  });

</script>

              <!-- Edit Phone modal -->

<div id="editphonemodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Phone Number</h4>
      </div>
      <div class="modal-body">
        <!-- Form -->
        <form method='post' action='chngphone.php' enctype="multipart/form-data">

          <label>Enter New Number</label>
          <input type='text' name='newphone' id='newphone'
              class='form-control' placeholder="PhoneNumber"><br>
          <input type='button' name='phonechangeemp' class='btn btn-info' value='Edit Phone' id='phonechangeemp'><br>

        </form>
        <div class='editphoneemp'>
          <h3 class='editphoneempmsg' style="color:red"> </h3>
        </div>

      </div>

    </div>

  </div>
</div>

<script>
  $(document).ready(function(){
      
    $('#phonechangeemp').click(function(e){
      
      e.preventDefault();
   
      $('.editphoneempmsg').html(null); 
      var phone = $('#newphone').val();
      var phonetest = new RegExp("^[0-9]{10}$");      
      if(phonetest.test(phone)||phone == ""||phone==null){
        $.ajax({
          type:"POST",
          cache:false,
          url:"chngphone.php",
          data:{'phoneemp': phone}, 
          success: function (responsedata) {
            $('.editphoneempmsg').html(responsedata); 
            $('#editphonemodal').modal('show'); 
          }
        });
      }
      else{
        $('.editphoneempmsg').html("Enter Valid Phone Number"); 
      }

    });

        
    $("#editphonemodal").on('hide.bs.modal', function () {
            //actions you want to perform after modal is closed.
            window.location.reload(true);
          });

  });

</script>

              <!-- Edit Email modal -->

<!-- <div id="editemailmodal" class="modal fade" role="dialog">
  <div class="modal-dialog"> -->

    <!-- Modal content-->
    <!-- <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Email ID</h4>
      </div>
      <div class="modal-body"> -->
        <!-- Form -->
        <!-- <form method='post' action='chngemail.php'  enctype="multipart/form-data">

          <label>Enter New Email-ID</label>
          <input type='email' name='newemailid' id='newemailid'
              class='form-control' placeholder="Email ID"><br>
          <input type='button' name='emailmodal' class='btn btn-info' value='Edit Email' id='emailmodal' ><br>

        </form>

      </div>

    </div>

  </div>
</div> -->
<!-- 
<script>
  $(document).ready(function(){

    $('#emailmodal').click(function(e){
      alert(email);
      e.preventDefault();
     
      $('.editemailcustmsg').html(null); 
      var email = $('#newemailid').val();
     

      if(email){
        console.log(email);
        var regex = "^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$";
        // var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)){
          $('.editemailcustmsg').html("Not a valid Email address");
        }​

        else{
          alert(email);
          $.ajax({
            type:"POST",
            cache:false,
            url:"chngemail.php",
            data:{'emailcust': email}, 
            success: function (responsedata) {
              $('.editemailcustmsg').html(responsedata); 
              $('#editemailmodal').modal('show'); 
            }
          });
        }
        
      }
      else{
        $('.editemailcustmsg').html("Enter the EmailID"); 
      }

    });

    $("#editemailmodal").on('hide.bs.modal', function () {
            //actions you want to perform after modal is closed.
            window.location.reload(true);
          });

  });

</script>
  -->
              <!-- Password change modal -->

<div id="passwdchngmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"> Change Password </h4>
      </div>
      <div class="modal-body">
      <!-- Form -->
      <form method='post' action='chngpasswd.php'  enctype="multipart/form-data">
          <label>Current Password</label>
          <input type='password' name='currpassemp' id='currpassemp'
              class='form-control' placeholder="Enter the current Password"><br>
          <label>New Password</label>
          <input type='password' name='newpassemp' id='newpassemp'
              class='form-control' placeholder="Enter the new Password"><br>
          <label>Renter New Password</label>
          <input type='password' name='newapassemp' id='newapassemp'
              class='form-control' placeholder="Renter the new Password"><br>
          <input type='submit' name='passchangeemp' class='btn btn-info' value='Change Password' id='passchangeemp'  ><br>
      </form>
      <div class='editpassemp'>
          <h3 class='editpassempmsg' style="color:red"> </h3>
      </div>

      </div>

  </div>

  </div>
</div>


<script>
  $(document).ready(function(){
    
    $('#passchangeemp').click(function(e){
      
      e.preventDefault();

      $('.editpassempmsg').html(null); 
      var currpass = $('#currpassemp').val();
      var newpass = $('#newpassemp').val();
      var newapass = $('#newapassemp').val();

      if(currpass && newpass && newapass){

        if(newpass==newapass){
          var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
          if(!strongRegex.test(newpass)){
            text="*Password should contain atleast 1 small letter,capital letter,number and special character.";
            $('.editpassempmsg').html(text);
          }
          else{
            console.log('Hello');
            $.ajax({
              type:"POST",
              cache:false,
              url:"chngpasswd.php",
              data:{'currpassemp': currpass, 'newpassemp':newpass, 'newapassemp':newapass}, 
              success: function (responsedata) {
                $('.editpassempmsg').html(responsedata); 
                $('#passwdchngmodal').modal('show'); 
              }
            });
          }
        }
        else{
          $('.editpassempmsg').html("New Passwords didn't match");
        }
      }
      else{
        $('.editpasscustmsg').html("Enter the Passwords"); 
      }

    });

  
    $("#passwdchngmodal").on('hide.bs.modal', function () {
            //actions you want to perform after modal is closed.
            window.location.reload(true);
          });

  });

</script>


</body>


<script src="static/js/emp.js"></script> 
</html>
