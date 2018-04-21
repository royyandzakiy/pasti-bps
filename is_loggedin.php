<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    

    if(isset($_SESSION['logged_in'])) {        
        if (!$_SESSION['logged_in']) {
            header('location:login.php');
        }
    } else {
        header('location:login.php');        
    }
?>