<?php

$id = $_POST['id'];
$message = $_POST['message'];

// $id = 8;
// $message = "test";

include 'dbh.php';

$sql = "INSERT INTO messages (st_id, message) VALUES ('$id', '$message');";

mysqli_query($conn, $sql);

exit();

?>
