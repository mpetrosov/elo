<?php
   $dbServername = "localhost";
   $dbUsername = "jjohanj_nl_spelgoed";
   $dbPassword = "Phpjohan1";
   $dbName = "jjohanj_nl_spelgoed";

   // Create connection
   $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

    }
