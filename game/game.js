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
var lessonid = 1;
var studentid = 1; //tijdelijk, id moet uiteindelijk uit sessievariabelen komen.
var StudentName;


//**********************************************************************************************
function InitializePics() {
  MiliSecTeller = 0;

  getGameTasks();
  getStudentName(studentid);

  for (var i = 0; i <AnimalPics.length; i++) {
    TaskScores[i] = -1;
  }

  var NewLessonStudent = MakeLessonMade(studentid, lessonid);

  if (NewLessonStudent == false ) {
     GetStudentTaskScores(studentid, lessonid);
  }
  //alert(actPicnr);
  //actPicnr = 0;
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
  setInterval(function(){fadePicName();}, 10);
}

//**********************************************************************************************
function ShowMadeTasks() {
  for (var i = 0; i <AnimalPics.length; i++) {
    if (TaskScores[i]>=0) {
      EditTumbnail(i);
      var RT = document.getElementById("RT" + i +1);

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
    TNdiv.id = "divTN" + i+1;
    TNdiv.setAttribute('class','TNcontainers');
    var TNcontainer = document.getElementById("TumbnailsContainer");
    TNcontainer.appendChild(TNdiv);

    var TN = document.createElement("img");
    TN.id = "TN" + i+1;
    TN.setAttribute('class','TNimgs');
    TN.src = AnimalPics[i][1];
    //rating
    var RT = document.createElement("h2");
    RT.id = "RT" + i+1;
    RT.innerHTML = "";
    RT.setAttribute('class','RTh2');
    //alert("test");
    var TNdiv = document.getElementById("divTN" + i+1);
    TNdiv.appendChild(TN);
    TNdiv.appendChild(RT);
  }
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
  imgPicture.src = AnimalPics[actPicnr][1];

  imgName = document.getElementById("picName");
  imgName.innerHTML = AnimalPics[actPicnr][0];
  document.getElementById("divTask").style.visibility = "visible";
  document.getElementById("divExtraInfo").style.display = "none";
  document.getElementById("btnidNextPic").style.visibility = "hidden";
  btnGameStarted = true;
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
  if (Answer.value == AnimalPics[actPicnr][0]) {
    intScore++;
    TaskScores[actPicnr] = 1;
    imgName = document.getElementById("txtScore");
    imgName.innerHTML = intScore;

    var RT = document.getElementById("RT" + actPicnr +1);
    RT.style.color = "#FFFF00";
    RT.innerHTML = "V";
    var audio = new Audio('scorenoise.wav');
    audio.play();
    //alert("Hoera, je hebt het woord goed gespeld!");
  }
  else {
    TaskScores[actPicnr] = 0;
    var audio = new Audio('oops.wav');
    audio.play();
    var RT = document.getElementById("RT" + actPicnr +1);
    RT.style.color = "#FF0000";
    RT.innerHTML = "X";
  }

  CreateTaskMade(actPicnr,lessonid ,studentid, TaskScores[actPicnr]);
  UpdateLessonsMade(lessonid, studentid);
  EditTumbnail(actPicnr);

  document.getElementById("spanInfo").innerHTML = AnimalPics[actPicnr][2];
  document.getElementById("divTask").style.visibility = "hidden";
  document.getElementById("inputAnswer").style.visibility = "hidden";
  document.getElementById("btnConfirmAnswer").style.visibility = "hidden";
  document.getElementById("divExtraInfo").style.display = "block";
  if (actPicnr < AnimalPics.length - 1) {
    document.getElementById("btnidNextPic").style.visibility = "visible";
  }
  else {
    alert("Je bent klaar met het spel. Je score was: " + intScore);
  }
}

//***********************************************************************************************
function EditTumbnail(PicNumber) {
   var TN = document.getElementById("TN" + PicNumber + 1);
   TN.style.opacity = "1.0";
}
