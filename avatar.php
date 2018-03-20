
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elo Kids</title>
    <link href="https://fonts.googleapis.com/css?family=Chicle" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>

  <body class="avatarcontainer">
    <div class="container-fluid ">
    <div class="row">
      <div class="col-xs-1"><button onclick="window.location.href='userpage.php';">Home</button></div>
      <div class="col-xs-10 avatarhead"> Kies je avatar<hr> </div>
      <div class="col-xs-1"></div>
    </div>

      <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-2" onclick=getAvatar('avatars/a_owl.png');>
          <img class="avatarselect" src="avatars/a_owl.png">
        </div>
        <div class="col-md-2" name='avatar' onclick=getAvatar('avatars/a_kitty.png');>
          <img class="avatarselect" src="avatars/a_kitty.png">
        </div>
        <div class="col-md-2" name='avatar' onclick=getAvatar('avatars/a_dog.png');>
          <img class="avatarselect" src="avatars/a_dog.png">
        </div>
        <div class="col-md-2" name='avatar' onclick=getAvatar('avatars/a_cat.png');>
          <img class="avatarselect" src="avatars/a_cat.png">
        </div>
          <div class="col-md-2" >
        </div>

      </div>

      <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-2" onclick=getAvatar('avatars/a_tiger.png');>
          <img class="avatarselect" src="avatars/a_tiger.png">
        </div>
        <div class="col-md-2" name='avatar' onclick=getAvatar('avatars/a_crow.png');>
          <img class="avatarselect" src="avatars/a_crow.png">
        </div>
        <div class="col-md-2" name='avatar' onclick=getAvatar('avatars/a_bulldog.png');>
          <img class="avatarselect" src="avatars/a_bulldog.png">
        </div>
        <div class="col-md-2" name='avatar' onclick=getAvatar('avatars/a_flower.png');>
          <img class="avatarselect" src="avatars/a_flower.png">
        </div>
          <div class="col-md-2" >
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-2" id="owl" onclick="getAvatar('avatars/a_hawk.png');">
          <img class="avatarselect" src="avatars/a_hawk.png">
        </div>
        <div class="col-md-2" name='avatar' onclick=getAvatar('avatars/a_joystick.png');>
          <img class="avatarselect" src="avatars/a_joystick.png">
        </div>
        <div class="col-md-2" name='avatar' onclick=getAvatar('avatars/a_rabbit.png');>
          <img class="avatarselect" src="avatars/a_rabbit.png">
        </div>
        <div class="col-md-2" name='avatar' onclick=getAvatar('avatars/a_robot.png');>
          <img class="avatarselect" src="avatars/a_robot.png">
        </div>
          <div class="col-md-2" >
        </div>

      </div>
  </div>

  <br><br>

  <script>

  function getAvatar(link){
    var id = <?php echo $_SESSION['u_id']?>;

      var xhttp = new XMLHttpRequest();
      xhttp.open("POST", "includes/updateavatar.php?avatar=" + link + "&id=" + id, false);
      xhttp.send();


    window.location = "userpage.php";
    }

  </script>
  </body>

</html>
