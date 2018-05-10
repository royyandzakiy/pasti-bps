<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require('blog_connect.php'); 

    sql_connect('pasti_db');

    $goto = $_GET['goto'];   
    $id_siswa = $_SESSION['nip'];

    // INIT PEMERIKSAAN HALAMAN SELANJUTNYA
    $list_konseptopik = ['0101','0102','0103','0201','0202','0203','0204','0205','0206','0207','0301','0302','0303','0304','0305','0306'];
    $list_konseptopik_tes = ['0103','0207','0306'];

    // cari tahu halaman sebelum atau setelah ini apa
    if ($goto == 'next' || $goto == 'back') {
        $konsep_aktif = $_SESSION['konsep_aktif'];
        $topik_aktif = $_SESSION['topik_aktif'];
    } else {
        $konsep_aktif = substr($goto,0,2);
        $topik_aktif = substr($goto,2,2);
    }    
        $konseptopik_aktif = $konsep_aktif . $topik_aktif;
        $index_in_list = array_search($konseptopik_aktif, $list_konseptopik);    
        $index_next = $index_in_list < 15 ? $index_in_list + 1 : $index_in_list;
        $index_back = $index_in_list > 0 ? $index_in_list - 1 : $index_in_list;
        $next = $list_konseptopik[$index_next];
        $back = $list_konseptopik[$index_back];

    echo "konseptopik_aktif awal: " . $konsep_aktif . $topik_aktif . "<br/>";
    
    if ($_GET['goto'] == 'next') {
        $goto = $next;    
    } else if ($_GET['goto'] == 'back') {
        $goto = $back;
    }

    // TENTUKAN LOGIC ALUR PERPINDAHAN DISINI
    $allowed = true; // bruteforce

    if ($goto != '0101') { // 0101 pasti boleh
        if (($goto == '0201' && $_SESSION['level_pengetahuan'] < 16) || 
            ($goto == '0301' && $_SESSION['level_pengetahuan'] < 50)) {
            // IF TEST
            $allowed = false;
            $_SESSION['konsep_aktif'] = substr($back,0,2);
            $_SESSION['topik_aktif'] = substr($back,2,2);
        } else {
            // IF NOT TEST
            // CHECK IF: TOPIK BEFORE EVER VISITED, IF YES ALLOW
            $query = "SELECT * FROM riwayattopik WHERE id_siswa = $id_siswa AND id_topik = " . $back;
            $result = $con->query($query);
            $row = $result->fetch(PDO::FETCH_NUM);
            
            $allowed = ($row != false ? true : false);
        }
    }
    echo "Allowed: " . ($allowed ? 'true' : 'false') . "<br />";

    if ($allowed) {
        // ubah session sebagai posisi terakhir
        $_SESSION['konsep_aktif'] = substr($goto,0,2);
        $_SESSION['topik_aktif'] = substr($goto,2,2);

        // UPDATE KONSEP&TOPIK TERAKHIR
        // check konsep&topik_terakhir
        $query = "SELECT konsep_terakhir, topik_terakhir FROM users WHERE nip = $id_siswa";
        $result = $con->query($query);

        if ($row = $result->fetch(PDO::FETCH_NUM)) {
            // update konsep&topik terakhir
            $konsep_terakhir = (string) $row[0];
            $topik_terakhir = (string) $row[1];
            if (($konsep_terakhir . $topik_terakhir) < $goto) {
                $query = "UPDATE users SET konsep_terakhir = '". substr($goto,0,2) ."', topik_terakhir = '". substr($goto,2,2) ."' WHERE nip = $id_siswa";
                $result = $con->query($query);

                // UPDATE SESSION
                $_SESSION['konsep_terakhir'] = substr($goto,0,2); 
                $_SESSION['topik_terakhir'] = substr($goto,2,2); 
            }
        }
    }

    echo "goto: " . $goto . "<br />";
    echo "konseptopik_aktif: " . $_SESSION['konsep_aktif'] . $_SESSION['topik_aktif'];

    // periksa jika tipe laman adalah tes
    $test = array_search($goto,$list_konseptopik_tes) === false;
    echo var_dump(array_search($goto,$list_konseptopik_tes));
    if ($test) {
        header('location:index.php');
    } else {
        header('location:test.php');
    }
    //*/
?>