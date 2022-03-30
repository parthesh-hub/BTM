var x1 = document.getElementById("prime1");
var y1 = document.getElementById("regular1");
var z = document.getElementById("btn");





function regular() {
  x1.style.left = "-800px";
  y1.style.left = "50px";
  y2.style.left = "450px"
  z.style.left = "110px";
}

function prime() {
  x1.style.left = "50px";
  y1.style.left = "950px";
  y2.style.left = "1350px";
  z.style.left = "0px";
}


function primesub() {
  var fname =   document.getElementById('fname').value;
  var lname =   document.getElementById('lname').value;
  var username =   document.getElementById('username').value;
  var email =   document.getElementById('email').value;
  var dob = document.getElementById('dob').value;
  var phone =   document.getElementById('phone');
  var address =     document.getElementById('address').value;
  var aadhar = document.getElementById('aadhar').value;
  var pincode = document.getElementById('pincode').value;
  var pass =   document.getElementById('pass').value;

  if (fname== ""||fname==null) {
    document.getElementById('error_message').innerHTML="Please enter your First name."
    prime1.preventDefault();
    return false;
  }




  if (lname== ""||lname==null) {
  document.getElementById('lname').innerHTML="Please enter your last name."

    return false;
  }
  if (username == "") {
  document.getElementById('username').innerHTML="Please enter your username."

    return false;
  }

  if ((document.prime1.gender[0].checked == false) && (document.prime1.gender[1].checked == false)) {
    alert("Please choose your Gender: Male or Female");
    return false;
  }

  if (email== "") {
  document.getElementById('email').innerHTML="Please enter your Email."

    return false;
  }
  if (dob == "") {
    document.getElementById('dob').innerHTML="Please enter your DOB."

    return false;
  }
  if (phone == "") {
  document.getElementById('phone').innerHTML="Please enter your phone no.."

    return false;
  }
  if (address == "") {
    document.getElementById('address').innerHTML="Please enter your address."
    return false;
  }
  if (aadhar== "") {
    document.getElementById('aadhar').innerHTML="Please enter your aadhar no.."
    return false;
  }
  if (pincode == "") {
    document.getElementById('pincode').innerHTML="Please enter your pincode."

    return false;
  }
  if (pass == "") {
      document.getElementById('pass').innerHTML="Please enter your password."

    return false;
  } else if (pass.value.length < 6) {
    alert("Password must be at least 6 characters long.");
    return false;
  }

}

function regularsub() {
  var fname = document.regular1.fname;
  var lname = document.regular1.lname;
  var username = document.regular1.username;
  var email = document.regular1.email;
  var dob = document.regular1.dob;
  var phone = document.regular1.phone;


  var pass = document.regular1.pass;

  if (fname.value == "") {
    alert("Please enter your First name.");

    return false;
  }
  if (lname.value == "") {
    alert("Please enter your Last name.");

    return false;
  }
  if (username.value == "") {
    alert("Please enter your username.");

    return false;
  }
  if (email.value == "") {
    alert("Please enter your Email.");

    return false;
  }
  if (dob.value == "") {
    alert("Please enter your DOB.");

    return false;
  }
  if (phone.value == "") {
    alert("Please enter your Phone number.");

    return false;
  }

  if (pass.value == "") {
    alert("Please enter your pass.");

    return false;
  } else if (pass.value.length < 6) {
    alert("Password must be at least 6 characters long.");
    return false;
  }
  if ((document.regular1.gender[0].checked == false) && (document.regular1.gender[1].checked == false)) {
    alert("Please choose your Gender: Male or Female");
  }
}
