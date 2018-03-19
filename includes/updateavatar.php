<?php

$avatar = $_GET['avatar'];
echo $avatar;
    include('dbh.php');

    $sql = "UPDATE students SET avatar='$avatar' WHERE st_id=8";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


    ?>
