<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require('is_loggedin.php');
    require('blog_connect.php'); 

    sql_connect('pasti_db');

    $konsep_aktif = $_GET['konsep_aktif'];

    $query = "SELECT id_konsep, judul_konsep, id_topik, judul_topik, locked_status, video_url FROM materi WHERE id_konsep = '$konsep_aktif'";
    $result = $con->query($query);

    $row = $result->fetch(PDO::FETCH_NUM);

    $konsep_aktif_judul = $row[1];

    // ambil data Tingkat Pengetahuan
    $dataPointsTP = array(
        array("x" => 1 , "y" => 75),
        array("x" => 2 , "y" => 20),
        array("x" => 3 , "y" => 100),
        array("x" => 4 , "y" => 0)
    );

    // ambil data Tingkat Pengetahuan
    $dataPointsLP = array(
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

            <h1>Konsep - <?= $konsep_aktif ?></h1>

            Tingkat Penguasaan
            <div id="chartContainerTP" style="height: 370px; width: 100%;"></div>
            <br />
            Level Pengetahuan
            <div id="chartContainerLP" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
    </div>


    <script>
        $(document).ready(function () {

            var chartTP = new CanvasJS.Chart("chartContainerTP", {
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
                    dataPoints: <?php echo json_encode($dataPointsTP); ?>
                }]
            });

            chartTP.render();

            var chartLP = new CanvasJS.Chart("chartContainerLP", {
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
                    dataPoints: <?php echo json_encode($dataPointsLP); ?>
                }]
            });
            chartLP.render();

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });

        });
    </script>

    </body>

</html>