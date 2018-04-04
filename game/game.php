<?php session_start();
include '../includes/dbh.php';
include '../includes/functions.php';
include 'gamedbmanipulation/GetLesson.php'

?>
<!DOCTYPE = html>
<html>


<head>
  <link href="https://fonts.googleapis.com/css?family=Chicle" rel="stylesheet">
  <link rel="stylesheet" href="game.css">
  <link rel="stylesheet" href="fadeeffect.css">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src= "game.js"></script>
  <script src= "ajaxgame.js"></script>
</head>
<body Onload = "InitializePics(<?php echo $_SESSION['lessonid']; ?>)">
   <div id = "divheader">
     <a href="../userpage.php"><img id="logo" src="../img/klaver5.png"></a>
   </div>
   <?php
     $students = get_Students();
   ?>
   <?php
     $lessons = get_lesson();
   ?>
   <?php foreach ($students as $student):?>
   <?php endforeach;?>
   <?php foreach ($lessons as $lesson):?>
   <?php endforeach;?>
   <center>
   <div id = "divGameContainer">
     <div id = "TumbnailsContainer">
     </div>
     <div id = "divGame">
       <div id = "divStudent">
       </div>
       <div id = "divScore">
         <div id = "divPoints">
           <b><span id = "txtScore">0</span></b>
         </div>
         <div id = "divCoin">
           <img src="kudo.png" width = "50px" id = "picCoin" alt="munt">
         </div>
       </div>
       <div id = "divPicture1" class = "fade">
         <img src="../thema/dierenafrika/gorilla.jpg" id = "image1" alt="gorilla"><br><br>
       </div>
       <div id = "divPicture2" class = "fade" >
         <img src="../thema/dierenafrika/gorilla.jpg" id = "image2" alt="gorilla"><br><br>
       </div>
       <font size="5"><span id = "picName">Olifant</span></font><br><br>

       <div id="divTask">
         <?=$lesson['Opdracht']?> <!--Wat is de naam van dit dier?-->
       </div>
       <div id = "divAnswerinput">
         <input id= "inputAnswer" name = "inputnmAnswer"  type="text" ></input>
         <button name="btnConfirmAnswer" id = "btnConfirmAnswer" Onclick = "ControlAnswer()" >Ok</button>
       </div>
       <div id = "divExtraInfo">
         <span id = "spanInfo">Olifant</span><br>
         <div id = "divNext">
           <button  name="btnNextPic" id = "btnidNextPic" Onclick ="NextPicture()" >Volgende</button>
         </div>
       </div>
     </div>
     <div id = "divAnimatie">
        <img src="kudo.png" width = "50px" id = "picCoin" alt="munt">
     </div>
   </div>
 </center>
</body>

<script>
  var input = document.getElementById("inputAnswer");
  input.addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
       document.getElementById("btnConfirmAnswer").click();
    }
  });

$().ready(function() {
      $('#divGameContainer, #TumbnailsContainer').css({
          'background-color': '#' + '<?=$student['color']?>',
      })

      ;
  });
</script>

</html>
