<?php
include 'includes/dbh.php';
include 'includes/functions.php';
include 'includes/header.php';
?>


  <body>
    <div class="container">
  <?php
    $students = get_Students();
  ?>

  <?php foreach ($students as $student):?>

    <div class="row">
      <div class= "col-xs-12">
        <?php
        include_once 'includes/header.php'
        ?>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-8 usertop">
        <div class="row">
        <div class="col-xs-8 welcome">Hallo <?=$student['firstname']?>

        </div>
        <div class="col-xs-4"><img class="avatar" src=<?=$student['avatar']?>> <a id="avatarlink" href="avatar.php">wijzig avatar</a></div>
        </div>
      </div>

      <div class="col-sm-4 usertop">
        <div class="profile"> <div class="head">Profiel:</div>
        <?php
        $dateOfBirth =  $student['birthday'];
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        $student['birthday']= $diff->format('%y');
        ?>
        <p><?=$student['firstname']?> <?=$student['lastname']?></p>
        Leeftijd: <?=$student['birthday']?>
        <br>
        groep: <?=$student['class_id']?>
        </div> <a href="edit.php?id=<?php echo $student['st_id']?>">Profile wijzigen</a><br><hr>
        <div class='points'>
        <?=$student['score']?>
        punten</div>
       
      </div>

    </div>
    <?php endforeach;?>
    <div class="row">
        <div class="col-sm-2 mainmenu">Spellen<br><br>
          <div class="row">
            <button class="col-sm-12 menu">Schrijven</button>
            <button class="col-sm-12 menu">Spel 2</button>
            <button class="col-sm-12 menu">Spel 3</button>
          </div>
        </div>

      <div class="col-sm-5 theme1" onclick="window.location.href = 'game.php';">Wilde dieren
      </div>
      <div class="col-sm-5 theme2" >Huisdieren
      </div>
      <div class="col-sm-5 theme3">Bloemen
      </div>
      <div class="col-sm-5 theme4">Vogels
      </div>

    </div>

  </div>
  <br><br>
  </body>

</html>
