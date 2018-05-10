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
        $query = "SELECT id_konsep, judul_konsep, id_topik, judul_topik, video_url FROM materi WHERE id_konsep = $konsep_aktif AND id_topik = " . $konsep_aktif . $topik_aktif;
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
            <?php
            // CHECK IF SUDAH NONTON VIDEO, IF_NOT CANNOT NEXT
            $query = "SELECT * FROM riwayattopik WHERE id_siswa = $id_siswa AND id_topik = ". $konseptopik_aktif;
            $result = $con->query($query);
            $row = $result->fetch(PDO::FETCH_NUM);

            $allowed = $row != false;
            ?>
            
            <a href="change_page.php?goto=back"><button type="submit" class="btn btn-default">Back</button></a>
            <?= ($allowed ? '<a href="change_page.php?goto=next"><button title="" id="btn-next" type="submit" class="btn btn-primary" >Next</button></a>' 
            : '<a href="change_page.php?goto=next"><button title="Masih Terkunci. Anda harus menonton video terlebih dahulu" id="btn-next" type="submit" class="btn btn-primary" disabled>Next</button></a>') ?>
            
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
            if (!sudah) {
                console.log("SENT AJAX!");
                sudah = true;

                // add Riwayat Topik
                addRiwayatTopik();

                // ENABLE BUTTON
                $('#btn-next').removeAttr('disabled');
                $('#btn-next').attr('title', '');

                // ENABLE LINK in SIDEBAR after WATCH VIDEO
                <?php
                // GET LAST WATCH from RIWAYAT TOPIK
                $query = "SELECT max(id_topik) FROM riwayattopik WHERE id_siswa = $id_siswa";
                $result = $con->query($query);
                $row = $result->fetch(PDO::FETCH_NUM);
                $max_konseptopik = '0100'; // HANDLE IF NEVER WATCH VIDEO BEFORE
                if ($row[0] != NULL) {
                    $max_konseptopik = $row[0];
                }
                $konsep_terakhir = substr($max_konseptopik,0,2);
                $topik_terakhir = substr($max_konseptopik,2,2);
                $konseptopik_terakhir = $konsep_terakhir . $topik_terakhir;

                $list_konseptopik = ['0100','0101','0102','0103','0201','0202','0203','0204','0205','0206','0207','0301','0302','0303','0304','0305','0306'];
                $index_in_list = array_search($konseptopik_terakhir, $list_konseptopik);
                $index_next = $index_in_list < 15 ? $index_in_list + 2 : $index_in_list;
                $next = $list_konseptopik[$index_next];
                ?>
                $('#topik-<?= $next ?> a').removeClass("locked");
                $('#topik-<?= $next ?> a').addClass("unlocked");
                $('#topik-<?= $next ?> a').attr("href", "change_page.php?goto=<?= $next ?>")
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