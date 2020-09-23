<?php

require "ConnectionSettings.php";

// Variables submited by user
$loginUser = $_POST["loginUser"];
$loginPass = $_POST["loginPass"];

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully <br><br>";

$sql = "SELECT username FROM users WHERE username = '" . $loginUser . "'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  //Tell user that name is already taken
  echo "Name is already taken";  

} else {
    echo "Creating User...";
    //Insert the user and password into the database
    $sql2 = "INSERT INTO users (username, password, level, coins) VALUES ('" . $loginUser . "' , '" . $loginPass . "',1,0)";

    if ($conn->query($sql2) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
      }

} 
$conn->close();
?>