<?php
   $dbServername = "localhost";
   $dbUsername = "root";
   $dbPassword = "Hostel@17";
   $dbName = "elokids";

   // Create connection
   $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

    }
