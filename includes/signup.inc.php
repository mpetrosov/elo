<?php

    if(isset($_POST['submit'])){

        include_once 'dbh.php';

        $first = mysqli_real_escape_string($conn, $_POST['first']);
        $last = mysqli_real_escape_string($conn, $_POST['last']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $group = mysqli_real_escape_string($conn, $_POST['group']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
        //Error handlers
        //Check for empty fields
        if(empty($first) || empty($last) || empty($email) || empty($pwd) || empty($birthday)){

            header("Location: ../signup.php?signup=empty");
            exit();

        }else{
            //Check if input characters are valid
            if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
                header("Location: ../signup.php?signup=invalid");
                exit();
            }else{
                //Check if email is valid
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    header("Location: ../signup.php?signup=email");
                    exit();
                }else{
                    $sql = "SELECT * FROM students WHERE email='$email'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0){
                        header("Location: ../signup.php?signup=usertaken");
                        exit();
                    }else{
                        // Hashing the password
                        $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT);
                        $sql = "INSERT INTO students (firstname, lastname, email, class_id, pwd, birthday) VALUES ('$first', '$last','$email', '$group', '$hashedPwd', '$birthday');";

                        mysqli_query($conn, $sql);
                        header("Location: ../index.php?register=succes");
                        exit();
                    }
                }
            }
        }

    }else{
        header("Location: ../signup.php");
        exit();
    }


