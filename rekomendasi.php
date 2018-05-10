<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require('is_loggedin.php');
    require('blog_connect.php'); 

    sql_connect('pasti_db');

    $rekomendasi_pos = 0;
    if (isset($_GET['rekomendasi'])) {
        $rekomendasi_pos = $_GET['rekomendasi'];
    }
    
    $topik_salah = $_SESSION['topik_salah'];
    // echo var_dump($topik_salah);

    
    $topik_aktif = substr($topik_salah[$rekomendasi_pos], 1, 2);

    $konsep_aktif = "0" . (string) substr($topik_salah[$rekomendasi_pos], 0, 1);
    $konseptopik_aktif = (string) $konsep_aktif . (string) $topik_aktif;

    // GET MATERI
    $query = "SELECT id_konsep, judul_konsep, id_topik, judul_topik, video_url FROM materi WHERE id_konsep = '$konsep_aktif' AND id_topik = " . $konsep_aktif . $topik_aktif;
    $result = $con->query($query);

    $row = $result->fetch(PDO::FETCH_NUM);

    $konsep_aktif_judul = $row[1];
    $topik_aktif_judul = $row[3];
    $video_url_aktif = $row[4];

    // ADD RIWAYAT TOPIK
    
    
    $result = $con->query($query);
    //*/
?>

<html !DOCTYPE>
    <?php require('head.php'); ?>
    
    <body>
    
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php
            include('sidebar.php');
        ?>
    
        <!-- Page Content Holder -->
        <div id="content" class="container">
    
            <?php
                include('navbar.php');
            ?>
    
            <h4>
                <small><?php echo $konsep_aktif_judul; ?></small>
            </h4>
            <hr />
            <h2><?php echo $topik_aktif .' - '. $topik_aktif_judul; ?></h2>
            <!-- <div class="videoWrapper">
                <iframe width="560" height="349" src="https://www.youtube.com/embed/<?= $video_url_aktif; ?>" frameborder="0" allowfullscreen></iframe>
            </div> -->

            <div id="player"></div>
            
            <hr />
            <a href="rekomendasi.php?rekomendasi=<?= ($rekomendasi_pos > 0 ? $rekomendasi_pos - 1 : 0) ?>"><button type="submit" class="btn btn-default">Back</button></a>
            <?php
                if ($rekomendasi_pos < sizeof($topik_salah)-1) {
                    echo '<a href="rekomendasi.php?rekomendasi=' . ($rekomendasi_pos + 1) . '"><button type="submit" class="btn btn-primary">Next</button></a>';  
                } else {
                    echo '<a href="test.php"><button type="submit" class="btn btn-primary">Test</button></a>';
                }
            ?>
            
        </div>
    </div>

    <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '349',
          width: '560',
          videoId: '<?= $video_url_aktif; ?>',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        // event.target.playVideo(); // autoplay
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      var sudah = false;
      function addRiwayatTopik() {
        $.post("riwayat_topik.php",
            {
                // kosong...
            },
            function(data, status){
                console.log("Data: " + data + "\nStatus: " + status);
            });
      }
      
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
            console.log("Video played!");
            console.log("SENT AJAX!");
            if (!sudah) {
                addRiwayatTopik();
                sudah = true;
            }
        }
      } 
      function stopVideo() {
        player.stopVideo();
      }
    </script>

    <script>
        $(document).ready(function () {

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');$('#content').toggleClass('active');
            });

        });
    </script>

    </body>

</html>