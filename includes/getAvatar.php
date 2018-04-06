<?php

$id = $_GET['id'];

include('dbh.php');

$sql = "SELECT avatar FROM students WHERE $id = st_id";
$result = mysqli_query($conn, $sql);
  foreach ($result as $row) {
    echo $row['avatar'];
}
?>
