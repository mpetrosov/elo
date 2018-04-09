function UpdateLessonsMade(lessonid, studentid){
  var xhttp = new XMLHttpRequest();
  var myURL = "gamedbmanipulation/UpdateLessonsMade.php?lessonid=" + lessonid + "&studentid=" + studentid + "&numbertasks=" + NumberTasks;
  xhttp.open("POST", myURL, false);
  xhttp.send();

  //usertabelbijwerken (score)
  myURL = "gamedbmanipulation/UpdateUserScore.php?studentid=" + studentid;
  xhttp.open("POST", myURL, false);
  xhttp.send();  
}

//***************************************************************************************************
function GetGameid() {
  var xhttp = new XMLHttpRequest();
  var myURL = "gamedbmanipulation/getgameid.php";
  var Gameid;
  xhttp.open("GET", myURL, false);
  xhttp.send();
  Gameid = parseInt(xhttp.responseText);
  return Gameid;
}

//******************************************************************************************************
function getNumberTasks() {
  var Number;

  var xhttp = new XMLHttpRequest();
  var myURL = "gamedbmanipulation/getnumbertasks.php?lessonid=" + lessonid;


  xhttp.open("GET", myURL, false);
  xhttp.send();
  Number = parseInt(xhttp.responseText);
  return Number;
}

//******************************************************************************************************
function getGameTasks(lessonid) {
  //tested!
  //haal de tasks uit de database
  var id, Animalname, path, taskinfo;
  var xhttp = new XMLHttpRequest();
  //1: stuur array AnimalPics naar API

  for (var i = 0; i < NumberTasks; i++) {
    var taskid = i;
    var Task;//Animalname = AnimalPics[i][1];
    var myURL = "gamedbmanipulation/getgametasks.php?taskid=" + taskid + "&lessonid=" + lessonid;
    xhttp.open("GET", myURL, false);
    xhttp.send();
    Task = xhttp.responseText;
    Task = Task.split(";");
    //vul de AnumalPics array
    AnimalPics[i][0] = Task[0];
    AnimalPics[i][1] = Task[1];
    AnimalPics[i][2] = Task[2];
  }
}

//****************************************************************************************************************
function getStudent() {
  var Userdata;

  var xhttp = new XMLHttpRequest();
  var myURL = "gamedbmanipulation/getstudent.php";
  xhttp.open("GET", myURL, false);
  xhttp.send();
  Userdata = xhttp.responseText;
  Userdata = Userdata.split(";");
  //globale variabelen
  studentid = parseInt(Userdata[0]);
  StudentName = Userdata[1];
  document.getElementById("divStudent").innerHTML = "Hallo " + StudentName + "!";
  //alert(StudentName);
}

//*************************************************************************************
function CreateTaskMade(taskid,lessonid, studentid, score) {
  var xhttp = new XMLHttpRequest();
  var myURL;

  myURL = "gamedbmanipulation/ChangeTasksMade.php?taskid=";
  myURL += taskid + "&lessonid=" + lessonid + "&studentid=" + studentid + "&score=" + score;

  xhttp.open("POST", myURL, false);
  xhttp.send();
}

//****************************************************************************************************************
function MakeLessonMade(studentid, lessonid) {
  var xhttp = new XMLHttpRequest();
  var myURL = "gamedbmanipulation/ChangeLessonsMade.php?studentid=" + studentid + "&lessonid=" + lessonid ;
  xhttp.open("GET", myURL, false);
  xhttp.send();
  UserLessonExists = xhttp.responseText; //true or false
  if (UserLessonExists == "false") {
    var myURL = "gamedbmanipulation/ChangeLessonsMade.php?studentid=" + studentid + "&lessonid=" + lessonid ;
    xhttp.open("POST", myURL, false);
    xhttp.send();
    return true; //new lesson
  }
  else {
    return false //lesson already exists
  }
}

//****************************************************************************************************************
function GetStudentTaskScores(studentid, lessonid) {
  var xhttp = new XMLHttpRequest();

  for (var i = 0; i < NumberTasks; i++) {
    TaskScores[i] = 0;
  }

  for (var i = 0; i < NumberTasks; i++) {
    var taskid = i;
    var myURL = "gamedbmanipulation/ChangeTasksMade.php?taskid=" + taskid + "&lessonid=" + lessonid + "&studentid=" + studentid;
    xhttp.open("GET", myURL, false);
    xhttp.send();
    TaskScores[i] = parseInt(xhttp.responseText);
    if (TaskScores[i] >= 0) {actPicnr = i + 1};
  }

  if (actPicnr == NumberTasks) {
    actPicnr = 0;
  }
}
