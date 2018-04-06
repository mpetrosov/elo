
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elo Kids</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>

<body>
<div class="container" >
<div class="row">

<form class="form-horizontal" action="includes/theme.php" method="POST">
<fieldset>

<div  class="form-group">TASK FORM</div>

<div class="form-group">
  <label class="col-md-4 control-label">taskid</label>
  <div class="col-md-4">
  <input name="taskid" class="form-control input-md">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">lessonid</label>
  <div class="col-md-4">
  <input value="8" name="lessonid" class="form-control input-md">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Naam</label>
  <div class="col-md-4">
  <input name="name" class="form-control input-md">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">path</label>
  <div class="col-md-4">
  <input name="path" value="thema/bloemen/"class="form-control input-md">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Extra informatie</label>
  <div class="col-md-4">
  <textarea name="taskinfo" class="form-control input-md"></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" form="signup"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-basic">Versturen</button>
  </div>
</div>

</fieldset>
</form>


<div class="form-group">LESSONS FORM</div>

<form class="form-horizontal" action="includes/theme.php" method="POST">
<fieldset>


<div class="form-group">
  <label class="col-md-4 control-label">id</label>
  <div class="col-md-4">
    <input name="id" class="form-control input-md">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">thema</label>
  <div class="col-md-4">
    <input name="namelesson" class="form-control input-md">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">game id</label>
  <div class="col-md-4">
    <input name="gameid" class="form-control input-md">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">opdracht</label>
  <div class="col-md-4">
    <input name="opdracht" class="form-control input-md">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" form="signup"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-basic">Versturen</button>
  </div>
</div>

</fieldset>
</form>

</div>
</div>
</body>
</html>
