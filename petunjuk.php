<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require('is_loggedin.php');
    require('blog_connect.php'); 

    sql_connect('pasti_db');

    $konsep_aktif = $_SESSION['konsep_aktif'];
    $topik_aktif = $_SESSION['topik_aktif'];
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

            <a href="profile.php">
            <button type="button" id="sidebarCollapse" class="btn btn-primary navbar-btn">
                <i class="glyphicon glyphicon-user"></i>
                <span>Profil</span>
            </button>
            </a>
            <a href="progress.php">
            <button type="button" id="sidebarCollapse" class="btn btn-primary navbar-btn">
                <i class="glyphicon glyphicon-stats"></i>
                <span>Progres Belajar</span>
            </button>
            </a>
            <br />  

            <h3>Petunjuk Penggunaan</h3>
            <ol>
                <li>PASTI adalah Pembelajaran Adaptif Sistem Tahunan informasi</li>
                <li>Pelajari Bab dan Topik satu-persatu secara bertahap</li>
                <li>Anda dapat mendownload semua daftar dan kuesioner pada sistem ini</li>
                <li>Setelah mempelajarai Topik-topik dalam BAB, ikuti tes untuk mengetahui tingkat penguasaan anda terhadap BAB tersebut</li>
                <li>Hasil tes akan menentukan apakah anda berhak lanjut ke BAB selanjutnya atau tidak</li>
                <li>Setelah hasil tes keluar, PASTI akan merekomendasikan topik yang tingkat penguasaannya masih kurang (bila ada)</li>
                <li>Ikuti rekomendasi tersebut untuk mencapai hasil yang lebih baik</li>
                <li>Capailah level pengetahuan seorang ahli dengan rata-rata nilai tingkat penguasaan pada masing-masing BAB sebesar 90</li>
            </ol>
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