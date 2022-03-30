
    $(document).ready(function(){

        
        $(".getbutton").click(function(){
          $('#notice').hide();
          $('#nextbtn').fadeIn(2000);
        });
      
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
      
      
      
          
      
            $(".getbutton").click(function(){
              $('#notice').hide();
              $('#showdate').fadeIn(2000);
            });
        
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
      
            $('#emailchangecust').click(function(e){
      
              e.preventDefault();
      
              $('.editemailcustmsg').html(null); 
              var email = $('#newemailid').val();
              alert(email);
      
              if(email){
                console.log(email);
                var regex = "^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$";
                // var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!regex.test(email)){
                  $('.editemailcustmsg').html("Not a valid Email address");
                }​
                else{
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
      
            $('#phonechangecust').click(function(e){
      
              e.preventDefault();
              alert("hello");
              $('.editphonecustmsg').html(null); 
              var phone = $('#newphone').val();
              alert(phone);
              if(phone.length== 10){
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
      
      
            $("#cancelapptmodal").on('hide.bs.modal', function () {
              //actions you want to perform after modal is closed.
              window.location.reload(true);
            });
      
            $("#editemailmodal").on('hide.bs.modal', function () {
              //actions you want to perform after modal is closed.
              window.location.reload(true);
            });
            
            $("#editphonemodal").on('hide.bs.modal', function () {
              //actions you want to perform after modal is closed.
              window.location.reload(true);
            });
            
            $("#passwdchngmodal").on('hide.bs.modal', function () {
              //actions you want to perform after modal is closed.
              window.location.reload(true);
            });
      
      
      
          });
      
      
    
    
    