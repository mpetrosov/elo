<?php
  $verb = $_SERVER['REQUEST_METHOD'];

  if  ($verb == "GET") {
    if (isset($_GET['lessonid'])) {
      $lessonid = $_GET['lessonid'];
      include 'connect.php';
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      else {
        $sql = "SELECT count(*) as numbertasks FROM tasks WHERE lessonid= " . $lessonid;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $numbertasks   = $row["numbertasks"];
            echo $numbertasks;
            die();
          }
        }
      }
    }
  }
  else {
    http_response_code(400);
  }

