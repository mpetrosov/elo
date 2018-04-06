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
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chicle" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script>
        $(document).ready(function)){
            $("button").click
        }
    </script> -->

	<title>Leerkracht</title>
</head>
<body>

<div class="teach-div">
<?php $teachers = getTeachersName();?>
<?php foreach ($teachers as $teacher):?>
<h2><?=$teacher['teach_first']?> <?=$teacher['teach_last']?></h2>
</div>
<?php endforeach;?>

<form class="signout" action="includes/logout.teach.inc.php" method="POST">
    <button type="submit" name="submit" id="logoutbutton">Uitloggen</button>
</form>

<header>
	<nav class="dws-menu">
		<ul>
			<li><a href="backend.php?group=1">Groep 1</a></li>
			<li><a href="backend.php?group=2">Groep 2</a></li>
			<li><a href="backend.php?group=3">Groep 3</a></i>
			<li><a href="backend.php?group=4">Groep 4</a></li>
            <li><a href="backend.php?group=5">Groep 5</a></li>
            <li><a href="backend.php?group=6">Groep 6</a></li>
            <li><a href="backend.php?group=7">Groep 7</a></li>
		</ul>
	</nav>
</header>


<?php $students = get_StudentsGroup();?>
<?php foreach ($students as $student):?>
<div class="st-group"><a href="backend.php?group=<?php echo $_GET['group'] ?>&id=<?php echo $student['st_id'] ?>"><?=$student['lastname'] ." ". $student['firstname'];?></a></div>
<?php endforeach;?>
<?php $students = getStudentsById();?>
<?php foreach ($students as $student):?>
    
    <div class="right">
                <div class="demo"><div class="head"><h1> <?= $student['firstname']." ". $student['lastname'];?></h1 ></div></div> 
            
                
                <?php
                $dateOfBirth =  $student['birthday'];
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                $student['birthday']= $diff->format('%y');
                ?>
            
                <h2>Leeftijd: <?=$student['birthday']?></h2>
                <br>
                <h2>Bonus: <?=$student['bonus']?></h2>
                <br>
                <h2>groep: <?=$student['class_id']?></h>
                <br><hr>
                <div class='points'> <h1>punten: <?=$student['score']?></h1></div>
                <?php if ($student['bonus'] < 10): ?>
                <form method="POST" action="backend.php?group=<?=$student['class_id'] ?>&id=<?=$student['st_id']?>">
                    <button type="submit" name="rewardBtn">Belonen</button>
                </form>
                <?php endif; ?>
    </div>
<?php endforeach;?>  
        <script></script>
    </body>
</html>