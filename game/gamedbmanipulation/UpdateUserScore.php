<?php
  include 'connect.php';
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $verb = $_SERVER['REQUEST_METHOD'];


  if ($verb == "POST") {
    if (isset($_GET['studentid'])) {
      $studentid = $_GET['studentid'];
      $sql = "SELECT Sum(Score) as SomScore FROM MadeLessons WHERE ";
      $sql .= "studentid = " . $studentid;
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $SomScore = $row["SomScore"];
          echo $SomScore;
          $sql = "UPDATE students SET score = " . $SomScore;
          $sql .= " WHERE st_id = " . $studentid;
          $result = $conn->query($sql);
          die();
        }
      }
    }
  }

?>
