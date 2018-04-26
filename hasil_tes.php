<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require('is_loggedin.php');
    require('blog_connect.php'); 

    sql_connect('pasti_db');

    $konsep_aktif = $_SESSION['konsep_aktif'];
    $topik_aktif = $_SESSION['topik_aktif'];

    $query = "SELECT id_konsep, judul_konsep, id_topik, judul_topik, locked_status, video_url FROM materi WHERE id_konsep = '$konsep_aktif' AND id_topik = " . $konsep_aktif . $topik_aktif;
    $result = $con->query($query);

    $row = $result->fetch(PDO::FETCH_NUM);

    $konsep_aktif_judul = $row[1];
    $topik_aktif_judul = $row[3];
    $video_url_aktif = $row[5];
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
                <small><?php echo "Bab " . $konsep_aktif . " - " . $konsep_aktif_judul; ?></small>
            </h4>
            <hr />
            <h2>Baik!</h2>
            <table>
                <tr>
                    <th>Tingkat Penguasaan</th>
                    <th>:</th>
                    <th>81</th>
                    <th>(0-100)</th>
                </tr>
                <tr>
                    <td>Nilai</td>
                    <td>:</td>
                    <td>78</td>
                    <td>(0-100)</td>
                </tr>
                <tr>
                    <td>Jawaban Benar</td>
                    <td>:</td>
                    <td>16</td>
                    <td>(0-20)</td>
                </tr>
                <tr>
                    <td>Durasi</td>
                    <td>:</td>
                    <td>12</td>
                    <td>Menit</td>
                </tr>
            </table>
            Jawaban Salah:
            <ol>
                <li>Pertanyaan 1
                    <div>Jawaban benar: Jawaban</div>
                </li><li>Pertanyaan 2
                    <div>Jawaban benar: Jawaban</div>
                </li>
            </ol>

            PASTI merekomendasikan untuk mempelajari ulang topik:
            <ol>
                <li>Kuisioner Updating Perusahaan
                </li><li>Kuisioner II-B
                </li>
            </ol>

            Untuk menerima rekomendasi dari PASTI, klik "Accept", Jika menolak klik "Decline"
            
            <hr />
            <a href="change_page.php?goto=back"><button type="submit" class="btn btn-default">Back</button></a>
            <a href="change_page.php?goto=next"><button type="submit" class="btn btn-primary">Next</button></a>
            <!-- <a href="change_page.php?goto=<?= $konsep_aktif ?>&goto_topik=0<?= ((int) $topik_aktif) > 1 ? (int) $topik_aktif - 1 : (int) $topik_aktif ?>"><button type="submit" class="btn btn-default">Back</button></a>
            <a href="change_page.php?goto=<?= $konsep_aktif ?>&goto_topik=0<?= ((int) $topik_aktif) > 1 ? (int) $topik_aktif - 1 : (int) $topik_aktif ?>"><button type="submit" class="btn btn-default">Back</button></a> -->
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