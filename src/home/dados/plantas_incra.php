<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");
?>

            <div class="card">
                <div class="card-header">
                Plantas Incra
                </div>
                <?php
                $query = "SELECT *, count(*) FROM `plantas_incra` GROUP BY tipo, local";
                $result = mysqli_query($con, $query);

                while($d = mysqli_fetch_object($result)){
                    $descricao = explode(".",$d->descricao);
                    $descricao = str_replace(array('-','_'), " ",$descricao[0]);
                ?>
                <div class="card-body">
                    <h5 class="card-title"><?=$d->tipo?> - <?=$d->local?></h5>
                    <p class="card-text">Forma detectados registros de arquivos de imagens para <b><?=($ddescricao)?></b>.</p>
                </div>
                <?php
                }
                ?>
            </div>
