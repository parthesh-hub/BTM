<?php
session_start();

if(!isset($_SESSION['userid'])){
  header('location:login.php');
}
else if(!isset($_SESSION['data'])){
  header('location:newapt2.php');
}
else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Salon And Spa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="static/css/stylesapt3.css?v=<?php echo time(); ?>">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <!-- Bootstrap Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript">
  $(document).ready(function() {
    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("test").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "text1.txt", true);
  xhttp.send();
  });
 
</script>



</head>

<body>
  <div class="container1">
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
        $image = $name['Profile_Picture'];
        $_SESSION['gender']=$gender;

  
      ?>

      <img src="<?php echo $image; ?>" alt="" style="width:65%;margin-left:17%;
      margin-top:10%;margin-bottom:25px;">
      <span style="color:#f4f4f4;margin-left:20%; margin-top:70%;"><b>Welcome <?php echo $firstname;?>



      </b></span>
      <h6 id="test" style="padding: 40px 10px 0 10px; color:#f2f2f2; font-weight:bold;font-family: 'Oxygen';"></h6>
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
            <a href='#'>Switch To Prime</a>
          </div>
      </div>




      <div class="apts" style="padding-bottom: 15px;">


<div id="wrapperclass" class="" style="">
<table class="table table-striped">
  <thead class="thead-dark">
    <th>  <h4>Date</h4></th>
    <th>  <h4>Type</h4> </th>
    <th><h4>Service</h4></th>
    <th><h4>Discount</h4></th>
    <th><h4>Price</h4></th>
    <th><h4>Available Slots</h4></th>
    <th></th>
    <th><h4>Status</h4></th>
  </thead>
  <tbody>

        
          <form class="newapt3form" method='POST' action="checkavailability.php">
            <?php
            if ($_SESSION['service_type']=='shop'){

                if(count($_SESSION['data'])>0){
              ?>

                <tr>


                <div class='serviceinfo1' >
                  <td>  <h5><?php echo $_SESSION['selected_date'] ?></h5></td>
                  <td>  <h5><?php echo $_SESSION['service_type'] ?></h5> </td>

                <td>  <h5><?php echo $_SESSION['data'][0]['servicename']; ?></h5></td>
                <td> <h5><?php echo $_SESSION['data'][0]['servicediscount']; ?></h5></td>
                <td> <h5><?php echo $_SESSION['data'][0]['servicefinalcost']; ?></h5></td>

                <td>

                  <div id="ashopslot1" style="display: block;">

                    <label for="shoptype1"><h5>Choose a Service:  </h5></label>
                    <select name="shopservices1" id="shopservices1" >
                      <!-- <option id="select" value="select" disabled="" selected="">Please Select</option> -->
                      <option id="serv1_8am-9am" value="8am-9am" >8am-9am</option>
                      <option id="serv1_9am-10am" value="9am-10am">9am-10am</option>
                      <option id="serv1_10am-11am" value="10am-11am">10am-11am</option>
                      <option id="serv1_11am-12pm" value="11am-12pm">11am-12pm</option>
                      <option id="serv1_12pm-1pm" value="12pm-1pm">12pm-1pm</option>
                      <option id="serv1_1pm-2pm"value="1pm-2pm">1pm-2pm</option>
                      <option id="serv1_2pm-3pm"value="2pm-3pm">2pm-3pm</option>
                      <option id="serv1_3pm-4pm"value="3pm-4pm">3pm-4pm</option>
                      <option id="serv1_4pm-5pm"value="4pm-5pm">4pm-5pm</option>
                      <option id="serv1_5pm-6pm"value="5pm-6pm">5pm-6pm</option>
                    </select>
                    </td>


                  </div>

                  <td>    <input type='submit' id="availservice1" class="btn btn-dark" value="Check Availability" name="availservice1" ></td>

                  <td>    <div id="msg" class='msg1'>
                   
                        </div>
                        </td>

                      </div>
                        </tr>
                      <?php }

                      if(count($_SESSION['data'])>1){
                    ?>
                      <tr>


                      <div class='serviceinfo2'>
                        <td>  <h5><?php echo $_SESSION['selected_date'] ?></h5></td>
                        <td>  <h5><?php echo $_SESSION['service_type'] ?></h5> </td>
                    <td>   <h5><?php echo $_SESSION['data'][1]['servicename']; ?></h5> </td>
                    <td>   <h5><?php echo $_SESSION['data'][1]['servicediscount']; ?></h5> </td>
                    <td>  <h5><?php echo $_SESSION['data'][1]['servicefinalcost']; ?></h5></td>

                    <td>

                        <div id="ashopslot2" style="display: block;">

                          <label for="shoptype2"><h5>Choose a Service:  </h5></label>
                          <select name="shopservices2" id="shopservices2" >
                            <!-- <option id="select" value="select" disabled="" selected="">Please Select</option> -->
                            <option id="serv2_8am-9am" value="8am-9am" >8am-9am</option>
                            <option id="serv2_9am-10am" value="9am-10am">9am-10am</option>
                            <option id="serv2_10am-11am" value="10am-11am">10am-11am</option>
                            <option id="serv2_11am-12pm" value="11am-12pm">11am-12pm</option>
                            <option id="serv2_12pm-1pm" value="12pm-1pm">12pm-1pm</option>
                            <option id="serv2_1pm-2pm"value="1pm-2pm">1pm-2pm</option>
                            <option id="serv2_2pm-3pm"value="2pm-3pm">2pm-3pm</option>
                            <option id="serv2_3pm-4pm"value="3pm-4pm">3pm-4pm</option>
                            <option id="serv2_4pm-5pm"value="4pm-5pm">4pm-5pm</option>
                            <option id="serv2_5pm-6pm"value="5pm-6pm">5pm-6pm</option>
                          </select>

                                    </div>
                                    </td>
                          <td>  <input type='submit' id="availservice2" class="btn btn-dark" value="Check Availability" name="availservice2" > </td>
                            <td> <div class='msg2'>
                                
                              </div>
                              </td>
                            </div>
                          </tr>
                            <?php }

                            if(count($_SESSION['data'])>2){
                          ?>
                          <tr>


                          <div class='serviceinfo3'>
                            <td>  <h5><?php echo $_SESSION['selected_date'] ?></h5></td>
                            <td>  <h5><?php echo $_SESSION['service_type'] ?></h5> </td>
                        <td>    <h5><?php echo $_SESSION['data'][2]['servicename']; ?></h5> </td>
                          <td>    <h5><?php echo $_SESSION['data'][2]['servicediscount']; ?></h5></td>
                          <td>  <h5><?php echo $_SESSION['data'][2]['servicefinalcost']; ?></h5></td>

                        <td>

                            <div id="ashopslot3" style="display: block;">

                              <label for="shoptype3"><h5>Choose a Service:  </h5></label>
                              <select name="shopservices3" id="shopservices3" >
                                <!-- <option id="select" value="select" disabled="" selected="">Please Select</option> -->
                                <option id="serv3_8am-9am" value="8am-9am" >8am-9am</option>
                                <option id="serv3_9am-10am" value="9am-10am">9am-10am</option>
                                <option id="serv3_10am-11am" value="10am-11am">10am-11am</option>
                                <option id="serv3_11am-12pm" value="11am-12pm">11am-12pm</option>
                                <option id="serv3_12pm-1pm" value="12pm-1pm">12pm-1pm</option>
                                <option id="serv3_1pm-2pm"value="1pm-2pm">1pm-2pm</option>
                                <option id="serv3_2pm-3pm"value="2pm-3pm">2pm-3pm</option>
                                <option id="serv3_3pm-4pm"value="3pm-4pm">3pm-4pm</option>
                                <option id="serv3_4pm-5pm"value="4pm-5pm">4pm-5pm</option>
                                <option id="serv3_5pm-6pm"value="5pm-6pm">5pm-6pm</option>
                              </select>
                            </td>

                            </div>

                            <td>  <input type='submit' id="availservice3" class="btn btn-dark" value="Check Availability" name="availservice3" ></td>
                            <td>  <div class='msg3'>
                               
                              </div>
                              </td>
                            </div>
                          </tr>

                          <?php
              }
             }

            else{
            ?>
            <div id='homeservice'>
              <div id="ahomeslot" style="display: block;">
              <td>  <h5><?php echo $_SESSION['selected_date'] ?></h5></td>
                            <td>  <h5><?php echo $_SESSION['service_type'] ?></h5> </td>
                        <td>    <h5><?php echo $_SESSION['data'][0]['servicename']; ?></h5> </td>
                          <td>    <h5><?php echo $_SESSION['data'][0]['servicediscount']; ?></h5></td>
                          <td>  <h5><?php echo $_SESSION['data'][0]['servicefinalcost']; ?></h5></td>
                <td>
                <label for="hometype">Choose a Service:</label>
                <select name="homeservices" id="homeservices">
                  <option id="serv1_8am-10am" value="8am-10am" selected>8am-10am</option>
                  <option id="serv1_12pm-2pm" value="12pm-2pm">12pm-2pm</option>
                  <option id="serv1_4pm-6pm" value="4pm-6pm">4pm-6pm</option>
                </select>
                </td>


              </div>
              <td>
              <input type='submit' id="availservicehome" class="btn btn-dark" value="Check Availability" name="availservicehome" ></td>
              <td><div class='msgh'>
               
              </div></td>
            </div>

            <?php
            }

            ?>



          </tbody>
         
