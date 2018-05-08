<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require('is_loggedin.php');
    require('blog_connect.php'); 

    sql_connect('pasti_db');

    $query = "SELECT id_konsep, judul_konsep, id_topik, judul_topik, video_url FROM materi";
    $result = $con->query($query);
    $row = $result->fetch(PDO::FETCH_NUM);

    $id_siswa = $_SESSION['nip'];

    $tingkat_penguasaan_array = [80,50,0];
    $query = "SELECT id_tes, tingkat_penguasaan FROM konseptes WHERE id_siswa = $id_siswa";
    $result = $con->query($query);
    while ($row = $result->fetch(PDO::FETCH_NUM)) {
        $tingkat_penguasaan_array[$row[0] - 1] = $row[1];
    }

    // ambil data Tingkat Penguasaan
    $dataPointsTP = array(
        array("x" => 0 , "y" => 0),
        array("x" => 1 , "y" => 80),
        array("x" => 2 , "y" => 50),
        array("x" => 3 , "y" => (int) $tingkat_penguasaan_array[2])
    );

    // ambil data Level Pengetahuan
    $dataPointsLP = array(
        array("x" => 0 , "y" => 0),
        array("x" => 1 , "y" => 80 * .20),
        array("x" => 2 , "y" => 80 * .20 + 50 * .40),
        array("x" => 3 , "y" => (int) $tingkat_penguasaan_array[0] * .20 + (int) $tingkat_penguasaan_array[1] * .40 + (int) $tingkat_penguasaan_array[2] * .40),
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
                    title: "Konsep",
                    minimum: 0,
                    maximum: 3,
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
                    title: "Konsep",
                    minimum: 0,
                    maximum: 3,
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