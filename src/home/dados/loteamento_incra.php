<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");
?>

            <div class="card">
                <div class="card-header">
                Loteamento Incra
                </div>
                <?php
                $query = "SELECT * FROM `loteamento_incra` group by lote_sequencia, lote";
                $result = mysqli_query($con, $query);

                while($d = mysqli_fetch_object($result)){
                    $desci = explode(".",$d->desci);
                    $desci = str_replace(array('-','_'), " ",$desci[0]);
                ?>
                <div class="card-body">
                    <h5 class="card-title"><?=(($d->lote_sequencia)?:'Não Identificado')?></h5>
                    <p class="card-text">Forma detectados registros de arquivos PDF para <b><?=($d->lote)?></b>.</p>
                </div>
                <?php
                }
                ?>
            </div>
