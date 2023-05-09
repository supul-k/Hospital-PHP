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
        <div style="display: grid; justify-content: space-evenly;">
            <div style="max-width: 100%; ">
                <div style=" padding-left: 20px; padding-top: 20px">
                    <h3 style="font-family: Arial; color: #333; margin: 0;">
                        Change the status of the patient
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
                            <label for="firstname">Patient Number</label><span id="fnameError" class="error"></span>
                            <input type="text" id="PatientNo" name="PatientNo" placeholder="Patient Number" maxlength="30" size="30">
                        </div>
                    </div>

                    <div style="padding: 10px;">
                        <label for="change_status">Status of the Patient:</label>
                        <select id="change_status" name="change_status_hos">
                            <option value="select status" selected disabled>select status</option>
                            <option value="discharged">Discharged</option>
                            <option value="admitted">Admitted</option>
                        </select>
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
            <th>Patient ID</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>date_of_birth</th>
            <th>gender</th>
            <th>Address</th>
            <th>email</th>
            <th>phone</th>
            <th>disease</th>
            <th>description</th>
            <th>status</th>
        </tr>
        <?php


        $sql = 'SELECT * FROM patient';
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die('Query failed: ' . mysqli_error($conn));
        }


        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['PatientNo'] . '</td>';
            echo '<td>' . $row['first_name'] . '</td>';
            echo '<td>' . $row['last_name'] . '</td>';
            echo '<td>' . $row['date_of_birth'] . '</td>';
            echo '<td>' . $row['gender'] . '</td>';
            echo '<td>' . $row['address'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['phone'] . '</td>';
            echo '<td>' . $row['disease'] . '</td>';
            echo '<td>' . $row['description'] . '</td>';
            echo '<td>' . $row['status'] . '</td>';
            echo '</tr>';
        }

        // Close the database connection
        mysqli_close($conn);

        ?>

    </table>

</body>

<?php
include './footer.inc';
?>