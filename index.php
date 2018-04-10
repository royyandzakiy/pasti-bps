<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require('is_loggedin.php');
    require('blog_connect.php'); 

    sql_connect('pasti_db');

    $konsep_aktif = $_SESSION['konsep_terakhir'];
    $topik_aktif = $_SESSION['topik_terakhir'];

    $query = "SELECT id_konsep, judul_konsep, id_topik, judul_topik, locked_status FROM materi WHERE id_konsep = '$konsep_aktif' AND id_topik = " . $konsep_aktif . $topik_aktif;
    $result = $con->query($query);

    $row = $result->fetch(PDO::FETCH_NUM);

    $konsep_aktif_judul = $row[1];
    $topik_aktif_judul = $row[3];
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
        <div id="content">
    
            <?php
                include('navbar.php');
            ?>
    
            <h4>
                <small><?php echo $konsep_aktif_judul; ?></small>
            </h4>
            <hr />
            <h2><?php echo $topik_aktif .' - '. $topik_aktif_judul; ?></h2>
            <div class="videoWrapper">
                <iframe width="560" height="349" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
            </div>
            
            <hr />
            <h4>
                <small>Penjelasan</small>
            </h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur
                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing
                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <button type="submit" class="btn btn-default">Kembali</button>
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