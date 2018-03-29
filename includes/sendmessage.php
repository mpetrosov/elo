<?php

$id = $_POST['id'];
$message = $_POST['message'];
$sender = $_POST['sender'];

// $id = 8;
// $message = "test";

include 'dbh.php';

$sql = "INSERT INTO messages (st_id, message, sender) VALUES ('$id', '$message', '$sender');";

mysqli_query($conn, $sql);

exit();

?>
