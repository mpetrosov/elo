<?php
include_once('includes/session.inc.php');
include('includes/dbh.php');
include('includes/conf.php');
// include_once('includes/auth.inc.php');

if(isset($_GET['id'])&& $_GET['id']){
    
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    if (isset($_POST['save'])){

        $firstname = strip_tags(trim($_POST['firstname']));
        $lastname = strip_tags(trim($_POST['lastname']));
        $birthday = strip_tags(trim($_POST['birthday']));
        $class_id = strip_tags(trim($_POST['class_id']));
    
        $sql = 'UPDATE `students` SET `firstname`="'.$firstname.'", `lastname`="'.$lastname.'", `birthday`="'.$birthday.'" WHERE `st_id`='.$id;
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }

    $sql = "SELECT `firstname`, `lastname`, `birthday`, `class_id` FROM `students`  WHERE `st_id` = $id";
    $result = mysqli_query($conn, $sql); 
    $row = mysqli_fetch_assoc($result);

    
}else{
    die(header('Location: '.BASE_URL . "edit.php?id=$id"));
}





?>
<!DOCTYPE html>
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

<div class="row">
<body>
  <div class="col-xs-2"></div>
  <div class="main-wrapper col-xs-8">
      <img id="logo" src="img/klaver5.png"></div>
  <div class="col-xs-2">    

  </div>
</div>
    

                    <h2>Profile wijzigen</h2><hr>

<form class="form-horizontal" action="edit.php?id=<?php echo $id; ?>" method="POST">
<fieldset>

<div class="form-group">
  <label class="col-md-4 control-label" for="firstname">Voornaam</label>
  <div class="col-md-4">
  <input id="firstname" type="text" name="firstname" placeholder="voornaam" value="<?php echo $row['firstname']; ?>" class="form-control input-md" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="lastname" >Achternaam</label>
  <div class="col-md-4">
  <input id="lastname" type="text" name="lastname" placeholder="achternaam" value="<?php echo $row['lastname']; ?>" class="form-control input-md" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="class" >Geboortedatum</label>
  <div class="col-md-4">
  <input id="date" type="date" name="birthday" placeholder="geboortedatum" value="<?php echo $row['birthday']; ?>" class="form-control input-md" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="class" >Groep</label>
  <div class="col-md-4">
  <input id="class" type="text" name="class_id" placeholder="groep"  value="<?php echo $row['class_id']; ?>" class="form-control input-md" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="edit"></label>
  <div class="col-md-4">
    <button id="submit" name="save" class="btn btn-success">Wijzigen</button>
    <button id="submit" name="cancel" class="btn btn-success"formaction="http://localhost/elo/userpage.php">Terug</button>
  </div>
</div>

</fieldset>
</form>

                    
        <div style="clear:both;"></div>
          
</body>
</html>