<?php
include 'includes/dbh.php';
include 'includes/header.php';
include 'includes/functions.php';
?>

<body>
  <?php
    $students = get_Students();
  ?>
  <?php foreach ($students as $student):?>
  <?php endforeach;?>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 messagehead">Berichten</div>
      </div>

      <div class="row">
        <div class="col-sm-4 messages" >
          <div>
            <div class="send" >Nieuw bericht <div class="glyphicon glyphicon-envelope"></div></div><hr>
            <div id="mainmessage">

              <?php
              $id = $_SESSION['u_id'];
              $sql = "SELECT messages.message, messages.sender, messages.id, students.avatar FROM messages INNER JOIN students ON
              messages.send_id = students.st_id WHERE messages.st_id = $id ORDER BY id DESC";

              $result = $conn->query($sql);
              foreach ($result as $row) {
                echo "<div class='message'onclick=getMessage(" .$row['id'] . ");>" . "<img class='messageavatar' src=" . $row['avatar'] . "><div class='student'>" . $row['sender'] . "</div>";
                echo "<div class='overview'>" . $row['message'] . "</div></div>";

              }
            ?>
          </div>
        </div>
        </div>

        <div class="col-sm-8 textmessages"><div id="fullmessage"></div>
          <div class="sendform">
           <div class="form-group">Verstuur aan:
            <form action="includes/sendmessage.php" method="POST">
              <select class="form-control" name="id" required>
                 <option disabled selected value> -- kies een ontvanger -- </option>
                <?php
                  $sql = "SELECT * FROM students";
                  $result = mysqli_query($conn, $sql);
                    foreach ($result as $row) {
                      // if ($_SESSION['u_id'] == $row['st_id']) {
                      // }
                      // else {
                      echo  "<option value=" . $row['st_id'] . ">" . $row['firstname'] . " " . $row['lastname'] . "</option>";
                    // }

                  } ?>
              </select><br>Bericht:
              <textarea class="form-control" name="message" maxlength="500" cols="40" rows="4"></textarea>
              <textarea name="senderid" style="display:none;"><?php echo $_SESSION['u_id']; ?></textarea>
              <textarea name="sender" style="display:none;"><?php echo $_SESSION['u_first'] . " " . $_SESSION['u_last']; ?> </textarea>
              <button class="glyphicon glyphicon-envelope mainsendbutton" type="submit">  Verstuur</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script>

$('.sendform').show();
$(".send").click(function(){
      $("#fullmessage").hide();
      $(".sendform").show();
})
$(".message").click(function(){
      $(".sendform").hide();
      $("#fullmessage").show();
})

$().ready(function() {

    var color =  '<?=$student['color']?>';

    $('.messagehead, .messages, .textmessages').css({
        'background-color': '#' + color,
    })

    ;

});

  function getMessage(id){
      var xhttp = new XMLHttpRequest();
      xhttp.open("GET", "includes/getmessage.php?id=" + id, false);
      xhttp.send();
      document.getElementById("fullmessage").innerHTML = xhttp.responseText;
      }

  function deleteMessage(id){
      var xhttp = new XMLHttpRequest();
      xhttp.open("DELETE", "includes/sendmessage.php?id=" + id, false);
      xhttp.send();

      document.getElementById("fullmessage").innerHTML = xhttp.responseText;
      setTimeout(function() {
          location.reload();
      }, 500);
    }

</script>

</html>
