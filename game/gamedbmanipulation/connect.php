<?php
   $dbServername = "localhost";
<<<<<<< HEAD
   $dbUsername = "root";
   $dbPassword = "";
   $dbName = "spelgoed";
=======
   $dbUsername = "Edmaster";
   $dbPassword = "welkom";
   $dbName = "Spelgoed";
>>>>>>> meerdere kleine bugjes gefixed

    // Create connection
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

    }
