<?php 
  session_start();
  include("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Salon And Spa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="static/css/styles.css?v=<?php echo time(); ?>">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <!-- Bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://mdbootstrap.com/docs/jquery/navigation/footer/#gentlygray"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>

<body>

<div class="container1">

      <!-- Nav Bar -->

      <nav class="navbar navbar-expand-lg navbar-dark" style="  padding-top: 0px;padding-left: 0px;padding-bottom: 0px;padding-right: 0px;
">

        <a id="logo" class="navbar-brand" href="">BEYOND THE MIRROR</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" style="background-color:black;">
            <span class="navbar-toggler-icon" ></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a id="active" class="nav-link" href="index.php"  >Home</a>
            </li>
            <li class="nav-item">
              <a id="navitem"class="nav-link" href="#containerfoot" >About us</a>
            </li>
            <li class="nav-item">
              <a id="navitem" class="nav-link" href="login.php" >Login</a>
            </li>
		<li class="nav-item">
              <a id="navitem" class="nav-link" href="register.php" >Register</a>
            </li>
          </ul>

        </div>
      </nav>
    </div>
<!-- 
  <div class="container1">
    <a href="index.php" id="logo" style="padding-left:40px;">BEYOND THE MIRROR</a>
    <a href="register.php">Register</a>
    <a href="login.php">Log In</a>
    <a href="#containerfoot">About Us</a>
    <a href="index.php" id="nav-right" class="active">Home</a>
  </div> -->


  <div id="carouselExampleIntervala" class="carouselslidecontainer2" data-ride="carousel" style="">
    <div class="carousel-inner">
      <div class="carousel-item active" data-interval="10000">
        <img src="static/images/home/bg-logo-2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-interval="2000">
        <img src="static/images/home/bg-logo-3.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="static/images/home/bg-logo-1.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <!-- <a class="carousel-control-prev" href="#carouselExampleIntervala" role="button" data-slide="prev" style="padding-right: 150px;">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIntervala" role="button" data-slide="next"  style="padding-left: 150px;">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a> -->
    <button id="btn1getstarted">Book Now</button>
  </div>

  <div class="mobileclass"> 
  	<button id="btn2getstarted">Book Now</button>
  </div>

  <!--services starts here-->

  <div class="container4">
    <h1 style="text-align:center; padding-top: 18px;">Our Services</h1>
    <hr width:50% style="border:1px solid #16213e; width:30%; padding:0; ">

    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row">
          
            <div class="col-md-4 col-sm-12" style="">

              <?php  
                $sql1 = "select * from services where Service_ID=1000";
                $result = mysqli_query($db,$sql1);
                $serv = mysqli_fetch_array($result, MYSQLI_ASSOC);
              ?>

              <div class="card" style="width: 300px; background-color: #f1f3f8;text-align:center;">
                <div class="card-header">
                  <h3><?php echo $serv['ServiceName'] ?></h3>
                </div>  

                <img src="<?php echo $serv['ServiceImage']; ?>" class="card-img-top" alt="Hairstyle Service">


                <div class="card-body">

                  <button type="button" class="btn btn-dark"><b>Price : <?php echo $serv['ActualPrice'] ?></b></button>
                  <br>
                  <p style="padding-top: 10px;">For Male  </p>
                </div>
              </div>
            </div>


            <div class="col-md-4 col-sm-12" style="">

              <?php  
                  $sql1 = "select * from services where Service_ID=3005";
                  $result = mysqli_query($db,$sql1);
                  $serv = mysqli_fetch_array($result, MYSQLI_ASSOC);
              ?>
              <div class="card" style="width: 300px; background-color: #f1f3f8;text-align:center;">
                <div class="card-header">
                  <h3><?php echo $serv['ServiceName'] ?></h3>
                </div>
                <img src="<?php echo $serv['ServiceImage']; ?>" class="card-img-top" alt="Spa service">

                <div class="card-body">

                  <button type="button" class="btn btn-dark"><b>Price : <?php echo $serv['ActualPrice'] ?></b></button>
                  <p style="padding-top: 10px;">For Female</p>
                </div>
              </div>
            </div>


            <div class="col-md-4 col-sm-12" style="">
              <?php  
                $sql1 = "select * from services where Service_ID=1002";
                $result = mysqli_query($db,$sql1);
                $serv = mysqli_fetch_array($result, MYSQLI_ASSOC);
              ?>
              <div class="card" style="width: 300px; background-color: #f1f3f8;text-align:center;">
                <div class="card-header">
                  <h3><?php echo $serv['ServiceName'] ?></h3>
                </div>
                <img src="<?php echo $serv['ServiceImage']; ?>" class="card-img-top" alt="Pedicure service">

                <div class="card-body">

                  <button type="button" class="btn btn-dark"><b>Price : <?php echo $serv['ActualPrice'] ?></b></button>
                  <p style="padding-top: 10px;">For Male </p>
                </div>
              </div>
            </div>

          </div>

        </div>




        <div class="carousel-item">

          <div class="row">

            <div class="col-md-4 col-sm-12" style="">
              <?php  
                $sql1 = "select * from services where Service_ID=3007";
                $result = mysqli_query($db,$sql1);
                $serv = mysqli_fetch_array($result, MYSQLI_ASSOC);
              ?>
              <div class="card" style="width: 300px; background-color: #f1f3f8;text-align:center;">
                <div class="card-header">
                  <h3><?php echo $serv['ServiceName'] ?></h3>
                </div>
                <img src="<?php echo $serv['ServiceImage']; ?>" class="card-img-top" alt="Manicure Service">

                <div class="card-body">

                  <button type="button" class="btn btn-dark"><b>Price : <?php echo $serv['ActualPrice'] ?></b></button>
                  <p style="padding-top: 10px;">For Female </p>
                </div>
              </div>
            </div>


            <div class="col-md-4 col-sm-12" style="">
              <?php  
                $sql1 = "select * from services where Service_ID=1004";
                $result = mysqli_query($db,$sql1);
                $serv = mysqli_fetch_array($result, MYSQLI_ASSOC);
              ?>
              <div class="card" style="width: 300px; background-color: #f1f3f8;text-align:center;">
                <div class="card-header">
                  <h3><?php echo $serv['ServiceName'] ?></h3>
                </div>
                <img src="<?php echo $serv['ServiceImage']; ?>" class="card-img-top" alt="Facial Service">

                <div class="card-body">

                  <button type="button" class="btn btn-dark"><b>Price : <?php echo $serv['ActualPrice'] ?></b></button>
                  <p style="padding-top: 10px;">For Male  </p>
                </div>
              </div>
            </div>



            <div class="col-md-4 col-sm-12" style="">
              <?php  
                $sql1 = "select * from services where Service_ID=3009";
                $result = mysqli_query($db,$sql1);
                $serv = mysqli_fetch_array($result, MYSQLI_ASSOC);
              ?>
              <div class="card" style="width: 300px; background-color: #f1f3f8; text-align:center;">
                <div class="card-header">
                  <h3><?php echo $serv['ServiceName'] ?></h3>
                </div>
                <img src="<?php echo $serv['ServiceImage']; ?>" class="card-img-top" alt="Eyebrow Service">

                <div class="card-body">

                  <button type="button" class="btn btn-dark"><b>Price : <?php echo $serv['ActualPrice'] ?></b></button>
                  <p style="padding-top: 10px;">For Female </p>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
      <div>
        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev" style="padding:0 150px 0 0; min-height:408px;">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
      </div>
      <div>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next" style="padding:0 0 0 150px; min-height:408px;">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

    <div class="container41" style="margin-top: 20px;">
      <button type="button" id="moreservices" class="btn btn-dark" style="width:120px; padding:10px; ">See More &#8594;</button>
    </div>

  </div>

  <!-- services ends here -->




  <!-- offers starts here -->

  <?php

    $out = mysqli_query($db,"SELECT  services.Service_ID, services.ServiceName, services.ServiceImage, services.ActualPrice, offers.Discount, offers.Date
    FROM services right join offers on services.Service_ID= offers.Service_ID  ORDER BY offers.Date") ;
    $offer = array();
    while($row_offer = mysqli_fetch_assoc($out)){
        $offer[] = $row_offer;
    }

  ?>

  <div id="cont5"class="container5">
    <h1 style="text-align:center; padding-top: 18px;">Offers</h1>
    <hr width:50% style="border:1px solid #16213e; width:30%; padding:0;">


    <div id="carouselExampleInterval2" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <?php  

                $x=0;
                $y=count($offer);
                $flag=0;

                if($y>0){?>
                    <div class="carousel-item active">
                        <div class="row">
                            <?php
                            for($i=0; $i<3;$i++){?>

                                <div class="col-md-4 col-sm-12" style="padding-bottom:40px;">
                                    <div class="card" style="width: 300px;background-color: #f1f3f8; text-align:center;">
                                        <div class="card-header">
                                            <h3><?php echo $offer[$x]['ServiceName']; ?></h3>
                                        </div>
                                        <img src="<?php echo $offer[$x]['ServiceImage']; ?>" class="card-img-top" alt="Service">
                                        <div class="card-body" style="padding:0;">
                                            <p style="padding-top:10px;">₹<?php echo $offer[$x]['Discount']; ?> Discount On ₹<?php echo $offer[$x]['ActualPrice']; ?></p>
                                            <p>Date:<?php echo $offer[$x]['Date']; ?></p>
                                            <?php if($offer[$x]['Service_ID']<3000){?>
                                                Gender : Male
                                                <?php if($offer[$x]['Service_ID']<2000){?>
                                                  &nbsp;Type : Shop 
                                                <?php
                                                }
                                                else{?>
                                                &nbsp;Type : Home
                                                <?php }
                                              }
                                              else{?>
                                                Gender : Female
                                                <?php if($offer[$x]['Service_ID']<4000){?>
                                                  &nbsp;Type: Shop 
                                                <?php
                                                }else{?>
                                                  &nbsp;Type: Home 
                                                <?php
                                                }
                                              
                                              }
                                              ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php $x++;
                                    if($x==$y){
                                        $flag=1;
                                        break;
                                    }
                            }?>
                        </div>
                    </div>


                    <?php 
                        if($flag!=1){
                            while(true){?>

                                <div class="carousel-item ">
                                    <div class="row">
                                        <?php
                                        for($i=0; $i<3;$i++){?>

                                            <div class="col-md-4 col-sm-12" style="padding-bottom:40px;">
                                                <div class="card" style="width: 300px;background-color: #f1f3f8; text-align:center;">
                                                    <div class="card-header">
                                                        <h3><?php echo $offer[$x]['ServiceName']; ?></h3>
                                                    </div>
                                                    <img src="<?php echo $offer[$x]['ServiceImage']; ?>" class="card-img-top" alt="Service">
                                                    <div class="card-body" style="padding:0;">
                                                        <p style="padding-top:10px;">₹<?php echo $offer[$x]['Discount']; ?> Discount On ₹<?php echo $offer[$x]['ActualPrice']; ?></p>
                                                        <p>Date:<?php echo $offer[$x]['Date']; ?></p>
                                                        <?php if($offer[$x]['Service_ID']<3000){?>
                                                            Gender : Male
                                                            <?php if($offer[$x]['Service_ID']<2000){?>
                                                              &nbsp;Type : Shop 
                                                            <?php
                                                            }
                                                            else{?>
                                                            &nbsp;Type : Home
                                                            <?php }
                                                          }
                                                          else{?>
                                                            Gender : Female
                                                            <?php if($offer[$x]['Service_ID']<4000){?>
                                                              &nbsp;Type: Shop 
                                                            <?php
                                                            }else{?>
                                                             &nbsp;Type: Home 
                                                            <?php
                                                            }
                                                          
                                                          }
                                                          ?>
                                                    </div>
                                                </div>

                                            </div>
                                            
                                            <?php $x++;
                                                if($x==$y){
                                                    $flag=1;
                                                break;
                                                }
                                        }?>
                                    </div>
                                </div>
                                <?php
                                if($flag==1){
                                    break;
                                }
                            }

                        }


                }
                else{
                    echo 'NO data';
                }
                
            ?>


            <div>
                <a class="carousel-control-prev" href="#carouselExampleInterval2" role="button" data-slide="prev" style="padding:0 150px 0 0; min-height:408px;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
            </div>
            <div>
                <a class="carousel-control-next" href="#carouselExampleInterval2" role="button" data-slide="next" style="padding:0 0 0 150px; min-height:408px;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>
  </div>

  <!-- offers ends here -->




  <!-- Employees starts here -->


  <?php

    $prj= mysqli_query($db,"SELECT * from employees where mod(Emp_ID,2)=0 LIMIT 6") ;
    $record = array();
    while($row = mysqli_fetch_assoc($prj)){
        $record[] = $row;
    }

  ?>


  <div class="container6">
    <h1 style="text-align:center; padding-top: 18px;">Our Experts</h1>
    <hr width:50% style="border:1px solid #16213e; width:30%; padding:0;">


    <div id="carouselExampleInterval3" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <?php  

                $x=0;
                $y=count($record);
                $flag=0;

                if($y>0){?>
                    <div class="carousel-item active">
                        <div class="row">
                            <?php
                            for($i=0; $i<3;$i++){?>

                                <div class="col-md-4" style="">
                                    <div class="card" style="width: 300px;background-color: #f1f3f8; text-align:center;">
                                        <img src="<?php echo $record[$x]['Profile_Picture']; ?>" class="card-img-top" alt="Employee">
                                        <div class="card-body" style="padding-bottom:8px;">
                                        <p><b><?php echo $record[$x]['FirstName']." ".$record[$x]['LastName'] ?></b></p>
                                        <p><b>Specialization : <?php echo $record[$x]['Specialization'] ?> </b></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php $x++;
                                    if($x==$y){
                                        $flag=1;
                                        break;
                                    }
                            }?>
                        </div>
                    </div>


                    <?php 
                        if($flag!=1){
                            while(true){?>

                                <div class="carousel-item ">
                                    <div class="row">
                                        <?php
                                        for($i=0; $i<3;$i++){?>

                                            <div class="col-md-4" style="">
                                                <div class="card" style="width: 300px;background-color: #f1f3f8; text-align:center;">
                                                    <img src="<?php echo $record[$x]['Profile_Picture']; ?>" class="card-img-top" alt="Employee">
                                                    <div class="card-body" style="padding-bottom:8px;">
                                                    <p><b><?php echo $record[$x]['FirstName']." ".$record[$x]['LastName'] ?></b></p>
                                                    <p><b>Specialization : <?php echo $record[$x]['Specialization'] ?> </b></p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <?php $x++;
                                                if($x==$y){
                                                    $flag=1;
                                                break;
                                                }
                                        }?>
                                    </div>
                                </div>
                                <?php
                                if($flag==1){
                                    break;
                                }
                            }

                        }


                }
                else{
                    echo 'NO data';
                }
                
            ?>
            

            <div>
                <a class="carousel-control-prev" href="#carouselExampleInterval3" role="button" data-slide="prev" style="padding:0 150px 0 0; min-height:408px;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
            </div>
            <div>
                <a class="carousel-control-next" href="#carouselExampleInterval3" role="button" data-slide="next" style="padding:0 0 0 150px; min-height:408px;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>
  </div>


  <!-- employees ends here -->

  <!-- testimonials starts here -->

  <div class="container7">

    <div class="colored-section" id="testimonials">

        <div id="testimonial-carousel" class="carousel slide" data-ride="false">
          <div class="carousel-inner">
            <div class="carousel-item active container-fluid" style="padding-bottom:8px;">
              <h2 class="testimonial-text" style="">It was great exprience getting styled in Behind The Mirror.</h2>
              <img class="testimonial-image" src="static/images/testimonials/ronaldo.png" alt="ronaldo-profile" style="margin-left: 970px;">
              <em style="padding-left:30px;">Collector Colony, Chembur</em>
            </div>
            <div class="carousel-item container-fluid" style="padding-bottom:8px;">
              <h2 class="testimonial-text"  style="">The service in Behind The Mirror is amazing. Good staff. </h2>
              <img class="testimonial-image" src="static/images/testimonials/messi.png" alt="messi-profile" style="margin-left: 970px;">
              <em style="padding-left:30px;">Barcelona, Spain</em>
            </div>
          </div>
          <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-slide="prev" style="padding-right: 30px;">
        <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-slide="next" style="padding-left :30px;">
        <span class="carousel-control-next-icon"></span>
          </a>
        </div>

  </div>

 

  <!-- testimonials ends here -->
  <!-- hrsaddress + map here-->
  <div class="container8">
    <div class="container81" style="padding-top: 65px;padding-left: 80px;">
      <div class="gmap_canvas">
        <iframe width="700" height="390" id="gmap_canvas" src="https://maps.google.com/maps?q=Hashu%20Adwani%20Memorial%20Complex%2C%20Collector's%20Colony%2C%20Chembur%2C%20Mumbai%2C%20Maharashtra%20400074&t=&z=13&ie=UTF8&iwloc=&output=embed"
          frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
      </div>
    </div>

    <div class="container82">
      <section id="hours" style="text-align:center;">
        <span>Hours:</span><br>
        Everyday: 08:00 am - 05:00pm<br>
        <hr class="visible-xs" style="border: 1px solid white; width:75%;">
      </section>
      <section id="address">
        <span>Address:</span><br>
        Collector's Colony, Chembur,<br>
        Mumbai, Maharashtra 400074
        <p>*Home Service area within 10 kilometres.</p>
        <hr class="visible-xs" style="border: 1px solid white; width:75%;">
      </section>
      <section id="email" style="padding-top:15px;">
        <span>Contact Us:</span><br>
        beyondthemirrorsaloon@gmail.com<br>
      </section>
    </div>
  </div>


   <div class="container8a">
    <div class="container81a">
      <div class="gmap_canvas1">
        <iframe width="300" height="200" id="gmap_canvas" src="https://maps.google.com/maps?q=Hashu%20Adwani%20Memorial%20Complex%2C%20Collector's%20Colony%2C%20Chembur%2C%20Mumbai%2C%20Maharashtra%20400074&t=&z=13&ie=UTF8&iwloc=&output=embed"
          frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
      </div>
    </div>

      <div class="container82a">
      <section id="hours" style="text-align:center;">
        <span>Hours:</span><br>
        Everyday: 08:00 am - 05:00pm<br>
        <hr class="visible-xs" style="border: 1px solid white; width:75%;">
      </section>
      <section id="address">
        <span>Address:</span><br>
        Collector's Colony, Chembur,<br>
        Mumbai, Maharashtra 400074
        <p>*Home Service area within 10 kilometres.</p>
        <hr class="visible-xs" style="border: 1px solid white; width:75%;">
      </section>
      <section id="email" style="padding-top:15px;">
        <span>Contact Us:</span><br>
        beyondthemirrorsaloon@gmail.com<br>
      </section>
    </div>

  </div>

  <!-- hrsaddress + map ends here -->




<!-- FOOter Starts -->
<div class="containerfoot" id="containerfoot" style="background-color: black;">
  <!-- Footer -->
  <footer class="page-footer font-small mdb-color lighten-3 pt-4">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">

          <!-- Content -->
          <h5 class="font-weight-bold text-uppercase mb-4" style="color:gold">ABOUT US</h5>
          

          <p style="color:white"> We are one of the most liked and trusted Salon&Spa services in Mumbai. We believe in quality of 
            services, so that customers will always choose BTM. We have skilled and expert professionals
            to connect with users looking for specific services. Our vision is to expand our platform so 
            that we can benefit more and more customers.</p>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">

          <!-- Links -->
          <h5 class="font-weight-bold text-uppercase mb-4" style="color:gold" >LINKS</h5>

          <ul class="list-unstyled" >
            <li>
              <p>
                <a href="seemore.php" style="color:white">Our Services</a>
              </p>
            </li>
            <li>
              <p>
                <a href="#cont5" style="color:white">Offers</a>
              </p>
            </li>
            <li>
              <p>
                <a href="#!" style="color:white">Terms & Conditions</a>
              </p>
            </li>
            <li>
              <p>
                <a href="#!" style="color:white">Privacy Policy</a>
              </p>
            </li>
            <li>
              <p>
                <a href="#!" style="color:white">Give Feedback</a>
              </p>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">

          <!-- Contact details -->
          <h5 class="font-weight-bold text-uppercase mb-4" style="color:gold">Contact Us</h5>

          <ul class="list-unstyled">
            <li>
              <p style="color:white">
                <i class="fa fa-phone mr-3" ></i> + 01 234 567 87</p>
            </li>
            <li>
              <p style="color:white"> 
                <i class="fa fa-phone mr-3" ></i> + 01 234 567 88</p>
            </li>
            <li>
              <p style="color:white">
                <i class="fa fa-print mr-3" ></i> + 01 234 567 89</p>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 text-center mx-auto my-4">
          
          <!-- Social buttons -->
          <h5 id="followus"class="font-weight-bold text-uppercase mb-4" style="color:gold">Follow Us</h5>
          <!-- The social media icon bar -->
          <div class="icon-bar">
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="google"><i class="fa fa-google"></i></a>
            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
          </div>


        </div>
        <!-- Grid column -->

      </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <hr class="visible-xs" style="border: 1px solid silver; width:70%">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3" style="color:gold">© 2022 Copyright: BEYOND THE MIRROR 
  </div>
  <!-- Copyright -->

  </footer>
  <!-- Footer -->
</div>
<!-- fooTER eNDS -->

</body>

<script>
$(document).ready(function(){

    $( "#moreservices" ).click(function(elem) {
        var id = $(this).attr("id");
        console.log( "Handler for"+ id +" called." );
        window.location.href = "seemore.php";
    });

    $('#btn1getstarted').click(function(){
      window.location='login.php';
      

    });
    $('#btn2getstarted').click(function(){
      window.location='login.php';
      

    });
    

    
});
</script>


</html>





