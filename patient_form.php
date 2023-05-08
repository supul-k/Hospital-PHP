<?php
include './menu.inc';

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}
?>

<body>
    <article>
        <div>
            <h1 id="heading1">Jobs Application</h1>
            <?php
            if (isset($_SESSION['success_message'])) {
                // Display success message and unset the session variable
                echo '<div class="success-message" style="padding: 10px;">' . $_SESSION['success_message'] . '</div>';
                unset($_SESSION['success_message']);
            }

            if (isset($_SESSION['error_message'])) {
                // Display success message and unset the session variable
                // foreach ($_SESSION['error_messages'] as $error_message) {
                echo '<div class="error-message" style="padding: 10px;">' . $_SESSION['error_message'] . '</div>';
                // }
                unset($_SESSION['error_message']);
            }
            ?>


            <p>You have <span id="timer">10:00</span> to complete the application.</p>

            <div class="container">
                <form method="POST" id="regform" action="processHospital.php" novalidate="novalidate">
                    <!-- <div id="refNumber_div">
                        <label for="job-ref">Job Reference Number:</label>
                        <span id="refError" class="error"></span>
                        <input type="text" id="PatientNo" name="PatientNo" value="" placeholder="reference number" readonly required>
                    </div> -->
                    <!-- <label for="refno">Job Reference No</label> <input type="text" id="refno" name="jobreferenceno" minlength="5" maxlength="5" size="5"  placeholder="Reference Number">  -->
                    <div id="firstname_div">
                        <label for="firstname">First Name</label>
                        <span id="fnameError" class="error"></span>
                        <input type="text" id="first_name" name="first_name" placeholder="First name" maxlength="20" size="20" required="required">
                    </div>

                    <div id="lastname_div">
                        <label for="lastname">Last Name</label>
                        <span id="lnameError" class="error"></span>
                        <input type="text" id="last_name" name="lastnlast_nameame" placeholder="Last name" maxlength="20" size="20" required="required">
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <span id="emailError" class="error"></span>
                        <input type="email" id="email" name="email" maxlength="40" size="40" placeholder="Your Email address" required="required">

                    </div>

                    <div id="dateofbirth_div">
                        <label for="dateofbirth">Date of Birth</label>
                        <span id="bodError" class="error"></span>
                        <input type="date" id="date_of_birth" name="date_of_birth" value="2023-01-01" required="required">
                    </div>

                    <fieldset>
                        <legend>Gender</legend>
                        <label><input type="radio" id="male" name="gender" value="Male" required="">Male</label>
                        <label><input type="radio" id="female" name="gender" value="Female">Female</label> <br>
                        <span id="genderError" class="error"></span>
                    </fieldset>

                    <fieldset>
                        <legend>Address</legend>
                        <div class="control">
                            <label for="address">address</label>
                            <span id="addressError" class="error"></span>
                            <input id="address" name="address" type="text" maxlength="50" size="50" required="required" placeholder="Street address">

                        </div>
                    </fieldset>

                    <div>
                        <label for="pnumber">Phone Number</label>
                        <span id="phoneError" class="error"></span>
                        <input type="text" id="phone" name="phone" pattern="^[0-9]*$" placeholder="Your Phone Number" maxlength="10" size="10" required="required"></p>
                    </div>

                    <div id="disease_div">
                        <label for="disease"> Disease </label>
                        <span id="diseaseError" class="error"></span>
                        <input type="text" id="disease" name="disease" placeholder="Disease" maxlength="20" size="20" required="required">
                    </div>

                    <fieldset>
                        <label for="otherskill">Description about patient</label> <br>
                        <span id="otherskillError" class="error"></span>
                        <textarea id="description" name="description" placeholder="Write here your other skills" style="height:200px"></textarea>

                    </fieldset>
                    <div class="applyButtonContainer">
                        <input class="submitButton" type="button" onclick="validate()" value="submit" id="submit" name="submit_patient_form" style="background-color:#3498DB;
  color: white;
  padding: 14px 30px;
  border: none;
  border-radius: 6px;
  cursor: pointer;">
                        <input class="resetFormButton" type="reset" value="Reset Form">
                    </div>

                </form>
            </div>
        </div>
    </article>
</body>



<?php
include './footer.inc';
?>