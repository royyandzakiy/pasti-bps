<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    $id_siswa = $_SESSION['nip'];
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
?>

<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Materi</h3>
    </div>

    <ul class="list-unstyled components">

        <?php
            // GENERATE LIST OF MATERI
            $query = "SELECT id_konsep, judul_konsep, id_topik, judul_topik FROM materi";
            $result = $con->query($query);
            $row = $result->fetch(PDO::FETCH_NUM);

            $list_konseptopik = ['0100','0101','0102','0103','0201','0202','0203','0204','0205','0206','0207','0301','0302','0303','0304','0305','0306'];
            $current_konsep = $row[0]; // get konsep-01
            $current_topik = $row[2]; // get topik-0101
            $locked = true;

            // CREATE FIRST LIST
            echo('
                <li class="active">
                            <a href="#konsep-'.$current_konsep.'" data-toggle="collapse" aria-expanded="false">'.$row[1].'</a>
                            <ul class="collapse list-unstyled" id="konsep-'.$current_konsep.'">
                            <li id="topik-'.$current_topik.'"><a href="change_page.php?goto='.$current_topik.'" class="unlocked">'.$row[3].'</a></li>
            ');

            while($row = $result->fetch(PDO::FETCH_NUM)) {
                // KONSEP BARU
                if ($row[0] != $current_konsep) 
                {
                    $current_konsep = $row[0];
                    echo (
                            '</ul>
                        </li>
                        <li class="active">
                            <a href="#konsep-'.$current_konsep.'" data-toggle="collapse" aria-expanded="false">'.$row[1].'</a>
                            <ul class="collapse list-unstyled" id="konsep-'.$current_konsep.'">'
                    );
                }
                // TOPIK
                $current_topik = $row[2];
                $locked = true;
                $is_test = ($current_topik == '0103' || $current_topik == '0207' || $current_topik == '0306');
                $is_start = ($current_topik == '0201' || $current_topik == '0301');
                $back = ''; // get topik before, kasus '0101' is handled
                
                if ($is_test) {
                    // TEST TOPIK
                    // TEST UNLOCK IF ALL TOPIK in KONSEP ALREADY WATCHED
                    // check if topik_before current exist in riwayattopik
                    $index_in_list = array_search($current_topik, $list_konseptopik);
                    $index_back = $index_in_list > 0 ? $index_in_list - 1 : $index_in_list;
                    $back = $list_konseptopik[$index_back];

                    $query_riwayat = "SELECT id, id_siswa, id_topik, jumlah_topik FROM riwayattopik WHERE id_siswa = $id_siswa AND id_topik = $back";
                    $result_riwayat = $con->query($query_riwayat);
                    $row_riwayat = $result_riwayat->fetch(PDO::FETCH_NUM);

                    if ($row_riwayat) {
                        $locked = false;
                    }
                } else if ($is_start) {
                // START TOPIK
                    if (($current_topik == '0201' && $_SESSION['level_pengetahuan'] > 16) ||
                        ($current_topik == '0301' && $_SESSION['level_pengetahuan'] > 50)) {
                        $locked = false;
                    }
                } else {
                // OTHER TOPIK
                    $index_in_list = array_search($konseptopik_terakhir, $list_konseptopik);
                    $index_next = $index_in_list < 15 ? $index_in_list + 1 : $index_in_list;
                    $next = $list_konseptopik[$index_next];
                    if ($current_topik <= $next) {
                        // SET SIDEBAR UNLOCK
                        if ($current_konsep == '01' ||
                            ($current_konsep == '02' && $_SESSION['level_pengetahuan'] > 16) ||
                            ($current_konsep == '03' && $_SESSION['level_pengetahuan'] > 50)) {
                        $locked = false;
                        }
                    }
            }
                echo (
                    '<li id="topik-'.$current_topik.'"><a title="'.($locked ? 'Masih Terkunci' : '').'" href="'.($locked ? '#' : 'change_page.php?goto='.$current_topik).'" class="'. ($locked ? 'locked' : 'unlocked') .'">'.$row[3].'</a></li>'
                );
            }

            echo('</ul>
                        </li></ul>');
        ?>

    <ul class="list-unstyled CTAs">
        <li>
            <a href="download.php" class="download">Download</a>
        </li>
    </ul>

    <?php

    // GET TINGKAT PENGUASAAN
    $tingkat_penguasaan_array = [0,0,0];
    $query = "SELECT id_tes, tingkat_penguasaan FROM konseptes WHERE id_siswa = $id_siswa";
    $result = $con->query($query);
    while ($row = $result->fetch(PDO::FETCH_NUM)) {
        $tingkat_penguasaan_array[$row[0] - 1] = $row[1];
    }

    ?>

    <div id="tingkat_penguasaan">
        <h4>Tingkat Penguasaan</h4>
        BAB 1. Pengenalan Survei Tahunan Industri
        <div class="progress">
            <div class="progress-bar progress-bar-default progress-bar-striped" role="progressbar" aria-valuenow="<?= $tingkat_penguasaan_array[0] ?>"
            aria-valuemin="0" aria-valuemax="100" style="width:<?= $tingkat_penguasaan_array[0] ?>%">
            <?php echo ($tingkat_penguasaan_array[0] > 50 ? $tingkat_penguasaan_array[0] . "% Dikuasai" : "") ?>
            </div><span style="color:#337ab7;"><?php echo ($tingkat_penguasaan_array[0] <= 50 ? $tingkat_penguasaan_array[0] . "% Dikuasai" : "") ?></span>
        </div>

        BAB 2. Updating Direktori
        <div class="progress">
            <div class="progress-bar progress-bar-default progress-bar-striped" role="progressbar" aria-valuenow="<?= $tingkat_penguasaan_array[1] ?>"
            aria-valuemin="0" aria-valuemax="100" style="width:<?= $tingkat_penguasaan_array[1] ?>%">
            <?php echo ($tingkat_penguasaan_array[1] > 50 ? $tingkat_penguasaan_array[1] . "% Dikuasai" : "") ?>
            </div><span style="color:#337ab7;"><?php echo ($tingkat_penguasaan_array[1] <= 50 ? $tingkat_penguasaan_array[1] . "% Dikuasai" : "") ?></span>
        </div>
        
        BAB 3. Pedoman Pencacahan II-A
        <div class="progress">
            <div class="progress-bar progress-bar-default progress-bar-striped" role="progressbar" aria-valuenow="<?= $tingkat_penguasaan_array[2] ?>"
            aria-valuemin="0" aria-valuemax="100" style="width:<?= $tingkat_penguasaan_array[2] ?>%">
            <?php echo ($tingkat_penguasaan_array[2] > 50 ? $tingkat_penguasaan_array[2] . "% Dikuasai" : "") ?>
            </div><span style="color:#337ab7;"><?php echo ($tingkat_penguasaan_array[2] <= 50 ? $tingkat_penguasaan_array[2] . "% Dikuasai" : "") ?></span>
        </div>
    </div>
</nav>