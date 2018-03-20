<?php
  $verb = $_SERVER['REQUEST_METHOD'];

  if  ($verb == "GET") {
    if (isset($_GET['studentid']) && isset($_GET['lessonid'])) {
      $studentid = $_GET['studentid'];
      $lessonid = $_GET['lessonid'];
      include 'connect.php';
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      else {
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
  }
  else {
    http_response_code(400);
  }
?>
