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
                            <a href="#">'.$crnt_judul.'</a>
            ');

            while($row = $result->fetch(PDO::FETCH_NUM)) {
                if ($row[1] != $crnt_judul) 
                {
                    $crnt_judul = $row[1];
                    echo (
                            '</li>
                        <li class="active">
                            <a href="#">'.$crnt_judul.'</a>'
                    );
                }
            }

            echo('</li></ul>');
        ?>
</nav>