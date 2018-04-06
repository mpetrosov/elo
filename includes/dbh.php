<?php
   $dbServername = "localhost";
   $dbUsername = "Edmaster";
   $dbPassword = "welkom";
   $dbName = "Spelgoed";

   // Create connection
   $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
   // Check connection


    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

    }
