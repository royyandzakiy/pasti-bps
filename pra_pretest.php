<?php 
    require('is_loggedin.php');
    require('blog_connect.php'); 
    sql_connect('pasti_db');

    $test_type = 'pretest';
    $_SESSION['test_type'] = $test_type;
    $id_siswa = $_SESSION['nip'];

    // CHECK IF HAVE TESTED
    $query = "SELECT * FROM hasilpretest WHERE id_siswa = $id_siswa";
    $result = $con->query($query);
    $row = $result->fetch(PDO::FETCH_NUM);
    
    $done_pretest = $row != NULL ? true : false;
    
    if ($done_pretest) {
        header('location:index.php');
    } else {
?>

<html !DOCTYPE>
    <?php require('head.php'); ?>
    
    <body>
    
    <div class="wrapper">
        <!-- Sidebar Holder -->
    
        <!-- Page Content Holder -->
        <div id="content-fixed">
    
            <h1>PRETEST </h1>
            "Sebelum melakukan pembelajaran pada sistem PASTI, anda diwajibkan mengikuti pretest"<br />
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
<?php
    }
?>