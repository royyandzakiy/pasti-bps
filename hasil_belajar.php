<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require('is_loggedin.php');
    require('blog_connect.php'); 

    sql_connect('pasti_db');

    $konsep_aktif = $_GET['konsep_aktif'];
    $topik_aktif = $_GET['topik_aktif'];
    $id_siswa = $_SESSION['nip'];
    // $id_konseptes = $_GET['_id'];

    // GET MATERI
    $query = "SELECT id_konsep, judul_konsep, id_topik, judul_topik, video_url FROM materi WHERE id_konsep = '$konsep_aktif' AND id_topik = " . $konsep_aktif . $topik_aktif;
    $result = $con->query($query);
    $row = $result->fetch(PDO::FETCH_NUM);

    $konsep_aktif_judul = $row[1];

    // GET LEVEL PENGUASAAN
    $query = "SELECT level_kemampuan FROM users WHERE nip = $id_siswa";
    $result = $con->query($query);
    $row = $result->fetch(PDO::FETCH_NUM);

    $level_pengetahuan = $row[0];    

    // GET HASIL PENGERJAAN
    $query = "SELECT id_siswa, id_tes, bobot_tes, durasi, jawaban_benar, nilai, tingkat_penguasaan, jumlah_tes FROM konseptes WHERE id_siswa = $id_siswa AND id_tes = $konsep_aktif";
    $result = $con->query($query);
    $row = $result->fetch(PDO::FETCH_NUM);

    $durasi = $row[3];
    $jawaban_benar = $row[4];
    $nilai = $row[5];
    $tingkat_penguasaan = $row[6];
?>

<html !DOCTYPE>
    <?php require('head.php'); ?>
    
    <body>
    
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php
            include('sidebar_singkat.php');
        ?>
    
        <!-- Page Content Holder -->
        <div id="content" class="container">
    
            <?php
                include('navbar.php');
            ?>
    
            <h4>
                <small><?php echo "Konsep " . $konsep_aktif . " - " . $konsep_aktif_judul; ?></small>
            </h4>
            <hr />
            Topik yang sudah dipelajari:
            <ol>
            <?php                
                // GET RIWAYAT TOPIK
                $query_judul = "SELECT id_konsep, judul_konsep, id_topik, judul_topik FROM materi WHERE id_konsep = $konsep_aktif";
                $result_judul = $con->query($query_judul);
                while ($row_judul = $result_judul->fetch(PDO::FETCH_NUM)) {
                    $jumlah = 0;
                    $query = "SELECT id_topik, jumlah_topik FROM riwayattopik WHERE id_siswa = $id_siswa AND id_topik = ". $row_judul[2];
                    $result = $con->query($query);
                    $row = $result->fetch(PDO::FETCH_NUM);
                    if ($row != NULL) {
                        $jumlah = $row[1];
                    }
                    echo "<li>" . $row_judul[3] . " (" . $jumlah . ")</ li>";
                }
            ?>
            </ol>

            Tes <?= $konsep_aktif ?>:
            <ol>
                <?php
                    // PRINT EVALUASI PENGERJAAN
                    /*
                    $rekap_salah = $_SESSION['rekap_salah'];
                    unset($_SESSION['rekap_salah']);

                    $topik_salah = array();

                    foreach ($rekap_salah as $salah) {
                        echo('
                            <li><b>Pertanyaan:</b> ' . $salah["question"] . '
                            <div>Jawaban benar: <span style="color:#3ad43a;">'. $salah["correct"] .'</span></div>
                            </li>
                        ');
                        if (array_search($salah["id_topik"], $topik_salah) === false) {
                            array_push($topik_salah, $salah["id_topik"]);
                        }
                    }

                    $_SESSION['topik_salah'] = $topik_salah;
                    // */
                    ?>
            </ol>

            <table>
                <tr>
                    <td>Tingkat Penguasaan</td>
                    <td style="padding:0 10px;">:</td>
                    <td><?= $tingkat_penguasaan ?> (0-100)</td>
                </tr>
                <tr>
                    <td>Nilai</td>
                    <td style="padding:0 10px;">:</td>
                    <td><?= $nilai ?> (0-100)</td>
                </tr>
                <tr>
                    <td>Jawaban Benar</td>
                    <td style="padding:0 10px;">:</td>
                    <td><?= $jawaban_benar ?> (0-20)</td>
                </tr>
                <tr>
                    <td>Durasi</td>
                    <td style="padding:0 10px;">:</td>
                    <td><?= $durasi ?> Menit</td>
                </tr>
            </table>

            <!-- <a href="change_page.php?goto=<?= ($konsep_aktif > 1 ? $konsep_aktif-1 : '01') ?>01"><button type="submit" class="btn btn-default">Back</button></a>
            <a href="change_page.php?goto=<?= $konsep_aktif ?>01"><button type="submit" class="btn btn-primary">Next</button></a> -->
            <a href="index.php"><button type="submit" class="btn btn-primary">Back</button></a>

        </div>
    </div>


    <script>
        $(document).ready(function () {

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');$('#content').toggleClass('active');
            });

        });
    </script>

    </body>

</html>