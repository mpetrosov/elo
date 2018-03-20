
<!-- <?php
// include 'gamedbmanipulation/connect.php';

?> -->


<!DOCTYPE = html>
<html>
<head>
<link rel="stylesheet"
  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
  crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Chicle" rel="stylesheet">
  <link rel="stylesheet" href="game.css">
  <link rel="stylesheet" href="fadeeffect.css">
  <script src= "game.js"></script>
  <script src= "ajaxgame.js"></script>
</head>
<body Onload = "InitializePics()">

    <div class="container gamewrapper">
      <div class="row">
        <div class="col-xs-10"id = "divheader">
           <h1>Spelgoed</h1>
           <div id = "divStudent"></div>
        </div>
      </div>

      <!-- <div class="row">
        <div class="col-xs-10">
          <div id="TumbnailsContainer"></div>
      </div>
    </div> -->

      <div class="row">
        <div class="col-xs-6 maingame">
          <div id = "divPicture1">
            <img src="../thema/dierenafrika/gorilla.jpg" id = "image1" alt="gorilla"><br><br>
          </div>
          <div id = "divPicture2">
            <img src="../thema/dierenafrika/gorilla.jpg" id = "image2" alt="gorilla"><br><br>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="row">
            <div class=col-xs-3>
              <div id = "divScore">
                 <div id = "divPoints">
                   <b><span id = "txtScore">0</span></b>
                 </div>
                 <div id = "divCoin">
                   <img src="kudo.png" width = "50px" id = "picCoin" alt="munt">
                 </div>
               </div>
             </div>
             <div class=col-xs-7>
                <div id="TumbnailsContainer"></div>
                </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <font size="5"><span id = "picName">Olifant</span></font></div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <div id="divTask">
           Wat is de naam van dit dier?</div>
         </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <div id = "divAnswerinput">
          <input id= "inputAnswer" name = "inputnmAnswer" placeholder="Typ hier je antwoord" type="text" ></input>
          <button name="btnConfirmAnswer" id = "btnConfirmAnswer" Onclick = "ControlAnswer()" >Ok</button>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <div id = "divExtraInfo">
            <font size="3"><span id = "spanInfo">Olifant</span></font>
            <div id = "divNext">
              <button  name="btnNextPic" id = "btnidNextPic" Onclick ="NextPicture()" >Volgende</button>
            </div>
          </div>
        </div>
      </div>

    </div>

    </body>
    </html>
