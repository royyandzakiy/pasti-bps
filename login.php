<?php 
    require('blog_connect.php'); 
    sql_connect('pasti_db');

    if (isset($_POST['login'])) {
        unset($_POST['login']);

        
        // get data
        $username = $_POST('username');
        $password = $_POST('password');

        ?><script>alert('<?= $username ?>');</script><?php

        $query_user = "SELECT * FROM TABLENAME WHERE username = '$username' AND password = '$password'";
        $result_user = $con->query($query_user);

        if ($result_user) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['logged_in'] = true;
        } else {
            alert('NIP & Password tidak sesuai');
        }
    }
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#000000">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    <title>Pasti BPS</title>
</head>

<body>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container">    
        <!--LOG IN BOX-->
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Login</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" method="post">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="NIP 5 Digit">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <input id="btn-login" href="#" class="btn btn-success" value="Login" name="login" type="submit" />

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Belum punya akun?
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Daftar disini!
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>

        <!--SIGN UP BOX-->
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Daftar</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Login</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">NIP</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="NIP" placeholder="NIP">
                                    </div>
                                </div>                                
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Nama Lengkap</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Buat Password Baru</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pendidikan" class="col-md-3 control-label">Pendidikan</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="pendidikan" placeholder="Pendidikan">
                                            <option>SD</option>
                                            <option>SMP</option>
                                            <option>SMA</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tahun_masuk" class="col-md-3 control-label">Tahun Masuk BPS?</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="tahun_masuk" type="number" value="2018" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pengalaman_survei" class="col-md-3 control-label">Apakah Pernah Mengikuti Survei?</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="pengalaman_survei">
                                            <option>Ya</option>
                                            <option>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="pengalaman_SIBS" class="col-md-3 control-label">Apakah Pernah Mengikuti Survei SIBS?</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="pengalaman_SIBS">
                                            <option>Ya</option>
                                            <option>Tidak</option>
                                        </select>
                                    </div>  
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button name="daftar" id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Daftar</button>
                                    </div>
                                </div>
                                
                                
                                
                            </form>
                         </div>
                    </div>

               
               
                
         </div> 
    </div>
    
</body>

</html>