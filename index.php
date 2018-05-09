<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require('is_loggedin.php');
    require('blog_connect.php'); 

    sql_connect('pasti_db');

    if (isset($_SESSION['rekap_salah'])){
        unset($_SESSION['rekap_salah']);
    }
    
    $konsep_aktif = (string) $_SESSION['konsep_aktif'];
    $topik_aktif = (string) $_SESSION['topik_aktif'];
    $konseptopik_aktif = (string) $konsep_aktif . (string) $topik_aktif;

    // CHECK IF TEST
    $list_konseptopik_tes = ['0103','0207','0306'];


    $not_test = (array_search($konseptopik_aktif, $list_konseptopik_tes) === false);
    if ($not_test) {
    
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
    } else {
        header('location:test.php');
    }
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
            <a href="change_page.php?goto=back"><button type="submit" class="btn btn-default">Back</button></a>
            <a href="change_page.php?goto=next"><button type="submit" class="btn btn-primary">Next</button></a>
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