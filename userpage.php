<!-- <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ELO kids</title>
    <link href="https://fonts.googleapis.com/css?family=Chicle" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head> -->

  <?php

  include_once 'includes/header.php'

  ?>
  <body>
    <div class="container">
    <div class="row">
      <div class= "col-xs-12">

      </div>
    </div>

    <div class="row">
      <div class="col-sm-8 usertop">
        <div class="row">
        <div class="col-xs-8 welcome">Hallo

          <?php
          try {
              $conn = new PDO("mysql:host=localhost; dbname=spelgoed", "root", "");

              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "SELECT students.firstname FROM students WHERE st_id=8";

              $result = $conn->query($sql);
              foreach ($result as $row) {
                echo $row['firstname'];
                }
              }
            catch(PDOException $e)
              {
              echo "Connection failed: " . $e->getMessage();
              }
          ?>

        </div>
        <div class="col-xs-4"><img class="avatar" src="img/owl.png"></div>
        </div>
      </div>

      <div class="col-sm-4 usertop">
        <div class="profile"> <div class="head">Profiel:</div>


          <?php
          try {
              $conn = new PDO("mysql:host=127.0.0.1; dbname=spelgoed", "root", "");

              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "SELECT students.firstname, students.lastname, students.class_id,
              students.score, students.birthday FROM students WHERE st_id=8";

              $result = $conn->query($sql);
              foreach ($result as $row) {

                $birthDate = $row['birthday'];;
                $birthDate = explode("-", $birthDate);
                $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                ? ((date("Y") - $birthDate[2]) - 1)
                : (date("Y") - $birthDate[2]));
                echo "Naam: ";
                echo $row['firstname'];
                echo " ";
                echo $row['lastname'];
                echo "<br>Leeftijd: ";
                echo $age;
                echo "<br>groep: ";
                echo $row['class_id'];
                echo "</div><hr>";
                echo "<div class='points'>";
                echo $row['score'];
                echo " punten</div>";
                }
              }
          catch(PDOException $e)
              {
              echo "Connection failed: " . $e->getMessage();
              }
          ?>

      </div>
    </div>

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
