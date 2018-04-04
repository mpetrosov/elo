<?php
  include ('dbh.php');

  $verb = $_SERVER['REQUEST_METHOD'];

  if ($verb == "GET") {
    if (isset($_GET['lessonid'])) {
      session_start();
      $studentid = $_SESSION['u_id'];
      $lessonid = $_GET['lessonid'];
      $sql = "SELECT finished FROM MadeLessons WHERE studentid = " . $studentid . " AND lessonid = " . $lessonid;
      $result = mysqli_query($conn, $sql); //$conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $finished   = $row["finished"];
          echo $finished;
        }
      }
    }
  }
?>
