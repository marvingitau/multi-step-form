<?php
$servername = "localhost";
$username = "roo";
$password = "";
$database = "ddl";

// Create connection
$link = new mysqli($servername, $username, $password,$database);

// Check connection
if ($link->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?> 