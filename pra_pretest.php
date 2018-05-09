<?php 
    require('is_loggedin.php');
    require('blog_connect.php'); 
    sql_connect('pasti_db');

    $test_type = 'pretest';
    $_SESSION['test_type'] = $test_type;

    // CHECK IF HAVE TESTED
    $done_pretest;
    if (false) {
        header('location:index.php');
    }
?>

<html !DOCTYPE>
    <?php require('head.php'); ?>
    
    <body>
    
    <div class="wrapper">
        <!-- Sidebar Holder -->
    
        <!-- Page Content Holder -->
        <div id="content-fixed">
    
            <h1>PRETEST </h1>
            "Sebelum melakukan pembelajaran pada sistem PASTI, anda diwajibkan mengikuti pretest"
            <a href="pretest.php"><button class="btn btn-large btn-success">MULAI PRETEST</button></a>

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