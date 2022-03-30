var x1 = document.getElementById("prime1");
var y1 = document.getElementById("regular1");
var z = document.getElementById("btn");


function regular() {
  x1.style.left = "-800px";
  y1.style.left = "50px";
  z.style.left = "110px";
}

function prime() {
  x1.style.left = "50px";
  y1.style.left = "950px";
  z.style.left = "0px";
}


function primesub() {
  var fname =   document.getElementById('fname').value;
  var lname =   document.getElementById('lname').value;
  var username =   document.getElementById('username').value;
  var email =   document.getElementById('email').value;
  var dob = document.getElementById('dob').value;
  var phone =   document.getElementById('phone').value;
  var address =     document.getElementById('address').value;
  var aadhar = document.getElementById('aadhar').value;
  var pincode = document.getElementById('pincode').value;
  var pass =   document.getElementById('pass').value;
  var error_msg = document.getElementById('error_message');
  var pincode =   document.getElementById('pincode').value;

  var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
  var text="";
    error_msg.innerHTML=text;

  if (fname== ""||fname==null) {
    text="**Please enter your First name.";
    error_msg.innerHTML=text;
    return false;
  }


  if (lname== ""||lname==null) {
    text="**Please enter your last name.";
    error_msg.innerHTML=text;
    return false;
  }
  if (email== ""||email==null) {
    text="**Please enter your Email.";
    error_msg.innerHTML=text;
    return false;
  }

  if (pass == ""||pass==null) {
      text="**Please enter your password.";
      error_msg.innerHTML=text;
    return false;
  }

  if(pass.length<6){
    text="**Pass should have more than 6 characters.";
    error_msg.innerHTML=text;
    return false;
  }

  if(!strongRegex.test(pass)){
    text="**Password should contain atleast 1 small letter,capital letter,number and special character.";
    error_msg.innerHTML=text;
    return false;
  }

  if (username == ""||username==null) {
    text="**Please enter your username.";
    error_msg.innerHTML=text;
    return false;
  }
  if (dob == ""||dob==null) {
    text="**Please enter your DOB.";
    error_msg.innerHTML=text;
    return false;
  }
  if ((document.prime1.gender[0].checked == false) && (document.prime1.gender[1].checked == false)) {
    alert("Please choose your Gender: Male or Female");
    return false;
  }
  if (aadhar== ""||aadhar==null) {
    text="**Please enter your aadhar no..";
    error_msg.innerHTML=text;
    return false;
  }
  var aadhartest = new RegExp("^[0-9]{12}$");

  if(!aadhartest.test(aadhar)){
    text="**Please enter correct aadhar no..";
  
    error_msg.innerHTML=text;
    return false; 
  }
  if (phone == ""||phone==null) {
    text="**Please enter your phone no..";
    error_msg.innerHTML=text;
    return false;
  }
 
  var phonetest = new RegExp("^[0-9]{10}$");
  
  if(!phonetest.test(phone)){
    text="**Please enter valid phone no..";
    error_msg.innerHTML=text;
    return false;
  }
  if (pincode == ""||pincode==null) {
    text="**Please enter your pincode.";
    error_msg.innerHTML=text;
    return false;
  }

  if (address == ""||address==null) {
    text="**Please enter your address.";
    error_msg.innerHTML=text;
    return false;
  }

  if(pincode=='initial'||pincode==null||pincode==''){
    text="**Please choose the pincode";
    error_msg.innerHTML=text;
    return false;
  }

  alert("Form submitted successfully.");
  return true;

}




function regularsub() {
  var fname =   document.getElementById('fname1').value;
  var lname =   document.getElementById('lname1').value;
  var username =   document.getElementById('username1').value;
  var email =   document.getElementById('email1').value;
  var dob = document.getElementById('dob1').value;
  var phone =   document.getElementById('phone1');
  var pass =   document.getElementById('pass1').value;

  var error_msg = document.getElementById('error_message1');
  var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
  var text="";
    error_msg.innerHTML=text;
  if (fname== ""||fname==null) {
    text="**Please enter your First name.";
    error_msg.innerHTML=text;
    return false;
  }


  if (email== ""||email==null) {
    text="**Please enter your Email.";
    error_msg.innerHTML=text;
    return false;
  }

  if (lname== ""||lname==null) {
    text="**Please enter your last name.";
    error_msg.innerHTML=text;
    return false;
  }

  if (pass == ""||pass==null) {
      text="**Please enter your password.";
      error_msg.innerHTML=text;
    return false;
  }

  if(pass.length<6){
    text="**Pass should have more than 6 characters.";
    error_msg.innerHTML=text;
    return false;
  }

  if(!strongRegex.test(pass)){
    text="**Password should contain atleast 1 small letter,capital letter,number and special character.";
    error_msg.innerHTML=text;
    return false;
  }

  if (username == ""||username==null) {
    text="**Please enter your username.";
    error_msg.innerHTML=text;
    return false;
  }
  if (dob == ""||dob==null) {
    text="**Please enter your DOB.";
    error_msg.innerHTML=text;
    return false;
  }
  if ((document.regular1.gender[0].checked == false) && (document.regular1.gender[1].checked == false)) {
    alert("**Please choose your Gender: Male or Female");
    return false;
  }

  if (phone == "") {
    text="**Please enter your phone no..";
    error_msg.innerHTML=text;
    return false;
  }
    var phonetest = new RegExp("^[0-9]{10}$");
  if(!phonetest.test(phone)){
    text="**Please enter valid phone no..";
    error_msg.innerHTML=text;
    return false;
  }
  
  alert("Form submitted successfully.");
  return true;
}
