<?php 
    require('blog_connect.php'); 

    sql_connect('pasti_db');

    if (isset($_POST['submit'])) {
        unset($_POST['submit']);
        // get data
    }
?>
<html lang="en">

<?php include('head.php'); ?>
<style>
    body {
        background:#F8F9FA;
    }
    #logo {
        width: 40%;
        max-width: 300px;
    }
</style>

<body>
    <?php include('navbar.php'); ?>
    <div>
        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm-3 sidenav">
                    <h4>Materi</h4>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#section1">BAB 1. Interactive Learning</a></li>
                        <li><a href="#section3">BAB 2. Adaptive Learning</a></li>
                    </ul><br />

                    <h4>Tingkat Penguasaan</h4>
                    BAB 1. Interactive Learning
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60"
                        aria-valuemin="0" aria-valuemax="100" style={{width:'60%'}}>
                        60% Dikuasai
                        </div>
                    </div>

                    BAB 2. Adaptive Learning
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="96"
                        aria-valuemin="0" aria-valuemax="100" style={{width:'96%'}}>
                        96% Dikuasai
                        </div>
                    </div>
                </div>

                <div class="col-sm-9 main">
                    <h4><small>Video</small></h4>
                    <hr />
                    <h2>Intro to Interactive Learning</h2>
                    <iframe width="100%" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                    </iframe>
                    
                    <h4><small>Deskripsi</small></h4>
                    <hr />
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <button type="submit" class="btn btn-default">Kembali</button>
                    <hr />
                </div>
            </div>
        </div>

        <footer class="container-fluid">
        <p>Footer Text</p>
        </footer>
    </div>
</body>

</html>