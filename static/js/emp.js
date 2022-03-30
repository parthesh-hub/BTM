$(document).ready(function(){

  $('#date1').click(function(e){
    
    e.preventDefault();

    var chosen_date = $('#date1').val();
    
    $.ajax({
      type:"POST",
      cache:false,
      url:"empaction.php",
      data:{'date': chosen_date}, 
      success: function (responsedata) {
        $('#empappts').html(responsedata);
      }
    });

  });

  $('#date2').click(function(e){
    
    e.preventDefault();

    var chosen_date = $('#date2').val();
    
    $.ajax({
      type:"POST",
      cache:false,
      url:"empaction.php",
      data:{'date': chosen_date}, 
      success: function (responsedata) {
        $('#empappts').html(responsedata);
      }
    });

  });

  $('#date3').click(function(e){
    
    e.preventDefault();

    var chosen_date = $('#date3').val();
    
    $.ajax({
      type:"POST",
      cache:false,
      url:"empaction.php",
      data:{'date': chosen_date}, 
      success: function (responsedata) {
        $('#empappts').html(responsedata);
      }
    });

  });

  $('#date4').click(function(e){
    
    e.preventDefault();

    var chosen_date = $('#date4').val();
    
    $.ajax({
      type:"POST",
      cache:false,
      url:"empaction.php",
      data:{'date': chosen_date}, 
      success: function (responsedata) {
        $('#empappts').html(responsedata);
      }
    });

  });


});



function GetFormattedDate(i) {
  var todayTime = new Date();

  let tomorrow =  new Date()  
  tomorrow.setDate(todayTime.getDate() + i)
  var month = String(tomorrow.getMonth()+1);
  var day = String(tomorrow.getDate());
  var year = String(tomorrow.getFullYear());
  return day + "-" + month + "-" + year;
  }

  function getdate() {
    document.getElementById('showdate').style.display = "block";
    document.getElementById('notice').style.display = "none";

    var d1 = GetFormattedDate(1);
    var d2 = GetFormattedDate(2);
    var d3 = GetFormattedDate(3);
    var d4 = GetFormattedDate(4);

    document.getElementById('datelabel1').value = d1;
    document.getElementById('date1').value = d1;

    document.getElementById('datelabel2').value = d2;
    document.getElementById('date2').value = d2;

    document.getElementById('datelabel3').value = d3;
    document.getElementById('date3').value = d3;

    document.getElementById('datelabel4').value = d4;
    document.getElementById('date4').value = d4; 
  }

  function gettable(d){
    document.getElementById('table').style.display = "block";
    document.getElementById('appdate').innerHTML = d;
    
  }



