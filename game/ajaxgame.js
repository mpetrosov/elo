function UpdateLessonsMade(lessonid, studentid){
  var xhttp = new XMLHttpRequest();
  var myURL = "gamedbmanipulation/ChangeLessonsMade.php?lessonid=" + lessonid + "&studentid=" + studentid;
  xhttp.open("UPDATE", myURL, false);
  xhttp.send();
}

//****************************************************************************************************************
function getGameTasks() {
  //tested!
  //haal de tasks uit de database
  var id, Animalname, path, taskinfo;
  var xhttp = new XMLHttpRequest();
  //1: stuur array AnimalPics naar API

  for (var i = 0; i <AnimalPics.length; i++) {
    var taskid = i;
    var Task;//Animalname = AnimalPics[i][1];
    var myURL = "gamedbmanipulation/getgametasks.php?taskid=" + taskid;
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
function getStudentName(id) {
  //tested!
  var xhttp = new XMLHttpRequest();
  var myURL = "gamedbmanipulation/getstudent.php?id=" +id;
  xhttp.open("GET", myURL, false);
  xhttp.send();
  StudentName = xhttp.responseText;
  document.getElementById("divStudent").innerHTML = "Hallo " + StudentName + "!";
  //alert(StudentName);
}

//*************************************************************************************
function CreateTaskMade(taskid,lessonid, studentid, score) {
  //tested!!
  var xhttp = new XMLHttpRequest();
  var myURL;

  myURL = "gamedbmanipulation/ChangeTasksMade.php?taskid=";
  myURL += taskid + "&lessonid=" + lessonid + "&studentid=" + studentid + "&score=" + score;

  xhttp.open("POST", myURL, false);
  xhttp.send();
}

//****************************************************************************************************************
function MakeLessonMade(studentid, lessonid) {
  //tested!!
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

  for (var i = 0; i <AnimalPics.length; i++) {
    TaskScores[i] = 0;
  }

  for (var i = 0; i <AnimalPics.length; i++) {
    var taskid = i;
    var myURL = "gamedbmanipulation/ChangeTasksMade.php?taskid=" + taskid + "&lessonid=" + lessonid + "&studentid=" + studentid;
    xhttp.open("GET", myURL, false);
    xhttp.send();
    TaskScores[i] = parseInt(xhttp.responseText);
    if (TaskScores[i] >= 0) {actPicnr = i + 1};
  }
  
  if (actPicnr == AnimalPics.length) {
    actPicnr = 0;
  }
}