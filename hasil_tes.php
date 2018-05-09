<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require('is_loggedin.php');
    require('blog_connect.php'); 

    sql_connect('pasti_db');

    $konsep_aktif = $_SESSION['konsep_aktif'];
    $topik_aktif = $_SESSION['topik_aktif'];
    $id_siswa = $_SESSION['nip'];
    $id_konseptes = $_GET['_id'];

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
    $query = "SELECT id_siswa, id_tes, bobot_tes, durasi, jawaban_benar, nilai, tingkat_penguasaan, jumlah_tes FROM konseptes WHERE id_siswa = $id_siswa AND id = $id_konseptes";
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
            include('sidebar.php');
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
            <h2><?php 
                If ($tingkat_penguasaan < 50) {
                    $Deskripsi = "Kurang";
                } Else If ($tingkat_penguasaan == 50) {
                    $Deskripsi = "Cukup";
                } Else If ($tingkat_penguasaan > 50) {
                    $Deskripsi = "Baik";
                }
                echo $Deskripsi;
            ?></h2>
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
            Jawaban Salah:
            <ol>
                <?php
                    $rekap_salah = $_SESSION['rekap_salah'];

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
                    
                    ?>
            </ol>

            PASTI merekomendasikan untuk mempelajari ulang topik:
            <ol>
            <?php
                $query = "SELECT id_konsep, judul_konsep, id_topik, judul_topik, video_url FROM materi";
                $result = $con->query($query);

                if (sizeof($topik_salah) !== 0) {
                    while ($row = $result->fetch(PDO::FETCH_NUM)) {
                        if ($row[0] == $_SESSION['konsep_aktif']) {
                            if (array_search(substr($row[2],1,3), $topik_salah) === false) {
                                // do nothing...
                            } 
                            else 
                            {
                                echo "<li><span style='color:red;'>" . $row[3] . "</span></ li>";
                            }
                        }
                    }
                } else {
                    echo "<span style='color:grey'>Tidak ada rekomendasi</span>";
                }              
            ?>
            </ol>

            Untuk menerima rekomendasi dari PASTI, klik "Accept", Jika menolak klik "Decline"
            
            <hr />
            <?php
                if ($_SESSION['konsep_aktif'] == '01') {
                    if ($level_pengetahuan >= 16.0) {
                        $konsep_aktif = '02';
                    }
                } else if ($_SESSION['konsep_aktif'] == '02') {
                    if ($level_pengetahuan >= 50.0) {
                        $konsep_aktif = '03';
                    }
                }
                $topik_aktif = '01';
                
                $_SESSION['konsep_aktif'] = $konsep_aktif;
                $_SESSION['topik_aktif'] = $topik_aktif;
            ?>
            <a href="change_page.php?goto=next"><button type="submit" class="btn btn-default">Decline</button></a>
            <?php
            if ($tingkat_penguasaan == 100) {
                // do nothing... you can only decline forward
            } else {
                echo '<a href="rekomendasi.php?rekomendasi=0"><button type="submit" class="btn btn-primary">Accept</button></a>';
            }
            ?>
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