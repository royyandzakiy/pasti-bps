<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require('is_loggedin.php');
require('blog_connect.php'); 

sql_connect('pasti_db');

$konsep_aktif = (string) $_SESSION['konsep_aktif'];
$topik_aktif = (string) $_SESSION['topik_aktif'];
$konseptopik_aktif = (string) $konsep_aktif . (string) $topik_aktif;

// ADD RIWAYAT TOPIK
// check if already exist
$id_siswa = $_SESSION['nip'];
$query = "SELECT * FROM riwayattopik WHERE id_siswa = $id_siswa AND id_topik = " . (string) $konseptopik_aktif;
$result = $con->query($query);

if ($row = $result->fetch(PDO::FETCH_NUM)) {
    // update riwayattopik
    $query = "UPDATE riwayattopik SET jumlah_topik = (jumlah_topik + 1) WHERE id_siswa = $id_siswa AND id_topik = " . (string) $konseptopik_aktif;
} else {
    // insert new to riwayattopik
    $query = "INSERT INTO riwayattopik (id_siswa, id_topik, jumlah_topik) VALUES ($id_siswa, " . (string) $konseptopik_aktif . ", 1)";
}

$result = $con->query($query);

// echo var_dump($result);
?>