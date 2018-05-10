<?php 
    require('blog_connect.php'); 
    sql_connect('pasti_db');

    if (session_status() != PHP_SESSION_NONE) {
        if ($_SESSION['logged_in']) {
            header('location:pra_pretest.php');
        } else {
            session_destroy();
        }
    }

    if (isset($_POST['login'])) {
        unset($_POST['login']);
        
        // get data
        $nip = $_POST['nip'];
        $password = $_POST['password'];
        
        
        $query = "SELECT id, nama, pengalaman_survei, pengalaman_SIBS, level_kemampuan, konsep_terakhir, topik_terakhir, nip FROM users WHERE nip = '$nip' AND password = '$password'";
        $result = $con->query($query);

        $row = $result->fetch(PDO::FETCH_NUM);
		if (!empty($row)) {
            if (session_status() != PHP_SESSION_NONE) {
                session_destroy();
            }
            session_start();

            $_SESSION['logged_in'] = true;
            $_SESSION['nama'] = $row[1];
            $_SESSION['pengalaman_survei'] = $row[2];
            $_SESSION['pengalaman_SIBS'] = $row[3];
            $_SESSION['level_pengetahuan'] = $row[4];
            $_SESSION['nip'] = $row[7];
            $_SESSION['konsep_terakhir'] = $row[5];
            $_SESSION['topik_terakhir'] = $row[6];

            $_SESSION['konsep_aktif'] = $row[5];
            $_SESSION['topik_aktif'] = $row[6];
            
            // tentukan bakal buka materi mana
            // handle if last at 
            $current_topik = $_SESSION['konsep_aktif'] . $_SESSION['topik_aktif'];
            $is_test = ($current_topik == '0103' || $current_topik == '0207' || $current_topik == '0306');
            $list_konseptopik = ['0101','0102','0103','0201','0202','0203','0204','0205','0206','0207','0301','0302','0303','0304','0305','0306'];
            if ($is_test) {
                $index_in_list = array_search($current_topik, $list_konseptopik);   
                $index_back = $index_in_list > 0 ? $index_in_list - 1 : $index_in_list;
                $back = $list_konseptopik[$index_back];
                $_SESSION['konsep_aktif'] = substr($back,0,2);
                $_SESSION['topik_aktif'] = substr($back,2,2);
            }

            header('location:pra_pretest.php');
        } else {
            header('location:login.php?login_status=false');
        }
    }
?>
<html lang="en">

<?php
    require('head.php');
?>
<script>
    // $(document).ready(
        var parts = window.location.search.substr(1).split("&");
        var $_GET = {};
        for (var i = 0; i < parts.length; i++) {
            var temp = parts[i].split("=");
            $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
        }

        if ($_GET.login_status != undefined) {
            if($_GET.login_status == false) {
                alert('Username dan Password tidak sesuai');
            }
        }
    // );
</script>

<body>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container">    
        <!--LOG IN BOX-->
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Login</div>
                    </div>     

                    <?php
                        if (isset($_GET['msg'])) {
                            if ($_GET['msg'] == 'nip_used') {    
                                // echo "NIP sudah digunakan, silahkan mendaftar dengan NIP lain";
                            }
                            unset($_GET['msg']);
                        }
                    ?>

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" method="post" action="login.php">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-nip" type="text" class="form-control" name="nip" value="" placeholder="NIP 5 Digit" maxlength="5" minlength="5" required/>                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="Password" required/>
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
                                            <span style="color:blue;">Daftar disini!</span>
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
                            <form id="signupform" class="form-horizontal" role="form" method="post" action="register.php">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                                  
                                <div class="form-group">
                                    <label for="NIP" class="col-md-3 control-label">NIP</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="NIP" placeholder="NIP 5 Digit" maxlength=5 minlength="5" required title="Harus berisi 5 digit" required/>
                                        <div style="color:red" id="nip-text"></div>
                                    </div>
                                </div>                                
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email" placeholder="Alamat Email" required/>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="nama" class="col-md-3 control-label">Nama Lengkap</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Buat Password Baru</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pendidikan" class="col-md-3 control-label">Pendidikan</label>
                                    <div class="col-md-9">
                                        <select selected="selected" class="form-control" name="pendidikan" placeholder="Pendidikan" required/>
                                            <option selected>Tidak Tamat SD</option>
                                            <option>Paket A</option>
                                            <option>SDLB</option>
                                            <option>SD/MI</option>
                                            <option>Paket B</option>
                                            <option>SMPLB</option>
                                            <option>SMI/MTs</option>
                                            <option>Paket C</option>
                                            <option>SMLB</option>
                                            <option>SMA/MA</option>
                                            <option>SMK/MAK</option>
                                            <option>Diploma I/II</option>
                                            <option>Diploma III</option>
                                            <option>Diploma IV/S1</option>
                                            <option>S2</option>
                                            <option>S3 </option>
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="tanggal_lahir" class="col-md-3 control-label">Tanggal Lahir</label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" name="tanggal_lahir" placeholder="" min="1950-1-1" max="2000-12-31" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tahun_masuk" class="col-md-3 control-label">Tahun Masuk BPS?</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="tahun_masuk" type="number" value="2018" min="1955" max="2018" required />
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="jenis_kelamin" class="col-md-3 control-label">Jenis Kelamin</label>
                                    <div class="col-md-9">
                                        <select selected="selected" class="form-control" name="jenis_kelamin" placeholder="Jenis Kelamin" required />
                                            <option value="l" selected>Laki-laki</option>
                                            <option value="p" >Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pengalaman_survei" class="col-md-3 control-label">Apakah Pernah Mengikuti Survei?</label>
                                    <div class="col-md-9">
                                        <select selected="selected" class="form-control" name="pengalaman_survei" required/>
                                            <option selected>Belum Pernah</option>
                                            <option>Sudah Pernah</option>
                                        </select>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="pengalaman_SIBS" class="col-md-3 control-label">Apakah Pernah Mengikuti Survei SIBS?</label>
                                    <div class="col-md-9">
                                        <select selected="selected" class="form-control" name="pengalaman_SIBS" required/>
                                            <option selected>Belum Pernah</option>
                                            <option>Sudah Pernah</option>
                                        </select>
                                    </div>  
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input id="btn-signup" href="#" class="btn btn-success" value="Daftar" name="daftar" type="submit" />
                                        <a onClick="$('#signupbox').hide(); $('#loginbox').show()"><button name="daftar" id="back-signin" type="button" class="btn btn-default"><i class="icon-hand-right"></i> &nbsp Kembali ke Login</button></a>
                                    </div>
                                </div>
                                
                                
                                
                            </form>
                         </div>
                    </div>
         </div> 
    </div>

    <script>
        $('input[name=daftar]').attr("disabled", true);

        $('input[name=NIP]').change(function() { 
            console.log($('input[name=NIP]').val());
            
            if ($('input[name=NIP]').val().length < 5) {
                $('#nip-text').text('NIP ' + $('input[name=NIP]').val() + ' harus 5 digit');
                $('input[name=daftar]').attr("disabled", true);
            } else {

                $.post("check_nip.php",
                {
                    nip: $('input[name=NIP]').val()
                },
                function(data, status){
                    console.log("Data: " + data + "\nStatus: " + status);

                    if (data == 'found') {
                        $('#nip-text').text('NIP ' + $('input[name=NIP]').val() + ' sudah digunakan');
                        $('input[name=daftar]').attr("disabled", true);
                    } else {
                        $('#nip-text').text('');
                        $('input[name=daftar]').attr("disabled", false);
                    }
                });

            }
        });
    </script>
    
</body>

</html>