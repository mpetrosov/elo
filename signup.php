
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
<h2>Registreer</h2><hr>
    <form class="form-horizontal" action="includes/signup.inc.php" method="POST">
    <fieldset>

    <div class="form-group">
      <label class="col-md-4 control-label" for="firstname">Voornaam</label>
      <div class="col-md-4">
      <input id="firstname" type="text" name="first" placeholder="voornaam" class="form-control input-md" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="lastname" >Achternaam</label>
      <div class="col-md-4">
      <input id="lastname" type="text" name="last" placeholder="achternaam" class="form-control input-md" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="class" >Geboortedatum</label>
      <div class="col-md-4">
      <input id="date" type="date" name="birthday" placeholder="geboortedatum" class="form-control input-md" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="class" >Groep</label>
      <div class="col-md-4">
      <input id="city" type="text" name="group" placeholder="groep" class="form-control input-md" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="email"  >Email</label>
      <div class="col-md-4">
      <input id="email" type="text" name="email" placeholder="email adres" class="form-control input-md" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="password">Wachtwoord</label>
      <div class="col-md-4">
        <input id="password" type="password" name="pwd" placeholder="kies een wachtwoord" class="form-control input-md" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="signup"></label>
      <div class="col-md-4">
        <button id="submit" name="submit" class="btn btn-basic">Registreren</button>
      </div>
    </div>

    </fieldset>
    </form>

    <div><img class="imagereg" src="img/owl.png"></div>

</div>
</body>
</html>
