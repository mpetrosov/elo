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
      <div class="col-sm-8 usertop">
        <div class="row">
        <div class="col-xs-8 welcome">Hallo <?=$student['firstname']?>

        </div>
        <div class="col-xs-4"><img class="avatar" src=<?=$student['avatar']?>></div>
        </div>
      </div>

      <div class="col-sm-4 usertop"><div class="profile">
        <div class="row">
          <div class="col-xs-9"><div class="head">Profiel:</div></div>
          <div class="col-xs-3"><div class="btn-group">
  <button type="button" class="btn btn-secondary dropdown-toggle dropbutton glyphicon glyphicon-menu-hamburger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  </button>
  <div class="dropdown-menu dropdown-menu-right menuright">
    <button class="dropdown-item menudrop" type="button" onclick="location.href ='edit.php?id=<?php echo $student['st_id']?>';">Profiel wijzigen</button>
    <button class="dropdown-item menudrop" type="button" onclick="location.href = 'avatar.php'">Avatar wijzigen</button>
    <button class="dropdown-item menudrop" type="button" onclick="location.href = 'stylechange.php'">Style wijzigen</button>

  </div>
</div>
</div>

</div>

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
        <br><hr>
        <div class='points'>
        <?=$student['score']?>
        punten</div>

      </div>

    </div>
    <?php endforeach;?>
    </div>
    <div>
    </div>

    <div class="row">
        <div class="col-sm-2 mainmenu">Spellen<br><br>
          <div class="row">
            <button class="col-sm-12 menu" id="game1">Schrijven</button>
            <button class="col-sm-12 menu" id="game2">Spel 2</button>
            <button class="col-sm-12 menu" id="game3">Spel 3</button>
          </div>
        </div>

      <div class="col-sm-5 theme1" id="gametheme1" onclick="window.location.href ='game/game2.php';">Wilde dieren
      </div>
      <div class="col-sm-5 theme2" id="gametheme2" onclick="window.location.href ='game/game.php';"> Huisdieren
      </div>
      <div class="col-sm-5 theme3" id="gametheme3">Bloemen
      </div>
      <div class="col-sm-5 theme4" id="gametheme4">Vogels
      </div>

    </div>

  </div>
  <br><br>
  </body>
  <script>

  $('#game1').click(function() {
    $('#gametheme1').html('Wilde dieren');
    $('#gametheme1').removeClass();
    $('#gametheme1').addClass('col-sm-5 theme1');
    $('#gametheme1').attr("onclick","window.location.href='game/game2.php'");
    $('#gametheme2').html('Huisdieren');
    $('#gametheme2').removeClass();
    $('#gametheme2').addClass('col-sm-5 theme2');
    $('#gametheme2').attr("onclick","window.location.href='game/game.php'");
    $('#gametheme3').html('Bloemen');
    $('#gametheme3').removeClass();
    $('#gametheme3').addClass('col-sm-5 theme3');
    $('#gametheme4').html('Vogels');
    $('#gametheme4').removeClass();
    $('#gametheme4').addClass('col-sm-5 theme4');
  });

  $('#game2').click(function() {
    $('#gametheme1').html('Thema 1');
    $('#gametheme1').removeClass();
    $('#gametheme1').addClass('col-sm-5 theme');
    $('#gametheme1').attr("onclick","");
    $('#gametheme2').html('Thema 2');
    $('#gametheme2').removeClass();
    $('#gametheme2').addClass('col-sm-5 theme');
    $('#gametheme3').html('Thema 3');
    $('#gametheme3').removeClass();
    $('#gametheme3').addClass('col-sm-5 theme');
    $('#gametheme4').html('Thema 4');
    $('#gametheme4').removeClass();
    $('#gametheme4').addClass('col-sm-5 theme');
  });

  $('#game3').click(function() {
    $('#gametheme1').html('Thema 1');
    $('#gametheme1').removeClass();
    $('#gametheme1').addClass('col-sm-5 theme');
    $('#gametheme1').attr("onclick","");
    $('#gametheme2').html('Thema 2');
    $('#gametheme2').removeClass();
    $('#gametheme2').addClass('col-sm-5 theme');
    $('#gametheme3').html('Thema 3');
    $('#gametheme3').removeClass();
    $('#gametheme3').addClass('col-sm-5 theme');
    $('#gametheme4').html('Thema 4');
    $('#gametheme4').removeClass();
    $('#gametheme4').addClass('col-sm-5 theme');
  });

  $().ready(function() {
      $('.welcome, .usertop, .mainmenu').css({
          'background-color': '#' + '<?=$student['color']?>',
      })

      $('.menu, .points, .dropbutton, .menudrop').css({
          'background-color': '#' + '<?=$student['colorsec']?>',
      })

      $('.menu, .points, .head').css({
          'color': '#' + '<?=$student['fontcolor']?>',
      })

      ;
  });



</script>

</html>
