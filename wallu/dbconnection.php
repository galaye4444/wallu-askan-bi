<?php
// Create connection
$con=mysqli_connect("localhost","root","","wallu");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Erreur recontrer lors de la connection avec la base de donnee MySQL: " . mysqli_connect_error();
  }
?>
