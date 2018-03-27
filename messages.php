<?php
include 'includes/dbh.php';
include 'includes/functions.php';
include 'includes/header.php';
?>
<?php
  $students = get_Students();
?>

<?php foreach ($students as $student):?>
<div class="col-xs-4"><?=$student['firstname'] . " " . $student['lastname']?></div>
    <?php endforeach;?>


<button onclick=getColorSec();>click</button>

<script>
    function getColorSec(link){

      var xhttp = new XMLHttpRequest();
      xhttp.open("GET", "includes/getmessage.php", false);
      xhttp.send();
      document.getElementById("demo").innerHTML = xhttp.responseText;

      }
</script>

<div id="demo"></div>
