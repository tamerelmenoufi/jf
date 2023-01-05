<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");

    $query = "select * from processos where codigo = '{$_POST['cod']}'";
    $result = mysqli_query($con, $query);
    $d = mysqli_fetch_object($result);
?>
<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between">
    <div>
        <span style="color:#a1a1a1; font-size:10px;">Número do Processo</span><br>
        <b><?=$d->processo?></b>
    </div>
    <a href="<?=$urlData.substr($d->url,1,strlen($d->url))?>" target="_blank" style="text-decoration:none;">Abrir <i class="fa-regular fa-file-pdf"></i></a>
  </li>
  <li class="list-group-item d-flex justify-content-between">
    <div>
        <span style="color:#a1a1a1; font-size:10px;">Nome do Requerente</span><br>
        <b><?=$d->requerente?></b>
    </div>
  </li>

  <li class="list-group-item d-flex justify-content-between" style="height:500px;">
    <object data="<?=$urlData.substr($d->url,1,strlen($d->url))?>" type="" class="h-100 w-100" ></object>
  </li>

</ul>