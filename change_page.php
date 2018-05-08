<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require('blog_connect.php'); 

    sql_connect('pasti_db');

    // echo $_GET['goto'];   
    $id_siswa = $_SESSION['nip'];

    // INIT PEMERIKSAAN HALAMAN SELANJUTNYA
    $list_konseptopik = ['0101','0102','0103','0201','0202','0203','0204','0205','0206','0207','0301','0302','0303','0304','0305','0306'];
    $list_konseptopik_tes = ['0103','0207','0306'];

    // cari tahu halaman sebelum atau setelah ini apa
    $goto;
    
        $konsep_aktif = $_SESSION['konsep_aktif'];
        $topik_aktif = $_SESSION['topik_aktif'];
        $konseptopik_aktif = $konsep_aktif . $topik_aktif;
        $index_in_list = array_search($konseptopik_aktif, $list_konseptopik);    
        $index_next = $index_in_list < 15 ? $index_in_list + 1 : $index_in_list;
        $index_back = $index_in_list > 0 ? $index_in_list - 1 : $index_in_list;
    
    if ($_GET['goto'] == 'next') {
        $goto = $list_konseptopik[$index_next];    
    } else if ($_GET['goto'] == 'back') {
        $goto = $list_konseptopik[$index_back];
    } else {
        $goto = $_GET['goto'];
    }

    // TENTUKAN LOGIC ALUR PERPINDAHAN DISINI
    $allowed = true; // bruteforce

    if ($goto != '0101') {
        if (($goto == '0201' && $_SESSION['level_pengetahuan'] < 16) || ($goto == '0301' && $_SESSION['level_pengetahuan'] < 50)) {
            $allowed = false;
        } else {
            $query = "SELECT * FROM riwayattopik WHERE id_siswa = $id_siswa AND id_topik = " . $list_konseptopik[array_search($goto, $list_konseptopik)-1];
            $result = $con->query($query);
            $row = $result->fetch(PDO::FETCH_NUM);
            
            $allowed = $row != NULL ? true : false;
        }
    }
    echo "Allowed: " . $allowed . "<br />";

    if ($allowed) {
        // ubah session sebagai posisi terakhir
        $_SESSION['konsep_aktif'] = substr($goto,0,2);
        $_SESSION['topik_aktif'] = substr($goto,2,2);
    }

    echo $goto;

    // periksa jika tipe laman adalah tes
    $not_test = array_search($goto,$list_konseptopik_tes) === false;
    if ($not_test) {
        header('location:index.php');
    } else {
        header('location:test.php');
    }
    //*/
?>