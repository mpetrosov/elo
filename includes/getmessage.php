<?php
include('dbh.php');


    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);
      foreach ($result as $row) {
        echo "<button onclick=sendMessage(" . $row['st_id'] . ")>" . $row['firstname'] . " " . $row['lastname'] . "</button> <br>";
      }
        ?>
