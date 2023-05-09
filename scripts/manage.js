function init() {
    "use strict";
    var regForm = document.getElementById("change_status_form"); // get ref to the HTML element
    regForm.onsubmit = validate; //register the event listener
  }
  

function validate() {
    var errMsg = "Error Message : \n";
    var result = true;
  
    var change_status = document.getElementById("change_status").value;
  
    console.log(change_status);
  
    if (!change_status.match(/^[a-zA-Z]+$/)) {
      document.getElementById("referenceError").innerHTML =
        "You must enter valid stareference to change status";
    }

}