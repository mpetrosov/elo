<?php
session_start();

    if (isset($_POST['submit']) || true) {
        include_once 'dbh.php';

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        //Error handlers
        //Check for empty fields
        if ( empty($email) ||empty($pwd)){
            header("Location: ../index.php?login=empty");
            exit();
        } else {
            $sql = "SELECT * FROM students WHERE email ='$email'"; //OR email = '$uid'
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck < 1){
                header("Location: ../index.php?login=error1");
                exit();
            } else {
                if ($row = mysqli_fetch_assoc($result)){
                    //De-hashing the password
                    $hashedPwdCheck = password_verify($pwd, $row['pwd']);
                    if ($hashedPwdCheck == false){
                        header("Location: ../index.php?login=error2");
                        exit();
                    } elseif ($hashedPwdCheck == true) {
                        //Log in the user here
                        $_SESSION['u_id'] = $row['st_id'];
                        $_SESSION['u_first'] = $row['firstname'];
                        $_SESSION['u_last'] = $row['lastname'];
                        $_SESSION['u_email'] = $row['email'];
                        $_SESSION['u_uid'] = $row['class_uid'];
                        // $_SESSION['u_is_admin'] = $row['is_admin'];
                        header("Location: ../userpage.php?login=success");

                        exit();
                    }
                }
            }
        }
    } else {
        header("Location: ../index.php?login=error");
        exit();
    }
