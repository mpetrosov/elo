
<?php
include 'includes/dbh.php';
include 'includes/functions.php';
include 'includes/header.php';
?>

</head>

  <body>
    <div class="container-fluid ">
    <div class="row">
      <div class="col-xs-1 back"></div>
      <div class="col-xs-10 stylehead">Geef kleur aan je pagina<hr> </div>
      <div class="col-xs-1"><a href="userpage.php">Terug</a></div>
    </div>


      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
        <div class="row">
        <div class="col-md-12">Menu kleur</div>
        </div>
        <div class="row">
        <div class="col-md-2" style="background-color: #800000; width: 20%; height: 5em;" name="color" onclick=getColor('800000');>
        </div>
        <div class="col-md-2" style="background-color: #6666d0; width: 20%; height: 5em;" name="color" onclick=getColor('6666d0');>
        </div>
        <div class="col-md-2" style="background-color: #d06666; width: 20%; height: 5em;" name="color" onclick=getColor('d06666');>
        </div>
        <div class="col-md-2" style="background-color: #160066; width: 20%; height: 5em;" name="color" onclick=getColor('160066');>
        </div>
      </div>
      <div class="row">
      <div class="col-md-2" style="background-color: #9b66d0; width: 20%; height: 5em;" name="color" onclick=getColor('9b66d0');>
      </div>
      <div class="col-md-2" style="background-color: #66d066; width: 20%; height: 5em;" name="color" onclick=getColor('66d066');>
      </div>
      <div class="col-md-2" style="background-color: #d066d0; width: 20%; height: 5em;" name="color" onclick=getColor('d066d0');>
      </div>
      <div class="col-md-2" style="background-color: #88c6d5; width: 20%; height: 5em;" name="color" onclick=getColor('88c6d5');>
      </div>

    </div>

      <div class="row">
        <div class="col-md-12">Knoppen kleur</div>
      </div>
      <div class="row">
        <div class="col-md-2" style="background-color: #800000; width: 20%; height: 5em;" name="color" onclick=getColorSec('800000');>
        </div>
        <div class="col-md-2" style="background-color: #6666d0; width: 20%; height: 5em;" name="color" onclick=getColorSec('6666d0');>
        </div>

        <div class="col-md-2" style="background-color: #d06666; width: 20%; height: 5em;" name="color" onclick=getColorSec('d06666');>
        </div>
        <div class="col-md-2" style="background-color: #160066; width: 20%; height: 5em;" name="color" onclick=getColorSec('160066');>
        </div>
    </div>
    <div class="row">
      <div class="col-md-2" style="background-color: #9b66d0; width: 20%; height: 5em;" name="color" onclick=getColorSec('9b66d0');>
      </div>
      <div class="col-md-2" style="background-color: #66d066; width: 20%; height: 5em;" name="color" onclick=getColorSec('66d066');>
      </div>
      <div class="col-md-2" style="background-color: #d066d0; width: 20%; height: 5em;" name="color" onclick=getColorSec('d066d0');>
      </div>
      <div class="col-md-2" style="background-color: #88c6d5; width: 20%; height: 5em;" name="color" onclick=getColorSec('88c6d5');>
      </div>

    </div>

    <div class="row">
      <div class="col-md-12">Font kleur</div>
      <div class="col-md-2" style="background-color: #343434; width: 20%; height: 5em;" name="color" onclick=getFont('343434');>
      </div>
      <div class="col-md-2" style="background-color: #ffffff; width: 20%; height: 5em;" name="color" onclick=getFont('ffffff');>
      </div>
      <div class="col-md-2" style="background-color: #093145; width: 20%; height: 5em;" name="color" onclick=getFont('093145');>
      </div>
      <div class="col-md-2" style="background-color: #800000; width: 20%; height: 5em;" name="color" onclick=getFont('800000');>
      </div>
    </div>


    </div>
    <div class="col-md-6"><div id='main2'>
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
              <div class="col-xs-8"><div class="head">Profiel:</div></div>
              <div class="col-xs-4"><div class="btn-group">
      <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        menu
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
        <div class="row">
            <div class="col-sm-2 mainmenu">Spellen<br><br>
              <div class="row">
                <button class="col-sm-12 menu" id="game1">Schrijven</button>
                <button class="col-sm-12 menu" id="game2">Spel 2</button>
                <button class="col-sm-12 menu" id="game3">Spel 3</button>
              </div>
            </div>

          <div class="col-sm-5 theme1" id="gametheme1">Wilde dieren
          </div>
          <div class="col-sm-5 theme2" id="gametheme2"> Huisdieren
          </div>
          <div class="col-sm-5 theme3" id="gametheme3">Bloemen
          </div>
          <div class="col-sm-5 theme4" id="gametheme4">Vogels
          </div>

      </div></div>
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

        function getBody(link){
          var id = <?php echo $_SESSION['u_id']?>;
          var color = link;

            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "includes/updatecolor.php?body=" + color + "&id=" + id, false);
            xhttp.send();

            location.reload();
          }

      $().ready(function() {
          $('.welcome, .usertop, .mainmenu').css({
              'background-color': '#' + '<?=$student['color']?>',
          })

          $('.menu, .points').css({
              'background-color': '#' + '<?=$student['colorsec']?>',
          })

          $('.menu, .points, .head').css({
              'color': '#' + '<?=$student['fontcolor']?>',
          })

          ;
      });

</script>
</body>

</html>
