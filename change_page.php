<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    echo $_GET['goto_konsep'];
    echo $_GET['goto_topik'];

    $konsep_samadengan_lebihkecil = (int) $_GET['goto_konsep'] <= (int) $_SESSION['konsep_terakhir'];
    $topik_samadengan_lebihkecil = (int) $_GET['goto_topik'] <= (int) $_SESSION['topik_terakhir'];
    $topik_plussatu = (int) $_GET['goto_topik'] == ((int) $_SESSION['topik_terakhir'] + 1);
    $allowed = $konsep_samadengan_lebihkecil && ($topik_samadengan_lebihkecil || $topik_plussatu);

    if ($allowed) {
        // change session
        $_SESSION['konsep_aktif'] = $_GET['goto_konsep'];
        $_SESSION['topik_aktif'] = $_GET['goto_topik'];
        header('location:index.php');
        echo ('mantap');
    } else {
        header('location:index.php');
    }
?>