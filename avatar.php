<?php
include 'includes/dbh.php';
include 'includes/functions.php';
include 'includes/logout.inc.php';
include 'includes/header.php';
?>


  <body>
    <div class="container">
    <div class="row">
      <div class="col-xs-12"> Kies je avatar<hr> </div>
    </div>

      <div class="row">

        <div class="col-md-2">
        </div>
        <div class="col-md-2" name='avatar' onclick=getAvatar('avatars/a_owl.png');>
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



  </div>

  <div id="main2"></div>
  <br><br>

  <script>

  function getAvatar(link){
      var xhttp = new XMLHttpRequest();
      xhttp.open("POST", "includes/updateavatar.php?avatar=" + link, false);
      xhttp.send();

      document.getElementById("main2").innerHTML = "<br>" + xhttp.responseText;

    }

  </script>
  </body>

</html>
