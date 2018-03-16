<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <header>
            <nav>
              <div class="row headerrow">
                <div class="main-wrapper col-xs-6">
                  <?php

                      if (isset($_SESSION['u_id'])){

                      }else{
                         echo '
                          <a class="register" href="signup.php">sign up</a>';
                      }

                  ?>

                </div>
                    <div class="col-xs-6 nav-login">
                        <?php

                            if (isset($_SESSION['u_id'])){

                                echo '<form class="signout" action="includes/logout.inc.php" method="POST">
                                <button type="submit" name="submit">logout</button>

                                </form>';
                            }else{
                               echo '<form class="signup" action="includes/login.inc.php" method="POST">
                                    <input type="text" name="uid" placeholder="Username/email">
                                    <input type="password" name="pwd" placeholder="password">
                                    <button type="submit" name="submit">login</button>
                                </form>
                                ';
                            }

                        ?>

                    </div>

                </div>

            </nav>
    </header>
