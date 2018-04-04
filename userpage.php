<?php
include 'includes/dbh.php';
include 'includes/functions.php';
include 'includes/header.php';
?>
  <body  Onload = "DetermineFinishedLessons()">
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
    <button class="dropdown-item menudrop" type="button" onclick="location.href = 'stylechange.php'">Kleuren wijzigen</button>
    <button class="dropdown-item menudrop" type="button" onclick="location.href = 'messages.php'">
      <span class="glyphicon glyphicon-envelope"></span>Berichten
    </button>
  </div>
  </button>

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
            <button class="col-sm-12 menu" id="game1">Invullen</button>
            <button class="col-sm-12 menu" id="game2">Meerkeuze</button>
          </div>
        </div>

      <div class="col-sm-5 theme1" id="gametheme1" onclick= "startgame(1)">Wilde dieren
        <center><div id = "divLessonFinished1" class = "LessonFinished">V
        </div></center>
      </div>
      <div class="col-sm-5 theme2" id="gametheme2" onclick= "startgame(2)">Huisdieren
        <center><div id = "divLessonFinished2" class = "LessonFinished">V
        </div></center>
      </div>
      <div class="col-sm-5 theme3" id="gametheme3" onclick= "startgame(3)">Sporten
        <center><div id = "divLessonFinished3" class = "LessonFinished">V
        </div></center>
      </div>
      <div class="col-sm-5 theme4" id="gametheme4" onclick= "startgame(4)">Vervoermiddelen
        <center><div id = "divLessonFinished4" class = "LessonFinished">V
        </div></center>
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
    $('#gametheme1').attr("onclick","startgame(1)");
    $('#gametheme1').append("<center><div id = \"divLessonFinished1\" class = \"LessonFinished\">V</div></center>");

    $('#gametheme2').html('Huisdieren');
    $('#gametheme2').removeClass();
    $('#gametheme2').addClass('col-sm-5 theme2');
    $('#gametheme2').attr("onclick","startgame(2)");
    $('#gametheme2').append("<center><div id = \"divLessonFinished2\" class = \"LessonFinished\">V</div></center>");

    $('#gametheme3').html('Sporten');
    $('#gametheme3').removeClass();
    $('#gametheme3').addClass('col-sm-5 theme3');
    $('#gametheme3').attr("onclick","startgame(3)");
    $('#gametheme3').append("<center><div id = \"divLessonFinished3\" class = \"LessonFinished\">V</div></center>");

    $('#gametheme4').html('Vervoermiddelen');
    $('#gametheme4').removeClass();
    $('#gametheme4').addClass('col-sm-5 theme4');
    $('#gametheme4').attr("onclick","startgame(4)");
    $('#gametheme4').append("<center><div id = \"divLessonFinished4\" class = \"LessonFinished\">V</div></center>");
    DetermineFinishedLessons();
  });

  $('#game2').click(function() {
    $('#gametheme1').html('Thema 1');
    $('#gametheme1').removeClass();
    $('#gametheme1').addClass('col-sm-5 theme');
    $('#gametheme1').attr("onclick","");

    $('#gametheme2').html('Thema 2');
    $('#gametheme2').removeClass();
    $('#gametheme2').addClass('col-sm-5 theme');
    $('#gametheme2').attr("onclick","");

    $('#gametheme3').html('Thema 3');
    $('#gametheme3').removeClass();
    $('#gametheme3').addClass('col-sm-5 theme');
    $('#gametheme3').attr("onclick","");

    $('#gametheme4').html('Thema 4');
    $('#gametheme4').removeClass();
    $('#gametheme4').addClass('col-sm-5 theme');
    $('#gametheme4').attr("onclick","");
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


  function startgame(gamenr) {
    var xhttp = new XMLHttpRequest();
    var myURL = "includes/setGameSession.php?lessonid=" + gamenr;
    xhttp.open("POST", myURL, false);
    xhttp.send();
    window.location.href ='game/game.php';
  }
  //***********************************************************************************************
  function DetermineFinishedLessons() {
    var myURL;
    var xhttp;
    var LessonReady;


    for (var i = 1; i<=4 ; i++) {
      xhttp = new XMLHttpRequest();
      myURL = "includes/getFinishedLesson.php?lessonid=" + i;
      //var Gameid;
      xhttp.open("GET", myURL, false);
      xhttp.send();
      LessonReady = xhttp.responseText;
      var divLF = document.getElementById("divLessonFinished" + i);
      if (LessonReady == 1) {
        divLF.style.display = "block";
      }
      else {
        divLF.style.display = "none";
      }
    }
  }
</script>

</html>
