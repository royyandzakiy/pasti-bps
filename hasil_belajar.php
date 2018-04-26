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
                <small><?php echo $konsep_aktif_judul; ?></small>
            </h4>
            <hr />
            <h2><?php echo $topik_aktif .' - '. $topik_aktif_judul; ?></h2>
            
            Tingkat Penguasaan: Baik
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60"
                aria-valuemin="0" aria-valuemax="100" style="width:60%"}>
                60% Dikuasai
                </div>
            </div>

            Level Pengetahuan: Kurang
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60"
                aria-valuemin="0" aria-valuemax="100" style="width:30%"}>
                30% Dikuasai
                </div>
            </div>

            Topik yang sudah dipelajari:
            <ol>
                <li>Tata cara - 2 kali</li>
                <li>Tata cara - 1 kali</li>
                <li>Tata cara - 0 kali</li>
            </ol>
            Tes 3:
            <style type="text/css">
            .tg  {border-collapse:collapse;border-spacing:0;}
            .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
            .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
            .tg .tg-us36{border-color:inherit;vertical-align:top}
            </style>
            <table class="tg">
                <tr>
                    <th class="tg-us36">No.</th>
                    <th class="tg-us36">Pertanyaan</th>
                    <th class="tg-us36">Jawaban</th>
                </tr>
                <tr>
                    <td class="tg-us36">1.</td>
                    <td class="tg-us36">Pengecekan bla bla</td>
                    <td class="tg-us36">Benar</td>
                </tr>
                <tr>
                    <td class="tg-us36">2.</td>
                    <td class="tg-us36">Pelaksanaan bla bla</td>
                    <td class="tg-us36">Salah</td>
                </tr>
            </table>

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