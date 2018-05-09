<?php 
    require('is_loggedin.php');
    require('blog_connect.php'); 
    sql_connect('pasti_db');

    $test_type = 'pretest';
    $_SESSION['test_type'] = $test_type;
?>

<html !DOCTYPE>
    <?php require('head.php'); ?>
    
    <body>
    
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php
            include('sidebar_pretest.php');
        ?>
    
        <!-- Page Content Holder -->
        <div id="content">
    
            <?php
                include('navbar.php');
                ?>      
            <h1>PRETEST </h1>
            <?php
                include('load_questions.php');
            ?>      

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