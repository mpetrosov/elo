<?php
session_start();
include 'includes/dbh.php';
include 'includes/functions.php';

?>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chicle" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
	<title>Leerkracht</title>
</head>
<body>
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
</body>

<?php $students = get_StudentsGroup();?>
 <?php foreach ($students as $student):?>
<script> 

    // function getStudentsGroup(link){
    //     var group = link;
    // // alert(group);
    //     xhttp.open("GET", "includes/functions.php?group=" + group, false);
    //     xhttp.send();
    //     document.getElementById("demo").innerHTML = xhttp.responseText;
    // }


</script>
<div class="st-group"><a href="backend.php?"><?=$student['lastname'] ." ". $student['firstname'];?></a></div>
<?php endforeach;?>
</html>