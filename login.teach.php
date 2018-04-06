<?php

session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elo Kids</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>

<body id="regbody">
<div class="container" >
<div class="row">

  <div class="col-xs-12"></div>
  <div class="main-wrapper col-xs-8">
  <a href="index.php"><img id="logo" src="img/klaver5.png"></a></div>

  </div>
</div>
<div class="container" id="regcontainer">
<h2>Login Leerkracht</h2><hr>
    <form class="form-horizontal" action="includes/login.teach.inc.php" method="POST">
    <fieldset>

    <div class="form-group">
      <label class="col-md-4 control-label" for="email">Email</label>
      <div class="col-md-4">
      <input id="email" type="text" name="t-email" placeholder="email adres" class="form-control input-md" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="password">Wachtwoord</label>
      <div class="col-md-4">
        <input id="password" type="password" name="t-pwd" placeholder="kies een wachtwoord" class="form-control input-md" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="login-admin"></label>
      <div class="col-md-4">
        <button id="submit" name="submit" class="btn btn-basic">login</button>
        
      </div>
    </div>

    </fieldset>
    </form>
    <button class="btn btn-basic" onclick="location.href = 'signup.teach.php'">Registreren</button>
    <div><img class="imagereg" src="img/owl.png"></div>
    <!-- <div><a href="backend.php"><img class="imagereg" src="img/shield.png"></a></div> -->

</div>
</body>
</html>
