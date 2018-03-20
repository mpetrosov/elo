<?php
  $verb = $_SERVER['REQUEST_METHOD'];

  if  ($verb == "GET") {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      include 'connect.php';

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      else {
        $sql = "SELECT name FROM student WHERE id = " . $id;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $name   = $row["name"];
            echo $name;
          }
        }
      }
    }
  }
  else {
    http_response_code(400);
  }
?>
