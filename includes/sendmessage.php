<?php
$verb = $_SERVER['REQUEST_METHOD'];
if  ($verb == "POST") {

$idsend = $_POST['senderid'];
$id = $_POST['id'];
$message = $_POST['message'];
$sender = $_POST['sender'];

include 'dbh.php';

$sql = "INSERT INTO messages (st_id, message, sender, send_id) VALUES ('$id', '$message', '$sender', '$idsend');";

mysqli_query($conn, $sql);
header("Location: ../messages.php?succes");

exit();
}

else {
  $id = $_GET['id'];

  include 'dbh.php';

  $sql = "DELETE FROM messages
  WHERE id = $id";

  mysqli_query($conn, $sql);
  echo "Bericht verwijderd";

  exit();

}

?>
