<?php
$id = $_GET['id'];
$color = $_GET['color'];
$colorsec = $_GET['colorsec'];
$font = $_GET['font'];
$body = $_GET['body'];

if (isset($color)) {

include('dbh.php');

    $sql = "UPDATE students SET color='$color' WHERE st_id=$id";

if ($conn->query($sql) === TRUE) {

} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

}

if (isset($colorsec)) {

    include('dbh.php');

    $sql = "UPDATE students SET colorsec='$colorsec' WHERE st_id=$id";

if ($conn->query($sql) === TRUE) {

} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

}

if (isset($font)) {

    include('dbh.php');

    $sql = "UPDATE students SET fontcolor='$font' WHERE st_id=$id";

if ($conn->query($sql) === TRUE) {

} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

}
