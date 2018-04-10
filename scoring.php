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

    $query = "SELECT id_konsep, id_topik, id_test, id_question, weight, question, correct, A, B, C, D FROM $test_type";
    $result = $con->query($query);
    $total_count = 0;
    $rekap = array();

    while($row = $result->fetch(PDO::FETCH_NUM)) {
        $id_test = ($row[2] < 10 ? '0'.$row[2] : $row[2]);
        $id_question = ($row[2] < 10 ? '0'.$row[3] : $row[3]);

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
    //DEBUG
    echo "JUMLAH BENAR TOTAL: ".$total_count."<br/>";
    echo "TOTAL WAKTU: " . $interval_h, " hours, ", $interval_m, " minutes, ", $interval_s, " seconds<br/>"; // debug
    //END_DEBUG

    $nip = $_SESSION['nip'];

    if($test_type == 'pretest') {
        $hasil = 'hasilPretest';
    }

    $query = "INSERT INTO $hasil (id_siswa, q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15) VALUES ('$nip', '$rekap[0]','$rekap[1]','$rekap[2]','$rekap[3]','$rekap[4]','$rekap[5]','$rekap[6]','$rekap[7]','$rekap[8]','$rekap[9]','$rekap[10]','$rekap[11]','$rekap[12]','$rekap[13]','$rekap[14]')";
    $result = $con->query($query);
    if ($result) {
        // berhasil!
        echo "INSERT NILAI $hasil BERHASIL<br/>";
    }
?>

<a href="index.php"><button class="btn">Back</button></a>