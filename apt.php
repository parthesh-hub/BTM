<?php
session_start();

if(!isset($_SESSION['userid'])){
  header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Salon And Spa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="static/css/stylesapt.css?v=<?php echo time(); ?>">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <!-- Bootstrap Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://mdbootstrap.com/docs/jquery/navigation/footer/#gentlygray"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



</head>

<body>
  <div class="container1">
    <!-- <a id="logo" style="padding-left:40px;">BEYOND THE MIRROR</a>
    <a href="logout.php">Sign Out</a>
    <a href="apt.php" class="active">Profile</a> -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="  padding-top: 0px;padding-left: 0px;padding-bottom: 0px;padding-right: 0px;
">

        <a id="logo" class="navbar-brand" href="">BEYOND THE MIRROR</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" style="background-color:black;">
            <span class="navbar-toggler-icon" ></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a id="active" class="nav-link" href="apt.php"  >Profile</a>
            </li>
            <li class="nav-item">
              <a id="navitem"class="nav-link" href="logout.php" >Sign Out</a>
            </li>
          </ul>

        </div>
      </nav>
  </div>

  <div class="split" style="width: 100%;">

    <div class="left" style="width: 15%;float: left; background: #1a1c20;height:100%;">

      <?php
        include("config.php");

        $currentuser = $_SESSION['userid'];
        $query = "select * from customers where Username='$currentuser'";
        $result = mysqli_query($db,$query);
        $name = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $firstname = $name['FirstName'];
        $lastname = $name['LastName'];
        $email = $name['Email'];
        $phone = $name['Phone'];
        $gender = $name['Gender'];
        $custid = $name['Cust_ID'];
        $image = $name['Profile_Picture'];
        $_SESSION['gender']=$gender;

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
            <h5><a href="" data-toggle="modal" data-target="#cancelapptmodal"
            style="color:gold;margin-left:10%;width:50%;">Cancel Appointment</a></h5>

            <hr style="border:1px solid;color:#f4f4f4;margin-bottom:18%;opacity:0.5;">
            <h5><a href="" data-toggle="modal" data-target="#passwdchngmodal"
            style="color:gold;margin-left:20%;width:50%;">Change Password</a></h5>

            <hr style="border:1px solid;color:#f4f4f4;margin-bottom:5%;opacity:0.5;">
            <!-- <img id="side-logo" src="static/images/logo2.jpg" style="display:none;"> -->
        </div>
    </div>


    <div class="right" style="">
      <div class="user">
        <p id="p" style="margin-left: 40px;">Name:</p>
        <p id="p" style="margin-left: 25px;width:10%;"><?php echo $firstname ." " .$lastname  ?></p>

        <p id="p" style="margin-left: 240px;">Email:</p>
        <p id="p" style="margin-left: 25px;"><?php echo $email ?></p>

        <p id="p" style="margin-left: 280px;">Phone:</p>
        <p id="p" style="margin-left: 25px;"><?php echo $phone ?></p><br>


        <?php
          if($name['Cust_Type']=='Regular'){
            $_SESSION['user_type']='regular';

        ?>
            <style type="text/css">#address_prime{
            display:none;
            }</style>
            <style type="text/css">.typedisplay{
            display:none;
            }</style>
            <?php
          }
          else{
            $_SESSION['user_type']='prime';
            ?>
            <style type="text/css">#switch_to_prime{
            display:none;
            }</style>
        <?php }
        ?>

          <div id='address_prime'>
            <p id="p" style="margin-top: 20px;margin-left: 40px;">Address:</p>
            <p id="p" style="width:40%;margin-top: 25px;margin-left: 24px;margin-bottom: 40px;">
            <?php

            $custid = $name['Cust_ID'];
            $query2 = "select * from prime where Cust_ID='$custid'";
            $result2 = mysqli_query($db,$query2);
            $name2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
            $address = $name2['Address'];

            echo $address ?></p><br>
          </div>
          <div id="switch_to_prime">
            <p id="p" style="margin-top: 20px;margin-left: 40px;">Not a Prime Member? </p>
            <p id="p" style="width:40%;margin-top: 25px;margin-left: 24px;margin-bottom: 40px;">
            <a href='switchform.php'>Switch To Prime</a>
          </div>
      </div>

      <div class="book" style="padding-bottom: 15px;">
        <h4 style="margin-left: 40px;padding-bottom:15px;">Book an Appointment?</h4>
        <section id="notice">
          <h5>You can book at the most 4 days prior.</h5>
        </section>
        <div id="welcomeDiv" style="display:block;" class="dates">

          <button  class="getbutton btn btn-dark" style="margin-left:40px;padding:5px 8px 5px 8px;margin-bottom:18px;"
            name="date" onclick="getdate()" name="button">Get Available Dates</button>
            <div id="bk" class="bookmsg" style="">
              
                  <?php if(isset($_SESSION['bmsg'])){
                    echo $_SESSION['bmsg'];
                    unset($_SESSION['bmsg']);
                  }
                  ?>
                </div>
          <div id="showdate" style="display:none;">

            <form method='POST' onsubmit="return gotosecondpage('<?php echo $_SESSION['user_type'];?>')" 
            action='selectservice.php' name='dateandtypeselect'>
              <input id="date1" type="radio" value="d1" name="first">
              <label for="first" id="datelabel1"></label><br>

              <input id="date2" type="radio" value="d2" name="first">
              <label for="second" id="datelabel2"></label><br>

              <input id="date3" type="radio" value="d3" name="first">
              <label for="third" id="datelabel3"></label><br>

              <input id="date4" type="radio" value="d4" name="first">
              <label for="fourth" id="datelabel4"></label>

              <div  style="display:inline;">
                <br>
                <div class="typedisplay">
                  <span style="font-size:1.5em; font-weight:500;margin-right:15px;">Type:</span>
                  <input id="type1" type="radio" name="second" value='shop'>
                  <label for="second" style="margin-right:10px;">Shop</label>
                  <input id="type2" type="radio" name="second" value='home'>
                  <label for="second">Home</label>
                </div>
                
                <input id="nextbtn" name='aptnextbtn' type="submit" class="btn btn-dark" value="Next"
                style="display: none;">
              </div>
            </form>

          </div>
        </div>
      </div>
   
      <div class="apptable" style="">
        <div class="apptablehead">
          <h2>Your Appointments:</h2>
        </div>
        <div id="Tab"class="table-wrapper-scroll-y my-custom-scrollbar">
          <table id="Ta" class="table table-striped" style="">
            <thead class="thead-dark">
              <tr>
                <th style="position: sticky; top: 0;" scope="col">Appointment ID</th>
                <th style="position: sticky; top: 0;" scope="col">Date</th>
                <th style="position: sticky; top: 0;" scope="col">Time</th>
                <th style="position: sticky; top: 0;" scope="col">Service</th>
                <th style="position: sticky; top: 0;" scope="col">Cost</th>
                <th style="position: sticky; top: 0;" scope="col">Type</th>
                <th style="position: sticky; top: 0;" scope="col">Status</th>
                <th style="position: sticky; top: 0;" scope="col">Employee Name</th>
              </tr>
            </thead>

            <?php


            // $sql= "SELECT appointments.Appt_ID, appointments.Date, appointments.Status, rendered_services.Emp_ID, rendered_services.Timeslot, rendered_services.Service_ID, rendered_services.ServiceCost, rendered_services.Type FROM rendered_services LEFT JOIN appointments ON rendered_services.Appt_ID = appointments.Appt_ID ORDER BY rendered_services.Date";
            // $sql= "SELECT * from rendered_services where Appt_ID=33";
            $sql="SELECT appointments.Appt_ID, appointments.Date, appointments.Status, rendered_services.Emp_ID, rendered_services.Timeslot, rendered_services.Service_ID, rendered_services.ServiceCost, rendered_services.Type FROM rendered_services LEFT JOIN appointments ON rendered_services.Appt_ID = appointments.Appt_ID WHERE appointments.Cust_ID='$custid' ORDER BY rendered_services.Date";
            $prj= mysqli_query($db, $sql);
            $res = array();
            while($row = mysqli_fetch_assoc($prj)){
                $res[] = $row;
            }

            ?>

            <tbody>
              <?php for($i=0; $i<count($res); $i++){?>
              <tr>
                <th scope="row"><?php echo $res[$i]['Appt_ID'] ?></th>
                <td><?php
                    $orgDate = $res[$i]['Date'];
                    echo date("d-m-Y", strtotime($orgDate));
                  ?>
                </td>
                <td><?php echo $res[$i]['Timeslot'] ?></td>
                <td><?php
                    $sid = $res[$i]['Service_ID'];
                    $sq2 = "SELECT ServiceName FROM services where Service_ID='$sid' ";
                    $re2 = mysqli_query($db,$sq2);
                    $sname = mysqli_fetch_array($re2, MYSQLI_ASSOC);

                    echo $sname['ServiceName']
                  ?>
                </td>
                <td><?php echo $res[$i]['ServiceCost'] ?></td>
                <td><?php echo $res[$i]['Type'] ?></td>
                <td><?php echo $res[$i]['Status'] ?></td>
                <td><?php
                    $empid = $res[$i]['Emp_ID'];
                    $sq1 = "SELECT FirstName, LastName from employees where Emp_ID='$empid'";
                    $re1 = mysqli_query($db, $sq1);
                    $empname = mysqli_fetch_array($re1, MYSQLI_ASSOC);
                    echo  $empname['FirstName']." ".$empname['LastName'];
                  ?>
                </td>
              </tr><?php } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-------------------------- Footer ----------------------------------------->

  <footer class="footer" style="padding-top:15px;">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3"><b>© 2022 Copyright: Beyond The Mirror</b>
    </div>
    <!-- Copyright -->
  </footer>
  <!------------------------------ footer ends --------------------------------->




