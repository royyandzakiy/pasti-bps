<?php
    require('blog_connect.php'); 
    sql_connect('pasti_db');

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $test_type = $_SESSION['test_type'];
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
    $konsep_aktif = $_SESSION['konsep_aktif'];
    $bobot_tes = ($konsep_aktif == '01' ? 20 : 40);
    
    $jawaban_benar = 0;
    $rekap = array(); // TOTAL SCORE 
    $rekap_salah = array();
    $nilai = 0;
    while($row = $result->fetch(PDO::FETCH_NUM)) {
        $row_konsep     = ($row[0] < 10 ? '0'.$row[0] : $row[0]);
        $id_topik       = ('0' . $row[1]);
        $id_test        = ($row[2] < 10 ? '0'.$row[2] : $row[2]);
        $id_question    = ($row[3] < 10 ? '0'.$row[3] : $row[3]);

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
            $correct = $row[6] == $_POST['q-'.$id_test.$id_question] ? 1 : 0;
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
    }

    $_SESSION['rekap_salah'] = $rekap_salah;

    // FUZZY LOGIC HERE
    // ...
    $tingkat_penguasaan = 0;

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

            $_id = $con->lastInsertId;
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
    echo "JUMLAH BENAR TOTAL: ".$jawaban_benar."<br/>";
    echo "TOTAL SCORE: ".$nilai." (Total dari Soal Benar * Bobot Soal)<br/>";
    echo "TOTAL WAKTU: " . $interval_h, " hours, ", $interval_m, " minutes, ", $interval_s, " seconds<br/>"; // debug
    echo "TOTAL MENIT: " . $durasi . " menit<br />";
    //---END_DEBUG

    echo '$_id = ' . $_id;
    // header('location:hasil_tes.php?_id='.$_id);
?>

<a href="hasil_tes.php?_id=<?= $_id ?>"><button class="btn">Next</button></a>