var picpad = "thema/dierenafrika/";
var MaxnrTasks = 20;
var AnimalPics = new Array(MaxnrTasks);
var actPicnr = 0;
var MiliSecTeller = 0;
var intScore = 0;
var btnGameStarted = true;
var actPicslide = 1;
for (var i = 0; i < MaxnrTasks; i++) {
  AnimalPics[i] = new Array(3); //picurl, picname, picinfo
}
var TaskScores = new Array(MaxnrTasks);
var NumberTasks;
var gameid, lessonid;
var studentid;
var StudentName;
var CoinXPos, CoinYPos, BL ,BT, EL, ET, dx, dy, a, vx, stepnr, maxsteps; //voor de animatie
var CorrectnrMC;
var FirstFinish;


//**********************************************************************************************
function InitializePics(lessonnr) {
  CoinPos = 0;
  MiliSecTeller = 0;
  lessonid =  lessonnr; //= GetGameid();
  FirstFinish = true;
  //temp: dynamisch maken
  gameid  = 1; //invullen
  if (lessonid > 4) {gameid= 2;} //multiplechoice
  document.getElementById("inputAnswer").style.visibility = "hidden";
  document.getElementById("btnConfirmAnswer").style.visibility = "hidden";

  NumberTasks = getNumberTasks();
  getGameTasks(lessonid);
  getStudent();

  for (var i = 0; i <NumberTasks; i++) {
    TaskScores[i] = -1;
  }

  var NewLessonStudent = MakeLessonMade(studentid, lessonid);
  if (NewLessonStudent == false ) {
     GetStudentTaskScores(studentid, lessonid);
  }

  //programma gaat bij opstarten naar 1e nog niet gemaakte task,
  //vervolgens naar 1e nog niet goed opgeloste taak
  if (!Gamefinished()) {actPicnr = determineNextTask(actPicnr);}

  imgPicture = document.getElementById("image" + actPicslide);
  imgPicture.src = AnimalPics[actPicnr][1];

  document.getElementById("btnidNextPic").style.visibility = "hidden";
  document.getElementById("btnConfirmAnswer").style.visibility = "hidden";

  MakeTumbnails(NumberTasks);
  ShowMadeTasks();

  if (gameid ==1) { //invulles
    imgName = document.getElementById("picName");
    imgName.innerHTML = AnimalPics[actPicnr][0];
    imgName.style.opacity = 1.0;
    PicInterval = setInterval(function(){fadePicName();}, 10);
    //verberg meerkeuze
    document.getElementById("idMC1").style.display = "none";
    document.getElementById("idMC2").style.display = "none";
    document.getElementById("idMC3").style.display = "none";
    document.getElementById("idMC4").style.display = "none";
  }
  if (gameid == 2) {
    AddMCAnswers();
  }
}

//**********************************************************************************************
function AddMCAnswers() {
  var Answer;
  var Rndnr;
  var balls = new Array(NumberTasks);
  var nrballsleft;
  //bepaal de positie van het correcte antwoord.

  for (var i = 0; i<NumberTasks ; i++) {
    balls[i] = i;
  }

  CorrectnrMC = Math.floor(Math.random() * 4) + 1;
  Answer = document.getElementById("idMC" + CorrectnrMC);
  Answer.innerHTML = AnimalPics[actPicnr][0];
  balls[actPicnr] = balls[NumberTasks -1];
  nrballsleft = NumberTasks-1;

  for (var i = 1; i<=4 ; i++) {
    if (i!= CorrectnrMC) {
      Rndnr = Math.floor(Math.random() * nrballsleft);
      Answer = document.getElementById("idMC" + i);
      Answer.innerHTML = AnimalPics[balls[Rndnr]][0];
      balls[Rndnr] = balls[nrballsleft];
      nrballsleft--;
    }
  }
}

//**********************************************************************************************
function ShowMadeTasks() {
  for (var i = 0; i <NumberTasks; i++) {
    if (TaskScores[i]>=0) {
      EditTumbnail(i);

      var RT = document.getElementById("RT" + (i +1));

      if (TaskScores[i]==0) {
        RT.style.color = "#FF0000";
        RT.innerHTML = "X";
      }
      if (TaskScores[i]== 1) {
        RT.style.color = "#FFFF00";
        RT.innerHTML = "V";
        intScore++;
      }
    }
    imgName = document.getElementById("txtScore");
    imgName.innerHTML = intScore;
  }
}
//**********************************************************************************************
function MakeTumbnails(PicNumber) {
  for (var i = 0; i<PicNumber; i++) {
    var TNdiv = document.createElement("div");
    TNdiv.id = "divTN" + (i+1);
    TNdiv.setAttribute('class','TNcontainers');

    var strinnerHTML = "<img id=\"TN" + (i+1) + "\" class=\"TNimgs\" src=\"" + AnimalPics[i][1];
    strinnerHTML += "\" onClick=\"ChangeTask(" + i +")\"><h2 id=\"RT" + (i+1) + "\" class=\"RTh2\" onClick=\"ChangeTask(" + i +")\"></h2>";
    TNdiv.innerHTML = strinnerHTML;

    var TNcontainer = document.getElementById("TumbnailsContainer");
    TNcontainer.appendChild(TNdiv);
  }
}

