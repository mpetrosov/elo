
<?php

include 'includes/header.php'

?>

<h2>Registreer</h2>

    <form class="form-horizontal" action="includes/signup.inc.php" method="POST">
    <fieldset>

    <div class="form-group">
      <label class="col-md-4 control-label" for="firstname">Voornaam</label>
      <div class="col-md-4">
      <input id="name" type="text" name="first" placeholder="voornaam" class="form-control input-md" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="lastname" >Achternaam</label>
      <div class="col-md-4">
      <input id="name" type="text" name="last" placeholder="achternaam" class="form-control input-md" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="class" >Groep</label>
      <div class="col-md-4">
      <input id="city" type="text" name="uid" placeholder="Enter your city" class="form-control input-md" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="email"  >Email</label>
      <div class="col-md-4">
      <input id="email" type="text" name="email" placeholder="Enter your email id" class="form-control input-md" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="password">Password</label>
      <div class="col-md-4">
        <input id="password" type="password" name="pwd" placeholder="Enter a password" class="form-control input-md" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="signup"></label>
      <div class="col-md-4">
        <button id="submit" name="submit" class="btn btn-success">Sign Up</button>
      </div>
    </div>

    </fieldset>
    </form>

</body>
</html>
