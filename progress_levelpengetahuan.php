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
        array("x" => 0 , "y" => 0),
        array("x" => 1 , "y" => 25),
        array("x" => 2 , "y" => 50),
        array("x" => 3 , "y" => 60),
        array("x" => 4 , "y" => 85)
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
                <option value="Tingkat Penguasaan">Tingkat Penguasaan</option>
                <option value="Level Pengetahuan" selected>Level Pengetahuan</option>
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
                    minimum: 0,
                    maximum: 4,
                    interval: 1
                },
                axisY: {
                    title: "Level Pengetahuan",
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