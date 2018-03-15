<!DOCTYPE = html>
<html>
<head>
  <link rel="stylesheet" href="game.css">
  <script src= "game.js"></script>

</head>
<body Onload = "InitializePics()">
   <center>
     <h1>Spelgoed</h1>
   </center>
   <center>
   <div id = "divGame">
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
     <input id= "inputAnswer" name = "inputnmAnswer" placeholder="Typ hier je antwoord" type="text" ></input>
     <button name="btnConfirmAnswer" id = "btnConfirmAnswer" Onclick = "ControlAnswer()" >Ok</button>
     <button  name="btnNextPic" id = "btnidNextPic" Onclick ="NextPicture()" >Volgende</button>
   </div>
 </center>
</body>
</html>
