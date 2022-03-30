<?php 
session_start();

if(!isset($_SESSION['userid'])){
  header('location:login.php');
}

unset($_SESSION['data']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Salon And Spa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="static/css/stylesapt2.css?v=<?php echo time(); ?>">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <!-- Bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://mdbootstrap.com/docs/jquery/navigation/footer/#gentlygray"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed&display=swap" rel="stylesheet">
<script type="text/javascript">
  $(document).ready(function() {
    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("test").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "text.txt", true);
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

   <h6 id="test" style="padding: 80px 10px 0 10px; color:#f2f2f2; font-weight:bold;font-family: 'Oxygen';"></h6>


     
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


      <?php 

if($_SESSION['service_type']=='shop'){?>
    
    <style type="text/css">.femaleserviceshomeform{
    display:none;
    }</style>
    <style type="text/css">.maleserviceshomeform{
    display:none;
    }</style>
    <?php 

    if($_SESSION['gender']=='m'){
        ?>
        <style type="text/css">.femaleservicesform{
        display:none;
        }</style>
    <?php }
    else{?>
        <style type="text/css">.maleservicesform{
        display:none;
        }</style>
    <?php }
}

elseif($_SESSION['service_type']=='home'){?>
    
    <style type="text/css">.femaleservicesform{
    display:none;
    }</style>
    <style type="text/css">.maleservicesform{
    display:none;
    }</style>
    <?php 

    if($_SESSION['gender']=='m'){
        ?>
        <style type="text/css">.femaleserviceshomeform{
        display:none;
        }</style>
    <?php }
    else{?>
        <style type="text/css">.maleserviceshomeform{
        display:none;
        }</style>
    <?php }
}?>



<div class="appt" style="padding:25px 40px 40px 40px ;">
<h2 style="text-align:center;color:white;margin-bottom:15px;">Services</h2>
<hr width:50% style="border:1px solid white; width:30%; padding:0; margin-bottom:20px;">

    <!-- --------------male shop form---------------- -->
    <form id="maleshop"class='maleservicesform' method="post" onsubmit="return checkBoxLimit();"  action="cnfrmapt.php" >

        <?php 

            $sql='SELECT * from services where Service_ID BETWEEN 1000 and 1009';
            $prj= mysqli_query($db, $sql);
            $maleservices = array();
            while($row = mysqli_fetch_assoc($prj)){
                $maleservices[] = $row;
            }

        ?>

        <div class="row" style="text-align: center;">
            <?php 

                $x=0;
                $y=count($maleservices);

                for($i=0;$i<=3;$i++){
            ?>
            <div class="col-md-3 " style="padding-left: 0px;padding-right: 0px;">
                <div class="card" style="margin:10px 10px 10px 10px;">
                    <div class="card-front text-white bg-dark">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $maleservices[$x]['ServiceName'] ?></h3>
                            <img src="<?php echo $maleservices[$x]['ServiceImage'] ?>" class="card-img-top" alt="service">
                            <button type="button" class="btn btn-dark" name="">Price:₹<?php echo $maleservices[$x]['ActualPrice'] ?>/-</button><br>
                            <input class="single-checkbox" type="checkbox" value="<?php echo $maleservices[$x]['Service_ID'] ?>" name="select[]" >
                        </div>
                    </div>
                </div>
            </div>
                <?php $x++;} ?>
            
        </div>

        <div class="row secondrow" style="text-align: center;">
                    
            <?php 
                for($i=0;$i<3;$i++){
            ?>
            <div class="col-md-4 " style="padding-left: 0px;padding-right: 0px;">
                <div class="card" style="">
                    <div class="card-front text-white bg-dark">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $maleservices[$x]['ServiceName'] ?></h3>
                            <img src="<?php echo $maleservices[$x]['ServiceImage'] ?>" class="card-img-top" alt="service">
                                <button type="button" class="btn btn-dark" name="">Price:₹<?php echo $maleservices[$x]['ActualPrice'] ?>/-</button><br>
                            <input class="single-checkbox" value="<?php echo $maleservices[$x]['Service_ID'] ?>" type="checkbox" name="select[]" >
                        </div>
                    </div>
                </div>
            </div>

            <?php $x++;} ?>
        </div>
        
        <div class="row thirdrow" style="text-align: center;">
            <?php 
                for($i=0;$i<3;$i++){
                ?>
                <div class="col-md-4 " style="padding-left: 0px;padding-right: 0px;">
                    <div class="card" style="">
                        <div class="card-front text-white bg-dark">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $maleservices[$x]['ServiceName'] ?></h3>
                                <img src="<?php echo $maleservices[$x]['ServiceImage'] ?>" class="card-img-top" alt="service">
                                    <button type="button" class="btn btn-dark" name="">Price:₹<?php echo $maleservices[$x]['ActualPrice'] ?>/-</button><br>
                                <input id="check"class="single-checkbox" value="<?php echo $maleservices[$x]['Service_ID'] ?>" type="checkbox" name="select[]" >
                            </div>
                        </div>
                    </div>
                </div>
            <?php $x++;} ?>
        </div>

        <div style="text-align: center;">            
           
            <input type='submit' id="aptcnfrmbtnmaleshop" class="btn btn-dark" value="Proceed" name="aptcnfrmbtnmaleshop" >
        </div>

    </form>


    <!-- --------------female shop form------------------- -->
    <form class='femaleservicesform' method="post" onsubmit="return checkBoxLimit();" action="cnfrmapt.php">

        <?php 

            $sql='SELECT * from services where Service_ID BETWEEN 3000 and 3009';
            $prj= mysqli_query($db, $sql);
            $femaleservices = array();
            while($row = mysqli_fetch_assoc($prj)){
                $femaleservices[] = $row;
            }

        ?>

        <div class="row" style="text-align: center;">
            <?php 

                $x=0;
                $y=count($femaleservices);

                for($i=0;$i<=3;$i++){
            ?>
            <div class="col-md-3 " style="padding-left: 0px;padding-right: 0px;">
                <div class="card" style="margin:10px 10px 10px 10px;">
                    <div class="card-front text-white bg-dark">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $femaleservices[$x]['ServiceName'] ?></h3>
                            <img src="<?php echo $femaleservices[$x]['ServiceImage'] ?>" class="card-img-top" alt="service">
                            <button type="button" class="btn btn-dark" name="">Price:₹<?php echo $femaleservices[$x]['ActualPrice'] ?>/-</button><br>
                            <input class="single-checkbox" type="checkbox" value="<?php echo $femaleservices[$x]['Service_ID'] ?>" name="select[]" >
                        </div>
                    </div>
                </div>
            </div>
                <?php $x++;} ?>
            
        </div>

        <div class="row secondrow" style="text-align: center;">
                    
            <?php 
                for($i=0;$i<3;$i++){
            ?>
            <div class="col-md-4 " style="padding-left: 0px;padding-right: 0px;">
                <div class="card" style="">
                    <div class="card-front text-white bg-dark">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $femaleservices[$x]['ServiceName'] ?></h3>
                            <img src="<?php echo $femaleservices[$x]['ServiceImage'] ?>" class="card-img-top" alt="service">
                                <button type="button" class="btn btn-dark" name="">Price:₹<?php echo $femaleservices[$x]['ActualPrice'] ?>/-</button><br>
                            <input class="single-checkbox" value="<?php echo $femaleservices[$x]['Service_ID'] ?>" type="checkbox" name="select[]" >
                        </div>
                    </div>
                </div>
            </div>

            <?php $x++;} ?>
        </div>
        
        <div class="row thirdrow" style="text-align: center;">
            <?php 
                for($i=0;$i<3;$i++){
                ?>
                <div class="col-md-4 " style="padding-left: 0px;padding-right: 0px;">
                    <div class="card" style="">
                        <div class="card-front text-white bg-dark">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $femaleservices[$x]['ServiceName'] ?></h3>
                                <img src="<?php echo $femaleservices[$x]['ServiceImage'] ?>" class="card-img-top" alt="service">
                                    <button type="button" class="btn btn-dark" name="">Price:₹<?php echo $femaleservices[$x]['ActualPrice'] ?>/-</button><br>
                                <input class="single-checkbox" value="<?php echo $femaleservices[$x]['Service_ID'] ?>" type="checkbox" name="select[]" >
                            </div>
                        </div>
                    </div>
                </div>
            <?php $x++;} ?>
        </div>

        <div style="text-align: center;">
            <input type='submit' id="aptcnfrmbtnfemaleshop" class="btn btn-dark" value="Proceed" name="aptcnfrmbtnfemaleshop" >
      
        </div>

    </form>


    <!-- --------------male home form---------------- -->
    <form class='maleserviceshomeform' method="post"  onsubmit="return checkBoxLimithome();" action="cnfrmapt.php">

        <?php 

            $sql='SELECT * from services where Service_ID BETWEEN 2000 and 2009';
            $prj= mysqli_query($db, $sql);
            $maleservices = array();
            while($row = mysqli_fetch_assoc($prj)){
                $maleservices[] = $row;
            }

        ?>

        <div class="row" style="text-align: center;">
            <?php 

                $x=0;
                $y=count($maleservices);

                for($i=0;$i<3;$i++){
            ?>
            <div class="col-md-4 " style="padding-left: 0px;padding-right: 0px;">
                <div class="card" style="margin-top: 50px;margin-left: 50px;margin-right: 50px;margin-bottom: 50px;">
                    <div class="card-front text-white bg-dark">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $maleservices[$x]['ServiceName'] ?></h3>
                            <img src="<?php echo $maleservices[$x]['ServiceImage'] ?>" class="card-img-top" alt="service">
                            <button type="button" class="btn btn-dark" name="">Price:₹<?php echo $maleservices[$x]['ActualPrice'] ?>/-</button><br>
                            <input class="single-checkbox" value="<?php echo $maleservices[$x]['Service_ID'] ?>" type="checkbox" name="select[]" >
                        </div>
                    </div>
                </div>
            </div>
                <?php $x++;} ?>
            
        </div>

        <div class="row secondrow" style="text-align: center;">
                    
            <?php 
                for($i=0;$i<2;$i++){
            ?>
            <div class="col-md-4 " style="padding-left: 0px;padding-right: 0px;">
                <div class="card " style="margin-top: 50px;margin-left: 50px;margin-right: 50px;margin-bottom: 50px;">
                    <div class="card-front text-white bg-dark">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $maleservices[$x]['ServiceName'] ?></h3>
                            <img src="<?php echo $maleservices[$x]['ServiceImage'] ?>" class="card-img-top" alt="service">
                                <button type="button" class="btn btn-dark" name="">Price:₹<?php echo $maleservices[$x]['ActualPrice'] ?>/-</button><br>
                            <input class="single-checkbox" value="<?php echo $maleservices[$x]['Service_ID'] ?>" type="checkbox" name="select[]" >
                        </div>
                    </div>
                </div>
            </div>

            <?php $x++;} ?>
        </div>


        <div style="text-align: center;">
            <input type='submit' id="aptcnfrmbtnmalehome" class="btn btn-dark" value="Proceed" name="aptcnfrmbtnmalehome" >
        
        </div>

    </form>

    <!-- --------------female home form---------------- -->
    <form class='femaleserviceshomeform' method="post" onsubmit="return checkBoxLimithome();" action="cnfrmapt.php">

        <?php 

            $sql='SELECT * from services where Service_ID BETWEEN 4000 and 4009';
            $prj= mysqli_query($db, $sql);
            $maleservices = array();
            while($row = mysqli_fetch_assoc($prj)){
                $maleservices[] = $row;
            }

        ?>

        <div class="row" style="text-align: center;">
            <?php 

                $x=0;
                $y=count($maleservices);

                for($i=0;$i<3;$i++){
            ?>
            <div class="col-md-4 " style="padding-left: 0px;padding-right: 0px;">
                <div class="card " style="margin-top: 50px;margin-left: 50px;margin-right: 50px;margin-bottom: 50px;">
                    <div class="card-front text-white bg-dark">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $maleservices[$x]['ServiceName'] ?></h3>
                            <img src="<?php echo $maleservices[$x]['ServiceImage'] ?>" class="card-img-top" alt="service">
                            <button type="button" class="btn btn-dark" name="">Price:₹<?php echo $maleservices[$x]['ActualPrice'] ?>/-</button><br>
                            <input class="single-checkbox" type="checkbox" value="<?php echo $maleservices[$x]['Service_ID'] ?>" name="select[]" >
                        </div>
                    </div>
                </div>
            </div>
                <?php $x++;} ?>
            
        </div>

        <div class="row secondrow" style="text-align: center;">
                    
            <?php 
                for($i=0;$i<2;$i++){
            ?>
            <div class="col-md-4 " style="padding-left: 0px;padding-right: 0px;">
                <div class="card " style="margin-top: 50px;margin-left: 50px;margin-right: 50px;margin-bottom: 50px;">
                    <div class="card-front text-white bg-dark">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $maleservices[$x]['ServiceName'] ?></h3>
                            <img src="<?php echo $maleservices[$x]['ServiceImage'] ?>" class="card-img-top" alt="service">
                                <button type="button" class="btn btn-dark" name="">Price:₹<?php echo $maleservices[$x]['ActualPrice'] ?>/-</button><br>
                            <input class="single-checkbox" value="<?php echo $maleservices[$x]['Service_ID'] ?>" type="checkbox" name="select[]" >
                        </div>
                    </div>
                </div>
            </div>

            <?php $x++;} ?>
        </div>


        <div style="text-align: center;">
            <input type='submit' id="aptcnfrmbtnfemalehome" class="btn btn-dark" value="Proceed" name="aptcnfrmbtnfemalehome" >
         
        </div>

    </form>

</div>
</div>
</div>

<script type="text/javascript">
  function showdiv(){
  document.getElementById('selectedserv').style.display="block";
  }
$('input[name="clear"]').click(function(){
	$('input[type="checkbox"]').each(function(){
      $(this).prop('checked', false);
    //   window.location = "newapt2.php";
      <?php
      header('location:newapt2.php');
      ?>
  });

});
</script>

  <!-- Footer -->
  <footer class="footer font-small blue" style="padding-top:15px; background-color:#1a1c20;">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2022 Copyright:
      <span>Beyond The Mirror</span>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
  <script src="static/js/newapt2.js"></script>
</body>
<script type="text/javascript"> 
        window.history.forward(); 
        function noBack() { 
            window.history.forward(); 
        } 
    </script>  
</html>
