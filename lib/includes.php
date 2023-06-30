<?php
    session_start();
    include("connect.php");
    $con = AppConnect('app');
    include("fn.php");
    $md5 = md5(date("YmdHis"));

    if(!$_SESSION['usuario'] and !$home){
        echo "<script>window.location.href='http://consultoria.mohatron.com/'</script>";
        exit();
    }

    if($_SET['s']){
        $_SESSION['usuario'] = false;
    }

    $urlData = 'http://moh1.com.br/jf';