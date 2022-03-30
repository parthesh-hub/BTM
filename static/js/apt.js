
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
    
    
          $('#getdatebtn').click(function(){
            console.log('hello');
            alert('clicked');
            // $('#showdate').show();
            $('#side-logo').show();

            var d1 = GetFormattedDate(1);
            var d2 = GetFormattedDate(2);
            var d3 = GetFormattedDate(3);
            var d4 = GetFormattedDate(4);

            $('#datelabel1').html(d1);
            $('#date1').val(d1);
            $('#datelabel2').html(d2);
            $('#date2').val(d2);
            $('#datelabel3').html(d3);
            $('#date3').val(d3);
            $('#datelabel4').html(d4);
            $('#date4').val(d4);

          });
    
        });
    
    
    
  
  function GetFormattedDate(i) {
      var todayTime = new Date();

      let tomorrow =  new Date()  
      tomorrow.setDate(todayTime.getDate() + i)
      console.log(tomorrow);
      var month = String(tomorrow.getMonth());
      var day = String(tomorrow.getDate());
      var year = String(tomorrow.getFullYear());
      return day + "-" + month + "-" + year;
    }

    function getdate() {
      
      document.getElementById('showdate').style.display = "block";
     
      // document.getElementById('side-logo').style.display = "block";

      var d1 = GetFormattedDate(1);
      var d2 = GetFormattedDate(2);
      var d3 = GetFormattedDate(3);
      var d4 = GetFormattedDate(4);

      document.getElementById('datelabel1').innerHTML = d1;
      document.getElementById('date1').value = d1;

      document.getElementById('datelabel2').innerHTML = d2;
      document.getElementById('date2').value = d2;

      document.getElementById('datelabel3').innerHTML = d3;
      document.getElementById('date3').value = d3;

      document.getElementById('datelabel4').innerHTML = d4;
      document.getElementById('date4').value = d4;
    }


    function gotosecondpage(type){

      console.log(type);
      if(document.getElementById('date1').checked || document.getElementById('date2').checked ||
      document.getElementById('date3').checked || document.getElementById('date4').checked)
      {
        if(type=='prime'){

          if(document.getElementById('type1').checked || document.getElementById('type2').checked){
            return true;
          }
          else{
            alert('Choose the type');
            return false;
          }

        }
        else{
          return true;
        }
      }
      else{
        alert('Choose the date')
        return false;
      }
    }
