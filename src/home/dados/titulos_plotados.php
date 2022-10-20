<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");
?>

            <div class="card">
                <div class="card-header">
                Títulos Plotados
                </div>
                <?php
                $query = "SELECT * FROM `titulos_plotados`";
                $result = mysqli_query($con, $query);

                while($d = mysqli_fetch_object($result)){
                    $descricao = explode(".",$d->descricao);
                    $descricao = str_replace(array('-','_'), " ",$descricao[0]);
                ?>
                <div class="card-body">
                    <h5 class="card-title"><?=$d->titulo?> - <?=$d->subtitulo?></h5>
                    <p class="card-text">Forma detectados registros de arquivos para <b><?=($descricao)?></b>.</p>
                </div>
                <?php
                }
                ?>
            </div>
