<?php
    include 'includes/dbh.php';
    include 'includes/header.php';


    $newpass = $_POST['newpass'];
    $newpass1 = $_POST['newpass1'];
    $post_email = $_POST['email'];
    $code = $_GET['code'];

    //validation
    if($newpass == $newpass1){
        
        $enc_pass = password_hash($newpass, PASSWORD_BCRYPT);
        mysqli_query($conn, "UPDATE students SET pwd='$enc_pass', passreset='' WHERE email='$post_email'");
        //mysqli_query($conn, "UPDATE users SET passreset='0' WHERE email='$post_email'");

        echo"Je wachtwoord is gewijzigd<p><a href='http://localhost/elo/index.php'>Klik hier om in te logen</a></p>";

    } else {
        echo "Wachtwoord is faut <a href='forgot_password.php?code=$code&email=$post_email'>Klik hier om terug te gaan</a>";
    }


?>

    </body>
</html>