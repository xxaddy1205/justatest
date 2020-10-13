<?php
require("config.php");

// Create database
$sql = "CREATE DATABASE urls";
if ($conn->query($sql) === TRUE) {
  //echo "Database created successfully";
} else {
  //echo "Error creating database: " . $conn->error;
}

//Create table with urls
$sql = "CREATE TABLE urls.shortener (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `long_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `short_code` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
 `hits` int(11) NOT NULL,
 `created` datetime NOT NULL,
 PRIMARY KEY (`id`)
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table created successfully";
} else {
  //echo "Error creating table: " . $conn->error;
}

?>
