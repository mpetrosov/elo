<?php
    session_start();
    include 'includes/dbh.php';
    include 'includes/functions.php';

    if(isset($_POST['rewardBtn']))
    {
        rewardBtn();
    }
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>


    <div class="jumbotron" id="jumbo">
      <div class="container">

      <?php $teachers = getTeachersName();?>
      <?php foreach ($teachers as $teacher):?>
      <h2><?=$teacher['teach_first']?> <?=$teacher['teach_last']?>
          <?php endforeach;?>
       <small id="headteach">leerkracht</small></h2>
       <form class="signout" action="includes/logout.teach.inc.php" method="POST">
           <button type="submit" name="submit" class="btn btn-default">Uitloggen</button>
       </form>
     </div>
    </div>
  <div class="container-fluid">


<div id="navagation"
		<ul class="nav nav-pills">
			<li><a href="backend.php?group=1">Groep 1</a></li>
			<li><a href="backend.php?group=2">Groep 2</a></li>
			<li><a href="backend.php?group=3">Groep 3</a></i>
			<li><a href="backend.php?group=4">Groep 4</a></li>
      <li><a href="backend.php?group=5">Groep 5</a></li>
      <li><a href="backend.php?group=6">Groep 6</a></li>
      <li><a href="backend.php?group=7">Groep 7</a></li>
		</ul>
</div>



<?php $students = get_StudentsGroup();?>
<div class="row">
  <div class="col-sm-6">
    <?php foreach ($students as $student):?>
    <div class="well well-lg"><a href="backend.php?group=<?php echo $_GET['group'] ?>&id=<?php echo $student['st_id'] ?>"><?=$student['lastname'] ." ". $student['firstname'];?></a>
    </div>
    <?php endforeach;?>
  </div>


<?php $students = getStudentsById();?>
<div class="col-sm-6">
<?php foreach ($students as $student):?>

    <div class="right panel panel-default">
                <div class="panel-body"><h2> <?= $student['firstname']." ". $student['lastname'];?></h2><hr>


                <?php
                $dateOfBirth =  $student['birthday'];
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                $student['birthday']= $diff->format('%y');
                ?>
                <h3>Leeftijd: <?=$student['birthday']?></h3>
                <h3>Bonus: <?=$student['bonus']?></h3>
                <h3>groep: <?=$student['class_id']?></h3>
                <hr>
                <div class='points'> <h2>punten: <?=$student['score']?></h2></div>
                <?php if ($student['bonus'] < 10): ?>
                <form method="POST" action="backend.php?group=<?=$student['class_id'] ?>&id=<?=$student['st_id']?>">
                    <button class="btn btn-success" type="submit" name="rewardBtn">Belonen</button>
                </form>
                <?php endif; ?>
              </div>
    </div>
<?php endforeach;?>
</div>
</div>
</div>
        <script></script>
    </body>
</html>
