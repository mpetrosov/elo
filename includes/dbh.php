<?php
   $dbServername = "localhost";
   $dbUsername = "root";
   $dbPassword = "";
   $dbName = "spelgoed";

   // Create connection
   $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
   // Check connection


    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

    }
