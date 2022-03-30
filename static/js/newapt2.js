// $(document).ready(function() {
//     //maleshop
// $('#aptcnfrmbtnmaleshop').click(function () {
//    var check = $('#check').find('input[type=checkbox]:checked').length;
//    if(check>3){
//     $('.servicemsg').html('Please select at most 3 services.');
//     return false;
//    }
//    else if(check<1){
//     $('.servicemsg').html('Please select at least 1 service.');
//     return false;
//    }
//    else{return true;}

   
// })
// });
// function checkval(){
// var checks = document.querySelectorAll(".single-checkbox");
// var max = 3;
// for (var i = 0; i < checks.length; i++)
//   checks[i].onclick = selectiveCheck;
// function selectiveCheck (event) {
//   var checkedChecks = document.querySelectorAll(".single-checkbox:checked");
//   if (checkedChecks.length >= max + 1)
//     document.getElementById('#servicecheck').innerHTML = "Please select at most 3 services"
//     return false;
// }
// // }


// function checkBoxLimit() {
// 	var checkBoxGroup = document.querySelectorAll(".single-checkbox");			
// 	var limit = 3;
// 	for (var i = 0; i < checkBoxGroup.length; i++) {
// 		checkBoxGroup[i].onclick = function() {
// 			var checkedcount = 0;
// 			for (var i = 0; i < checkBoxGroup.length; i++) {
// 				checkedcount += (checkBoxGroup[i].checked) ? 1 : 0;
// 			}
// 			if (checkedcount > limit) {
// 				console.log("You can select maximum of " + limit + " checkboxes.");
// 				alert("You can select maximum of " + limit + " checkboxes.");						
// 				return false;
// 			}
// 		}
// 	}
// }

function checkBoxLimit()
   {

   var count=0;
   var x=document.getElementsByName('select[]');
   for (var i=0; i < x.length; i++)
      {
      if(x[i].checked)
	     {
         count = count + 1;
		 }
	  }	
   if (count > 3)
	  {
          alert('Please select at most 3 services.');
	 
	  return false;
      }
      else if(count<1){
        alert('Please select at least 1 service.');
        return false;
      }
   }

   
function checkBoxLimithome()
{

var count=0;
var x=document.getElementsByName('select[]');
for (var i=0; i < x.length; i++)
   {
   if(x[i].checked)
      {
      count = count + 1;
      }
   }	
if (count != 1)
   {
       alert('Please select only 1 service.');
  
   return false;
   }

}
