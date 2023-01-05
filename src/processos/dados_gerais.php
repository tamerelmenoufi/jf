<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");

    $query = "select * from processos where codigo = '{$_POST['cod']}'";
    $result = mysqli_query($con, $query);
    $d = mysqli_fetch_object($result);
?>
<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between">
    <span>Número do Processo</span>
    <b><?=$d->processo?></b>
  </li>
  <li class="list-group-item d-flex justify-content-between">
    <span>Nome do Requerente</span>
    <b><?=$d->requerente?></b>
  </li>
</ul>