<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['logged_in'])) {
        $konsep_terakhir = $_SESSION['konsep_terakhir'];
        $topik_terakhir = $_SESSION['topik_terakhir'];

        // GET TINGKAT PENGUASAAN
        $tingkat_penguasaan_array = [0,0,0];
        $query = "SELECT id_tes, tingkat_penguasaan FROM konseptes WHERE id_siswa = $id_siswa";
        $result = $con->query($query);
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            $tingkat_penguasaan_array[$row[0] - 1] = $row[1];
        }
    }

    // GET TOPIK TERJAUH YANG PERNAH DIPELAJARI
    $id_siswa = $_SESSION['nip'];
    $query = "SELECT max(id_topik) FROM riwayattopik WHERE id_siswa = $id_siswa";
    $result = $con->query($query);
    $row = $result->fetch(PDO::FETCH_NUM);
    $max_konseptopik = $row[0];
?>

<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Materi</h3>
    </div>

    <ul class="list-unstyled components">

        <?php
            $query = "SELECT id_konsep, judul_konsep, id_topik, judul_topik FROM materi";
            $result = $con->query($query);
            $row = $result->fetch(PDO::FETCH_NUM);

            $crnt_judul = $row[1];

            echo('
                <li class="active">
                            <a href="#konsep-'.$row[0].'" data-toggle="collapse" aria-expanded="false">'.$crnt_judul.'</a>
                            <ul class="collapse list-unstyled" id="konsep-'.$row[0].'">
                            <li id="topik-'.$row[2].'"><a href="'.($row[2] > $max_konseptopik ? '#' : 'change_page.php?goto='.$row[2]).'" class="'.($row[2] > $max_konseptopik ? 'locked' : 'unlocked').'">'.$row[3].'</a></li>
            ');

            while($row = $result->fetch(PDO::FETCH_NUM)) {
                // KONSEP
                if ($row[1] != $crnt_judul) 
                {
                    $crnt_judul = $row[1];
                    echo (
                            '</ul>
                        </li>
                        <li class="active">
                            <a href="#konsep-'.$row[0].'" data-toggle="collapse" aria-expanded="false">'.$crnt_judul.'</a>
                            <ul class="collapse list-unstyled" id="konsep-'.$row[0].'">'
                    );
                }
                // TOPIK
                // test
                $is_test = ($row[2] == '0103' || $row[2] == '0207' || $row[2] == '0306');
                $is_start = ($row[2] == '0201' || $row[2] == '0301');
                echo "start:" . $is_start;
                if ($is_test) {
                    // check if ever watched materi before
                    $query_riwayat = "SELECT * FROM riwayattopik WHERE id_siswa = ".$_SESSION['nip']." AND id_topik = ".($row[2]-1);
                    $result_riwayat = $con->query($query_riwayat);
                    $row_riwayat = $result_riwayat->fetch(PDO::FETCH_NUM);
                    if ($row_riwayat) {
                        echo (
                            '<li id="topik-'.$row[2].'"><a href="change_page.php?goto='.$row[2].'" class="unlocked">'.$row[3].'</a></li>'
                        );
                    } else {
                        echo (
                            '<li id="topik-'.$row[2].'"><a href="#" class="locked">'.$row[3].'</a></li>'
                        );
                    }
                } else if ($is_start) {
                // start
                    $is_pass_level_pengetahuan = false;
                    if ($row[2] == '0201' && $_SESSION['level_pengetahuan'] > 16) {
                        $is_pass_level_pengetahuan = true;
                    } else if ($row[2] == '0301' && $_SESSION['level_pengetahuan'] > 50) {
                        $is_pass_level_pengetahuan = true;
                    }
                    echo (
                        '<li id="topik-'.$row[2].'"><a href="'.(!$is_pass_level_pengetahuan ? '#' : 'change_page.php?goto='.$row[2]).'" class="'.(!$is_pass_level_pengetahuan ? 'locked' : 'unlocked').'">'.$row[3].'</a></li>'
                    );
                } else {
                    // non-test
                    echo (
                        '<li id="topik-'.$row[2].'"><a href="'.($row[2] > $max_konseptopik ? '#' : 'change_page.php?goto='.$row[2]).'" class="'.($row[2] > $max_konseptopik ? 'locked' : 'unlocked').'">'.$row[3].'</a></li>'
                    );
                }
            }

            echo('</ul>
                        </li></ul>');
        ?>

    <ul class="list-unstyled CTAs">
        <!-- <li>
            <a href="#" class="download">Download materi</a>
        </li> -->
        <li>
            <a href="hasil_belajar.php?konsep_aktif=<?= $konsep_aktif ?>&topik_aktif=<?= $konsep_aktif ?>" class="download">Hasil belajar</a>
        </li>
    </ul>

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