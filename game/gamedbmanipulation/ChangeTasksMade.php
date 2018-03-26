<?php
  include 'connect.php';
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $verb = $_SERVER['REQUEST_METHOD'];

  //zet de behaalde score in de database
  if  ($verb == "POST") {
    if (isset($_GET['taskid']) && isset($_GET['lessonid']) && isset($_GET['studentid']) && isset($_GET['score'])) {
      $taskid = $_GET['taskid'];
      $lessonid = $_GET['lessonid'];
      $studentid = $_GET['studentid'];
      $score = $_GET['score'];
      //verwijder eerst een eventueel eerder aangemaakte record zodat insert-query niet spaak loopt
      $sql = "DELETE FROM madetasks WHERE taskid = $taskid AND lessonid = $lessonid AND studentid = $studentid";
      $result = $conn->query($sql);
      $sql = "INSERT INTO madetasks (taskid,lessonid, studentid, score) VALUES ($taskid,$lessonid,$studentid, $score)";
      $result = $conn->query($sql);
      //werk de Lessonsmade tabel bij.
      $sql = "UPDATE MadeLessons (taskid,lessonid, studentid, score) VALUES ($taskid,$lessonid,$studentid, $score)";
      $result = $conn->query($sql);
    }
  }

  //haal de behaalde score uit de database
  if  ($verb == "GET") {
    if (isset($_GET['taskid']) && isset($_GET['lessonid']) && isset($_GET['studentid'])) {
      $taskid = $_GET['taskid'];
      $lessonid = $_GET['lessonid'];
      $studentid = $_GET['studentid'];
      $sql = "SELECT score FROM madetasks  WHERE taskid = " . $taskid;
      $sql.= " AND lessonid = " . $lessonid ." AND studentid = " . $studentid ;

      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $score   = $row["score"];
          echo $score;
        }
      }
      else {
        echo -1;
      }
    }
  }
?>
