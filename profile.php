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

    $dataPoints = array(
        array("x" => 1 , "y" => 75),
        array("x" => 2 , "y" => 20),
        array("x" => 3 , "y" => 100),
        array("x" => 4 , "y" => 0)
    );
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

            <img class="img-fluid" src="https://images.pexels.com/photos/36753/flower-purple-lical-blosso.jpg" alt="Profile" width="360"> 

            <style type="text/css">
            .tg  {border-collapse:collapse;border-spacing:0;}
            .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;}
            .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;}
            .tg .tg-us36{border-color:inherit;vertical-align:top}
            .tg .tg-yw4l{vertical-align:top}
            </style>
            <br />
            <br />
            <table class="tg">
            <tr>
                <th class="tg-us36">NIP</th>
                <th class="tg-us36">:</th>
                <th class="tg-us36">11111</th>
            </tr>
            <tr>
                <td class="tg-us36">Nama</td>
                <td class="tg-us36">:</td>
                <td class="tg-us36">Admin</td>
            </tr>
            <tr>
                <td class="tg-us36">Email</td>
                <td class="tg-us36">:</td>
                <td class="tg-us36">email@admin.com</td>
            </tr>
            <tr>
                <td class="tg-yw4l">Umur</td>
                <td class="tg-yw4l">:</td>
                <td class="tg-yw4l">12</td>
            </tr>
            <tr>
                <td class="tg-yw4l">Pendidikan</td>
                <td class="tg-yw4l">:</td>
                <td class="tg-yw4l">SMA</td>
            </tr>
            <tr>
                <td class="tg-yw4l">Tahun Masuk</td>
                <td class="tg-yw4l">:</td>
                <td class="tg-yw4l">2012</td>
            </tr>
            </table>
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