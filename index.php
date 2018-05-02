<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require('is_loggedin.php');
    require('blog_connect.php'); 

    sql_connect('pasti_db');

    $konsep_aktif = $_SESSION['konsep_aktif'];
    $topik_aktif = $_SESSION['topik_aktif'];

    $query = "SELECT id_konsep, judul_konsep, id_topik, judul_topik, video_url FROM materi WHERE id_konsep = '$konsep_aktif' AND id_topik = " . $konsep_aktif . $topik_aktif;
    $result = $con->query($query);

    $row = $result->fetch(PDO::FETCH_NUM);

    $konsep_aktif_judul = $row[1];
    $topik_aktif_judul = $row[3];
    $video_url_aktif = $row[4];

    // header('location:test.php');
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