<!------------------------------------ Modals ---------------------------------------------->

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
          <input type='button' name='phonechangecust' class='btn btn-info' value='Edit Phone' id='phonechangecust'  ><br>

        </form>
        <div class='editphonecust'>
          <h3 class='editphonecustmsg' style="color:red"> </h3>
        </div>

      </div>

    </div>

  </div>
</div>

<script>
  $(document).ready(function(){
      
    $('#phonechangecust').click(function(e){
      
      e.preventDefault();
   
      $('.editphonecustmsg').html(null); 
      var phone = $('#newphone').val();
      var phonetest = new RegExp("^[0-9]{10}$");      
      if(phonetest.test(phone)||phone == ""||phone==null){
        $.ajax({
          type:"POST",
          cache:false,
          url:"chngphone.php",
          data:{'phonecust': phone}, 
          success: function (responsedata) {
            $('.editphonecustmsg').html(responsedata); 
            $('#editphonemodal').modal('show'); 
          }
        });
      }
      else{
        $('.editphonecustmsg').html("Enter Valid Phone Number"); 
      }

    });

        
    $("#editphonemodal").on('hide.bs.modal', function () {
            //actions you want to perform after modal is closed.
            window.location.reload(true);
          });

  });

</script>

             
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
          <input type='password' name='currpasscust' id='currpasscust'
              class='form-control' placeholder="Enter the current Password"><br>
          <label>New Password</label>
          <input type='password' name='newpasscust' id='newpasscust'
              class='form-control' placeholder="Enter the new Password"><br>
          <label>Renter New Password</label>
          <input type='password' name='newapasscust' id='newapasscust'
              class='form-control' placeholder="Renter the new Password"><br>
          <input type='submit' name='passchangecust' class='btn btn-info' value='Change Password' id='passchangecust'  ><br>
      </form>
      <div class='editpasscust'>
          <h3 class='editpasscustmsg' style="color:red"> </h3>
      </div>

      </div>

  </div>

  </div>
