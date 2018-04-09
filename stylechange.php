
<?php
include 'includes/dbh.php';
include 'includes/functions.php';
include 'includes/header.php';
?>

</head>

  <body>
    <div class="container-fluid ">

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4 colors">
        <div class="row">
        <div class="col-xs-12">Menu kleur</div>
        </div>
        <div class="row">
        <div class="col-xs-1 style" style="background-color: #800000;" name="color" onclick=getColor('800000');>
        </div>
        <div class="col-xs-1 style" style="background-color: #bd9a79;" name="color" onclick=getColor('bd9a79');>
        </div>
        <div class="col-xs-1 style" style="background-color: #559f84;" name="color" onclick=getColor('559f84');>
        </div>
        <div class="col-xs-1 style" style="background-color: #4682B4;" name="color" onclick=getColor('4682B4');>
        </div>
      </div>
        <div class="row">


      <div class="col-xs-1 style" style="background-color: #600080;" name="color" onclick=getColor('600080');>
      </div>
      <div class="col-xs-1 style" style="background-color: #66d066;" name="color" onclick=getColor('66d066');>
      </div>
      <div class="col-xs-1 style" style="background-color: #b8377a;" name="color" onclick=getColor('d066d0');>
      </div>
      <div class="col-xs-1 style" style="background-color:  #ffc400;" name="color" onclick=getColor('ffc400');>
      </div>

    </div>

      <div class="row">
        <div class="col-xs-12">Knoppen kleur</div>
      </div>
      <div class="row">
        <div class="col-xs-1 style" style="background-color: #800000;" name="color" onclick=getColorSec('800000');>
        </div>
        <div class="col-xs-1 style" style="background-color: #bd9a79;" name="color" onclick=getColorSec('bd9a79');>
        </div>
        <div class="col-xs-1 style" style="background-color: #559f84;" name="color" onclick=getColorSec('559f84');>
        </div>
        <div class="col-xs-1 style" style="background-color: #4682B4;" name="color" onclick=getColorSec('4682B4');>
        </div>
      </div>
        <div class="row">

      <div class="col-xs-1 style" style="background-color: #600080;" name="color" onclick=getColorSec('600080');>
      </div>
      <div class="col-xs-1 style" style="background-color: #66d066;" name="color" onclick=getColorSec('66d066');>
      </div>
      <div class="col-xs-1 style" style="background-color: #b8377a;" name="color" onclick=getColorSec('d066d0');>
      </div>
      <div class="col-xs-1 style" style="background-color:  #ffc400;" name="color" onclick=getColorSec('ffc400');>
  </div>

    </div>

    <div class="row">
      <div class="col-xs-12">Font kleur</div>
      <div class="col-xs-2 style" style="background-color: #343434;" name="color" onclick=getFont('343434');>
      </div>
      <div class="col-xs-2 style" style="background-color: #ffffff;" name="color" onclick=getFont('ffffff');>
      </div>
      <div class="col-xs-2 style" style="background-color: #093145;" name="color" onclick=getFont('093145');>
      </div>
      <div class="col-xs-2 style" style="background-color: #800000;" name="color" onclick=getFont('800000');>
      </div>
    </div>


    </div>
    <div class="col-md-6 example"><div>
      <?php
        $students = getStudents();
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
        <button class="dropdown-item menudrop" type="button">Profiel wijzigen</button>
        <button class="dropdown-item menudrop" type="button">Avatar wijzigen</button>
        <button class="dropdown-item menudrop" type="button">Kleuren wijzigen</button>

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
                <button class="col-sm-12 menu" id="game1">Invullen</button>
                <button class="col-sm-12 menu" id="game2">Meerkeuze</button>
              </div>
            </div>

          <div class="col-sm-5 theme1" id="gametheme1">Wilde dieren
          </div>
          <div class="col-sm-5 theme2" id="gametheme2"> Huisdieren
          </div>
          <div class="col-sm-5 theme3" id="gametheme3">Sporten
          </div>
          <div class="col-sm-5 theme4" id="gametheme4">Vervoermiddelen
          </div>

        </div>

  <br><br>

<script>

  function getColor(link){
    var id = <?php echo $_SESSION['u_id']?>;
    var color = link;

    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "includes/updatecolor.php?color=" + color + "&id=" + id, false);
    xhttp.send();

    location.reload();
    }

  function getColorSec(link){
    var id = <?php echo $_SESSION['u_id']?>;
    var color = link;

    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "includes/updatecolor.php?colorsec=" + color + "&id=" + id, false);
    xhttp.send();

    location.reload();
    }

  function getFont(link){
    var id = <?php echo $_SESSION['u_id']?>;
    var color = link;

    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "includes/updatecolor.php?font=" + color + "&id=" + id, false);
    xhttp.send();

    location.reload();
    }

    $().ready(function() {
        $('.welcome, .usertop, .mainmenu').css({
            'background-color': '#' + '<?=$student['color']?>',
        })

        $('.menu, .points, .dropbutton, .menudrop, #logoutbutton').css({
            'background-color': '#' + '<?=$student['colorsec']?>',
        })

        $('.menu, .points, #logoutbutton, .menudrop, .dropbutton').css({
            'color': '#' + '<?=$student['fontcolor']?>',
        })

        ;
    });

</script>
</body>

</html>
