
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
      document.getElementById('nextbtn').style.display = "block";
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


    $(".getbutton").click(function(){
      $('#showdate').fadeIn();
      $('#notice').hide();

    });
    
  