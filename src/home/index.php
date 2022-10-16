<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");
    exit();
    $query = "select * from dados limit 100";
    $result = mysqli_query($con, $query);

    while($d = mysqli_fetch_object($result)){
        echo $d->url."<br>";
    }