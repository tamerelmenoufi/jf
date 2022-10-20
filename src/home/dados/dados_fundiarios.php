<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");
?>

            <div class="card">
                <div class="card-header">
                LIVROS TOMBO
                </div>
                <?php
                $query = "SELECT *, count(*), SUBSTRING_INDEX(descricao, '.', 1) as desci FROM `dados_fundiarios` group by titulo,local,tipo,desci";
                $result = mysqli_query($con, $query);

                while($d = mysqli_fetch_object($result)){
                    $desci = explode(".",$d->desci);
                    $desci = str_replace(array('-','_'), " ",$desci[0]);
                ?>
                <div class="card-body">
                    <h5 class="card-title"><?=$d->titulo?> - <?=$d->local?> (<?=$d->tipo?>)</h5>
                    <p class="card-text">Forma detectados estrutura de arquivos SHAPEFILE para <b><?=($desci)?></b>.</p>
                </div>
                <?php
                }
                ?>
            </div>
