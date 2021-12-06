<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ua92";

// Create connection to the db
$conn =  mysqli_connect($servername, $username, $password);

// Checks the connection to the db
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

$db_selected = mysqli_select_db($conn, $dbname);

if (!$db_selected){
    // echo "Couldn't select database";
}
?>