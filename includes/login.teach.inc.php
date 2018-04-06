<?php
session_start();

    if (isset($_POST['submit'])) {
        include_once 'dbh.php';

        $email = mysqli_real_escape_string($conn, $_POST['t-email']);
        $pwd = mysqli_real_escape_string($conn, $_POST['t-pwd']);
        //Error handlers
        //Check for empty fields
        if ( empty($email)||empty($pwd)){
            header("Location: ../login.teach.php?login=empty");
            exit();
        } else {
            $sql = "SELECT * FROM teachers WHERE teach_email ='$email'"; //OR email = '$uid'
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck < 1){
                header("Location: ../login.teach.php?login=error1");
                exit();
            } else {
                if ($row = mysqli_fetch_assoc($result)){
                    //De- the password
                    $hashedPwdCheck = password_verify($pwd, $row['teach_pwd']);
                    if ($hashedPwdCheck == false){
                        header("Location: ../login.teach.php?login=error2");
                        exit();
                    } elseif ($hashedPwdCheck == true) {
                        //Log in the user here
                        $_SESSION['t_id'] = $row['teach_id'];
                        $_SESSION['t_first'] = $row['teach_first'];
                        $_SESSION['t_last'] = $row['teach_last'];
                        $_SESSION['t_email'] = $row['teach_email'];
                        // $_SESSION['u_uid'] = $row['class_id'];
                        // $_SESSION['color'] = $row['color'];
                        // $_SESSION['u_is_admin'] = $row['is_admin'];
                        header("Location: ../backend.php?login=success");

                        exit();
                    }
                }
            }
        }
    } else {
        header("Location: ../login.teach.php?login=error");
        exit();
    }
