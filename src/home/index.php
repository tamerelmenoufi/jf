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


<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar w/ text</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
      </ul>
      <span class="navbar-text">
        Navbar text with an inline element
      </span>
    </div>
  </div>
</nav>






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
                                <div style="text-align:center; background-color:#eee; border-radius:7px; padding:10px;">
                                    <a href='http://consultoria.mohatron.com:8000/' target='_blank'><img src="img/phpmyadmin.png" style="width:90%; cursor:pointer;" /></a>
                                    <p style="margin-top:10px;">Gerenciandor do banco de dados e estrutura de informações do sistema. Acesse <a href='http://consultoria.mohatron.com:8000/' target='_blank'>PhpMyadmin</a></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="text-align:center; background-color:#eee; border-radius:7px; padding:10px;">
                                    <a href='http://consultoria.mohatron.com:8083/' target='_blank'><img src="img/pgadmin.png" style="width:90%; cursor:pointer;" /></a>
                                    <p style="margin-top:10px;">Gerenciandor do banco de dados Geográficos e informações relacionadas. Acesse <a href='http://consultoria.mohatron.com:8083/' target='_blank'>PgAdmin</a></p>
                                </div>
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



        <div class="col-12">
            <div class="m-3">
                <div class="card">
                    <div class="card-header">
                    Estrutura do banco de dados Geográficos
                    </div>
                    <div class="card-body">
                        <img src="img/estrutura_gis.JPG" style="width:100%;" />
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