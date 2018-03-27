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

  if ($verb == "UPDATE") {
    if (isset($_GET['studentid']) && isset($_GET['lessonid'])) {
      $studentid = $_GET['studentid'];
      $lessonid = $_GET['lessonid'];
      $sql = "SELECT Count(*) as Numbertasks, Sum(Score) as SomScore FROM madetasks WHERE ";
      $sql .= "studentid = " . $studentid . " AND lessonid = " . $lessonid;
      $result = $conn->query($sql);
      if (!$result) {
        echo $sql;
        die("Something went wrong: " . $conn->connect_error);
      }

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $Numbertasks = $row["Numbertasks"];
          $SomScore = $row["SomScore"];
          $finished = false;
          if ($SomScore == $Numbertasks) {
            $finished = true;
            $datefinished = date("Y/m/d");
            $sql = "UPDATE MadeLessons SET score = " . $SomScore . ", finished = true , datefinished = " . "$datefinished ";
            $sql .= " WHERE studentid = " . $studentid . " AND lessonid = " . $lessonid;
            $result = $conn->query($sql);
          }
          else {
            $sql = "UPDATE MadeLessons SET score = " . $SomScore . ", finished = false";
            $sql .= " WHERE studentid = " . $studentid . " AND lessonid = " . $lessonid;
            $result = $conn->query($sql);
          }
          die();
        }
      }
    }
  }

?>
