<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");
?>

<style>
    #EstruturaDados{
        border-left:solid #dee2e6 1px;
        border-right:solid #dee2e6 1px;
        border-bottom:solid #dee2e6 1px;
    }
</style>
<?php

    $paginas = [
        [
            'titulo' => 'Livros Tombo',
            'url' => 'livros_tombo.php'
        ],
        [
            'titulo' => 'Lista Cartografia Básica',
            'url' => 'lista_cartografia_basica.php'
        ],
        [
            'titulo' => 'Lista dos títulos plotados',
            'url' => 'lista_titulos_plotados.php'
        ],
        [
            'titulo' => 'Dados Fundiários',
            'url' => 'dados_fundiarios.php'
        ],
        [
            'titulo' => 'Loteamento Incra',
            'url' => 'loteamento_incra.php'
        ],
        [
            'titulo' => 'Plantas Incra',
            'url' => 'plantas_incra.php'
        ],
        [
            'titulo' => 'Processos',
            'url' => 'processos.php'
        ],
        [
            'titulo' => 'processos iteam',
            'url' => 'processos_iteam.php'
        ],
        [
            'titulo' => 'Titulos Plotados',
            'url' => 'titulos_plotados.php'
        ],
    ];

?>

<div class="container">
    <div class="row">
        <div class="col-12 m-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <?php
                foreach($paginas as $ind => $val){
                ?>
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link <?=(($ind == 0)?'active':false)?>"
                        id="home-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#EstruturaDados"
                        type="button"
                        role="tab"
                        aria-controls="EstruturaDados"
                        aria-selected="<?=(($ind == 0)?'true':'false')?>"
                        url="<?=$val['url']?>"
                        ><?=$val['titulo']?></button>
                </li>

                <?php
                }
                ?>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active p-3" id="EstruturaDados" role="tabpanel" aria-labelledby="home-tab" tabindex="0"></div>
            </div>
        </div>




        <div class="col-12">
            <div class="m-3">
                <div class="card">
                    <div class="card-header">
                    Gerenciamento de Dados (Banco Mysql e Postgres)
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="img/phpmyadmin.png" style="width:100%;" />
                            </div>
                            <div class="col-md-6">
                                <img src="img/pgadmin.png" style="width:100%;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12">
            <div class="m-3">
                <div class="card">
                    <div class="card-header">
                    Estrutura do banco de dados
                    </div>
                    <div class="card-body">
                        <img src="img/estrutura_bd.jpg" style="width:100%;" />
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(function(){

        $.ajax({
            url:"src/home/dados/livros_tombo.php",
            success:function(dados){
                $("#EstruturaDados").html(dados);
            }
        });

        $("button[url]").click(function(){
            url = $(this).attr("url");
            $.ajax({
                url:`src/home/dados/${url}`,
                success:function(dados){
                    $("#EstruturaDados").html(dados);
                }
            });
        });
    })
</script>