<?php

// Include settings.php to access database connection settings
session_start();

if (isset($_POST['submit_patient_form'])) {
    patient_form_submission();
}

if (isset($_POST['submit_delete_record'])) {
    delete_specified_row();
}

if (isset($_POST['submit_change_status'])) {
    submit_change_status();
}

if (isset($_POST['register'])) {
    register();
}

if (isset($_POST['login'])) {
    login();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'log_out') {
    logout();
}





function patient_form_submission()
{
    session_start();
    require_once 'settings.php';

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the table already exists

        $query = "SHOW TABLES LIKE 'patient'";
        $result = mysqli_query($conn, $query);
        $tableExists = mysqli_num_rows($result) > 0;

        if (!$tableExists) {
            // Table does not exist, create it
            $sql = "CREATE TABLE patient (
            PatientNo int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            first_name varchar(20) DEFAULT NULL,
            last_name varchar(20) DEFAULT NULL,
            date_of_birth date DEFAULT NULL,
            gender enum('Male','Female','Other') DEFAULT NULL,
            address varchar(40) DEFAULT NULL,
            email varchar(50) DEFAULT NULL,
            phone varchar(12) DEFAULT NULL,
            disease varchar(255) DEFAULT NULL,
            description varchar(255) DEFAULT NULL,
            status enum('Admitted','Discharged') DEFAULT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";
        }

        if ($_POST['gender'] == 'male') {
            $gen = 'Male';
        } else if ($_POST['gender'] == 'female') {
            $gen = 'Female';
        } else {
            $gen = null;
        }

        // if (count($errors) === 0) {
        $PatientNo = mysqli_real_escape_string($conn, $_POST['PatientNo']);
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
        $gender = mysqli_real_escape_string($conn, $gen);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $disease = mysqli_real_escape_string($conn, $_POST['disease']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        $sql = "INSERT INTO eoi (PatientNo, first_name, last_name, email, date_of_birth, gender, address, phone, skills ,disease, description,  status) 
            VALUES ('$PatientNo', '$first_name', '$last_name', '$email', '$date_of_birth', '$gender', '$address', '$phone', '$disease' ,'$otherskills', $description ,'$status')";

        if (mysqli_query($conn, $sql)) {
            // Set session variable with success message
            $_SESSION['success_message'] = 'Patient data added successfully';
        } else {
            // Set session variable with success message
            $_SESSION['error_message'] = 'Error Occured,  Check whether data submitted or not';
        }

        header("Location: patient_form.php");
    }
}



function delete_specified_row()
{
    // Include settings.php to access database connection settings
    require_once 'settings.php';
    session_start();

    // Check if the form was submitted
    if (isset($_POST['reference'])) {

        // Get the EOInumber from the form input
        $reference = $_POST['reference'];

        // Construct the SQL query to delete the record based on the EOInumber
        $sql = "DELETE FROM eoi WHERE job_reference = '$reference'";

        // Execute the SQL query
        mysqli_query($conn, $sql);


        if (mysqli_query($conn, $sql)) {
            // Set session variable with success message
            $_SESSION['success_message'] = 'Record Deleted';
            header("Location: manage.php");
            exit();
        } else {
            // Set session variable with success message
            $_SESSION['error_message'] = 'Error Occured while deleting try again';
            header("Location: manage.php");
            exit();
        }

        // Redirect the user to another pag
    }
}


function submit_change_status()
{

    require_once 'settings.php';
    session_start();

    // Check if the form was submitted
    if (isset($_POST['reference']) && isset($_POST['change_status'])) {

        // Get the EOInumber from the form input
        $reference = $_POST['reference'];
        $status = $_POST['change_status'];

        // Construct the SQL query to delete the record based on the EOInumber
        $sql = "UPDATE eoi SET status = '$status' WHERE job_reference = '$reference'";

        // Execute the SQL query
        mysqli_query($conn, $sql);
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            // Set session variable with eror message
            $_SESSION['error_message'] = 'Error Occured while updating status';
        } else {
            // Set session variable with success message
            $_SESSION['success_message'] = 'Status Updated successfully';
        }

        // Redirect the user to another page
        header("Location: manage.php");
        exit();
    }
}

function register()
{

    require_once 'settings.php';
    session_start();

    // Check if the form was submitted
    $query = "SHOW TABLES LIKE 'registration'";
    $result = mysqli_query($conn, $query);
    $tableExists = mysqli_num_rows($result) > 0;

    if ($tableExists == false) {
        // Table does not exist, create it
        $sql = "CREATE TABLE registration (
            id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            fname varchar(20) DEFAULT NULL,
            lname varchar(20) DEFAULT NULL,
            email varchar(20) DEFAULT NULL,
            designation varchar(20) DEFAULT NULL,
            password VARCHAR(30) NOT NULL
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";

        mysqli_query($conn, $sql);
        $result = mysqli_query($conn, $sql);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email_register"];
        $designation = $_POST["designation"];
        $password = $_POST["password"];
        $confirmPassword = $_POST['confirm-password'];

        // Validate form data
        if ($password !== $confirmPassword) {
            $_SESSION['error_message'] = 'Passwords do not match. Please try again.';

            header('Location: registration.php');
            exit();
        }


        $sql = "INSERT INTO registration (fname , lname , email, designation , password)
                VALUES ('$fname', '$lname', '$email', '$designation' , '$password')";

        if (mysqli_query($conn, $sql)) {
            // Set session variable with success message
            mysqli_close($conn);
            $header('Location: login.php');
        } else {
            // Set session variable with success message
            $_SESSION['error_message'] = 'Error Occured while Register';
            header('Location: registration.php');
        }
    }
    

}

function login()
{

    require_once 'settings.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the submitted email and password
        $email = $_POST['email_login'];
        $password = $_POST['password_login'];

        // Construct a query to find the user with the specified email and password
        $sql = "SELECT * FROM registration WHERE email='$email' AND password='$password'";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if the query returned a row
        if (mysqli_num_rows($result) == 1) {

            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['email'] = $email;
            header('Location: index.php');
            exit();
        } else {
            // Authentication failed, display an error message
            $_SESSION['loginerror-message'] = 'Invalid Email or Password';
            header('Location: login.php');
        }

        mysqli_close($conn);
    }
}

function logout()
{
    session_start();
    session_unset();
    session_destroy();
}
