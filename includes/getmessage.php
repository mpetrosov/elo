<?php
session_start(); ?>

<?php

$id = $_GET['id'];

include('dbh.php');
    $sql = "SELECT * FROM messages WHERE $id = messages.id";
    $result = mysqli_query($conn, $sql);
      foreach ($result as $row) {
        echo "Afzender: <div class='mainviewsender'>" . $row['sender'] . "</div><hr>";
        echo "<div class='mainviewmessage'>" . $row['message'] . "</div>";
        echo "<hr>";


      }

?>

<form action='sendmessage.php' method='POST'>
<select class="form-control" name="id">
  <?php

  $sql = "SELECT * FROM students";
  $result = mysqli_query($conn, $sql);
    foreach ($result as $row) {
      if ($_SESSION['u_id'] == $row['st_id']) {
      }
      else {
      echo  "<option value=" . $row['st_id'] . ">" . $row['firstname'] . " " . $row['lastname'] . "</option>";
    }

  } ?>

</select>
<textarea class='form-control' name='message' maxlength='500' cols='40' rows='4'></textarea>
<button class='glyphicon glyphicon-envelope mainsendbutton' type='submit'>  Verstuur</button>
<textarea name='sender' style='display:none;'>
  <?php echo $_SESSION['u_first'] . ' ' . $_SESSION['u_last']; ?> </textarea>
</form>

<!-- else {
echo  "<option value=" . $row['st_id'] . ">" . $row['firstname'] . " " . $row['lastname'] . "</option>";
}

} ?> -->
<!-- </select><br>
<textarea class="form-control" name="message" maxlength="500" cols="40" rows="4"></textarea>
<textarea name="sender" style="display:none;"><?php echo $_SESSION['u_first'] . " " . $_SESSION['u_last']; ?> </textarea>
<button class="glyphicon glyphicon-envelope mainsendbutton" type="submit">  Verstuur</button>
</form> -->
