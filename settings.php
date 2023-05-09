<?php
$servername = "localhost";
$username = "";   // add mysql username here to run
$password = "";   // add mysql password here to run
$dbname = "Hospital_CRUD";

$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>