<!DOCTYPE = html>
<html>
<head>
  <link rel="stylesheet" href="game.css">
  <script src= "game.js"></script>
  <style>
    body {
      background: #006666;
      color: #FFFF00;
    }

    #divGame {
      background: #00FF66;
      color: #000000;
      width: 60%;
      padding: 20px;
      border-radius: 20px;
    }

    #divTask {
      background: #00AA66;
      color: #000000;
      width: 80%;
      padding: 10px;
      border-radius: 20px;

    }

  </style>
  <script>
    var picpad = "../thema/dierenafrika/";
    var AnimalPics = new Array(14);
    var actPicnr = 7;
    var MiliSecTeller = 0;
    var btnGameStarted = true;

    for (var i = 0; i < 14; i++) {
      AnimalPics[i] = new Array(2);
    }

    //**********************************************************************************************
    function NextPicture() {
      if (actPicnr < AnimalPics.length - 1) {
        actPicnr++;
      }
      else {
        actPicnr = 0;
      }

      imgPicture = document.getElementById("image");
      imgPicture.src = picpad + AnimalPics[actPicnr][0];
      imgName = document.getElementById("picName");
      imgName.innerHTML = AnimalPics[actPicnr][1];
      document.getElementById("btnidNextPic").style.visibility = "hidden";
      btnGameStarted = true;
    }

    //**********************************************************************************************
    function InitializePics() {
      MiliSecTeller = 0;
      AnimalPics[0][0] = "baviaan.jpg";      AnimalPics[1][0] = "cheetah.jpg";
      AnimalPics[2][0] = "gazelle.jpg";       AnimalPics[3][0] = "giraffe.jpg";
      AnimalPics[4][0] = "gnoe.jpg";          AnimalPics[5][0] = "leeuw.jpg";
      AnimalPics[6][0] = "gorilla.jpg";       AnimalPics[7][0] = "krokodil.jpg";
      AnimalPics[8][0] = "neushoorn.jpg";     AnimalPics[9][0] = "nijlpaard.jpg";
      AnimalPics[10][0] = "olifant.jpg";      AnimalPics[11][0] = "stokstaartje.jpg";
      AnimalPics[12][0]= "struisvogel.jpg";   AnimalPics[13][0] = "zebra.jpg";

      AnimalPics[0][1] = "baviaan";           AnimalPics[1][1] = "cheetah";
      AnimalPics[2][1] = "gazelle";       AnimalPics[3][1] = "giraffe";
      AnimalPics[4][1] = "gnoe";          AnimalPics[5][1] = "leeuw";
      AnimalPics[6][1] = "gorilla";       AnimalPics[7][1] = "krokodil";
      AnimalPics[8][1] = "neushoorn";     AnimalPics[9][1] = "nijlpaard";
      AnimalPics[10][1] = "olifant";      AnimalPics[11][1] = "stokstaartje";
      AnimalPics[12][1]= "struisvogel";   AnimalPics[13][1] = "zebra";

      imgPicture = document.getElementById("image");
      imgPicture.src = picpad + AnimalPics[actPicnr][0];
      imgName = document.getElementById("picName");
      imgName.innerHTML = AnimalPics[actPicnr][1];
      imgName.style.opacity = 1.0;
      document.getElementById("btnidNextPic").style.visibility = "hidden";
      document.getElementById("inputAnswer").style.visibility = "hidden";
      document.getElementById("btnConfirmAnswer").style.visibility = "hidden";
      //TekenInterval = setInterval(function(){TekenKolom();},0); //wow, dit werkt!
      setInterval(function(){ fadePicName();}, 10);
  }

  //***********************************************************************************************
  function fadePicName() {
     if (btnGameStarted) {
       MiliSecTeller++;
     }

     if (MiliSecTeller > 300) {
       imgName = document.getElementById("picName");
       imgName.style.opacity = imgName.style.opacity - 0.01;
       if (imgName.style.opacity == 0.0) {
         imgName.style.opacity = 1.0;
         imgName.innerHTML = "";
         document.getElementById("inputAnswer").style.visibility = "visible";
         document.getElementById("btnConfirmAnswer").style.visibility = "visible";
         btnGameStarted = false;
         MiliSecTeller = 0;
       }
     }
  }

  //***********************************************************************************************
  function ControlAnswer() {
     Answer = document.getElementById("inputAnswer");
     if (Answer.value == AnimalPics[actPicnr][1]) {
       alert("Hoera, je hebt het woord goed gespeld!");
     }
     document.getElementById("inputAnswer").style.visibility = "hidden";
     document.getElementById("btnConfirmAnswer").style.visibility = "hidden";
     document.getElementById("btnidNextPic").style.visibility = "visible";
  }


  </script>
</head>
<body Onload = "InitializePics()">
   <center>
   <h1>Spelgoed</h1>
   <div id = "divGame">
   <img src="../thema/dierenafrika/gorilla.jpg" id = "image" alt="gorilla"><br><br>
   <font size="5"><span id = "picName">Olifant</span></font><br><br>
   <div id="divTask">
      Wat is de naam van dit dier?
   </div>
   <input id= "inputAnswer" name = "inputnmAnswer" placeholder="Typ hier je antwoord" type="text" ></input>
   <button name="btnConfirmAnswer" id = "btnConfirmAnswer" Onclick = "ControlAnswer()" >Ok</button><br>
   <button  name="btnNextPic" id = "btnidNextPic" Onclick ="NextPicture()" >Volgende</button>
   </center>


</body>
</html>
