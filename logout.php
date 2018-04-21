<?php 
    require('blog_connect.php'); 

    if (session_status() != PHP_SESSION_NONE) {
        $_SESSION['logged_in'] = false;
        session_destroy();
    }

    header('location:login.php');
?>