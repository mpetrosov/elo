<?php
  session_start();
  $verb = $_SERVER['REQUEST_METHOD'];
  if  ($verb == "POST") {
    if (isset($_GET['lessonid'])) {
      $lessonid = $_GET['lessonid'];
      $_SESSION['lessonid'] = $lessonid;
      echo $_SESSION['lessonid'];
    }
  }
