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

            <h3>Download</h3>
            <ol>
                <span style="color:green;font-size:1.5em;"><a target="_blank" href="https://drive.google.com/file/d/1AOsE31IvkVZBMe9vp-B_i3AZIiJtP6IC/view?usp=sharing"><li>Buku Pedoman Survei IBS</li></a></span>

                <span style="color:green;font-size:1.5em;"><a target="_blank" href="https://drive.google.com/file/d/1GRB_HS5HgeB9WIERX_n76J-_I0fQNKuA/view?usp=sharing"><li>Kuesioner Updating Perusahaan</li></a></span>

                <span style="color:green;font-size:1.5em;"><a target="_blank" href="https://drive.google.com/file/d/1S5nGJ8z4qt4-cW3vvdG2uaRByVlYip7P/view?usp=sharing"><li>Kuesioner I-B	</li></a></span>

                <span style="color:green;font-size:1.5em;"><a target="_blank" href="https://drive.google.com/file/d/10Rcz-zajp1c1ytt__ezBGe9uHCOVQsXB/view?usp=sharing"><li>Kuesioner II-A</li></a></span>

                <span style="color:green;font-size:1.5em;"><a target="_blank" href="https://drive.google.com/file/d/1Y8yiVT7FPrOysW4xwHORxfZxv2T6Aohi/view?usp=sharing"><li>Kuesioner II-B</li></a></span>

                <span style="color:green;font-size:1.5em;"><a target="_blank" href="https://drive.google.com/file/d/1fN8w0ErbXFwDCBeGX3oB8lAeI4vj1QKo/view?usp=sharing"><li>Daftar I-SL (C)</li></a></span>

                <span style="color:green;font-size:1.5em;"><a target="_blank" href="https://drive.google.com/file/d/1Fa46ELFe8L8YS6KRi2QrhLha6w9fXU3h/view?usp=sharing"><li>Daftar I-SL (P)</li></a></span>

                <span style="color:green;font-size:1.5em;"><a target="_blank" href="https://drive.google.com/file/d/1lqGS-iQmi1bDgiw4uBdje2Er2acLITRz/view?usp=sharing"><li>Daftar I-SL (K)</li></a></span>
            </ol>
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