<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require('is_loggedin.php');
    require('blog_connect.php'); 

    sql_connect('pasti_db');

    $rekomendasi_pos = 0;
    if (isset($_GET['rekomendasi'])) {
        $rekomendasi_pos = $_GET['rekomendasi'];
    }
    
    $topik_salah = $_SESSION['topik_salah'];
    // echo var_dump($topik_salah);

    
    $topik_aktif = substr($topik_salah[$rekomendasi_pos], 1, 2);

    $konsep_aktif = "0" . (string) substr($topik_salah[$rekomendasi_pos], 0, 1);
    $konseptopik_aktif = (string) $konsep_aktif . (string) $topik_aktif;

    // GET MATERI
    $query = "SELECT id_konsep, judul_konsep, id_topik, judul_topik, video_url FROM materi WHERE id_konsep = '$konsep_aktif' AND id_topik = " . $konsep_aktif . $topik_aktif;
    $result = $con->query($query);

    $row = $result->fetch(PDO::FETCH_NUM);

    $konsep_aktif_judul = $row[1];
    $topik_aktif_judul = $row[3];
    $video_url_aktif = $row[4];

    // ADD RIWAYAT TOPIK
    // check if already exist
    $id_siswa = $_SESSION['nip'];
    $query = "SELECT * FROM riwayattopik WHERE id_siswa = $id_siswa AND id_topik = " . (string) $konseptopik_aktif;
    $result = $con->query($query);

    if ($row = $result->fetch(PDO::FETCH_NUM)) {
        // update riwayattopik
        $query = "UPDATE riwayattopik SET jumlah_topik = jumlah_topik + 1";
    } else {
        // insert new to riwayattopik
        $query = "INSERT INTO riwayattopik (id_siswa, id_topik, jumlah_topik) VALUES ($id_siswa, " . (string) $konseptopik_aktif . ", 1)";
    }
    
    $result = $con->query($query);
    //*/
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
            <div class="videoWrapper">
                <iframe width="560" height="349" src="https://www.youtube.com/embed/<?= $video_url_aktif; ?>" frameborder="0" allowfullscreen></iframe>
            </div>
            
            <hr />
            <a href="rekomendasi.php?rekomendasi=<?= ($rekomendasi_pos > 0 ? $rekomendasi_pos - 1 : 0) ?>"><button type="submit" class="btn btn-default">Back</button></a>
            <?php
                if ($rekomendasi_pos < sizeof($topik_salah)-1) {
                    echo '<a href="rekomendasi.php?rekomendasi=' . ($rekomendasi_pos + 1) . '"><button type="submit" class="btn btn-primary">Next</button></a>';  
                } else {
                    echo '<a href="test.php"><button type="submit" class="btn btn-primary">Test</button></a>';
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