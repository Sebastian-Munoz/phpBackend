<?php

require "ConnectionSettings.php";

// Variables submited by user
$loginUser = $_POST["registerUsername"];
$loginPass = $_POST["registerPassword"];
$loginNombre = $_POST["registerNombre"];
$loginApellido = $_POST["registerApellido"];
$loginEdad = $_POST["registerEdad"];
$loginGenero = $_POST["registerGenero"];
$loginEmail = $_POST["registerEmail"];
$loginTelefono = $_POST["registerTelefono"];

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully <br><br>";

$sql = "SELECT username FROM users WHERE username = '" . $loginUser . "'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  //Tell user that name is already taken
  echo "Nombre de usuario ocupado, intente con otro nombre de usuario.";  

} else {
    echo "Creating User...";
    //Insert data into the database
    $sql2 = "INSERT INTO users (username, password, nombre, apellidos, edad, genero, email, telefono)
                    VALUES ('" . $loginUser . "' , '" . $loginPass . "', '" . $loginNombre . "', '" . $loginApellido . "', '" . $loginEdad . "', '" . $loginGenero . "', '" . $loginEmail . "', '" . $loginTelefono . "')";

    if ($conn->query($sql2) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
      }

} 
$conn->close();
?>