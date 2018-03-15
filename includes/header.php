<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>ELO kids</title>
    <link href="https://fonts.googleapis.com/css?family=Chicle" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <header>
            <nav>
                <div class="main-wrapper">
                    <ul>
                        <li><a href="index.php">Home</a></il>
                    </ul>
                    <div class="nav-login">
                        <?php
                        
                            if (isset($_SESSION['u_id'])){
                                // echo '<div class="title">Spelgoed</div>';
                                echo '<form action="includes/logout.inc.php" method="POST">
                                <button type="submit" name="submit">logout</button>

                                </form>';
                            }else{
                                // echo '<div class="title">Spelgoed</div>';
                               echo '<form action="includes/login.inc.php" method="POST">
                                    <input type="text" name="uid" placeholder="Username/email">
                                    <input type="password" name="pwd" placeholder="password">
                                    <button type="submit" name="submit">login</button>
                                </form>
                                <a href="signup.php">sign up</a>';
                            }
                        
                        ?>
                        
                    </div>

                </div>
            </nav>
    </header>