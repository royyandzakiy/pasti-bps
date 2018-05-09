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

    // GET: ELAPSED TIME OF TEST
    $test_datetime_start = new DateTime($_SESSION['test_datetime_start']);
    $test_datetime_end = new DateTime(date('m/d/Y h:i:s a'));

    $diff = $test_datetime_end->diff($test_datetime_start);

    $interval_h = $diff->h;
    $interval_m = $diff->i;
    $interval_s = $diff->s;
    $interval = $interval_h * 3600 + $interval_m * 60 + $interval_s;
    $durasi = round($interval / 60.0);

    // GET: DATA HASIL TEST
    $query = "SELECT id_konsep, id_topik, id_test, id_question, weight, question, correct, A, B, C, D FROM $test_type";
    $result = $con->query($query);
    $konsep_aktif = $_SESSION['konsep_aktif'];
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
            } else {
                echo "salah: 0";
                
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
    echo "TOTAL WAKTU: " . $interval_h, " hours, ", $interval_m, " minutes, ", $interval_s, " seconds<br/>"; // debug
    echo '$_id = ' . $_id . '<br/>';
    //---END_DEBUG

    echo '<a href="index.php"><button class="btn">Next</button></a>';

    if($test_type == 'pretest') {
        $hasil = 'hasilPretest';
        $query = "INSERT INTO $hasil (id_siswa, durasi, q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15) VALUES ('$id_siswa', '$interval', '$rekap[0]','$rekap[1]','$rekap[2]','$rekap[3]','$rekap[4]','$rekap[5]','$rekap[6]','$rekap[7]','$rekap[8]','$rekap[9]','$rekap[10]','$rekap[11]','$rekap[12]','$rekap[13]','$rekap[14]')";
    } else if ($test_type == 'pertayaantes') {
        $hasil = 'hasiltest';
        $query = "INSERT INTO $hasil (id_siswa, durasi, q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18,q19,q20) VALUES ('$id_siswa', '$interval', '$rekap[0]','$rekap[1]','$rekap[2]','$rekap[3]','$rekap[4]','$rekap[5]','$rekap[6]','$rekap[7]','$rekap[8]','$rekap[9]','$rekap[10]','$rekap[11]','$rekap[12]','$rekap[13]','$rekap[14]','$rekap[15]','$rekap[16]','$rekap[17]','$rekap[18]','$rekap[19]')";
    }
    header('location:index.php');
?>

