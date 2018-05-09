<?php 
    require('blog_connect.php'); 
    sql_connect('pasti_db');

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // GET LARGEST ID TOPIK di RIWAYATTOPIK
    $id_siswa = $_SESSION['nip'];
    $query = "SELECT max(id_topik) FROM riwayattopik WHERE id_siswa = $id_siswa";
    $result = $con->query($query);
    $row = $result->fetch(PDO::FETCH_NUM);
    $max_konseptopik = $row[0];

    // INSERT KONSEP&TOPIK TERAKHIR
    $query = "UPDATE users SET konsep_terakhir = '0".substr($max_konseptopik,0,1)."', topik_terakhir = '".substr($max_konseptopik,1,2)."' WHERE nip = " . $_SESSION['nip'];
    $result = $con->query($query);
    echo "query: " . $query;

    // TERMINATE ACTIVITY
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