<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");

    $query = "select * from processos where codigo = '{$_POST['cod']}'";
    $result = mysqli_query($con, $query);
    $d = mysqli_fetch_object($result);
?>
<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between">
    <span>Registro do índice do processo</span>
    <a href="http://moh1.com.br/jf/SIGLO_AM/CONVENIO 2000\08-Titulos Plotados\AM\01-Livros\03-Indice Remissivo de Processo/ÍNDICE REMISSIVO DE PROCESSOS.pdf" target="_blank"><i class="fa-regular fa-file-pdf"></i></a>
  </li>
</ul>