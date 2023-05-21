<?php
$servername = "localhost";
$username = "root";   // add mysql username here to run
$password = "root@15161";   // add mysql password here to run
$dbname = "Hospital_CRUD";

$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>