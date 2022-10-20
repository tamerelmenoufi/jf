<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");
?>

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
