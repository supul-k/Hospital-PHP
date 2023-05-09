<?php
include './header.inc';

session_start();

?>

<body>
  <div style="padding: 20px; border-radius: 0.5rem;">
    <?php
    if (isset($_SESSION['success_message'])) {
      // Display success message and unset the session variable
      echo '<div class="success-message">' . $_SESSION['success_message'] . '</div>';
      unset($_SESSION['success_message']);
    }

    if (isset($_SESSION['error_message'])) {
      // Display success message and unset the session variable
      // foreach ($_SESSION['error_messages'] as $error_message) {
      echo '<div class="error-message">' . $_SESSION['error_message'] . '</div>';
      // }
      unset($_SESSION['error_message']);
    }
    ?>
  </div>
  <h1>Registration Page</h1>

  <form class="formRegistration" method="post" action="processHospital.php">
    <label for="fname" class="labelRegistration">First Name:</label>
    <input class="inputRegistration" type="text" id="fname" name="fname" required>

    <label for="lname" class="labelRegistration">Last Name:</label>
    <input class="inputRegistration" type="text" id="lname" name="lname" required>

    <label for="email" class="labelRegistration ">Email:</label>
    <input class="inputRegistration" type="text" id="email" name="email_register" required>


    <label for="username" class="labelRegistration">Designation:</label>
    <input class="inputRegistration" type="text" id="designation" name="designation" required>

    <label for="password" class="labelRegistration">Password:</label>
    <input class="inputRegistration" type="password" id="password" name="password" required>

    <label for="confirm-password" class="labelRegistration">Confirm Password:</label>
    <input class="inputRegistration" type="password" id="confirm-password" name="confirm-password" required>

    <div class="buttonContainer">
      <input class="inputRegistration" type="submit" name="register" value="register">
    </div>
    <p style="text-align: center;">Have an account ? <a href="login.php">Login here</a></p>
  </form>

</body>


<?php
include './footer.inc';
?>