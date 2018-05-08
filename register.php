<?php
    require('blog_connect.php'); 
    sql_connect('pasti_db');

    $nip = $_POST['NIP'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $pendidikan = $_POST['pendidikan'];
    $tahun_masuk = $_POST['tahun_masuk'];
    $email = $_POST['email'];
    $pengalaman_survei = $_POST['pengalaman_survei'];
    $pengalaman_SIBS = $_POST['pengalaman_SIBS'];
    $level_kemampuan = 0;
    $konsep_terakhir = '01';
    $topik_terakhir = '01';

    $query = "INSERT INTO users (nip, nama, password, tanggal_lahir, pendidikan, tahun_masuk, email, pengalaman_survei, pengalaman_SIBS, level_kemampuan, konsep_terakhir, topik_terakhir) VALUES ('$nip', '$nama', '$password', '$tanggal_lahir', '$pendidikan', '$tahun_masuk', '$email', '$pengalaman_survei', '$pengalaman_SIBS', '$level_kemampuan', '$konsep_terakhir', '$topik_terakhir')";
    $result = $con->query($query);

    if (session_status() != PHP_SESSION_NONE) {
        session_destroy();
    }
    session_start();

    $_SESSION['logged_in'] = true;
    $_SESSION['nama'] = $nama;
    $_SESSION['pengalaman_survei'] = $pengalaman_survei;
    $_SESSION['pengalaman_SIBS'] = $pengalaman_SIBS;
    $_SESSION['level_pengetahuan'] = $level_kemampuan;
    // tentukan bakal buka materi mana
    $_SESSION['konsep_terakhir'] = $konsep_terakhir;
    $_SESSION['topik_terakhir'] = $topik_terakhir;
    $_SESSION['nip'] = $nip;

    $_SESSION['konsep_aktif'] = $konsep_terakhir;
    $_SESSION['topik_aktif'] = $topik_terakhir;

    header('location:index.php');
?>