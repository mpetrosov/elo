<?php
   $dbServername = "localhost";
<<<<<<< HEAD
   $dbUsername = "root";
   $dbPassword = "Hostel@17";
   $dbName = "elokids";
=======
   $dbUsername = "Edmaster";
   $dbPassword = "welkom";
   $dbName = "Spelgoed";
>>>>>>> meerkeuze toegevoegd

    // Create connection
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    // Check connection


    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

    }
