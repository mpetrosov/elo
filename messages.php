<?php
include 'includes/dbh.php';
include 'includes/header.php';
?>

<body>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 messages">
          <div>
            <div class="send">Verstuur bericht <hr></div>
              <?php
              $id = $_SESSION['u_id'];
              $sql = "SELECT messages.message, messages.sender, messages.id FROM messages WHERE messages.st_id = $id ORDER BY id DESC";

              $result = $conn->query($sql);
              foreach ($result as $row) {
                echo "<div class='message' onclick=getMessage(" .$row['id'] . ");>" . $row['sender'] . "<br>";
                echo $row['message'] . "</div>";
              }
            ?>
          </div>
        </div>

        <div class="col-sm-7 textmessages"><div id="fullmessage"></div>
          <div class="sendform">
           <div class="form-group">
            <form action="includes/sendmessage.php" method="POST">
              <select class="form-control" name=id>
                <?php
                  $sql = "SELECT * FROM students";
                  $result = mysqli_query($conn, $sql);
                    foreach ($result as $row) {
                      echo  "<option value=" . $row['st_id'] . ">" . $row['firstname'] . " " . $row['lastname'] . "</option>";
                  } ?>
              </select><br>
              <textarea class="form-control" name="message" maxlength="500" cols="40" rows="4"></textarea>
              <textarea name="sender" style="display:none;"><?php echo $_SESSION['u_first'] . " " . $_SESSION['u_last']; ?> </textarea>
              <button type="submit">send</button>
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


  function getMessage(id){
      var xhttp = new XMLHttpRequest();
      xhttp.open("GET", "includes/getmessage.php?id=" + id, false);
      xhttp.send();
      document.getElementById("fullmessage").innerHTML = xhttp.responseText;
      }

</script>

</html>
