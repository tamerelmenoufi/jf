<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");
?>

        <!-- TÍTULOS PLOTADOS -->
            <div class="card">
                <div class="card-header">
                Títulos Plotados
                </div>
                <?php
                $query = "SELECT *, count(*), replace(descricao,SUBSTR(descricao, -4),'') as desci FROM `cartografia_titulos_plotados` group by desci";
                $result = mysqli_query($con, $query);

                while($d = mysqli_fetch_object($result)){
                    $tipo = str_replace(array('-','_'), " ",$d->tipo);
                    $desci = explode(".",$d->desci);
                    $desci = str_replace(array('-','_'), " ",$desci[0]);
                ?>
                <div class="card-body">
                    <h5 class="card-title"><?=$tipo?></h5>
                    <p class="card-text">Forma detectados estrutura de arquivos SHAPEFILE para <b><?=($desci)?></b>.</p>
                </div>
                <?php
                }
                ?>
            </div>
