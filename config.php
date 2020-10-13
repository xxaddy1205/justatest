<?php

$host = "localhost:3307";
$username = "root";
$pass = "root";

//Database connection
$conn = new mysqli($host, $username, $pass);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

 ?>
