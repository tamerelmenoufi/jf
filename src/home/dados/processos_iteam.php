<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");
?>

            <div class="card">
                <div class="card-header">
                Processos ITEAM
                </div>
                <?php
                $query = "SELECT *, count(*) as quantidade FROM `processo_iteam`";
                $result = mysqli_query($con, $query);

                while($d = mysqli_fetch_object($result)){
                    $descricao = explode(".",$d->descricao);
                    $descricao = str_replace(array('-','_'), " ",$descricao[0]);
                ?>
                <div class="card-body">
                    <h5 class="card-title">Registro de Processos ITEAM</h5>
                    <p class="card-text">Forma detectados registros de arquivos para <b><?=($d->quantidade)?></b> Processos.</p>
                </div>
                <?php
                }
                ?>
            </div>
