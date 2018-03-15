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
    <link rel="stylesheet" type="text/css" href="style.css">
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
                                
                                echo '<form action="includes/logout.inc.php" method="POST">
                                <button type="submit" name="submit">logout</button>

                                </form>';
                            }else{
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