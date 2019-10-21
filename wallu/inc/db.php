<?php
// Create connection
$con=mysqli_connect("localhost","root","","SenHopital");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL BataBase: " . mysqli_connect_error();
  }
?>