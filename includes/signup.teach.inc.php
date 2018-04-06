<?php

    if(isset($_POST['submit'])){

        include_once 'dbh.php';

        $first = mysqli_real_escape_string($conn, $_POST['t-first']);
        $last = mysqli_real_escape_string($conn, $_POST['t-last']);
        $email = mysqli_real_escape_string($conn, $_POST['t-email']);
        $pwd = mysqli_real_escape_string($conn, $_POST['t-pwd']);
        //Error handlers
        //Check for empty fields
        if(empty($first) || empty($last) || empty($email) || empty($pwd)){

            header("Location: ../signup.teach.php?signup=empty");
            exit();

        }else{
            //Check if input characters are valid
            if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
                header("Location: ../signup.teach.php?signup=invalid");
                exit();
            }else{
                //Check if email is valid
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    header("Location: ../signup.teach.php?signup=email");
                    exit();
                }else{
                    $sql = "SELECT * FROM teachers WHERE teach_email='$email'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0){
                        header("Location: ../signup.teach.php?signup=usertaken");
                        exit();
                    }else{
                        // Hashing the password
                        $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT);
                        $sql = "INSERT INTO teachers (teach_first, teach_last, teach_email, teach_pwd) VALUES ('$first', '$last','$email', '$hashedPwd');";

                        mysqli_query($conn, $sql);
                        header("Location: ../login.teach.php?register=succes");
                        exit();
                    }
                }
            }
        }

    }else{
        header("Location: ../signup.teach.php");
        exit();
    }


?>
