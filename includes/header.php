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

    <header>
            <nav>
              <div class="row headerrow">
                <div class="main-wrapper col-xs-6">
                    <img id="logo" src="img/klaver5.png">

                </div>
                    <div class="col-xs-6 nav-login">
                        <?php
                            if (isset($_SESSION['u_id'])){
                                echo '<form class="signout" action="includes/logout.inc.php" method="POST">
                                <button type="submit" name="submit" id="logoutbutton">logout</button>
                                </form>';

                            }else{
                               echo '<form class="signup" action="includes/login.inc.php" method="POST">
                                    <input type="text" name="email" placeholder="Username/email">
                                    <input type="password" name="pwd" placeholder="password">
                                    <button type="submit" id="loginbutton" name="submit">login</button><br>
                                    </form><hr>
                                    <a class="register" href="signup.php">Registreren</a>  ';
                            }

                        ?>

                    </div>
                </div>
            </nav>
    </header>
