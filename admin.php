<?php 
 session_start();
 include("config.php");
 if(!isset($_SESSION['userid'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Salon And Spa</title>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="static/css/admin.css?v=<?php echo time(); ?>">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <!-- Bootstrap Scripts -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        <a href="apt.php" class="active">Profile</a>
    </div>

<!---------------------------------------- NAV CONTAINER ENDS------------------------------------------->



<!---------------------------------------- BODY CONTAINER ---------------------------------------------->

    <div class="split" style="width: 100%;">


        <!--------------------------------- LEFT CONTAINER ------------------------------------->

            <div class="left" >
                <img src="upload/zaynya.png" alt="" style="width:65%;margin-left:17%;
                margin-top:10%;margin-bottom:25px;">
                <span style="color:#f4f4f4;margin-left:30%; margin-top:70%;margin-bottom:-5%;">
                    <b>Welcome ADMIN</b></span>

                <div class="info-editing" style="padding-top:35%;">
                    <hr>
                    <h5><a href="" data-toggle="modal" data-target="#passwdchngmodal" 
                        style="color:gold;margin-left:20%;width:50%;">Change Password</a></h5>

                    <hr>
                    <h5><a href="" id="uploadimage" data-toggle="modal" data-target="#searchcustmodal" 
                        style="color:gold;margin-left:20%;width:50%;">Search Customer</a></h5>

                    <hr>
                    <h5><a href="" id="addoffers" data-toggle="modal" data-target="#addoffersmodal" 
                        style="color:gold;margin-left:20%;width:50%;"> Add Offers</a></h5>

                    <hr>
                    <h5><a href="" id="seeoffers" data-toggle="modal" data-target="#seeoffersmodal" 
                        style="color:gold;margin-left:20%;width:50%;">See Offers</a></h5>
    
                    <hr>
                    <h5><a href="" id="removeoffers" data-toggle="modal" data-target="#removeoffersmodal" 
                        style="color:gold;margin-left:20%;width:50%;">Remove Offers</a></h5>

                    <hr>
                    <img id="side-logo" src="static/images/logo2.jpg" style="display:none;">
                </div>
            </div>


        <!--------------------------------- RIGHT CONTAINER ------------------------------------->

            <div class="right" style="margin-left: 15%;">

                <div class="apptable">
                    <div class="apptablehead">
                        <h2>Upcoming Appointments:</h2>

                        <div class="apptheader" >
                            <form class='upcomingapptviewer' method="POST" action='adpost.php'>
                                <span style="font-size:1.5em; font-weight:500;margin-right:15px;">Type:</span>
                                <input id="appttype" type="radio" value="Home"  name="appttype" style="margin-left:7px">
                                <label for="appthome" id="home">Home</label>
                
                                <input id="appttype" type="radio" value="Shop"  name="appttype" style="margin-left:7px">
                                <label for="apptshop" id="shop">At Shop</label>

                                <input class="btn btn-dark" id="apptbtn" style="margin-left:10px"
                                type="submit" name="upcomingapptbtn" value="View" />

                                <div>
                                    <h4 class="upcomingapptsmsg" style="color:red"> </h4>
                                </div>
                            </form>


                        </div>
                    </div>
                    <div id="appttableshop" style="display:block">
                        <div class="table-wrapper-scroll-y my-custom-scrollbar" style="min-height: 290px;">
                            <table id="Tab" class="table table-striped" style="margin-bottom: 0px;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="position: sticky; top: 0;" scope="col">Appointment ID</th>
                                        <th style="position: sticky; top: 0;" scope="col">Customer ID</th>
                                        <th style="position: sticky; top: 0;" scope="col">Customer Name</th>
                                        <th style="position: sticky; top: 0;" scope="col">Employee Name</th>
                                        <th style="position: sticky; top: 0;" scope="col">Date</th>
                                        <th style="position: sticky; top: 0;" scope="col">Time</th>
                                        <th style="position: sticky; top: 0;" scope="col">Service</th>
                                        <th style="position: sticky; top: 0;" scope="col">Service Cost</th>
                                        <th style="position: sticky; top: 0;" scope="col">Payment Mode</th>
                                        <th style="position: sticky; top: 0;" scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="fetchappts">
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>


            
                <!--    bottom table  -->
                
                <div class="history">
                    <form class="viewhistory" method="POST" action='viewhist.php'>
                        <div class="historyheader">
                            <h2> View History</h2>
                            <div class="histappt" style="padding-bottom: 2%;">
                                <span style="font-size:1.5em; font-weight:500;margin-right:15px;">Choose the Type:</span>
                                <input id="hist-home" type="radio" value="Home" name="histtype" 
                                style="margin-left:7px">
                                <label for="hist-home" id="home">Home</label>
                                <input id="hist-shop" type="radio" value="Shop" name="histtype" 
                                style="margin-left:7px">
                                <label for="hist-shop" id="shop">At Shop</label>
                                <div>
                                    <h4 class="histtypeapptsmsg" style="color:red"> </h4>
                                </div>
                            </div>
                        </div>


                        <div class="histoptions" style="padding-bottom: 15px;">
                            <div id="hopts1">
                                <label>Select the date for which you want to see the details :</label><br><br>
                                <input type="date" id="histdate" name='histdate' /><br>
                                <input class="btn btn-dark" id="datebtn" 
                                type="submit" name="datebtn" value="View History"  />
                            </div>
                            <div id="hopts2">
                                <label>Enter the Customer ID to see history :</label><br><br>
                                <input type="text" id="histcust" name='histcust' /><br>
                                <input class="btn btn-dark" id="custbtn" 
                                type="submit" name="custbtn" value="View History"  />
                            </div>
                            <div id="hopts3">
                                <label>Enter the Employee ID to see history :</label><br><br>
                                <input type="text" id="histemp" name='histemp'/><br>
                                <input class="btn btn-dark" id="empbtn" 
                                type="submit" name="empbtn" value="View History" />
                            </div>
                            <div>
                                <h4 class="histdetailsapptsmsg" style="color:red; align-text:center"> </h4>
                            </div>
                        </div>
                    </form>

                </div>



                <div class="histtable" id="histtable" style="min-height: 450px; display:block ">
                    <div class="histtableheader">
                        <h2>History :</h2>
                    </div>

                    <div class="table-wrapper-scroll-y my-custom-scrollbar" style="min-height: 290px;">
                        <table id="Tab" class="table table-striped" style="margin-bottom: 0px;">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="position: sticky; top: 0;" scope="col">Appointment ID</th>
                                    <th style="position: sticky; top: 0;" scope="col">Customer ID</th>
                                    <th style="position: sticky; top: 0;" scope="col">Customer Name</th>
                                    <th style="position: sticky; top: 0;" scope="col">Employee Name</th>
                                    <th style="position: sticky; top: 0;" scope="col">Date</th>
                                    <th style="position: sticky; top: 0;" scope="col">Time</th>
                                    <th style="position: sticky; top: 0;" scope="col">Service</th>
                                    <th style="position: sticky; top: 0;" scope="col">Service Cost</th>
                                    <th style="position: sticky; top: 0;" scope="col">Payment Mode</th>
                                    <th style="position: sticky; top: 0;" scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody class="appointmentshistory">
                                
                                
                            </tbody>

                            </table>
                    </div>
                </div>
            </div>

    </div>
      

<!---------------------------------------- BODY CONTAINER ENDS------------------------------------------->




  <!--------------------------------------- Footer ----------------------------------------------->
    <footer class="footer" style="padding-top:15px;">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3"><b>© 2022 Copyright: Beyond The Mirror</b>
        </div>
        <!-- Copyright -->
    </footer>  
  <!------------------------------------- footer ends ------------------------------------------------->

 
  


<!---------------------------------------- Modals -------------------------------------------------->

                                 <!-- Customer search modal -->

    <div id="searchcustmodal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Search Customer</h4>
                </div>
                <div class="modal-body">
                    <form class="search-customer" method="POST" action='searchcustomer.php'>
                        Enter the Name : <input type='text' name='custname' id='custname'
                        class='form-control' placeholder="Enter the name"><br>
                        Choose Type:
                        <input id="primecustsearch" type="radio" value="Prime" name="custtype" >
                        <label for="primecustsearch">Prime</label>
                        <input id="regcustsearch" type="radio" value="Regular" name="custtype">
                        <label for="regcustsearch" >Regular</label>
                        <br>
                        <input type='submit' class='btn btn-info' name='searchcust' value='Search' id='searchcust' ><br>
                        <br>
                        <div>
                            <h4 class="searchcustsmsg" style="color:red"></h4>
                        </div>
                    </form>

                    <div class="table-wrapper-scroll-y my-custom-scrollbar" style="min-height: 290px;">
                        <table id="modalsearchcusttable" class="table table-striped" style="margin-bottom: 0px; display:block">
                            
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


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
                <form method='post' method='POST' action='chngpasswd.php' enctype="multipart/form-data">
                    <label>Current Password</label>
                    <input type='password' name='currpass' id='currpassadmin'
                        class='form-control' placeholder="Enter the current Password"><br>
                    <label>New Password</label>
                    <input type='password' name='newpass' id='newpassadmin'
                        class='form-control' placeholder="Enter the new Password"><br>
                    <label>Renter New Password</label>
                    <input type='password' name='newapass' id='newapassadmin'
                        class='form-control' placeholder="Renter the new Password"><br>
                    <input type='button' name='adminpasschange' class='btn btn-info' value='Change Password' id='adminpasschange' onclick="chngpass()" ><br>
                </form>
                <div class='editpassadmin'>
                    <h3 class='editpassadminmsg' style="color:red"> </h3>
                </div>
        
                </div>
    
            </div>
    
        </div>
    </div>


                                <!-- Add Offers modal -->

    <div id="addoffersmodal" class="modal fade" role="dialog">
        <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Add Offers </h4>
            </div>
            <div class="modal-body">
            <!-- Form -->
            <form method='POST' action='addoffers.php' enctype="multipart/form-data">
                Select Date:
                <input class='addoffersdate' id="addoffers-date" type="date" value="addodate" name="addoffersdate" >
                <label for="addoffers-date" >Date:</label><br>
                Choose Type : 
                <input class='addofferstype' id="addoffers-home" type="radio" value="Home" name="addofferstype" >
                <label for="addoffers-home" >Home</label>
                <input class='addofferstype' id="addoffers-shop" type="radio" value="Shop" name="addofferstype">
                <label for="addoffers-shop" >At Shop</label>
                <br>
                Choose Gender :
                <input class='addoffersgender' id="addoffers-male" type="radio" value="m" name="addoffersgender">
                <label for="addoffers-male" >Male</label>
                <input class='addoffersgender' id="addoffers-female" type="radio" value="f" name="addoffersgender">
                <label for="addoffers-female" >Female</label>
                <br>

                <input type='button' class='btn btn-info' value='Next' id='addofferbtn1' ><br>
                <br>
                <div>
                    <h4 class='addoffermsg1' style="color:red"></h4>
                </div>


                <div id="shopmaledropdown" style="display: none;">

                    <?php
                        $sql = "SELECT * from services where ShopServicesMaleFlag=1";
                        $res = mysqli_query($db, $sql);
                        $maleserv = array();
                        while($row = mysqli_fetch_assoc($res)){
                            $maleserv[] = $row;
                        }
                    ?>


                    <label for="ShopServicesMale">Choose a Service:</label>
                    <select name="services1" id="services1">
                        <?php foreach($maleserv as $maleserv){
                        ?>    
                            <option value="<?php echo $maleserv['Service_ID']?>" ><?php echo $maleserv['ServiceName']?> - <?php echo $maleserv['ActualPrice']?>Rs</option>

                        <?php }?> 
                    </select> 

                    <br>
                    <input type='button' class='addofferbtn2 btn btn-info' value='Next' id='addofferbtn21' ><br>
                    <br>

                </div>

                <div id="shopfemaledropdown" style="display: none;">
                    
                    <?php
                        $sql = "SELECT * from services where ShopServicesFemaleFlag=1";
                        $res = mysqli_query($db, $sql);
                        $femaleserv = array();
                        while($row = mysqli_fetch_assoc($res)){
                            $femaleserv[] = $row;
                        }
                    ?>       

                    <label for="ShopServicesFemale">Choose a Service:</label>

                    <select name="services2" id="services2">
                        <?php foreach($femaleserv as $femaleserv){
                            ?>    
                            <option value="<?php echo $femaleserv['Service_ID']?>" ><?php echo $femaleserv['ServiceName']?> - <?php echo $femaleserv['ActualPrice']?>Rs</option>

                        <?php }?> 
                    </select> 

                    <br>
                    <input type='button' class='addofferbtn2 btn btn-info' value='Next' id='addofferbtn22' onclick="add2('services2')" ><br>
                    <br>

                    
                </div>

                <div id="homemaledropdown" style="display: none;">

                    <?php
                        $sql = "SELECT * from services where HomeServicesMaleFlag=1";
                        $res = mysqli_query($db, $sql);
                        $maleserv = array();
                        while($row = mysqli_fetch_assoc($res)){
                            $maleserv[] = $row;
                        }
                    ?> 
                    
                    <label for="HomeServicesMale">Choose a Service:</label>

                    <select name="services3" id="services3">
                        <?php foreach($maleserv as $maleserv){
                        ?>    
                            <option value="<?php echo $maleserv['Service_ID']?>" ><?php echo $maleserv['ServiceName']?> - <?php echo $maleserv['ActualPrice']?>Rs</option>

                        <?php }?>
                    </select> 

                    <br>
                    <input type='button' class='addofferbtn2 btn btn-info' value='Next' id='addofferbtn23' onclick="add2('services3')" ><br>
                    <br>

                </div>

                <div id="homefemaledropdown" style="display: none;">

                    <?php
                        $sql = "SELECT * from services where HomeServicesFemaleFlag=1";
                        $res = mysqli_query($db, $sql);
                        $femaleserv = array();
                        while($row = mysqli_fetch_assoc($res)){
                            $femaleserv[] = $row;
                        }
                    ?>
                    
                    <label for="HomeServicesFemale">Choose a Service:</label>

                    <select name="services4" id="services4">
                        <?php foreach($femaleserv as $femaleserv){
                            ?>    
                            <option value="<?php echo $femaleserv['Service_ID']?>" ><?php echo $femaleserv['ServiceName']?> - <?php echo $femaleserv['ActualPrice']?>Rs</option>

                        <?php }?> 
                    </select> 

                    <br>
                    <input type='button' class='addofferbtn2 btn btn-info' value='Next' id='addofferbtn24' onclick="add2('services4')" ><br>
                    <br>

                </div>

                <div id="adddiscountdiv" style="display: none;">
                    <input id="choosenservice" type="hidden" >    
                    <br>
                    <h4 id="selectedservice"></h4><br>
                    <label for="adddiscount" >Add Discount in ₹ </label>
                    <input id="adddiscount" type="number" value="add-discount" name="adddiscount" >

                    <input type='button' name='savetheoffer' class='btn btn-info' value='Add Offer' id='addofferbtn3' 
                        ><br>
                    <br>
                    <div>
                        <h4 class='addoffermsg3' style="color:red"></h4>
                    </div>
                </div>

            </form>
    
            </div>
    
        </div>
    
        </div>
    </div>


                                <!-- See Offers modal -->

    <div id="seeoffersmodal" class="modal fade" role="dialog" >
        <div class="modal-dialog">
    
            <!-- Modal content-->
            <div class="modal-content" style="width:max-content; ">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">  Current Offers </h4>
                </div>
                <div class="modal-body">
                    <form class="seeoffersform" method="POST" action=''>
                        Choose Type : 
                        <input id="offers-home" type="radio" value="Home" name="seeofferstype" >
                        <label for="offers-home" >Home</label>
                        <input id="offers-shop" type="radio" value="Shop" name="seeofferstype">
                        <label for="offers-shop" >At Shop</label>
                        <br>
                        Choose Gender :
                        <input id="offers-male" type="radio" value="Male" name="seeoffersgender">
                        <label for="offers-male" >Male</label>
                        <input id="offers-female" type="radio" value="Female" name="seeoffersgender">
                        <label for="offers-female" >Female</label>
                        <br>

                        <input type='submit' class='btn btn-info' name='seeoffers' value='See offers' id='seeoffers' ><br>
                        <br>   
                    </form>
                    <div>
                        <h4 class='seeoffersmsg' style="color:red"> </h4>
                    </div>


                    <div class="table-wrapper-scroll-y my-custom-scrollbar" style="min-height: 290px;">
                        <table id="modalseeofferstable" class="table table-striped" style="margin-bottom: 0px;">
                        
                        </table>
                    </div>
                </div>
        
            </div>
    
        </div>
    </div>

                                <!-- Cancel Offers modal -->

    <div id="removeoffersmodal" class="modal fade" role="dialog" >
        <div class="modal-dialog">
    
            <!-- Modal content-->
            <div class="modal-content" style="width:max-content; ">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">  Current Offers </h4>
                </div>
                <div class="modal-body">
                    
                    <!-- Form -->
                    <form class='removeoffersform' method="POST" action='' >
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <table id="Ro" class="table table-striped" style="margin-bottom: 0px;">

                                <?php 
                                    
                                    $sql="SELECT services.Service_ID , services.ServiceName , services.ActualPrice, 
                                        offers.Date , offers.Discount FROM services RIGHT JOIN offers ON 
                                        services.Service_ID = offers.Service_ID  ORDER BY offers.Date";
                                    $prj= mysqli_query($db, $sql);
                                    $res = array();
                                    while($row = mysqli_fetch_assoc($prj)){
                                        $res[] = $row;
                                    }
                                ?>

                                <thead class="thead-dark">
                                    <tr>
                                    <th style="position: sticky; top: 0;" scope="col">Sr. No.</th>
                                    <th style="position: sticky; top: 0;" scope="col">ServiceId</th>
                                    <th style="position: sticky; top: 0;" scope="col">Service Name</th>
                                    <th style="position: sticky; top: 0;" scope="col">Date</th>
                                    <th style="position: sticky; top: 0;" scope="col">Actual price</th>
                                    <th style="position: sticky; top: 0;" scope="col">Discount</th>
                                    <th style="position: sticky; top: 0;" scope="col">Final Price</th>
                                    </tr>
                                </thead>

                                <tbody class="removeofferstable">
                                    <?php          
        
                                    for($i=0; $i<count($res); $i++){?>

                                    <tr>
                                        <th scope='row'><input type='checkbox' name='remove[]' id=<?php echo $res[$i]['Service_ID'].",".$res[$i]['Date']?> 
                                            value=<?php echo $res[$i]['Service_ID'].",".$res[$i]['Date']?>></th>
                                        <td><?php echo $res[$i]['Service_ID']; ?></td>
                                        <td><?php echo $res[$i]['ServiceName']; ?></td>
                                        <td><?php echo $res[$i]['Date']; ?></td>
                                        <td><?php echo $res[$i]['ActualPrice']; ?></td>
                                        <td><?php echo $res[$i]['Discount']; ?></td>
                                        <td><?php echo $res[$i]['ActualPrice']-$res[$i]['Discount']; ?></td>
                                    </tr>
                                    <?php 
                                    } ?>
                                </tbody>

                            </table>
                        </div>
                        <div class='removeofferbtn'>
                            <input type='submit' id='removeoffer' name='removeoffer' class='btn btn-info' value='Remove Offer' ><br>
                        </div>
                        <div class='removeoffersdiv'>
                            <h4 class='removeoffersmsg' style='color:red'></h4>        
                        </div>     
                    </form>   
                    
                </div>
        
            </div>
    
        </div>
    </div>


    
    <div id="apptdonemodal" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="width:max-content; ">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">  Confirm  </h4>
                </div>
                <div class="modal-body">
                    <form class="apptdoneform" method="POST" action=''>
                        <input type='hidden' name='apptid' id='apptid' class='form-control' ><br>
                        <input type='hidden' name='serviceid' id='serviceid' class='form-control'><br>
                        <input type='hidden' name='paymentmode' id='paymentmode' class='form-control' ><br>
                        
                        <div class='modeofpayment' style="display:block;">
                            <input id="checkmode" type="radio" value="modeofpayment" name="filtertype" 
                                style="margin-left:7px">
                            <label for="checkmode2" id="payment">Payment Done</label>`
                        </div>
                        <p> Are you sure you want to confirm? </p>
                        <input type='button' class='btn btn-info' name='apptdone1' value='Yes' id='apptdone1' >
                        <input type='button' class='btn btn-info' name='apptdone2' value='No' id='apptdone2' ><br>
                        <br>   
                    </form>
                    <div>
                        <h4 class='apptdonemsg' style="color:red"> </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="apptunattendedmodal" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="width:max-content; ">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">  Confirm  </h4>
                </div>
                <div class="modal-body">
                    <form class="apptunattendedform" method="POST" action=''>
                        <input type='hidden' name='apptid' id='apptid' class='form-control' ><br>
                        <input type='hidden' name='serviceid' id='serviceid' class='form-control'><br>
                        <input type='hidden' name='paymentmode' id='paymentmode' class='form-control' ><br>
                        
                        <p> Are you sure you want to confirm? </p>
                        <input type='button' class='btn btn-info' name='apptunattended1' value='Yes' id='apptunattended1' >
                        <input type='button' class='btn btn-info' name='apptunattended2' value='No' id='apptunattended2' ><br>
                        <br>   
                    </form>
                    <div>
                        <h4 class='apptunattendedmsg' style="color:red"> </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!---------------------------------------- Modals ends-------------------------------------------------->

<script src="static/js/admin.js"></script>

</body>
 


</html>
