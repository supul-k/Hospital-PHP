<?php
include './header.inc';
?>

<script>
  window.addEventListener('load', function() {
    document.getElementById("logoutBtn").addEventListener("click", function() {
      // send a request to the server to log out the user
      console.log('hi');
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "processHospital.php");
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("action=" + this.getAttribute("data-action"));

      // redirect the user to the login page
      window.location.href = "login.php";
    });
  });
</script>

<nav style="display: flex;
    justify-content: space-between;">
  <ul>
    <li>
      <a href="index.php">Home</a>
    </li>
    <li>
      <a href="patient_form.php">Patient Details</a>
    </li>
    <li>
      <a href="Patient_details.php">Patient Details</a>
    </li>
    <li>
      <a href="about.php">About Us</a>
    </li>
    <li>
      <a href="contact_us.php">Contact Us</a>
    </li>
  </ul>
  <ul>
    <li>
      <a href="#" data-action="log_out" id="logoutBtn">Log out</a>
    </li>
  </ul>

</nav>