
<?php
$id = $_GET['id'];

include('dbh.php');
    $sql = "SELECT * FROM messages WHERE $id = messages.id";
    $result = mysqli_query($conn, $sql);
      foreach ($result as $row) {
        echo $row['sender'] . "<hr>";
        echo $row['message'];
      }


?>
