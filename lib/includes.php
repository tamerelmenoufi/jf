<?php
    session_start();
    include("connect.php");
    $con = AppConnect('app');
    include("fn.php");
    $md5 = md5(date("YmdHis"));

    // if($_POST['acao'] == 'login'){
    //     $_SESSION['usuario'] = true;
    // }

    if($_SET['s']){
        $_SESSION['usuario'] = false;
    }

    $urlData = 'http://moh1.com.br/jf';