//**********************************************************************************************
function ChangeTask(Picnr) {
  if (TaskScores[Picnr] >=0) {
    var divPicture = document.getElementById("divPicture" + actPicslide);
    divPicture.style.display = "none"; //=onzichtbaar
    if (actPicslide == 1) {actPicslide = 2; }
    else {actPicslide = 1;}
    divPicture = document.getElementById("divPicture" + actPicslide);
    divPicture.style.display = "block"; //=zichtbaar

    actPicnr = Picnr;
    imgPicture = document.getElementById("image" + actPicslide);
    imgPicture.src = AnimalPics[actPicnr][1];

    if (gameid == 1) {
      imgName = document.getElementById("picName");
      imgName.innerHTML = AnimalPics[actPicnr][0];
    }
    if (gameid == 2) {
      document.getElementById("divAnswerinput").style.display = "block";
      AddMCAnswers();
    }
    document.getElementById("divTask").style.display = "block"; //visibility = "visible";
    document.getElementById("divExtraInfo").style.display = "none";
    document.getElementById("btnidNextPic").style.visibility = "hidden";
    btnGameStarted = true;
  }
}


//**********************************************************************************************
function NextPicture() {
  var divPicture = document.getElementById("divPicture" + actPicslide);
  divPicture.style.display = "none"; //=onzichtbaar
  if (actPicslide == 1) {actPicslide = 2; }
  else {actPicslide = 1;}
  divPicture = document.getElementById("divPicture" + actPicslide);

  divPicture.style.display = "block"; //=zichtbaar
  actPicnr = determineNextTask(actPicnr);

  imgPicture = document.getElementById("image" + actPicslide);
  imgPicture.src = AnimalPics[actPicnr][1];
  if (gameid == 1) {
    imgName = document.getElementById("picName");
    imgName.innerHTML = AnimalPics[actPicnr][0];
  }
  if (gameid == 2) {
    document.getElementById("divAnswerinput").style.display = "block";
    AddMCAnswers();
  }

  document.getElementById("divTask").style.display = "block"; //visibility = "visible";
  document.getElementById("divExtraInfo").style.display = "none";
  document.getElementById("btnidNextPic").style.visibility = "hidden";
  btnGameStarted = true;
}

//***********************************************************************************************
function determineNextTask(locPicnr) {
  var nrNotMadeTasks;
  var SeekValue;

  nrNotMadeTasks = 0;
  for (var i= 0; i<NumberTasks; i++) {
    if (TaskScores[i]== -1) {
      nrNotMadeTasks+= 1;
    }
  }
  if (nrNotMadeTasks > 0) {
    SeekValue = -1;
  }
  else {
    if (Gamefinished()) {
      SeekValue = 1;
      locPicnr++;
      if (locPicnr > NumberTasks) {locPicnr = 0;}      
    }
    else {
      SeekValue = 0;
    }
  }


  while (TaskScores[locPicnr] != SeekValue) {
    locPicnr++;
    if (locPicnr > NumberTasks) {locPicnr = 0;}
  }
  return locPicnr;
}

//***********************************************************************************************
function fadePicName() {
 if (btnGameStarted) {
   MiliSecTeller++;
 }

 if (MiliSecTeller > 200) {
   imgName = document.getElementById("picName");
   imgName.style.opacity = imgName.style.opacity - 0.01;
   if (imgName.style.opacity == 0.0) {
     imgName.style.opacity = 1.0;
     imgName.innerHTML = "";
     var txtInput = document.getElementById("inputAnswer");
     txtInput.style.display = "block";
     txtInput.style.visibility = "visible";
     txtInput.value = ""; //veld leegmaken
     txtInput.focus();
     document.getElementById("inputAnswer").style.display = "block"; //visibility = "visible";
     //document.getElementById("inputAnswer").style.visibility = "visible";
     document.getElementById("btnConfirmAnswer").style.display = "block"; //visibility = "visible";
     btnGameStarted = false;
     MiliSecTeller = 0;
   }
 }
}

