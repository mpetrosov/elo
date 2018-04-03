<?php
  include 'connect.php';
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $verb = $_SERVER['REQUEST_METHOD'];

  //controleer of bestaat
  if  ($verb == "GET") {
    if (isset($_GET['studentid']) && isset($_GET['lessonid'])) {
      $studentid = $_GET['studentid'];
      $lessonid = $_GET['lessonid'];
      $sql = "SELECT * FROM MadeLessons WHERE studentid = " . $studentid . " AND lessonid = " . $lessonid ;
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        echo "true";
      }
      else {
        echo "false";
      }
    }
  }

  //creeer nieuwe rij.
  if  ($verb == "POST") {
    if (isset($_GET['studentid']) && isset($_GET['lessonid'])) {
      $studentid = $_GET['studentid'];
      $lessonid = $_GET['lessonid'];
      $sql = "INSERT INTO MadeLessons (studentid, lessonid, score, finished) VALUES ($studentid, $lessonid, 0, false)";
      $result = $conn->query($sql);
    }
  }



?>
