<?php

function isAuthenticated() {
    return (
        isset($_SESSION['u_id']) && 
        isset($_SESSION['u_email']) && 
        isset($_SESSION['u_username']) && 
        isset($_SESSION['u_is_admin']) && 
        $_SESSION['u_id'] && 
        $_SESSION['u_email'] && 
        $_SESSION['u_username']
    );
}


function isAdmin() {
    return (
        isset($_SESSION['u_id']) && 
        isset($_SESSION['u_email']) && 
        isset($_SESSION['u_username']) && 
        isset($_SESSION['u_is_admin']) && 
        $_SESSION['u_id'] && 
        $_SESSION['u_email'] && 
        $_SESSION['u_username'] &&
        $_SESSION['u_is_admin'] == 1
    );
}


function logout() {
    session_start();
    session_unset();
    session_destroy();
}