//***********************************************************************************************
function ControlAnswer(nrAnswer) {
  var AnswerCorrect;
  //if (nrAnswer == CorrectnrMC)
  AnswerCorrect = false;

  if (gameid == 1) { //invulgame
    var Answer = document.getElementById("inputAnswer");
    var Taskname;

    Taskname = AnimalPics[actPicnr][0].toLowerCase();
    Answer.value = Answer.value.toLowerCase();
    if (Answer.value == Taskname) {AnswerCorrect = true;}
  }
  if (gameid == 2) { //multiplechoice
    if (nrAnswer == CorrectnrMC) {AnswerCorrect = true;}
  }

  if (AnswerCorrect) {
    TaskScores[actPicnr] = 1;
    var RT = document.getElementById("RT" + (actPicnr +1));
    RT.style.color = "#FFFF00";
    RT.innerHTML = "V";
    var audio = new Audio('scorenoise.wav');
    audio.play();
    MakeScoreAnimation();
  }
  else {
    TaskScores[actPicnr] = 0;
    var audio = new Audio('oops.wav');
    audio.play();
    var RT = document.getElementById("RT" + (actPicnr +1));
    RT.style.color = "#FF0000";
    RT.innerHTML = "X";
  }

  intScore = determineScore();
  txtScore = document.getElementById("txtScore");
  txtScore.innerHTML = intScore;

  CreateTaskMade(actPicnr,lessonid ,studentid, TaskScores[actPicnr]);
  UpdateLessonsMade(lessonid, studentid);
  EditTumbnail(actPicnr);

  document.getElementById("spanInfo").innerHTML = AnimalPics[actPicnr][2];
  document.getElementById("divTask").style.display = "none";
  document.getElementById("divExtraInfo").style.display = "block";

  if (gameid == 1) {
    document.getElementById("inputAnswer").style.display = "none";
    document.getElementById("btnConfirmAnswer").style.display = "none";
  }
  if (gameid == 2) {
    document.getElementById("divAnswerinput").style.display = "none";
  }

  //if (!Gamefinished()) {
  if (actPicnr < NumberTasks) {
    document.getElementById("btnidNextPic").style.visibility = "visible";
  }
  if (Gamefinished()) {
    if (FirstFinish == true) {
      alert("Je bent klaar met het spel. Je score was: " + intScore);
      FirstFinish = false;
    }
  }
}

//***********************************************************************************************
function MakeScoreAnimation() {
  var BeginPos = document.getElementById("inputAnswer");
  var EndPos = document.getElementById("divScore");

  maxsteps = 25;

  BL = BeginPos.offsetLeft;
  BT = BeginPos.offsetTop;
  EL = EndPos.offsetLeft;
  ET = EndPos.offsetTop;

  dx = 0; //(EL - BL) / maxsteps;
  a =  (2*(EL - BL)) / (maxsteps * maxsteps);
  dy = (ET - BT) / maxsteps;

  CoinXPos = BL; CoinYPos = BT;
  stepnr = 0;

  AnimationInterval = setInterval(function(){BeginScoreAnimation();}, 50);
}

//***********************************************************************************************
function BeginScoreAnimation() {
  if (stepnr < maxsteps) {
    document.getElementById("divAnimatie").style.display = "block";
    dx = a * stepnr;

    CoinXPos += dx; CoinYPos += dy;

    var Coin = document.getElementById("divAnimatie");
    Coin.style.top = Math.floor(CoinYPos) + 'px';
    Coin.style.left = Math.floor(CoinXPos) + 'px';
    stepnr++;
  }
  else {
    document.getElementById("divAnimatie").style.display = "none";
    clearInterval(AnimationInterval);
  }
}

//***********************************************************************************************
function determineScore() {
  var sumScore;

  sumScore = 0;
  for (var i= 0; i<NumberTasks; i++) {
    if (TaskScores[i] == 1) {
      sumScore+= TaskScores[i];
    }
  }
  return sumScore;
}

//***********************************************************************************************
function Gamefinished() {
  var sumScore;
  var Gamefinished;

  Gamefinished = false;
  sumScore = 0;
  for (var i= 0; i<NumberTasks; i++) {
    sumScore+= TaskScores[i];
  }
  if (NumberTasks == sumScore) {
    Gamefinished = true;
  }

  return Gamefinished;
}

//***********************************************************************************************
function EditTumbnail(PicNumber) {
   var TN = document.getElementById("TN" + (PicNumber + 1));
   TN.style.opacity = "1.0";
}
