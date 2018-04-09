<?php
// include_once('includes/session.inc.php');
include 'includes/dbh.php';
include 'includes/conf.php';
include 'includes/header.php';
include 'includes/functions.php';

// include_once('includes/auth.inc.php');

if(isset($_GET['id'])&& $_GET['id']){

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    if (isset($_POST['save'])){

        $firstname = strip_tags(trim($_POST['firstname']));
        $lastname = strip_tags(trim($_POST['lastname']));
        $birthday = strip_tags(trim($_POST['birthday']));
        $class_id = strip_tags(trim($_POST['class_id']));

        $sql = 'UPDATE `students` SET `firstname`="'.$firstname.'", `lastname`="'.$lastname.'", `class_id` = "'.$class_id.'",`birthday`="'.$birthday.'" WHERE `st_id`='.$id;
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
        header('Location: userpage.php');
    }

}else{
    die(header('Location: '.BASE_URL . "edit.php?id=$id"));
}





?>
<!DOCTYPE html>
<?php
  $students = getStudents();
?>
<?php foreach ($students as $student):?>
<?php endforeach;?>

<body id="regbody">
<div class="container" >
<div class="row">


  </div>
</div>
<div class="container" id="regcontainer"><h2>Profiel wijzigen</h2><hr>
<form class="form-horizontal" action="edit.php?id=<?php echo $id; ?>" method="POST">
<fieldset>

<div class="form-group">
  <label class="col-md-4 control-label" for="firstname">Voornaam</label>
  <div class="col-md-4">
  <input id="firstname" type="text" name="firstname" placeholder="voornaam" value="<?php echo $student['firstname']; ?>" class="form-control input-md" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="lastname" >Achternaam</label>
  <div class="col-md-4">
  <input id="lastname" type="text" name="lastname" placeholder="achternaam" value="<?php echo $student['lastname']; ?>" class="form-control input-md" required="">
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="class" >Geboortedatum</label>
  <div class="col-md-4">
  <input id="date" type="date" name="birthday" placeholder="geboortedatum" value="<?php echo $student['birthday']; ?>" class="form-control input-md" required="">
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="class" >Groep</label>
  <div class="col-md-4">
  <input id="class" type="text" name="class_id" placeholder="groep"  value="<?php echo $student['class_id']; ?>" class="form-control input-md" required="">
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="edit"></label>
  <div class="col-md-4">
    <button id="submit" name="save" class="btn btn-success editbtn">Wijzigen</button>
    <button id="submit" name="cancel" class="btn btn-success editbtn" formaction="../elo/userpage.php">Terug</button>
  </div>
</div>

    </fieldset>
    </form>
    <div style="clear:both;"></div>

    <div><img class="imagereg" src="<?php echo $student['avatar']; ?>"</div>

</div>
<script>
$().ready(function() {
      $('#regcontainer').css({
          'background-color': '#' + '<?=$student['color']?>',
      })

      $('#logoutbutton, .editbtn').css({
          'background-color': '#' + '<?=$student['colorsec']?>',
      })

      $('.editbtn, #logoutbutton').css({
          'color': '#' + '<?=$student['fontcolor']?>',
      })

      ;
  });

var color =  '<?=$student['color']?>';

  if ((color === '800000') || (color === '600080')) {
    $('#regcontainer').css({
        'color': '#f9f9f9'
    })
  }

</script>
</body>
</html>
