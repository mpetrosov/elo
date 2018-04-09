<?php
session_start(); ?>

<?php

$id = $_GET['id'];

include('dbh.php');

  $sql = "SELECT messages.id, messages.sender, messages.message, students.avatar FROM messages INNER JOIN students ON
    messages.send_id = students.st_id WHERE $id = messages.id";

    $result = mysqli_query($conn, $sql);
      foreach ($result as $row) {

        echo "<img class='messageavatar2' src=" . $row['avatar'] . "><div class='sendermain'>Afzender: </div><div class='mainviewsender'>" . $row['sender'] ;
        echo "<button class='glyphicon glyphicon-trash deletemessage' onclick=deleteMessage(" . $row['id'] . ")></button><hr>";
        echo "<div class='mainviewmessage'> " . $row['message'] . "</div>";
      }

?>


<form action='includes/sendmessage.php' method='POST'>
<select style="display:none;" class="form-control" name="id">
  <?php

  $sql = "SELECT * FROM messages WHERE $id = messages.id";
  $result = mysqli_query($conn, $sql);
    foreach ($result as $row) {
      echo  "<option value=" . $row['send_id'] . ">" . $row['sender'] . "</option>";

  } ?>

</select>
<textarea name="senderid" style="display:none;"><?php echo $_SESSION['u_id']; ?> </textarea><br>
Beantwoord:
<textarea class='form-control' name='message' maxlength='500' cols='40' rows='4'></textarea>
<textarea name='sender' style='display:none;'><?php echo $_SESSION['u_first'] . ' ' . $_SESSION['u_last']; ?> </textarea>
<button class='glyphicon glyphicon-envelope mainsendbutton' type='submit'>  Verstuur</button>
</form>
