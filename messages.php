<?php
include 'includes/dbh.php';
include 'includes/header.php';
?>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-4"><div id="demo"></div>
          One of three columns
        </div>
        <div class="col-sm-4"><div id="demo2"></div>
          One of three columns
        </div>
        <div class="col-sm-4">
          One of three columns
        </div>
      </div>
    </div>
<button onclick=getColorSec();>click</button>
  </body>



<script>


  function getColorSec(){

      var xhttp = new XMLHttpRequest();
      xhttp.open("GET", "includes/getmessage.php", false);
      xhttp.send();

      document.getElementById("demo").innerHTML = xhttp.responseText;

      }


function sendMessage(id) {
      document.getElementById("demo2").innerHTML =
        'Versturen aan: ' +
        '<form action="includes/sendmessage.php" method="POST">' +
        '<input name="id" type="hidden" value=' + id + ">" +
        '<textarea name="message" maxlength="500" cols="40" rows="4"></textarea>' +
        '<button type="submit">send</button>';
        '</form>'
       }


</script>



</html>
