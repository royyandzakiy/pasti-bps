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

            <select>
                <option value="Tingkat Penguasaan" selected>Tingkat Penguasaan</option>
                <option value="Level Pengetahuan">Level Pengetahuan</option>
            </select>

            <script>
            window.onload = function () {
            
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title:{
                    text: ""
                },
                axisX: {
                    title: "BAB",
                    minimum: 1,
                    maximum: 4,
                    interval: 1
                },
                axisY: {
                    title: "Tingkat Penguasaan",
                    maximum: 100
                },
                data: [{
                    type: "splineArea",
                    indexLabelFontColor: "#5A5757",
		            indexLabelPlacement: "outside",  
                    dataPoints: <?php echo json_encode($dataPoints); ?>
                }]
            });
            
            chart.render();
            
            }
            </script>

            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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