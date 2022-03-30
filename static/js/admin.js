
function gethistory1() {
  if (document.getElementById('hist-home').checked || document.getElementById('hist-shop').checked){
    
    if(document.getElementById('histdate').value)
    {
      document.getElementById('histtable').style.display = "block";
    }

    else{
      alert('Choose the date');
    }
      
  }

  else{
    alert("Select the Type : Home or Shop")
  }
  
}

function gethistory2() {
  if (document.getElementById('hist-home').checked || document.getElementById('hist-shop').checked){

    if(document.getElementById('histcust').value)
    {
      document.getElementById('histtable').style.display = "block";
    }

    else{
      alert('Enter the Customer Name');
    }

    
  }

  else{
    alert("Select the Type : Home or Shop")
  }
}

function gethistory3() {
  if (document.getElementById('hist-home').checked || document.getElementById('hist-shop').checked){

    if(document.getElementById('histemp').value)
    {
      document.getElementById('histtable').style.display = "block";
    }

    else{
      alert('Enter the Employee Name');
    }
      
  }

  else{
    alert("Select the Type : Home or Shop")
  }
}


function getcustomer() {
  if (document.getElementById('custsearchid').value){
    if (document.getElementById('primecustsearch').checked || document.getElementById('regcustsearch').checked ){
      document.getElementById('modalsearchcusttable').style.display = "block";
    }
    else{
      alert('Choose the Customer Type')
    }

  }
  
  else{
    alert('Enter a name to search')
  }
}


function getappts(){
  if(document.getElementById("appthome").checked){
    document.getElementById("appttableshop").style.display='none';
    document.getElementById("appttablehome").style.display='block';
  }
  else if(document.getElementById("apptshop").checked){
    document.getElementById("appttablehome").style.display='none';
    document.getElementById("appttableshop").style.display='block';
  }
  else{
    alert('Not Checked')
  }
}




function seeoffers(){
  if(document.getElementById('offers-home').checked || document.getElementById('offers-shop').checked){

    if(document.getElementById('offers-male').checked || document.getElementById('offers-female').checked){
      document.getElementById('modalseeofferstable').style.display='block';
    }

    else{
      alert('Choose the Gender')
    }
    
  }

  else{
    alert('Choose the Type')
  }
}








