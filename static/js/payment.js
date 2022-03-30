$(document).ready(function(){

    $('#cardbtn').click(function(){
        $('#paycash').hide();
        $('#paycard').show();
    });

    $('#cashbtn').click(function(){
        $('#paycard').hide();
        $('#paycash').show();
    });

    $('.onlinepaymentform').on('submit',function(e){
        e.preventDefault();
        $('.paymentmsg').html(null);

        var cardno = $('#cardno').val();
        var numbers = new RegExp("^[0-9]+$");

        if(!numbers.test(cardno)){
            $('.paymentmsg').html("Enter valid card number");
        }
        else{
            if(cardno.length!=16){
                $('.paymentmsg').html("Enter valid card number");
            }
            else{
                var cvcno = $('#cvcno').val();
                if(!numbers.test(cvcno)){
                    $('.paymentmsg').html("Enter valid cvc number");
                }
                else{
                    if(cvcno.length!=3){
                        $('.paymentmsg').html("Enter valid cvc number");
                    }
                    else{
                        var cardholdername = $('#cardholdername').val();
                        alphas = new RegExp("^[A-Za-z]+$");
                        if(!alphas.test(cardholdername)){
                            $('.paymentmsg').html("Enter proper card HolderName");
                        }
                        else{
                           
                            $.ajax({
                                type:"POST",
                                cache:false,
                                url:"otpmail.php",
                                data:{'otp': 'otp'}, 
                                success: function (responsedata) {
                                    if(responsedata){
                                        
                                        $('#otpshow').show();
                                        $('.onlinepay').hide();
                                        $('#paycash').hide();
                                        $('#cashbtn').hide();
                                        $('#cardbtn').hide();
                                        alert("OTP has been sent to your Email...");
                                       
                                    }
                                    else{
                                        alert("Error... Please try again");
                                    }
                                }
                              });
                        }
                    }
                }

            }
        }
    });

    $('#offlinepayment').click(function(){
        
        $.ajax({
            type:"POST",
            cache:false,
            url:"otpmail.php",
            data:{'offline': 'offline'},
            success: function (responsedata){
                window.location="payment_confirm.php";
            }
          });
    });

    $('#otpbtn').click(function(e){
        e.preventDefault();
        var otp = $('#onlinepayotp').val();
        var numbers = new RegExp("^[0-9]+$");

        if(!numbers.test(otp)){
            $('.otpalert').html("Enter valid OTP");
        }
        else{
            if(otp.length!=6){
                $('.otpalert').html("Enter valid OTP");
            }
            else{
                $.ajax({
                    type:"POST",
                    cache:false,
                    url:"otpmail.php",
                    data:{'otp1': otp}, 
                    success: function (responsedata) {
                        $(".otpalert").html(responsedata);
                        if($(".otpalert").html() == "Processing..."){
                            window.location="payment_confirm.php";
                        }
                    }
                  });
            }
        }
    });

});


