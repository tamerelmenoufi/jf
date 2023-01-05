<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");
?>

<style>
    #myTabContent{
        border-left:solid 1px #dee2e6;
        border-right:solid 1px #dee2e6;
        border-bottom:solid 1px #dee2e6;
        padding:20px;
    }
</style>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button
        class="nav-link active acao_tab"
        id="dados_gerais_tab"
        data-bs-toggle="tab"
        data-bs-target="#home-tab-pane"
        type="button"
        role="tab"
        aria-controls="home-tab-pane"
        aria-selected="true"
        local="src/processos/dados_gerais.php"
    >DADOS GERAIS</button>
  </li>
  <li class="nav-item" role="presentation">
    <button
        class="nav-link acao_tab"
        id="indice_processo_tab"
        data-bs-toggle="tab"
        data-bs-target="#home-tab-pane"
        type="button"
        role="tab"
        aria-controls="home-tab-pane"
        aria-selected="false"
        local="src/processos/indice_processo.php"
    >INDICE PROCESSO</button>
  </li>
  <li class="nav-item" role="presentation">
    <button
        class="nav-link acao_tab"
        id="indice_registro_tab"
        data-bs-toggle="tab"
        data-bs-target="#home-tab-pane"
        type="button"
        role="tab"
        aria-controls="home-tab-pane"
        aria-selected="false"
        local="src/processos/indice_registro.php"
    >INDECE DE REGISTRO</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">...</div>
</div>

<script>
    $(function(){

        $.ajax({
            url:"src/processos/dados_gerais.php",
            type:"POST",
            data:{
                cod:'<?=$_POST['cod']?>',
            },
            success:function(dados){
                $("#home-tab-pane").html(dados);
            }
        });

        $(".acao_tab").click(function(){
            url = $(this).attr("local");
            Carregando();
            $.ajax({
                url,
                type:"POST",
                data:{
                    cod:'<?=$_POST['cod']?>',
                },
                success:function(dados){
                    $("#home-tab-pane").html(dados);
                    Carregando('none');
                },
                error:function(){
                    Carregando('none');
                }
            });
        });

    })
</script>