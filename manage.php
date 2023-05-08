<?php
include './menu.inc';
require_once 'settings.php';
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}
?>

<body>
    <div style="max-width: 100%; display: grid; justify-content: space-evenly;">
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
        <div style="max-width: 100%; ">
            <div style=" padding-left: 20px; padding-top: 20px">
                <h3 style="font-family: Arial; color: #333; margin: 0;">
                    Filter Data by First Name, Last Name, or Both
                </h3>
            </div>
            <form method="post" style="padding: 10px; display: flex;">
                <div id="firstname" style="padding: 10px;">
                    <label for="firstname">First Name</label><span id="fnameError" class="error"></span>
                    <input type="text" id="firstname" name="firstname" placeholder="First name" maxlength="30" size="30">
                </div>

                <div id="lastname" style="padding: 10px;">
                    <label for="lastname">Last Name</label><span id="lnameError" class="error"></span>
                    <input type="text" id="lastname" name="lastname" placeholder="Last name" maxlength="25" size="25">
                </div>
                <div id="buttons" style="padding-top: 30px;">
                    <div style="text-align: center; padding: 10px; color: black;">
                        <button type="submit" value="search_record" id="search_record" name="search_record">Search</button>
                    </div>
                </div>
                <div id="buttons" style="padding-top: 30px;">
                    <div style="text-align: center; padding: 10px; ">
                        <button type="submit" value="show_all" id="show_all" name="show_all">show all</button>
                    </div>
                </div>
            </form>
        </div>
        <div style="display: grid; justify-content: space-evenly;">
            <div style="max-width: 100%; ">
                <div style=" padding-left: 20px; padding-top: 20px">
                    <h3 style="font-family: Arial; color: #333; margin: 0;">
                        Change the status delete row
                    </h3>
                </div>
                <form method="post" style="display: flex; padding: 10px;" action="processHospital.php" id="change_status_form" novalidate="novalidate">
                    <div style="padding: 10px;">
                        <!-- <label for="reference">Reference Number:</label> -->
                        <!-- <select id="reference" name="reference">
                            <option value="select reference number" selected disabled>select reference number</option>
                            <option value="011AA">Ref: 011AA</option>
                            <option value="012BB">Ref: 012BB</option>
                            <option value="013CC">Ref: 013CC</option>
                            <option value="014DD">Ref: 014DD</option>
                        </select> -->
                        <div id="firstname" style="padding: 10px;">
                            <label for="firstname">Reference Number</label><span id="fnameError" class="error"></span>
                            <input type="text" id="reference" name="reference" placeholder="Reference Number" maxlength="30" size="30">
                        </div>
                    </div>

                    <div style="padding: 10px;">
                        <label for="change_status">Change Status of the application:</label>
                        <select id="change_status" name="change_status">
                            <option value="select status" selected disabled>select status</option>
                            <option value="New">New</option>
                            <option value="Current">Current</option>
                            <option value="Final">Final</option>
                        </select>
                    </div>

                    <div id="buttons" style="padding-top: 30px;">
                        <div style="text-align: center; padding: 10px;">
                            <button type="submit" value="delete_record" id="reference_btn" name="submit_delete_record">Delete</button>
                        </div>
                    </div>
                    <div id="buttons" style="padding-top: 30px;">
                        <div style="text-align: center; padding: 10px;">
                            <button type="submit" value="change_status" id="change_status_btn" name="submit_change_status">Change Status</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table id="table" style="max-width: 80%; margin: 0 auto; padding: 20px">
        <tr>
            <th>EOInumber</th>
            <th>job_reference</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>date_of_birth</th>
            <th>gender</th>
            <th>street_address</th>
            <th>suburb_town</th>
            <th>state</th>
            <th>postcode</th>
            <th>email</th>
            <th>phone</th>
            <th>skills</th>
            <th>other_skills</th>
            <th>status</th>
        </tr>
        <?php

        if (isset($_POST['search_record'])) {
            if (!empty($_POST['firstname']) && !empty($_POST['lastname'])) {

                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];

                $sql = "SELECT * FROM eoi WHERE first_name = '$firstname' AND last_name = '$lastname' ";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    $_SESSION['error_message'] = 'Please enter first name and lastname before click search button';
                }
            } elseif (!empty($_POST['firstname'])) {

                $firstname = $_POST['firstname'];

                $sql = "SELECT * FROM eoi WHERE first_name = '$firstname' ";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    $_SESSION['error_message'] = 'Please enter first name before click search button';
                }
            } elseif (!empty($_POST['lastname'])) {

                $lastname = $_POST['lastname'];

                $sql = "SELECT * FROM eoi WHERE last_name = '$lastname' ";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    $_SESSION['error_message'] = 'Please enter last name before click search button';
                }
            } else {
                if (!$result) {
                    $_SESSION['error_message'] = 'Please enter data into at least one of the fields.';
                }
            }
        } elseif (isset($_POST['show_all'])) {

            $sql = 'SELECT * FROM eoi';
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                die('Query failed: ' . mysqli_error($conn));
            }
        } else {
            $sql = 'SELECT * FROM eoi';
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                die('Query failed: ' . mysqli_error($conn));
            }
        }

        // if (isset($_POST['show_all'])) {
        //     $sql = "SELECT * FROM eoi";
        //     $result = mysqli_query($conn, $sql);

        // }

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['EOInumber'] . '</td>';
            echo '<td>' . $row['job_reference'] . '</td>';
            echo '<td>' . $row['first_name'] . '</td>';
            echo '<td>' . $row['last_name'] . '</td>';
            echo '<td>' . $row['date_of_birth'] . '</td>';
            echo '<td>' . $row['gender'] . '</td>';
            echo '<td>' . $row['street_address'] . '</td>';
            echo '<td>' . $row['suburb_town'] . '</td>';
            echo '<td>' . $row['state'] . '</td>';
            echo '<td>' . $row['postcode'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['phone'] . '</td>';
            echo '<td>' . $row['skills'] . '</td>';
            echo '<td>' . $row['other_skills'] . '</td>';
            echo '<td>' . $row['status'] . '</td>';
            echo '</tr>';
        }

        // Close the database connection
        mysqli_close($conn);

        ?>

    </table>

</body>

<?php
include '/var/www/html/assign2/footer.inc';
?>