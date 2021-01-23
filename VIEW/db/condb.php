<?php
$servername = "localhost";
$username = "sharker";
$password = "P@ssw0rd1234";
$dbname = "IPOST2";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}  
?>