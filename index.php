<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require('is_loggedin.php');
    require('blog_connect.php'); 

    sql_connect('pasti_db');

    if (isset($_SESSION['rekap_salah'])){
        unset($_SESSION['rekap_salah']);
    }
    
    $konsep_aktif = (string) $_SESSION['konsep_aktif'];
    $topik_aktif = (string) $_SESSION['topik_aktif'];
    $konseptopik_aktif = (string) $konsep_aktif . (string) $topik_aktif;

    // CHECK IF TEST
    $list_konseptopik_tes = ['0103','0207','0306'];


    $not_test = (array_search($konseptopik_aktif, $list_konseptopik_tes) === false);
    if ($not_test) {
    
        // GET MATERI
        $query = "SELECT id_konsep, judul_konsep, id_topik, judul_topik, video_url FROM materi WHERE id_konsep = '$konsep_aktif' AND id_topik = " . $konsep_aktif . $topik_aktif;
        $result = $con->query($query);

        $row = $result->fetch(PDO::FETCH_NUM);

        $konsep_aktif_judul = $row[1];
        $topik_aktif_judul = $row[3];
        $video_url_aktif = $row[4];

        $id_siswa = $_SESSION['nip'];
    } else {
        header('location:test.php');
    }
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
                <iframe id="player" width="560" height="349" src="https://www.youtube.com/embed/<?= $video_url_aktif; ?>?enablejsapi" frameborder="0" allowfullscreen></iframe>
            </div> -->

            <div id="player"></div>
            
            <hr />
            <a href="change_page.php?goto=back"><button type="submit" class="btn btn-default">Back</button></a>
            <a href="change_page.php?goto=next"><button type="submit" class="btn btn-primary">Next</button></a>
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
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
            console.log("Video played!");
            console.log("SENT AJAX!");
            addRiwayatTopik();
        }
      }
      function stopVideo() {
        player.stopVideo();
      }

      function addRiwayatTopik() {
          $.post("riwayat_topik.php",
            {
                // kosong...
            },
            function(data, status){
                console.log("Data: " + data + "\nStatus: " + status);
            });
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