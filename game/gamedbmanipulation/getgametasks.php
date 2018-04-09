<?php
  $verb = $_SERVER['REQUEST_METHOD'];

  if  ($verb == "GET") {
    if (isset($_GET['taskid']) && isset($_GET['lessonid'])) {
      $taskid = $_GET['taskid'];
      $lessonid = $_GET['lessonid'];
      include 'connect.php';
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      else {
        $sql = "SELECT * FROM tasks WHERE taskid = " . $taskid . " AND lessonid= " . $lessonid;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $name   = $row["name"];
            $path = $row["path"];
            $taskinfo = $row["taskinfo"];
            echo $name . ";" . $path . ";" . $taskinfo;
          }
        }
      }
    }
  }
  else {
    http_response_code(400);
  }


