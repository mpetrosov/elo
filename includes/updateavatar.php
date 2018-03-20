<?php
$id = $_GET['id'];
$avatar = $_GET['avatar'];
    include('dbh.php');

    $sql = "UPDATE students SET avatar='$avatar' WHERE st_id=$id";

if ($conn->query($sql) === TRUE) {

} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

    ?>
