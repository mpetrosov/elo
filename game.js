var picpad = "thema/dierenafrika/";
var AnimalPics = new Array(14);
var actPicnr = 0;
var MiliSecTeller = 0;
var intScore = 0;
var btnGameStarted = true;
var actPicslide = 1;

for (var i = 0; i < 14; i++) {
  AnimalPics[i] = new Array(3); //picurl, picname, picinfo
}

//**********************************************************************************************
function NextPicture() {
  var divPicture = document.getElementById("divPicture" + actPicslide);
  divPicture.style.display = "none";
  if (actPicslide == 1) {actPicslide = 2; }
  else {actPicslide = 1;}
  divPicture = document.getElementById("divPicture" + actPicslide);

  divPicture.style.display = "block";

  if (actPicnr < AnimalPics.length - 1) {
    actPicnr++;
  }
  else {
    actPicnr = 0;
  }

  imgPicture = document.getElementById("image" + actPicslide);
  imgPicture.src = picpad + AnimalPics[actPicnr][0];
  
  imgName = document.getElementById("picName");
  imgName.innerHTML = AnimalPics[actPicnr][1];
  document.getElementById("divTask").style.visibility = "visible";
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

  AnimalPics[0][1] = "baviaan";       AnimalPics[1][1] = "cheetah";
  AnimalPics[2][1] = "gazelle";       AnimalPics[3][1] = "giraffe";
  AnimalPics[4][1] = "gnoe";          AnimalPics[5][1] = "leeuw";
  AnimalPics[6][1] = "gorilla";       AnimalPics[7][1] = "krokodil";
  AnimalPics[8][1] = "neushoorn";     AnimalPics[9][1] = "nijlpaard";
  AnimalPics[10][1] = "olifant";      AnimalPics[11][1] = "stokstaartje";
  AnimalPics[12][1]= "struisvogel";   AnimalPics[13][1] = "zebra";

  AnimalPics[0][2] = "Een baviaan is een soort aap. Ze komen voor op de savanne in Afrika. Ze leven daar in grote groepen.";
  AnimalPics[1][2] = "De cheetah wordt ook wel jachtluipaard genoemd. Het is een soort van grote kat. De cheetah is heel snel. Hij kan wel 100 km per uur halen.";
  AnimalPics[2][2] = "Gazelles zijn een soort van antilopes. Het zijn hoefdieren net als herten paarden. Ze eten gras.";
  AnimalPics[3][2] = "De giraffe is heel lang. Soms wel 6 meter. Zo kan hij de blaadjes eten van bomen waar andere dieren niet bij kunnen.";
  AnimalPics[4][2] = "De gnoe komt voor in grote groepen. Soms maakt hij lange tochten om gebieden te bereiken met vers gras.";
  AnimalPics[5][2] = "De leeuw wordt wel de koning van de savanne genoemd. Alle andere dieren zijn bang voor hem. Het is een gevaarlijk roofdier.";
  AnimalPics[6][2] = "Gorilla's komen voor in de bergen van Centraal-Afrika. Ze zien er heel gevaarlijk uit maar het zijn planteneters.";
  AnimalPics[7][2] = "Krokodillen leven in de rivieren in Afrika. Het zijn gevaarlijke beesten die andere dieren aanvallen als ze aan het drinken zijn.";
  AnimalPics[8][2] = "De neushoorn komt voor op de savanne. Sommige mensen doden neushoorns vanwege de grote hoorn. Hierdoor zijn neushoorns heel zeldzaam geworden en moeten ze worden beschemd.";
  AnimalPics[9][2] = "Nijlpaarden komen ook voor in de rivieren. Ze zijn als enige niet bang voor krokodillen. Het zijn plateneters.";
  AnimalPics[10][2]= "De olifant is het grootste dier dat op het land leeft. Hij heeft een hele lange slurf die hij heel handig gebruikt.";
  AnimalPics[11][2]= "Stokstaartjes zijn een soort van kleine roofdiertjes. Ze eten insekten en andere kleine diertjes.";
  AnimalPics[12][2]= "De struisvogel is een grote loopvogel. Hij kan niet vliegen. Ze kunnen wel heel hard lopen.";
  AnimalPics[13][2]= "De zebra is een hoefdier en lijkt op een paard. Het zebrapad is genoemd naar dit dier.";

  imgPicture = document.getElementById("image" + actPicslide);
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
    intScore++;
    imgName = document.getElementById("txtScore");
    imgName.innerHTML = intScore;
    var audio = new Audio('scorenoise.wav');
    audio.play();
    alert("Hoera, je hebt het woord goed gespeld!");
  }
  else {
    var audio = new Audio('oops.wav');
    audio.play();
  }
  document.getElementById("divTask").style.visibility = "hidden";
  document.getElementById("inputAnswer").style.visibility = "hidden";
  document.getElementById("btnConfirmAnswer").style.visibility = "hidden";
  if (actPicnr < AnimalPics.length - 1) {

    document.getElementById("btnidNextPic").style.visibility = "visible";
  }
  else {
    alert("Je bent klaar met het spel. Je score was: " + intScore);
  }
}
