window.onload = function () {
  init();
};

function init() {
  "use strict";
  var regForm = document.getElementById("regform"); // get ref to the HTML element
  regForm.onsubmit = validate; //register the event listener
}

function validate() {
  var errMsg = "Error Message : \n";
  var result = true;

  var firstname = document.getElementById("first_name").value;
  var lastname = document.getElementById("last_name").value;
  var dob = document.getElementById("date_of_birth").value;
  var email = document.getElementById("email").value;
  var pnumber = document.getElementById("phone").value;
  var address = document.getElementById("address").value;

  if (!firstname.match(/^[a-zA-Z]+$/)) {
    document.getElementById("fnameError").innerHTML =
      "You must enter valid first name";
  } else if (firstname.match(/^[a-zA-Z]+$/)) {
    document.getElementById("fnameError").innerHTML = "";
  }

  if (!lastname.match(/^[a-zA-Z]+$/)) {
    document.getElementById("lnameError").innerHTML =
      "You must enter valid last name";
    result = false;
  }
  if (lastname.match(/^[a-zA-Z]+$/)) {
    document.getElementById("lnameError").innerHTML = "";
  }

  // Validate email
  if (
    !email.match(/^\S+@\S+\.\S+$/) ||
    document.getElementById("email").value == ""
  ) {
    document.getElementById("emailError").innerHTML =
      "You must enter a valid email address";
    result = false;
  } else {
    document.getElementById("emailError").innerHTML = "";
  }
  // Validate phone number
  if (
    !pnumber.match(/^\d{10}$/) ||
    document.getElementById("phone").value == ""
  ) {
    document.getElementById("phoneError").innerHTML =
      "You must enter a valid 10-digit phone number";
    result = false;
  } else {
    document.getElementById("phoneError").innerHTML = "";
  }

  if (document.getElementById("address").value == "") {
    document.getElementById("addressError").innerHTML =
      "You must enter valid street address";
    result = false;
  } else if (document.getElementById("address").value != "") {
    document.getElementById("addressError").innerHTML = "";
  }

  if (document.getElementById("disease").value == "") {
    document.getElementById("diseaseError").innerHTML =
      "You must enter disease to submit";
    result = false;
  } else if (document.getElementById("address").value != "") {
    document.getElementById("diseaseError").innerHTML = "";
  }

  var email = document.getElementById("email").value;
  var phone = document.getElementById("phone").value;

  var male = document.getElementById("Male").checked;
  var female = document.getElementById("Female").checked;

  if (male || female) {
    document.getElementById("genderError").innerHTML = "";
  } else {
    document.getElementById("genderError").innerHTML =
      "Please select your gender";
    result = false;
  }

  console.log(result);

  if (result == true) {
    console.log("no error");
    var myButton = document.getElementById("submit");

    // Change the type attribute to "submit"
    myButton.setAttribute("type", "submit");
    document.getElementById("regform").submit();
  }
}
