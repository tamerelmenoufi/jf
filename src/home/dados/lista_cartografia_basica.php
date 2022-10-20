<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");
?>

        <!-- SESSÂO CARTOGRAFIA BÁSICA -->
            <div class="card">
                <div class="card-header">
                Lista Cartografia Básica
                </div>
                <?php
                $query = "SELECT *, count(*), replace(descricao,SUBSTR(descricao, -4),'') as desci, SUBSTRING_INDEX(descricao, '.', 1) as desci1 FROM `cartografia_basica` where descricao != 'Thumbs.db' group by titulo,desci1";
                $result = mysqli_query($con, $query);

                while($d = mysqli_fetch_object($result)){
                    // $descricao = str_replace(array('-','_','.pdf'), " ",$d->descricao);
                    $descricao = explode(".",$d->descricao);
                    $descricao = $descricao[0];
                ?>
                <div class="card-body">
                    <h5 class="card-title"><?=$d->titulo?></h5>
                    <p class="card-text">Forma detectados estrutura de arquivos SHAPEFILE para <b><?=strtoupper($d->desci1)?></b>.</p>
                </div>
                <?php
                }
                ?>
            </div>


