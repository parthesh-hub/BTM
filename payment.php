<?php 
session_start();

include('config.php');
if(!isset($_SESSION['userid'])){
  header('location:login.php');
}else if(!isset($_SESSION['total_cost'])||!isset($_SESSION['total_discount'])){
    header('location:apt.php');
}
unset($_SESSION['errortime']);
unset($_SESSION['errortimemsg']);

//  --------------------- TO CONFIRM THE SLOTS SELECTED BY USER ----------------------
for($j=0;$j<count($_SESSION['data']);$j++){

    $orgDate = $_SESSION['selected_date'];  
    $date = date("Y-m-d", strtotime($orgDate)); 
    $serviceid = $_SESSION['data'][$j]['serviceid'];
    $tslot = $_SESSION['data'][$j]['timeslot'];
    $sername = $_SESSION['data'][$j]['servicename'];
    $_SESSION['tslot'][$j]=$tslot;
    
    if($_SESSION['service_type']=='home'){
        $sql= "SELECT * from rendered_services where Date='$date' and Timeslot='$tslot'";
    }
    else if($_SESSION['service_type']=='shop' && $sername!='Make Up' && $sername!='Beard Shave')
    {
        $sql= "SELECT * from rendered_services where Date='$date' and Service_ID in 
            (SELECT Service_ID from Services where ServiceName='$sername') and Timeslot='$tslot'";
    }
    else{
        $sql= "SELECT * from rendered_services where Date='$date' and Service_ID='$serviceid' and Timeslot='$tslot'";
    }
    
    $prj= mysqli_query($db, $sql);
    $res = array();
    while($row = mysqli_fetch_assoc($prj)){
        $res[] = $row;
    }
    if(count($res)<2 && $_SESSION['service_type']=='shop'){
        $_SESSION['errortime'] = 0;
    }
    else if(count($res)<5 && $_SESSION['service_type']=='home'){
        $_SESSION['errortime'] = 0;
    }
    else{
        $_SESSION['errortime'] = 1;
        $_SESSION['errortimemsg']='Choose Available Timelots Only';
        break;
    }
}

if($_SESSION['errortime']==1){
    header('location:newapt3.php');
}

else{?>

    
        <html>
            <head>
                <title>Payment Gateway</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <link rel="stylesheet" href="static/css/payment-style.css">

                <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
                <div class = "app-container">
                    <div class = "top-box">
                        <p>CHECKOUT</p>
                    </div>
                    
                    <div class = "middle-box">
                        <h1><?php echo $_SESSION['total_cost'];?><span>&#x20B9;</span></h1>
                        <p>Pay to Beyond The Mirror &copy</p>
                    </div>

                    <div class = "bottom-box">
                        <button type="button" class='payment-option-btn' id='cashbtn' >Pay by Cash</button>
                        <button type="button" class='payment-option-btn' id='cardbtn' >Pay by Card</button>
                    </div>

                    <div id='otpshow' style='display:none; margin-left:17%'>
                        <input type='password' placeholder="Enter OTP" id='onlinepayotp' name='onlinepayotp' >
                        <br><input type='submit' class='btn btn-info' name='otpbtn' value='Confirm' id='otpbtn' style="margin-top: 10%; margin-left: 25%;">
                        <div>
                            <h4 class='otpalert' style="color:red"></h4>
                        </div>
                    </div>

                    <div class="cash-details" id="paycash">
                        <button type="button" class="pay-btn" id='offlinepayment' style='margin:auto;'>Proceed</button>
                    </div>

                    <div class='onlinepay'>
                        <form class='onlinepaymentform' method='POST' action = "">
                            <div class = "card-details" id='paycard'>
                                <p>Pay using Credit or Debit Card</p>
                                <div class="card-num-field-group">
                                    <label>Card Number</label><br>
                                    <input type="text" class="card-num-field" id='cardno' placeholder="xxxx-xxxx-xxxx-xxxx">
                                </div>  
                                

                                <div class="date-field-group">
                                    <label>Expiry month</label>&nbsp;<label>Expiry year</label><br>
                                    <!-- <input type="number" class="date-field" placeholder="mm"> -->
                                    <select name="month" class="date-field" aria-placeholder="mm">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    <!-- <input type="number" class="date-field" placeholder="yyyy"> -->
                                    <select name="years" class="date-field" aria-placeholder="yyyy">
                                        <?php 

                                        for($i=date("Y"); $i<=date("Y")+20; $i++)
                                        {

                                            echo "<option value=".$i.">".$i."</option>";
                                        }
                                        ?> 
                                            <option name="years"> </option>   
                                    </select>
                                </div>

                                <div class="cvc-field-group">
                                    <label>CVC</label><br>
                                    <input type="password" id='cvcno' class="cvc-field" placeholder="xxx">
                                </div>

                                <div class="name-field-group">
                                    <label>Card Holder Name</label><br>
                                    <input type="text" id='cardholdername' class="name-field" placeholder="Full Name">
                                </div>
                                <button type="submit" class="pay-btn" id='onlinepayment'>Pay Now</button>
                                <div>
                                    <h4 class='paymentmsg' style="color:red"></h4>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
                <script src="static/js/payment.js"></script> 

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


