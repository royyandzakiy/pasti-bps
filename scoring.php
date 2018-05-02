<?php
    require('blog_connect.php'); 
    sql_connect('pasti_db');

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $test_type = $_SESSION['test_type'];

    $test_datetime_start = new DateTime($_SESSION['test_datetime_start']);
    $test_datetime_end = new DateTime(date('m/d/Y h:i:s a'));

    $diff = $test_datetime_end->diff($test_datetime_start);

    $interval_h = $diff->h;
    $interval_m = $diff->i;
    $interval_s = $diff->s;
    $interval = $interval_h * 3600 + $interval_m * 60 + $interval_s;

    $query = "SELECT id_konsep, id_topik, id_test, id_question, weight, question, correct, A, B, C, D FROM $test_type";
    $result = $con->query($query);
    $total_count = 0;
    $rekap = array();
    $current_konsep = $_SESSION['konsep_aktif'];

    while($row = $result->fetch(PDO::FETCH_NUM)) {
        $row_konsep = $row[0];
        $id_test = ($row[2] < 10 ? '0'.$row[2] : $row[2]);
        $id_question = ($row[2] < 10 ? '0'.$row[3] : $row[3]);

        if(!isset($_POST['q-'.$id_test.$id_question])) $_POST['q-'.$id_test.$id_question] = "";
        
        if ( ($test_type == 'pertayaantes' && $row_konsep == $current_konsep) || $test_type == 'pretest') {
            $correct = $row[6] == $_POST['q-'.$id_test.$id_question] ? 1 : 0;
            array_push($rekap, $correct);

            //DEBUG
            if ($correct) {
                echo "benar";
                $total_count++;
            } else {
                echo "salah";
            }
            echo "<br/>";
            //END_DEBUG
        }
    }
    //DEBUG
    echo "JUMLAH BENAR TOTAL: ".$total_count."<br/>";
    echo "TOTAL WAKTU: " . $interval_h, " hours, ", $interval_m, " minutes, ", $interval_s, " seconds<br/>"; // debug
    echo "TOTAL DETIK: " . $interval . " seconds<br />";
    //END_DEBUG

    $nip = $_SESSION['nip'];
    $hasil = '';

    if($test_type == 'pretest') {
        $hasil = 'hasilPretest';
        $query = "INSERT INTO $hasil (id_siswa, durasi, q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15) VALUES ('$nip', '$interval', '$rekap[0]','$rekap[1]','$rekap[2]','$rekap[3]','$rekap[4]','$rekap[5]','$rekap[6]','$rekap[7]','$rekap[8]','$rekap[9]','$rekap[10]','$rekap[11]','$rekap[12]','$rekap[13]','$rekap[14]')";
    } else if ($test_type == 'pertayaantes') {
        $hasil = 'hasiltest';
        $query = "INSERT INTO $hasil (id_siswa, durasi, q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18,q19,q20) VALUES ('$nip', '$interval', '$rekap[0]','$rekap[1]','$rekap[2]','$rekap[3]','$rekap[4]','$rekap[5]','$rekap[6]','$rekap[7]','$rekap[8]','$rekap[9]','$rekap[10]','$rekap[11]','$rekap[12]','$rekap[13]','$rekap[14]','$rekap[15]','$rekap[16]','$rekap[17]','$rekap[18]','$rekap[19]')";
    }

    // simpan HASIL TES
    $result = $con->query($query);
    if ($result) {
        // berhasil!
        echo "INSERT NILAI $hasil BERHASIL<br/>";

        $query = "SELECT id, id_siswa, durasi, q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18,q19,q20 FROM $hasil WHERE id_siswa = $nip";
        $result = $con->query($query);
        $row = $result->fetch(PDO::FETCH_NUM);
        // get id
        $id_hasil = $row[0];
        echo "id INPUT: " . $id_hasil;
    }
?>

<a href="hasil_tes.php?id_hasil=<?= $id_hasil ?>"><button class="btn">Back</button></a>