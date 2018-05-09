<?php 
    require('blog_connect.php'); 

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    $_SESSION['logged_in'] = false;
    unset($_SESSION['nama']);
    unset($_SESSION['pengalaman_survei']);
    unset($_SESSION['pengalaman_SIBS']);
    unset($_SESSION['level_pengetahuan']);
    unset($_SESSION['konsep_terakhir']);
    unset($_SESSION['topik_terakhir']);
    unset($_SESSION['nip']);
    unset($_SESSION['konsep_aktif']);
    unset($_SESSION['topik_aktif']);
    session_destroy();

    header('location:login.php');
?>