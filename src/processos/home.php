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
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">DADOS GERAIS</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">INDICE PROCESSO</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">INDECE DE REGISTRO</button>
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

    })
</script>