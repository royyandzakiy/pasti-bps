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

    // GET MATERI
    $query = "SELECT id_konsep, judul_konsep, id_topik, judul_topik, video_url FROM materi WHERE id_konsep = '$konsep_aktif' AND id_topik = " . $konsep_aktif . $topik_aktif;
    $result = $con->query($query);
    $row = $result->fetch(PDO::FETCH_NUM);

    $konsep_aktif_judul = $row[1];

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
            <h2>Baik!</h2>
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
                    unset($_SESSION['rekap_salah']);

                    foreach ($rekap_salah as $salah) {
                        echo('
                            <li><b>Pertanyaan:</b> ' . $salah["question"] . '
                            <div>Jawaban benar: <span style="color:#3ad43a;">'. $salah["correct"] .'</span></div>
                            </li>
                        ');
                    }
                ?>
            </ol>

            PASTI merekomendasikan untuk mempelajari ulang topik:
            <ol>
                <li>Kuisioner Updating Perusahaan
                </li><li>Kuisioner II-B
                </li>
            </ol>

            Untuk menerima rekomendasi dari PASTI, klik "Accept", Jika menolak klik "Decline"
            
            <hr />
            <a href="change_page.php?goto=back"><button type="submit" class="btn btn-default">Decline</button></a>
            <a href="change_page.php?goto=next"><button type="submit" class="btn btn-primary">Accept</button></a>
        </div>
    </div>


    <script>
        $(document).ready(function () {

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });

        });
    </script>

    </body>

</html>