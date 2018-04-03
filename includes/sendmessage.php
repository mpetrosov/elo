<?php

$idsend = $_POST['senderid'];
$id = $_POST['id'];
$message = $_POST['message'];
$sender = $_POST['sender'];

include 'dbh.php';

$sql = "INSERT INTO messages (st_id, message, sender, send_id) VALUES ('$id', '$message', '$sender', '$idsend');";

mysqli_query($conn, $sql);
header("Location: ../messages.php?");

exit();


?>
