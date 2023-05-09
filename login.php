<?php
include './header.inc';


if (isset($_SESSION['loginerror-message'])) {
  // Display success message and unset the session variable
  // foreach ($_SESSION['error_messages'] as $error_message) {
  echo '<div class="error-message">' . $_SESSION['loginerror-message'] . '</div>';
  // }
  unset($_SESSION['loginerror-message']);
}

?>

<body>
  <h1>Login Page</h1>
  <form class="formLogin" style="max-width: 400px; width: 90%; margin: 0 auto;" method="POST" action="processHospital.php">
    <label for="email" class="labelRegistration ">Email:</label>
    <input class="inputRegistration" type="text" id="email" name="email_login" required>


    <label for="password" class="labelRegistration">Password:</label>
    <input class="inputRegistration" type="password" id="password" name="password_login" required>



    <div class="buttonContainer">
      <input class="inputRegistration" type="submit" name="login" value="Login">
    </div>
    <p style="text-align: center;">Don't have an account ? <a href="registration.php">Register here</a></p>
  </form>

</body>


<?php
include './footer.inc';
?>