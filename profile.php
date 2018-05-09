<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require('is_loggedin.php');
    require('blog_connect.php'); 

    sql_connect('pasti_db');

    $konsep_aktif = $_SESSION['konsep_aktif'];
    $topik_aktif = $_SESSION['topik_aktif'];

    // GET DATA SISWA
    $id_siswa = $_SESSION['nip'];

    $query = "SELECT nama, email, tanggal_lahir, pendidikan, tahun_masuk FROM users WHERE nip = $id_siswa";
    $result = $con->query($query);
    $row = $result->fetch(PDO::FETCH_NUM);

    $nama = $row[0];
    $email = $row[1];
    $pendidikan = $row[3];
    $tahun_masuk = $row[4];
    
    // GET USIA
    $birth = new DateTime($row[2]); // three days difference! 
    $today = new DateTime(); 
    $diff = $birth->diff($today);
    $umur = $diff->format('%y');
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

            <a href="progress.php">
            <button type="button" id="sidebarCollapse" class="btn btn-primary navbar-btn">
                <i class="glyphicon glyphicon-stats"></i>
                <span>Progres Belajar</span>
            </button>
            </a>
            <a href="petunjuk.php">
            <button type="button" id="sidebarCollapse" class="btn btn-primary navbar-btn">
                <i class="glyphicon glyphicon-question-sign"></i>
                <span>Petunjuk Penggunaan</span>
            </button>
            </a>
            <br />  

            <!-- <img class="img-fluid" src="https://images.pexels.com/photos/36753/flower-purple-lical-blosso.jpg" alt="Profile" width="360">  -->

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
                <th class="tg-us36"><?= $id_siswa ?></th>
            </tr>
            <tr>
                <td class="tg-us36">Nama</td>
                <td class="tg-us36">:</td>
                <td class="tg-us36"><?= $nama ?></td>
            </tr>
            <tr>
                <td class="tg-us36">Email</td>
                <td class="tg-us36">:</td>
                <td class="tg-us36"><?= $email ?></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Umur</td>
                <td class="tg-yw4l">:</td>
                <td class="tg-yw4l"><?= (string) $umur ?></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Pendidikan</td>
                <td class="tg-yw4l">:</td>
                <td class="tg-yw4l"><?= $pendidikan ?></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Tahun Masuk</td>
                <td class="tg-yw4l">:</td>
                <td class="tg-yw4l"><?= $tahun_masuk ?></td>
            </tr>
            </table>
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