</table>
</div>
<div style="text-align: center;padding-top:50px;">
  <input type='submit' id="sub2" class="btn btn-dark" value="Back" name="clear">
  <input type='submit' id="serviceconfirmationbtn" class="btn btn-dark" value="Proceed" name="serviceconfirmationbtn" style="margin-left:10px;" >
</div>

  </form>
  
      <?php 
      if(!empty($_SESSION['sametimeerrmsg'])){?>
        <div class='sametimeerrmsg' style='color:red'>
          <?php echo $_SESSION['sametimeerrmsg']; 
          unset($_SESSION['sametimeerr']);
          unset($_SESSION['sametimeerrmsg']); ?>
        </div><?php
      }

      if(!empty($_SESSION['errortimemsg'])){?>
        <div class='errortimemsg' style='color:red'>
          <?php echo $_SESSION['errortimemsg'];
          unset($_SESSION['errortime']); 
          unset($_SESSION['errortimemsg']); ?>
        </div><?php
      }?>
      

      </div>

    </div>
  </div>


  <!-- Footer -->
  <div id="footer" class="page-footer font-small blue" style="  background-color:#1a1c20;">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2022 Copyright:
      <span>Beyond The Mirror</span>
    </div>
    <!-- Copyright -->

  </div>
  <!-- Footer -->

  <script src="static/js/newapt3.js"></script>

</body>
<script type="text/javascript"> 
        window.history.forward(); 
        function noBack() { 
            window.history.forward(); 
        } 
    </script>  
</html>

<?php 
  }

?>