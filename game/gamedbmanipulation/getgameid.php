<?php
  session_start();
  $verb = $_SERVER['REQUEST_METHOD'];
  if  ($verb == "GET") {
    if (isset($_SESSION['lessonid'])) {
      $lessonid = $_SESSION['lessonid'];
    }
    else {
      $lessonid = 0;
    }
    echo $lessonid;
  }
  else {
    http_response_code(400);
  }
?>
