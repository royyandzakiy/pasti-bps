<?php 
    require('is_loggedin.php');
    require('blog_connect.php'); 
    sql_connect('pasti_db');

    $test_type = 'pertayaantes';
    $_SESSION['test_type'] = $test_type;

    $konsep_aktif = $_SESSION['konsep_aktif'];
    $topik_aktif = $_SESSION['topik_aktif'];
?>

<html !DOCTYPE>
    <?php 
        require('head.php'); 
    ?>
    
    <body>
    
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php
            include('sidebar_pretest.php');
        ?>
    
        <!-- Page Content Holder -->
        <div id="content-fixed">
    
            <?php
                include('navbar.php');
                echo "<h2>Tes Konsep BAB $konsep_aktif</h2>";
                include('load_questions.php');
            ?>      

        </div>
    </div>


    <script>
        $(document).ready(function () {

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar-fixed').toggleClass('active');$('#content-fixed').toggleClass('active');
            });

        });
    </script>

    </body>

</html>