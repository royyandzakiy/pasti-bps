<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" id="sidebarCollapse" class="btn btn-primary navbar-btn">
                <i class="glyphicon glyphicon-align-left"></i>
                <span>Tampilkan Sidebar</span>
            </button>

            <a class="navbar-brand" href="index.php">
                <img src="logo.png" width="30" height="30" alt="">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#"><b>Selamat Datang, <?= $_SESSION['nama'] ?>!</b> <span style="color:green">Level 
                    <?php
                        $level_pengetahuan = $_SESSION['level_pengetahuan'];
                        if ($level_pengetahuan < 40) {
                            echo "Pemula";
                        } else if ($level_pengetahuan >= 40 && $level_pengetahuan <70) {
                            echo "Menengah";
                        } else if ($level_pengetahuan >= 70 && $level_pengetahuan < 90) {
                            echo "Baik!";
                        } else {
                            echo "Ahli!";
                        }
                    ?></span>
                    </a>
                </li>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="profile.php">User</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>