<?php
include 'includes/dbh.php';
include 'includes/header.php';
date_default_timezone_set('Europe/Amsterdam');

?>

<body>
            <div class='container' id='forgotcontainer'>
                <?php
                     $get_code = '';
                    if (isset($_GET['code'])){
                        $get_email = $_GET['email'];
                        $get_code = $_GET['code'];

                        $query = mysqli_query($conn, "SELECT * FROM students WHERE email='".$get_email."'");
                        while($row = mysqli_fetch_assoc($query)){
                            $db_code = $row['passreset'];
                            $db_email = $row['email'];
                        }

                        if ( $get_email == $db_email &&  $get_code == $db_code){

                            echo "
                            <form class='form-horizontal' action ='pass_resset_complete.php?code=$get_code' method='POST'>
                            <fieldset>
                            <div class='form-group'>
                                <label class='col-md-4 control-label' for='pass-forget'>Vul je nieuwe wachtword in </label>
                                <div class='col-md-4'><input id='passrequire' type='password' name='newpass' class='form-control input-md'></div>
                            </div>
                            <div class='form-group'>
                                <label class='col-md-4 control-label' for='passrepeat'>Vul nog een keer je wachtword in </label>
                                <div class='col-md-4'><input id='passrepeat' type='password' name='newpass1' class='form-control input-md'></div>
                            </div>
                                <input type='hidden' name='email' value='$db_email'>
                            <div class='form-group'>
                                <label class='col-md-4 control-label' for='pass-forget'></label>
                                <div class='col-md-4'><button id='submit' class='btn btn-basic' name='submit' type='submit'>Update</button></div>
                            </div>
                            </fieldset>
                            </form>


                            ";
                        }
                    }


                if (empty($_GET['code'])){

                    echo "<form class='form-horizontal' action ='forgot_password.php' method='POST'>
                            <fieldset>
                            <div class='form-group'>
                            <label class='col-md-4 control-label' for='pass-forget'></label>
                                <div class='col-md-4' id='forgottext'>Vul je email adres in, je krijgt een link toegestuurd waarmee je je wachtwoord
                                kunt wijzigen.</div>
                            </div>

                            <div class='form-group'>
                                <label class='col-md-4 control-label' for='pass-forget'></label>
                                <div class='col-md-4'><input id='pass-forget' type='text' name='email' placeholder='email' class='form-control input-md'></div>
                            </div>
                            <div class='form-group'>
                                <label class='col-md-4 control-label' for='pass-forget'></label>
                                <div class='col-md-4'><button id='submit' class='btn btn-basic' name='submit' type='submit'>Verstuur</button></div>
                            </div>
                            </fieldset>
                        </form>
                        ";
                    if(isset($_POST['email'])) {
                        $email = $_POST['email'];

                        //check if email exists
                        $query = mysqli_query($conn, "SELECT * FROM students WHERE email = '".$email."'");
                        $numrow = mysqli_num_rows($query);
                        if ($numrow != 0){


                            while ($row = mysqli_fetch_assoc($query)){
                                $db_email = $row['email'];
                            }

                            if ($email == $db_email) {
                                //generate new password
                                $code = rand(10000, 1000000);

                                //send the password to the user
                                $to = $db_email;
                                $subject = "Password reset";
                                $body = "Klik op deze link om wachtwoord te wijzigen
                                http://localhost/elo/forgot_password.php?code=$code&email=$email" ;
                                $headers = "From: $email";

                                //update the database
                                mysqli_query($conn, "UPDATE students SET passreset='$code' WHERE email='$email'");

                                mail($to, $subject, $body, $headers);

                                echo "Check je email";

                            } else {
                                echo "Email is faut";
                            }
                        }
                    }
                }

                ?>
        <div style="clear:both;"></div>
      <div><img class="imagereg" src="img/owl.png"></div>
    </div>

</body>
</html>
