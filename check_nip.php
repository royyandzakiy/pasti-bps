<?php
    require('blog_connect.php'); 
    sql_connect('pasti_db');

    $nip = $_POST['nip'];
    unset($_POST['nip']);
    // echo $nip . ": ";

    $query = "SELECT nip FROM users WHERE nip = $nip";
    $result = $con->query($query);
    $row = $result->fetch(PDO::FETCH_NUM);

    $nip_used = false;
    if ($row != false) {
        $nip_used = true;
    }

    echo ($nip_used ? 'found' : 'not_found');
?>