</div>

<script>
  $(document).ready(function(){
    
    $('#passchangecust').click(function(e){
      
      e.preventDefault();

      $('.editpasscustmsg').html(null); 
      var currpass = $('#currpasscust').val();
      var newpass = $('#newpasscust').val();
      var newapass = $('#newapasscust').val();

      if(currpass && newpass && newapass){

        if(newpass==newapass){
          var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
          if(!strongRegex.test(newpass)){
            text="*Password should contain atleast 1 small letter,capital letter,number and special character.";
            $('.editpasscustmsg').html(text);
          }
          else{
            console.log('Hello');
            $.ajax({
              type:"POST",
              cache:false,
              url:"chngpasswd.php",
              data:{'currpasscust': currpass, 'newpasscust':newpass, 'newapasscust':newapass}, 
              success: function (responsedata) {
                $('.editpasscustmsg').html(responsedata); 
                $('#passwdchngmodal').modal('show'); 
              }
            });
          }
        }
        else{
          $('.editpasscustmsg').html("New Passwords didn't match");
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


              <!-- Cancel Appt modal -->

<div id="cancelapptmodal" class="modal fade" role="dialog" style="width:content-width">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Cancel Appointments </h4>
      </div>
      <div class="modal-body">
        <!-- Form -->
        <form class='cancelappointmentform' method="POST" action='' >
          <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <table id="Ta" class="table table-striped" style="margin-bottom: 0px;">
              <thead class="thead-dark">
                <tr>
                  <th style="position: sticky; top: 0;" scope="col">Sr. No.</th>
                  <th style="position: sticky; top: 0;" scope="col">Appointment ID</th>
                  <th style="position: sticky; top: 0;" scope="col">Date</th>
                  <th style="position: sticky; top: 0;" scope="col">Type</th>
                  <th style="position: sticky; top: 0;" scope="col">Total Discount</th>
                  <th style="position: sticky; top: 0;" scope="col">Total Cost</th>
                </tr>
              </thead>

              <?php 
                $datenext = date("Y-m-d", time()+86400);
                // $sql="SELECT appointments.Appt_ID, appointments.Date, appointments.Status, rendered_services.Emp_ID, rendered_services.Timeslot, rendered_services.Service_ID, rendered_services.ServiceCost, rendered_services.Type FROM rendered_services LEFT JOIN appointments ON rendered_services.Appt_ID = appointments.Appt_ID WHERE appointments.Cust_ID='$custid' and Status='Pending' ORDER BY rendered_services.Date DESC";
                $sql = "SELECT * from appointments where Cust_ID='$custid' and Status='Booked' and Date>'$datenext' ";
                $prj= mysqli_query($db, $sql);
                $res = array();
                while($row = mysqli_fetch_assoc($prj)){
                    $res[] = $row;
                }
              ?>

              <tbody>
                <?php for($i=0; $i<count($res); $i++){?>
                <tr>
                  <th scope='row'><input type='checkbox' name='cancel[]' id=<?php echo $res[$i]['Appt_ID']?> 
                    value=<?php echo $res[$i]['Appt_ID']?>></th>
                  <td ><?php echo $res[$i]['Appt_ID'] ?></td>
                  <td><?php 
                      $orgDate = $res[$i]['Date'];  
                      echo date("d-m-Y", strtotime($orgDate));
                    ?>
                  </td>
                  <td><?php echo $res[$i]['Type'] ?></td>
                  <td><?php echo $res[$i]['TotalDiscount'] ?></td>
                  <td><?php echo $res[$i]['TotalCost'] ?></td>
                </tr><?php } ?>

              </tbody>
            </table>
          </div>
          <div class='cancelbtn'>
            <input type='submit' id='cancelappt' name='cancelappt' class='btn btn-info' value='Cancel Appointment' ><br>
          </div>
          <div class='cancelapptmsgdiv'>
            <h4 class='cancelapptmsg' style='color:red'></h4>        
          </div>     
        </form>   
      </div>
    </div>
  </div>
</div>

<script>
 $(document).ready(function(){
    $('#cancelappt').click(function(e){
      
      e.preventDefault();

      $('.cancelapptmsg').html(null); 
      var total = $('input[name="cancel[]"]:checked').length;
      
      if(total==0){
        $('.cancelapptmsg').html('Choose 1'); 
        $('#cancelapptmodal').modal('show'); 

      }
      else if (total>1) {         
        $('.cancelapptmsg').html('Choose only 1 ');      
        $('#cancelapptmodal').modal('show'); 

      }
      else{
        
        var apptid = $('input[name="cancel[]"]:checked')[0].value;
        console.log("CHECK1");

        $.ajax({
          type:"POST",
          cache:false,
          url:"cancelapt.php",
          data:{'apptid': apptid}, 
          success: function (responsedata) {
            $('.cancelapptmsg').html('Appointment Cancelled'); 
            $('#cancelapptmodal').modal('show'); 
          }
        });
      }

    });


 
    $("#cancelapptmodal").on('hide.bs.modal', function () {
            //actions you want to perform after modal is closed.
            window.location.reload(true);
    });
    

 });

</script>


              <!-- Switch To Prime modal -->      



<script src="static/js/aptcopy.js"></script>




</body>



</html>
