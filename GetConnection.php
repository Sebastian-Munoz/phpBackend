<?php
<<<<<<< HEAD
=======

>>>>>>> dd98fa07313d79b01cc93a94d4221402cfd5f71c
require "ConnectionSettings.php";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
