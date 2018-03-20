<?php

$verb = $_SERVER['REQUEST_METHOD'];

if  ($verb == "POST") {
  if (isset($_GET['id']) and isset($_GET['name']) and isset($_GET['path']) and isset($_GET['info'])) {
    $id   = $_GET['id'];
    $name = $_GET['name'];
    $path = $_GET['path'];
    $info = $_GET['info'];

    include 'connect.php';
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    else {
      $sql = "INSERT INTO tasks (id, name, path, taskinfo, themeid) VALUES ($id,'$name','$path', '$info', 1)";
      if ($conn->query($sql)===TRUE){
        echo "taak succesvol geplaatst";
      }
      else {
        echo $sql;
      }
    }
  }
  else {
    http_response_code(400);
  }
}

?>
