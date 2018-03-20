<!DOCTYPE = html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Chicle" rel="stylesheet">
  <link rel="stylesheet" href="game.css">
  <link rel="stylesheet" href="fadeeffect.css">
  <script src= "game.js"></script>
</head>
<!--Copy van game.php. Tijdelijk bestand om gegevens naar db te schrijven. met Ajax-request
-->
<body Onload = "InitializePics()">
    <!--*********************filldbtemp*********************************************************-->
    <button  name="schrijfnaardb" Onclick ="postpictures()" >Zet plaatjes in de database</button>
    <script type="text/javascript">
       function postpictures() {
         var id, Animalname, path, taskinfo;
         var xhttp = new XMLHttpRequest();
         //1: stuur array AnimalPics naar API
         for (var i = 0; i <AnimalPics.length; i++) {
           id = i;
           Animalname = AnimalPics[i][1];
           path = picpad + AnimalPics[i][0];
           taskinfo = AnimalPics[i][2];
           var myURL = "gamedbmanipulation/filldbtemp.php?";
           myURL += "id=" + id + "&name=" + Animalname + "&path=" + path + "&info=" + taskinfo;//xhttp.open("POST", myURL, false);
           alert(myURL);
           xhttp.open("POST", myURL, false);
           xhttp.send();
           alert(xhttp.responseText);
         }
       }
    </script>
    <!--*********************filldbtemp*********************************************************-->


   <div id = "divheader">

     <center>
       <h1>Spelgoed</h1>
     </center>
   </div>

   <center>
   <div id = "divGame">
     <div id = "TumbnailsContainer">
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
     <div id = "divPicture2" class = "fade">
       <img src="../thema/dierenafrika/gorilla.jpg" id = "image2" alt="gorilla"><br><br>
     </div>
     <font size="5"><span id = "picName">Olifant</span></font><br><br>

     <div id="divTask">
       Wat is de naam van dit dier?
     </div><br>
     <div id = "divAnswerinput">
       <input id= "inputAnswer" name = "inputnmAnswer" placeholder="Typ hier je antwoord" type="text" ></input>
       <button name="btnConfirmAnswer" id = "btnConfirmAnswer" Onclick = "ControlAnswer()" >Ok</button>
     </div>
     <div id = "divExtraInfo">
       <font size="3"><span id = "spanInfo">Olifant</span></font>
       <div id = "divNext">
         <button  name="btnNextPic" id = "btnidNextPic" Onclick ="NextPicture()" >Volgende</button>
       </div>
     </div>
   </div>
 </center>
</body>
</html>
