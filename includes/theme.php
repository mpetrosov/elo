<?php
$taskid = $_POST['taskid'];
$lessonid = $_POST['lessonid'];
$name = $_POST['name'];
$path = $_POST['path'];
$taskinfo = $_POST['taskinfo'];

$id = $_POST['id'];
$namelesson = $_POST['namelesson'];
$gameid = $_POST['gameid'];
$opdracht = $_POST['opdracht'];

if (isset($taskid)) {

include 'dbh.php';

$sql = "INSERT INTO tasks (taskid, lessonid, name, path, taskinfo) VALUES ('$taskid', '$lessonid', '$name', '$path', '$taskinfo')";

mysqli_query($conn, $sql);



header("Location: ../themaform.php?succes");

exit();
}


if (isset($id)) {
include 'dbh.php';

$sql = "INSERT INTO lesson (id, name, gameid, Opdracht) VALUES ('$id', '$namelesson', '$gameid', '$opdracht')";
mysqli_query($conn, $sql);

header("Location: ../themaform.php?succes");

exit();

}

