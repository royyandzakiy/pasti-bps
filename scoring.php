<?php
    require('blog_connect.php'); 
    sql_connect('pasti_db');
    require('head.php');

    echo var_dump($_POST);

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $test_type = $_SESSION['test_type'];
    $id_siswa = $_SESSION['nip'];
    $konsep_aktif = $_SESSION['konsep_aktif'];
    $topik_aktif = $_SESSION['topik_aktif'];
    $id_siswa = $_SESSION['nip'];

    // GET: ELAPSED TIME OF TEST
    $test_datetime_start = new DateTime($_SESSION['test_datetime_start']);
    $test_datetime_end = new DateTime(date('m/d/Y h:i:s a'));

    $diff = $test_datetime_end->diff($test_datetime_start);

    $interval_h = $diff->h;
    $interval_m = $diff->i;
    $interval_s = $diff->s;
    $interval = $interval_h * 3600 + $interval_m * 60 + $interval_s;
    $durasi = round($interval / 60.0);

    // INIT: TopikTes
    $topiktes = array();

    // GET: DATA HASIL TEST
    $query = "SELECT id_konsep, id_topik, id_test, id_question, weight, question, correct, A, B, C, D FROM $test_type";
    $result = $con->query($query);
    $bobot_tes = ($konsep_aktif == '01' ? 20 : 40);
    
    $jawaban_benar = 0;
    $rekap = array(); // TOTAL SCORE 
    $rekap_salah = array();
    $nilai = 0;

    $nomor = 1;
    while($row = $result->fetch(PDO::FETCH_NUM)) {
        $row_konsep     = ($row[0] < 10 ? '0'.$row[0] : $row[0]);
        $id_topik       = ('0' . $row[1]);
        $id_test        = ($row[2] < 10 ? '0'.$row[2] : $row[2]);
        $id_question    = ('0'.$row[3]);

        //TOPIKTES: CHECK IF TOPIK NOT_EXIST
        if (array_key_exists($id_topik, $topiktes) === false) {
            $topiktes[$id_topik] = [
                'jumlah_pertanyaan' => 1,
                'jawaban_benar' => 0,
                'jawaban_salah' => 0
            ];
        } else {
            $topiktes[$id_topik]['jumlah_pertanyaan'] += 1;            
        }

        // CHECK IF ANSWER EMPTY
        if(!isset($_POST['q-'.$id_test.$id_question])) $_POST['q-'.$id_test.$id_question] = "";
        
        // CHECK IF ANSWER CORRECT
        if ( ($test_type == 'pertayaantes' && $row_konsep == $konsep_aktif) || $test_type == 'pretest') {   
            echo $nomor . ". ";
            echo  "[ q-$id_test$id_question ] : " .$_POST['q-'.$id_test.$id_question] . " === " . $row[6] . "<br />";
            $correct = $row[6] === $_POST['q-'.$id_test.$id_question] ? 1 : 0;
            array_push($rekap, $correct);

            //---DEBUG
            if ($correct) {
                echo "benar: " . $row[4];
                $jawaban_benar++;
                $nilai+=$row[4];
                $topiktes[$id_topik]['jawaban_benar'] += 1;
            } else {
                echo "salah: 0";
                $topiktes[$id_topik]['jawaban_salah'] += 1;
                
                $rekap_salah_obj = array(
                    'question' => $row[5],
                    'correct' => $row[6],
                    'id_topik' => $row[1]
                );
                array_push($rekap_salah, $rekap_salah_obj);
            } 
            echo "<br/>";
            //---END_DEBUG
        }
        $nomor++;
    }

    $_SESSION['rekap_salah'] = $rekap_salah;

    // FUZZY LOGIC HERE
    $tingkat_penguasaan = file_get_contents("http://localhost/My-projects/pasti/misc/fuzzy_logic.php?durasi=$durasi&jb=$jawaban_benar&nilai=$nilai");

    // DB: TOPIKTES
        // CHECK IF DATA TOPIKTEST EXISTS
        $query = "SELECT * FROM topiktes WHERE id_siswa = $id_siswa AND id_tes = $konsep_aktif";
        $result = $con->query($query);
        if ($row = $result->fetch(PDO::FETCH_NUM)) {
            // yes: UPDATE TOPIK TES TO DB
            foreach ($topiktes as $topik => $topik_array) {
                $query = "UPDATE topiktes SET jumlah_pertanyaan = " . $topik_array['jumlah_pertanyaan'] . ", jawaban_benar = " . $topik_array['jawaban_benar'] . ", jawaban_salah = " . $topik_array['jawaban_salah'] . " WHERE id_siswa = $id_siswa AND id_tes = $konsep_aktif AND id_topik = $id_topik";
                $result = $con->query($query);
            }
        } else {
            // no: INSERT TOPIK TES TO DB
            foreach ($topiktes as $topik => $topik_array) {
                $query = "INSERT INTO topiktes (id_siswa, id_tes, id_topik, jumlah_pertanyaan, jawaban_benar, jawaban_salah) VALUES ($id_siswa, $konsep_aktif, '0" . $topik . "', " . $topik_array['jumlah_pertanyaan'] . "," . $topik_array['jawaban_benar'] . "," . $topik_array['jawaban_salah'] . ")";
                $result = $con->query($query);
            }
        }
    
    // UPDATE LEVEL PENGETAHUAN

    $level_pengetahuan = 0;
    for ($i=1; $i<=3; $i++) {
        $query = "SELECT id_siswa, bobot_tes, durasi, jawaban_benar, nilai, tingkat_penguasaan, jumlah_tes FROM konseptes WHERE id_siswa = $id_siswa AND id_tes = $i";
        $result = $con->query($query);
        if ($row = $result->fetch(PDO::FETCH_NUM)) {
            // yes: PERNAH MELAKUKAN TES
            $level_pengetahuan += ($row[1] / 100.0) * $row[5];
        }
    }
    $query = "UPDATE users SET level_kemampuan = $level_pengetahuan WHERE nip = $id_siswa";
    $result = $con->query($query);

    $_SESSION['level_pengetahuan'] = $level_pengetahuan;
    
    // DB: KONSEP TES
        // CHECK IF DATA KONSEPTES EXISTS
        $_id = '';
        $query = "SELECT jumlah_tes, id FROM konseptes WHERE id_siswa = $id_siswa AND id_tes = $konsep_aktif";;

        $result = $con->query($query);
        if ($row = $result->fetch(PDO::FETCH_NUM)) {
            // yes: UPDATE TOPIK TES TO DB
            $jumlah_tes = $row[0] + 1;
            $_id = $row[1];
            $query = "UPDATE konseptes SET durasi = $durasi, jawaban_benar = $jawaban_benar, nilai = $nilai, tingkat_penguasaan = $tingkat_penguasaan, jumlah_tes = $jumlah_tes WHERE id_siswa = $id_siswa AND id_tes = $konsep_aktif";
            $result = $con->query($query);
        } else {
            // no: INSERT TOPIK TES TO DB
            $jumlah_tes = 1;
            $query = "INSERT INTO konseptes (id_siswa, id_tes, bobot_tes, durasi, jawaban_benar, nilai, tingkat_penguasaan, jumlah_tes) VALUES ($id_siswa, $konsep_aktif, $bobot_tes, $durasi, $jawaban_benar, $nilai, $tingkat_penguasaan, $jumlah_tes)";
            $result = $con->query($query);

            $query = "SELECT id FROM konseptes WHERE id_siswa = $id_siswa AND id_tes = $konsep_aktif";;
            $result = $con->query($query);
            $row = $result->fetch(PDO::FETCH_NUM);
            $_id = $row[0];
        }
    
    // DB: RIWAYAT KONSEP
        // CHECK IF DATA RIWAYAT KONSEP EXISTS
        $query = "SELECT * FROM riwayatkonsep WHERE id_siswa = $id_siswa AND id_konsep = $konsep_aktif";
        $result = $con->query($query);
        if ($row = $result->fetch(PDO::FETCH_NUM)) {
            // yes: UPDATE TOPIK TES TO DB
            $query = "UPDATE riwayatkonsep SET tingkat_penguasaan = $tingkat_penguasaan WHERE id_siswa = $id_siswa AND id_konsep = $konsep_aktif";
            $result = $con->query($query);
        } else {
            // no: INSERT TOPIK TES TO DB
            $jumlah_tes = 1;
            $query = "INSERT INTO riwayatkonsep (id_siswa, id_konsep, tingkat_penguasaan) VALUES ('$id_siswa', '$konsep_aktif', '$tingkat_penguasaan')";
            $result = $con->query($query);
        }
    
    // DB: ADD RIWAYAT TOPIK
        // check if already exist
        $tes_aktif = (string) $konsep_aktif . (string) $topik_aktif;
        $query = "SELECT * FROM riwayattopik WHERE id_siswa = $id_siswa AND id_topik = " . (string) $tes_aktif;
        $result = $con->query($query);
        $row = $result->fetch(PDO::FETCH_NUM);

        if ($row) {
            // update riwayattopik
            $query = "UPDATE riwayattopik SET jumlah_topik = jumlah_topik + 1 WHERE id_siswa = $id_siswa AND id_topik = " . (string) $tes_aktif;
        } else {
            // insert new to riwayattopik
            $query = "INSERT INTO riwayattopik (id_siswa, id_topik, jumlah_topik) VALUES ($id_siswa, " . (string) $tes_aktif . ", 1)";
        }
        $result = $con->query($query);
        echo var_dump($result);
    
    // DB: HASIL TEST
        $hasil = '';
        if($test_type == 'pretest') {
            $hasil = 'hasilPretest';
            $query = "INSERT INTO $hasil (id_siswa, durasi, q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15) VALUES ('$id_siswa', '$interval', '$rekap[0]','$rekap[1]','$rekap[2]','$rekap[3]','$rekap[4]','$rekap[5]','$rekap[6]','$rekap[7]','$rekap[8]','$rekap[9]','$rekap[10]','$rekap[11]','$rekap[12]','$rekap[13]','$rekap[14]')";
        } else if ($test_type == 'pertayaantes') {
            $hasil = 'hasiltest';
            $query = "INSERT INTO $hasil (id_siswa, durasi, q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18,q19,q20) VALUES ('$id_siswa', '$interval', '$rekap[0]','$rekap[1]','$rekap[2]','$rekap[3]','$rekap[4]','$rekap[5]','$rekap[6]','$rekap[7]','$rekap[8]','$rekap[9]','$rekap[10]','$rekap[11]','$rekap[12]','$rekap[13]','$rekap[14]','$rekap[15]','$rekap[16]','$rekap[17]','$rekap[18]','$rekap[19]')";
        }

        // simpan HASIL TES
        $result = $con->query($query);
        if ($result) {
            // berhasil!
            echo "INSERT NILAI $hasil BERHASIL<br/>";
        }

    //---DEBUG
    echo "JB: ".$jawaban_benar."<br/>";
    echo "NILAI: " . $nilai . " (Total dari Soal Benar * Bobot Soal)<br/>";
    echo "DURASI: " . $durasi . " menit<br />";
    echo "TP: " . $tingkat_penguasaan . "<br />";
    echo "TOTAL WAKTU: " . $interval_h, " hours, ", $interval_m, " minutes, ", $interval_s, " seconds<br/>"; // debug
    echo "UPDATE LEVEL PENGETAHUAN: " . $level_pengetahuan . "<br/>";
    echo '$_id = ' . $_id . '<br/>';
    //---END_DEBUG

    // header('location:hasil_tes.php?_id='.$_id);
?>

<a href="hasil_tes.php?_id=<?= $_id ?>"><button class="btn">Next</button></a>