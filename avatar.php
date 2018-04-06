<?php
include 'includes/dbh.php';
include 'includes/functions.php';
include 'includes/header.php';
?>

</head>

  <body>
    <?php
      $students = get_Students();
    ?>
    <?php foreach ($students as $student):?>
    <?php endforeach;?>
    <div class="container-fluid avatarcontainer ">
    <div class="row">
      <div class="col-xs-1 back"></div>
      <div class="col-xs-10 avatarhead"> Kies je avatar<hr> </div>
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


  $().ready(function() {
        $('.avatarcontainer').css({
            'background-color': '#' + '<?=$student['color']?>',
        })
        
        $('#logoutbutton').css({
            'background-color': '#' + '<?=$student['colorsec']?>',
        })

        ;
    });


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
