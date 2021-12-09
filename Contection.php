<?php
$servername = "localhost";
$username = "admin";
$password = "password";
$dbname = "ua92";

// Create connection to the database using the varibles
$conn =  mysqli_connect($servername, $username, $password);
// Checks the connection to the data base
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
$db_selected = mysqli_select_db($conn, $dbname);
if (!$db_selected){
    // echo "Couldn't select database";
}
?>