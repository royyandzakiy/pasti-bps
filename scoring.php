<?php
    require('blog_connect.php'); 
    sql_connect('pasti_db');

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $test_datetime_start = new DateTime($_SESSION['test_datetime_start']);
    $test_datetime_end = new DateTime(date('m/d/Y h:i:s a'));

    $diff = $test_datetime_end->diff($test_datetime_start);

    $interval_h = $diff->h;
    $interval_m = $diff->i;
    $interval_s = $diff->s;

    $query = "SELECT id_konsep, id_topik, id_test, id_question, weight, question, correct, A, B, C, D FROM pretest";
    $result = $con->query($query);
    $total_count = 0;

    while($row = $result->fetch(PDO::FETCH_NUM)) {
        $id_test = ($row[2] < 10 ? '0'.$row[2] : $row[2]);
        $id_question = ($row[2] < 10 ? '0'.$row[3] : $row[3]);

        if ($row[6] == $_POST['q-'.$id_test.$id_question] ? 1 : 0) {
            echo "benar";
            $total_count++;
        } else {
            echo "salah";
        }
        echo "<br/>";
    }
    echo "JUMLAH BENAR TOTAL: ".$total_count."<br/>";
    echo "TOTAL WAKTU: " . $interval_h, " hours, ", $interval_m, " minutes, ", $interval_s, " seconds"; // debug
?>