<?php
  $server = "127.0.0.1";
  $port = "3306";
  $username = "root";
  $password = "phpPHP";
  $database = "pookie";
  $conn = mysqli_connect($server, $username, $password, $database, $port);

  // Check if the connection was successful
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
?>
