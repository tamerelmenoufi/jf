<?php
    session_start();
    include("connect.php");
    $con = AppConnect('app');
    $md5 = md5(date("YmdHis"));