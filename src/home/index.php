<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");
?>
<div class="container">
    <div class="row">
        <!-- SESSÂO LIVRO TOMBO -->
        <div class="col-12 m-3">
            <div class="card">
                <div class="card-header">
                LIVROS TOMBO
                </div>
                <?php
                $query = "SELECT *, count(*) as quantidade FROM `am_livros_livro_tombo` group by categoria";
                $result = mysqli_query($con, $query);

                while($d = mysqli_fetch_object($result)){
                    // $descricao = str_replace(array('-','_','.pdf'), " ",$d->descricao);
                    $descricao = (($d->categoria)?:'Livro Tombo Completo');
                ?>
                <div class="card-body">
                    <h5 class="card-title"><?=$descricao?></h5>
                    <p class="card-text">Para os livros tombo <b><?=$descricao?></b> forma detectados <b><?=$d->quantidade?></b> documentos.</p>
                </div>
                <?php
                }
                ?>
            </div>
        </div>



        <!-- SESSÂO CARTOGRAFIA BÁSICA -->
        <div class="col-12 m-3">
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
        </div>








        <!-- TÍTULOS PLOTADOS -->
        <div class="col-12 m-3">
            <div class="card">
                <div class="card-header">
                Títulos Plotados
                </div>
                <?php
                $query = "SELECT *, count(*), replace(descricao,SUBSTR(descricao, -4),'') as desci FROM `cartografia_titulos_plotados` group by desci";
                $result = mysqli_query($con, $query);

                while($d = mysqli_fetch_object($result)){
                    // $descricao = str_replace(array('-','_','.pdf'), " ",$d->descricao);
                    $descricao = explode(".",$d->descricao);
                    $descricao = $descricao[0];
                ?>
                <div class="card-body">
                    <h5 class="card-title"><?=$d->tipo?></h5>
                    <p class="card-text">Forma detectados estrutura de arquivos SHAPEFILE para <b><?=strtoupper($d->desci)?></b>.</p>
                </div>
                <?php
                }
                ?>
            </div>
        </div>




    </div>
</div>