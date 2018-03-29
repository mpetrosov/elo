<?php
  session_start();
  $verb = $_SERVER['REQUEST_METHOD'];

  if  ($verb == "GET") {
    $id = $_SESSION['u_id'];
    $name = $_SESSION['u_first'];
    echo $id . ";" . $name;
  }
  else {
    http_response_code(400);
  }
?>
