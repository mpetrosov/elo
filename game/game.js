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
var TaskScores = new Array(14);
var lessonid;
var studentid;
var StudentName;

//**********************************************************************************************
function InitializePics(lessonnr) {

  //console.log(lessonId)
  MiliSecTeller = 0;
  lessonid =  lessonnr; //= GetGameid();

  getGameTasks(lessonid);
  getStudent();


  for (var i = 0; i <AnimalPics.length; i++) {
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
  imgName = document.getElementById("picName");
  imgName.innerHTML = AnimalPics[actPicnr][0];
  imgName.style.opacity = 1.0;
  document.getElementById("btnidNextPic").style.visibility = "hidden";
  document.getElementById("inputAnswer").style.visibility = "hidden";
  document.getElementById("btnConfirmAnswer").style.visibility = "hidden";

  MakeTumbnails(AnimalPics.length);
  ShowMadeTasks();

  PicInterval = setInterval(function(){fadePicName();}, 10);
}

//**********************************************************************************************
function ShowMadeTasks() {
  for (var i = 0; i <AnimalPics.length; i++) {
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
    strinnerHTML += "\" onClick=\"ChangeTask(" + i +")\"><h2 id=\"RT" + (i+1) + "\"class=\"RTh2\"></h2>";
    //alert(strinnerHTML);
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

    imgName = document.getElementById("picName");
    imgName.innerHTML = AnimalPics[actPicnr][0];
    document.getElementById("divTask").style.visibility = "visible";
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

  imgName = document.getElementById("picName");
  imgName.innerHTML = AnimalPics[actPicnr][0];
  document.getElementById("divTask").style.visibility = "visible";
  document.getElementById("divExtraInfo").style.display = "none";
  document.getElementById("btnidNextPic").style.visibility = "hidden";
  btnGameStarted = true;
}

//***********************************************************************************************
function determineNextTask(locPicnr) {
  var nrNotMadeTasks;
  var SeekValue;

  nrNotMadeTasks = 0;
  for (var i= 0; i<TaskScores.length; i++) {
    if (TaskScores[i]== -1) {
      nrNotMadeTasks+= 1;
    }
  }
  if (nrNotMadeTasks > 0) {
    SeekValue = -1;
  }
  else {
    SeekValue = 0;
  }

  while (TaskScores[locPicnr] != SeekValue) {
    locPicnr++;
    if (locPicnr > TaskScores.length) {locPicnr = 0;}
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
     txtInput.style.visibility = "visible";
     txtInput.value = ""; //veld leegmaken
     txtInput.focus();
     document.getElementById("inputAnswer").style.visibility = "visible";
     //document.getElementById("inputAnswer").style.visibility = "visible";
     document.getElementById("btnConfirmAnswer").style.visibility = "visible";
     btnGameStarted = false;
     MiliSecTeller = 0;
   }
 }
}

//***********************************************************************************************
function ControlAnswer() {
  var Answer = document.getElementById("inputAnswer");

  Answer.value = Answer.value.toLowerCase();
  if (Answer.value == AnimalPics[actPicnr][0]) {
    TaskScores[actPicnr] = 1;
    var RT = document.getElementById("RT" + (actPicnr +1));
    RT.style.color = "#FFFF00";
    RT.innerHTML = "V";
    var audio = new Audio('scorenoise.wav');
    audio.play();
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
  document.getElementById("divTask").style.visibility = "hidden";
  document.getElementById("inputAnswer").style.visibility = "hidden";
  document.getElementById("btnConfirmAnswer").style.visibility = "hidden";
  document.getElementById("divExtraInfo").style.display = "block";

  if (!Gamefinished()) {
     document.getElementById("btnidNextPic").style.visibility = "visible";
  }
  else {
    alert("Je bent klaar met het spel. Je score was: " + intScore);
  }

}

//***********************************************************************************************
function determineScore() {
  var sumScore;

  sumScore = 0;
  for (var i= 0; i<TaskScores.length; i++) {
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
  for (var i= 0; i<TaskScores.length; i++) {
    sumScore+= TaskScores[i];
  }
  if (TaskScores.length == sumScore) {
    Gamefinished = true;
  }

  return Gamefinished;
}

//***********************************************************************************************
function EditTumbnail(PicNumber) {
   var TN = document.getElementById("TN" + (PicNumber + 1));
   TN.style.opacity = "1.0";
}
