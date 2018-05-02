<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['logged_in'])) {
        $konsep_terakhir = $_SESSION['konsep_terakhir'];
        $topik_terakhir = $_SESSION['topik_terakhir'];
    }
?>

<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Materi</h3>
    </div>

    <ul class="list-unstyled components">

        <?php
            $query = "SELECT id_konsep, judul_konsep, id_topik, judul_topik, locked_status FROM materi";
            $result = $con->query($query);

            $row = $result->fetch(PDO::FETCH_NUM);
            $crnt_judul = $row[1];

            echo('
                <li class="active">
                            <a href="#konsep-'.$row[0].'" data-toggle="collapse" aria-expanded="false">'.$crnt_judul.'</a>
                            <ul class="collapse list-unstyled" id="konsep-'.$row[0].'">
                            <li id="topik-'.$row[2].'"><a href="change_page.php?goto='.$row[2].'" class="'.($row[4] ? 'locked' : 'unlocked').'">'.$row[3].'</a></li>
            ');

            while($row = $result->fetch(PDO::FETCH_NUM)) {
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
                echo (
                    '<li id="topik-'.$row[2].'"><a href="change_page.php?goto='.$row[2].'" class="'.(((int) $row[0] <= (int) $konsep_terakhir && (int) substr($row[2],2,2) <= (int) $topik_terakhir) ? 'unlocked' : 'locked').'">'.$row[3].'</a></li>'
                );
            }

            echo('</ul>
                        </li></ul>');
        ?>

    <ul class="list-unstyled CTAs">
        <li>
            <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download materi</a>
        </li>
        <li>
            <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Hasil belajar</a>
        </li>
    </ul>

    <div id="tingkat_penguasaan">
        <h4>Tingkat Penguasaan (BELUM AKTIF)</h4>
        BAB 1. Interactive Learning
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60"
            aria-valuemin="0" aria-valuemax="100" style="width:60%"}>
            60% Dikuasai
            </div>
        </div>

        BAB 2. Adaptive Learning
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="96"
            aria-valuemin="0" aria-valuemax="100" style="width:96%">
            96% Dikuasai
            </div>
        </div>
    </div>
</nav>