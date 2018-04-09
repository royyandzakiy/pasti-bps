<?php 
    require('blog_connect.php'); 

    // sql_connect('NAMA_DB');

    if (session_status() != PHP_SESSION_NONE) {
        $_SESSION['logged_in'] = false;
        session_destroy();
    }

    header('location:login.php');
?>