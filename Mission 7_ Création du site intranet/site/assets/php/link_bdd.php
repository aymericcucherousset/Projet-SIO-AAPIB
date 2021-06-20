<?php

/* Maria DB */

$servername = "localhost";
$username = "root";
$password = "";
$database = "mysql";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Test
// $req = mysqli_query($conn, "SELECT * from db");
// if($r = mysqli_fetch_array($req)){
//     var_dump($r);
// }
?>