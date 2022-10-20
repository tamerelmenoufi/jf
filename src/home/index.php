<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");
?>
<div class="card">
    <div class="card-header">
    LIVROS TOMBO
    </div>
    <?php
    $query = "SELECT *, count(*) as quantidade FROM `am_livros_livro_tombo` group by categoria";
    $result = mysqli_query($con, $query);

    while($d = mysqli_fetch_object($result)){
    ?>
    <div class="card-body">
        <h5 class="card-title"><?=$d->descricao?></h5>
        <p class="card-text">Para os libros tombo <b><?=$d->descricao?></b> forma detectados <b><?=$d->quantidade?></b> de documentos.</p>
    </div>
    <?php
    }
    ?>
</div>