$(document).ready(function() { //shorthand document.ready function
    
  
      $('.upcomingapptviewer').on('submit', function(e) { //use on if jQuery 1.7+
        e.preventDefault();  //prevent form from submitting

        $('.histdetailsapptsmsg').html(null);
        
        var ele = document.getElementsByName('appttype');


        for(i = 0; i < ele.length; i++) { 
          if(ele[i].checked) 
          var apttype = ele[i].value; 
        } 

        if(apttype){

          $('.upcomingapptsmsg').html(null);

          $.ajax({
            type:"POST",
            cache:false,
            url:"adpost.php",
            data:{'type': apttype}, 
            success: function (responsedata) {
              $('.fetchappts').html(responsedata);
            }
          });
        }

        else{
          $('.upcomingapptsmsg').html("Choose The Service Type");
          // alert("Choose The Type");
        }
      });



      $( "#datebtn" ).click(function(eve) {
        $('.upcomingapptsmsg').html(null);
        eve.preventDefault();  //prevent form from submitting
        var ele = document.getElementsByName('histtype');
        var selected_date = document.getElementById('histdate').value;
        for(i = 0; i < ele.length; i++) { 
          if(ele[i].checked) 
          var histtype = ele[i].value; 
        } 

        if(histtype){

          $('.histtypeapptsmsg').html(null);

          if(selected_date){

            $('.histdetailsapptsmsg').html(null);

            $.ajax({
              type:"POST",
              cache:false,
              url:"viewhist.php",
              data:{'type': histtype, 'date':selected_date}, 
              success: function (responsedata) {
                $('.appointmentshistory').html(responsedata);
              }
            });

          }
          else{
            $('.histdetailsapptsmsg').html("Select The Date");
          }

          
        }
        else{
          $('.histtypeapptsmsg').html("Choose The Service Type");
        }

      });


      $( "#custbtn" ).click(function(eve) {

        $('.upcomingapptsmsg').html(null);
        eve.preventDefault();  //prevent form from submitting
        var ele = document.getElementsByName('histtype');
        var selected_cust = document.getElementById('histcust').value;
        for(i = 0; i < ele.length; i++) { 
          if(ele[i].checked) 
          var histtype = ele[i].value; 
        } 

        if(histtype){

          $('.histtypeapptsmsg').html(null);

          if(selected_cust){

            $('.histdetailsapptsmsg').html(null);


            $.ajax({
              type:"POST",
              cache:false,
              url:"viewhist.php",
              data:{'type': histtype, 'cust':selected_cust}, 
              success: function (responsedata) {
                $('.appointmentshistory').html(responsedata);
              }
            });

          }
          else{
            $('.histdetailsapptsmsg').html("Enter The Customer ID");
          }

          
        }
        else{
          $('.histtypeapptsmsg').html("Choose The Service Type");
        }

      });



      $( "#empbtn" ).click(function(eve) {

        $('.upcomingapptsmsg').html(null);
        eve.preventDefault();  //prevent form from submitting
        var ele = document.getElementsByName('histtype');
        var selected_emp = document.getElementById('histemp').value;
        for(i = 0; i < ele.length; i++) { 
          if(ele[i].checked) 
          var histtype = ele[i].value; 
        } 

        if(histtype){

          $('.histtypeapptsmsg').html(null);

          if(selected_emp){

            $('.histdetailsapptsmsg').html(null);


            $.ajax({
              type:"POST",
              cache:false,
              url:"viewhist.php",
              data:{'type': histtype, 'emp':selected_emp}, 
              success: function (responsedata) {
                $('.appointmentshistory').html(responsedata);
              }
            });

          }
          else{
            $('.histdetailsapptsmsg').html("Enter The Employee ID");
          }

          
        }
        else{
          $('.histtypeapptsmsg').html("Choose The Service Type");
        }

      });



      $('.seeoffersform').on('submit', function(e2) { //use on if jQuery 1.7+
        e2.preventDefault();  //prevent form from submitting
        $('.seeoffersmsg').html(null);

        var ele1 = document.getElementsByName('seeofferstype');

        for(i = 0; i < ele1.length; i++) { 
          if(ele1[i].checked) 
          var offertype = ele1[i].value; 
        } 

        var ele2 = document.getElementsByName('seeoffersgender');

        for(i = 0; i < ele2.length; i++) { 
          if(ele2[i].checked) 
          var offergender = ele2[i].value; 
        } 

        if(offertype && offergender){
          
          $('.seeoffersmsg').html(null);

          $.ajax({
            type:"POST",
            cache:false,
            url:"seeoffers.php",
            data:{'type': offertype, 'gender':offergender}, 
            success: function (responsedata) {
              $('#modalseeofferstable').html(responsedata);
            }
          });
        }

        else{
          $('.seeoffersmsg').html("Choose Type & Gender");
        }
      });



      $('.search-customer').on('submit', function(e2) { //use on if jQuery 1.7+
        e2.preventDefault();  //prevent form from submitting
        $('.searchcustsmsg').html(null);
        
        var ele1 = document.getElementsByName('custtype');
        var custname = $('#custname').val();


        for(i = 0; i < ele1.length; i++) { 
          if(ele1[i].checked) 
          var custtype = ele1[i].value; 
        } 

        if(custtype && custname){

          $('.searchcustsmsg').html(null);

          $.ajax({
            type:"POST",
            cache:false,
            url:"searchcustomer.php",
            data:{'type': custtype, 'name':custname}, 
            success: function (responsedata) {
              $('#modalsearchcusttable').html(responsedata);
            }
          });
        }

        else{
          $('.searchcustsmsg').html("Fill the details");
        }
      });



      $('#adminpasschange').click(function(e){

        e.preventDefault();

        $('.editpassadminmsg').html(null); 
        var currpass = $('#currpassadmin').val();
        var newpass = $('#newpassadmin').val();
        var newapass = $('#newapassadmin').val();

        if(currpass && newpass && newapass){

          if(newpass==newapass){
            var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
            if(!strongRegex.test(newpass)){
              text="*Password should contain atleast 1 small letter,capital letter,number and special character.";
              $('.editpassadminmsg').html(text);
            }
            else{
              $.ajax({
                type:"POST",
                cache:false,
                url:"chngpasswd.php",
                data:{'currpassadmin': currpass, 'newpassadmin':newpass, 'newapassadmin':newapass}, 
                success: function (responsedata) {
                  $('.editpassadminmsg').html(responsedata); 
                  $('#passwdchngmodal').modal('show'); 
                }
              });
            }
          }
          else{
            $('.editpassadminmsg').html("New Passwords didn't match");
          }
        }
        else{
          $('.editpassadminmsg').html("Enter the Passwords"); 
        }

      });


      $('#addofferbtn1').click(function(){

        $('.addoffermsg1').html(null);

        if($('#addoffers-date').val()){
          console.log($('#addoffers-date').val());

          var ele = document.getElementsByName('addofferstype');
          for(i = 0; i < ele.length; i++) { 
            if(ele[i].checked) 
            var selected_type = ele[i].value; 
          } 

          var ele2 = document.getElementsByName('addoffersgender');
          for(i = 0; i < ele.length; i++) { 
            if(ele2[i].checked) 
            var selected_gender = ele2[i].value; 
          } 

          if(selected_type && selected_gender){
            console.log(selected_type+" "+selected_gender);

            if(selected_type=='Shop' && selected_gender=='m'){
              $('#shopmaledropdown').show();
            }
            else if(selected_type=='Shop' && selected_gender=='f'){
              $('#shopfemaledropdown').show();
            }
            else if(selected_type=='Home' && selected_gender=='m'){
              $('#homemaledropdown').show();
            }
            else{
              $('#homefemaledropdown').show();
            }

            $(".addoffersdate").prop('disabled', true);
            $(".addofferstype").prop('disabled', true);
            $(".addoffersgender").prop('disabled', true);
            $('#addofferbtn1').hide();

           
          }
          else{
            $('.addoffermsg1').html("Choose the Type and Gender");
          }
        }
        else{
          $('.addoffermsg1').html("Choose the date");
        }
        // if($('#checkmode').is(':checked')){

        // }

      });

      $('#addofferbtn3').click(function(){

        $('.addoffermsg3').html(null);

        if($('#adddiscount').val()){
          
          $('#adddiscount').prop('disabled', true);
          $('#addofferbtn3').hide();
          var date = $('.addoffersdate').val();
          var serviceid = $('#choosenservice').val();
          var discount = $('#adddiscount').val();
          console.log(date+" "+serviceid+" "+discount);

          $.ajax({
            type:"POST",
            cache:false,
            url:"addoffers.php",
            data:{'date': date, 'serviceid':serviceid, 'discount':discount}, 
            success: function (responsedata) {
              $('.addoffermsg3').html(responsedata); 
            }
          });
        }
        else{
          $('.addoffermsg3').html("Add the discount");
        }
      });
  
      $(document).on('click', '.complete-btn', function(){
        // alert("Dynamic button clicked. Hurray!");
        var idvalue = $(this).attr('id');
        var arrayid = idvalue.split(',');
        $('#apptid').val(arrayid[0]); 
        $('#serviceid').val(arrayid[1]);
        $('#paymentmode').val(arrayid[2]);
        if(arrayid[2]=='Online'){
          $("#checkmode").prop("checked", true);
          $('.modeofpayment').hide();
          // $('#modeofpayment').css("display", "none");
        }
        $('#apptdonemodal').modal('show');

      });

      $(document).on('click', '.unattended-btn', function(){
        // alert("Dynamic button clicked. Hurray!");
        var idvalue = $(this).attr('id');
        var arrayid = idvalue.split(',');
        $('#apptid').val(arrayid[0]); 
        $('#serviceid').val(arrayid[1]);
        $('#paymentmode').val(arrayid[2]);

        $('#apptunattendedmodal').modal('show');

      });


      $('#apptdone1').click(function(e){

        e.preventDefault();
        var apptid = $('#apptid').val();
        var serviceid = $('#serviceid').val();
        var paymentmode = $('#paymentmode').val();
        $('.apptdonemsg').html(null);

        if(apptid && serviceid && paymentmode){

          if($('#checkmode').is(':checked')){
            $.ajax({
              type:"POST",
              cache:false,
              url:"adminaction.php",
              data:{'completed':'Completed','apptid': apptid, 'serviceid':serviceid, 'paymentmode':paymentmode}, 
              success: function (responsedata) {
                $('.apptdonemsg').html(responsedata);
              }
            });
          }
          else{
            $('.apptdonemsg').html('Check the payment confirmation');
          }
        }
        else{
          $('.apptdonemsg').html('Error... Please try again!!');
        }

      });

      $('#apptdone2').click(function(e){
        $('#apptdonemodal').modal('hide');
      });

      $('#apptunattended1').click(function(e){

        e.preventDefault();
        var apptid = $('#apptid').val();
        var serviceid = $('#serviceid').val();
        var paymentmode = $('#paymentmode').val();
        $('.apptunattendedmsg').html(null);

        if(apptid && serviceid && paymentmode){

          $.ajax({
            type:"POST",
            cache:false,
            url:"adminaction.php",
            data:{'unattended':'Unattended','apptid': apptid, 'serviceid':serviceid, 'paymentmode':paymentmode}, 
            success: function (responsedata) {
              $('.apptunattendedmsg').html(responsedata);
            }
          });
         
        }
        else{
          $('.apptunattendedmsg').html('Error... Please try again!!');
        }


      });

      $('#apptunattended2').click(function(e){
        $('#apptunattendedmodal').modal('hide');
      });
      



      $("#passwdchngmodal").on('hide.bs.modal', function () {
        //actions you want to perform after modal is closed.
        window.location.reload(true);
      });

      $("#searchcustmodal").on('hide.bs.modal', function () {
        //actions you want to perform after modal is closed.
        window.location.reload(true);
      });

      $("#seeoffersmodal").on('hide.bs.modal', function () {
        //actions you want to perform after modal is closed.
        window.location.reload(true);
      });

      $("#apptdonemodal").on('hide.bs.modal', function () {
        //actions you want to perform after modal is closed.
        window.location.reload(true);
      });

      $("#apptunattendedmodal").on('hide.bs.modal', function () {
        //actions you want to perform after modal is closed.
        window.location.reload(true);
      });

      $("#addoffersmodal").on('hide.bs.modal', function () {
        //actions you want to perform after modal is closed.
        window.location.reload(true);
      });


      $('#addofferbtn21').click(function(e){
        console.log($('#services1').val());
        var serviceid = $('#services1').val();
        var selected_text = $('#services1 :selected').text();
        
        $('#selectedservice').html("Selected Service : "+selected_text);
        $('#services1').prop('disabled', true);
        $('#choosenservice').val(serviceid);
        $('#addofferbtn21').hide();
        $('#adddiscountdiv').show();
      });

      $('#addofferbtn22').click(function(e){
        console.log($('#services2').val());
        var serviceid = $('#services2').val();
        var selected_text = $('#services2 :selected').text();
        
        $('#selectedservice').html("Selected Service : "+selected_text);
        $('#services2').prop('disabled', true);
        $('#choosenservice').val(serviceid);
        $('#addofferbtn22').hide();
        $('#adddiscountdiv').show();
      });

      $('#addofferbtn23').click(function(e){
        console.log($('#services3').val());
        var serviceid = $('#services3').val();
        var selected_text = $('#services3 :selected').text();
        
        $('#selectedservice').html("Selected Service : "+selected_text);
        $('#services3').prop('disabled', true);
        $('#choosenservice').val(serviceid);
        $('#addofferbtn23').hide();
        $('#adddiscountdiv').show();
      });

      $('#addofferbtn24').click(function(e){
        console.log($('#services4').val());
        var serviceid = $('#services4').val();
        var selected_text = $('#services4 :selected').text();
        
        $('#selectedservice').html("Selected Service : "+selected_text);
        $('#services4').prop('disabled', true);
        $('#choosenservice').val(serviceid);
        $('#addofferbtn24').hide();
        $('#adddiscountdiv').show();
      });


      $('#removeoffer').click(function(e){
      
        e.preventDefault();
  
        $('.removeoffersmsg').html(null); 
        var total = $('input[name="remove[]"]:checked').length;
        
        if(total==0){
          $('.removeoffersmsg').html('Choose 1'); 
          $('#removeoffersmodal').modal('show'); 
  
        }
        else if (total>1) {         
          $('.removeoffersmsg').html('Choose only 1 ');      
          $('#removeoffersmodal').modal('show'); 
  
        }
        else{
          
          var idvalue = $('input[name="remove[]"]:checked')[0].value;
          console.log(idvalue);
          var res = idvalue.split(",");
          var serviceid = res[0];
          var date = res[1];
          console.log(serviceid+" "+date);
  
          $.ajax({
            type:"POST",
            cache:false,
            url:"removeoffers.php",
            data:{'serviceid': serviceid, 'date':date}, 
            success: function (responsedata) {
              $('.removeoffersmsg').html("Offer removed successfully"); 
              $('#removeoffersmodal').modal('show'); 
            }
          });
        }
  
      });
  

   
      $("#removeoffersmodal").on('hide.bs.modal', function () {
              //actions you want to perform after modal is closed.
              window.location.reload(true);
      });


});