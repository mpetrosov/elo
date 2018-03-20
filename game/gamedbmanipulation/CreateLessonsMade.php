<?php
  $verb = $_SERVER['REQUEST_METHOD'];

  if  ($verb == "POST") {
    if (isset($_GET['studentid']) && isset($_GET['lessonid'])) {
      $studentid = $_GET['studentid'];
      $lessonid = $_GET['lessonid'];
      include 'connect.php';
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      else {
        $sql = "INSERT INTO MadeLessons (studentid, lessonid, score, finished) VALUES ($studentid, $lessonid, 0, false)";
        $result = $conn->query($sql);
      }
    }
  }
  else {
    http_response_code(400);
  }
?>
