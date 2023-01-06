<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");

    if($_POST['acao'] == 'valor_campo'){
        $q = "update processos set valida_indice_registro = JSON_SET(valida_indice_registro, '$.{$_POST['campo']}','{$_POST['valor']}') where codigo = '{$_POST['cod']}'";
        mysqli_query($con, $q);
        exit();
    }

    if($_POST['acao'] == 'indice_registro'){
      $arq = str_replace("data:{$_POST['type']};base64,",false,$_POST['Base64']);
      $arq = base64_decode(trim($arq));
      $ext = substr($_POST['name'], strrpos($_POST['name'],'.'), strlen($_POST['name']));
      $nom = md5($_POST['cod'])."{$ext}";
      if(file_put_contents("../../volume/indice_registro/{$nom}", $arq)){
        $q = "update processos set valida_indice_registro = JSON_SET(valida_indice_registro, '$.arquivo','{$nom}') where codigo = '{$_POST['cod']}'";
        mysqli_query($con, $q);
      }
      exit();
    }

    $query = "select * from processos where codigo = '{$_POST['cod']}'";
    $result = mysqli_query($con, $query);
    $d = mysqli_fetch_object($result);

    $v = json_decode($d->valida_indice_registro);

?>
<style>
  .tela_cheia{
    position:fixed;
    top:0;
    bottom:0;
    left:0;
    right:0;
    background-color:#fff;
    z-index:999;
  }
  .acao_tela_cheia{
    font-size:20px;
    cursor:pointer;
    margin:10px;
    color:#000;
  }
  .acao_tela_min{
    display:none;
    font-size:25px;
    cursor:pointer;
    margin:10px;
    color:#000;
  }
  .titulo_tela_cheia{
    font-size:20px;
    margin:10px;
    color:#000;
  }

</style>


<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between">
    <div>Registro do índice do registro</div>
    <a href="http://moh1.com.br/jf/SIGLO_AM/CONVENIO 2000\08-Titulos Plotados\AM\01-Livros\04-Indice Remissivo Livro de Registro/ÍNDICE REMISSIVO LIVROS DE REGISTROS.pdf" target="_blank" style="text-decoration:none;">PDF Origem <i class="fa-regular fa-file-pdf"></i></a>
  </li>




  <li class="list-group-item">
    <!-- <div class="form-floating"> -->

      <div showImage class="form-floating" style="display:<?=((is_file("../../volume/indice_registro/{$v->arquivo}"))?'block':'none')?>">
        <div class="d-flex justify-content-between">
          <span class="titulo_tela_cheia">Documento Inserido</span>
          <i class="fa-solid fa-maximize acao_tela_cheia"></i>
          <i class="fa-solid fa-close acao_tela_min"></i>
        </div>
        <object data="../../volume/indice_registro/<?=$v->arquivo?>?<?=md5(date("YmdHis"))?>" type="" class="mt-3 mb-3 h-100 w-100" ></object>
      </div>

      <input type="file" class="form-control" placeholder="Banner" accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps">
      <!-- <input type="hidden" id="base64" name="base64" value="" />
      <input type="hidden" id="imagem_tipo" name="imagem_tipo" value="" />
      <input type="hidden" id="imagem_nome" name="imagem_nome" value="" />
      <input type="hidden" id="imagem" name="imagem" value="<?=$d->imagem?>" /> -->
      <!-- <label for="url">Banner</label> -->
      <div class="form-text mb-3">Selecione a IMAGEM ou o PDF do recorte do Índice do registro.</div>
    <!-- </div> -->
  </li>



  <?php

    $dados = [
      // ID, TITLE, COL, VALUE
      ['ch_arq', 'CH ARQ', 4, $v->ch_arq,'text',false],
      ['ic_pro', 'IC PRO', 4, $v->ic_pro,'text',false],
      ['pag', 'PAG', 4, $v->ic_pro,'text',false],
      ['ord', 'ORD', 4, $v->ic_pro,'text',false],
      ['proprietario', 'Proprietário', 4, $v->proprietario,'text',false],
      ['mun', 'MUM', 4, $v->mun,'text',false],
      ['dt_exp', 'DT EXP', 4, $v->data_td,'text',"99/99/9999"],
      ['area', 'Área', 4, $v->area,'number',false],
      ['lv', 'LV', 4, $v->area,'text',false],
      ['folhas', 'Folhas', 4, $v->area,'text',false],
      ['rol', 'ROL', 4, $v->area,'text',false],
      ['blipts', 'BLIPTS', 4, $v->area,'text',false],
      ['sit', 'SIT', 4, $v->sit,'text',false],
      ['pag_pdf_orig', 'Página no PDF de Origem', 4, $v->pag_pdf_orig,'text',false],
    ];

  ?>

  <li class="list-group-item">
    <h5>Registros Complementares</h5>

    <div class="row">
      <?php
      foreach($dados as $ind => $row){
      ?>
      <div class="col-md-<?=$row[2]?>">
        <div class="form-floating mb-3">
          <input
                type="<?=$row[4]?>"
                class="form-control is-<?=(($row[3])?'valid':'invalid')?> acao_dados"
                id="<?=$row[0]?>"
                value="<?="{$row[3]}"?>"
                atual="<?="{$row[3]}"?>"
                mask="<?="{$row[5]}"?>"
          >
          <label for="<?=$row[0]?>" class="form-label"><?=$row[1]?></label>
        </div>
      </div>

      <?php
      }
      ?>
    </div>

  </li>


</ul>


<script>

  $(function(){

    $(".acao_dados").each(function(){
        mask = $(this).attr("mask");
        if(mask){
            $(this).mask(mask);
        }
    })

    $(".acao_tela_cheia").click(function(){
      $("div[showImage]").addClass("tela_cheia");
      $(this).css("display","none");
      $(".acao_tela_min").css("display","inline");
    });

    $(".acao_tela_min").click(function(){
      $("div[showImage]").removeClass("tela_cheia");
      $(this).css("display","none");
      $(".acao_tela_cheia").css("display","inline");
    });


    $(".acao_dados").blur(function(){
      obj = $(this);
      campo = obj.attr("id");
      valor = obj.val();
      atual = obj.attr("atual");

      if(atual == valor) return false;
      Carregando();
      $.ajax({
        url:"src/processos/indice_registro.php",
        type:"POST",
        data:{
          cod:'<?=$_POST['cod']?>',
          campo,
          valor,
          acao:'valor_campo'
        },
        success:function(dados){
          // $.alert(dados)
          obj.attr("atual", valor);

          if(valor.trim()){
            obj.removeClass("is-invalid")
            obj.addClass("is-valid")
          }else{
            obj.addClass("is-invalid")
            obj.removeClass("is-valid")
          }

          Carregando('none');
        },
        error:function(){
          Carregando('none');
          $.alert('Ocorreu um erro de conexão!')
        }
      });

    });

  })


if (window.File && window.FileList && window.FileReader) {

$('input[type="file"]').change(function () {

    if ($(this).val()) {
        var files = $(this).prop("files");
        for (var i = 0; i < files.length; i++) {
            (function (file) {
                var fileReader = new FileReader();
                fileReader.onload = function (f) {


                var Base64 = f.target.result;
                var type = file.type;
                var name = file.name;
                var size = (((file.size)/1024)/1024);

                if(size > 3){
                  $.alert('Tamanho do arquivo superior ao permitido!');
                  return false;
                }
                Carregando();
                $.ajax({
                  url:"src/processos/indice_registro.php",
                  type:"POST",
                  data:{
                    cod:'<?=$_POST['cod']?>',
                    Base64,
                    type,
                    name,
                    size,
                    acao:'indice_registro'
                  },
                  success:function(dados){
                    // $.alert(dados)
                    Carregando('none');
                  },
                  error:function(){
                    Carregando('none');
                    $.alert('erro')
                  }
                });


                // $("#base64").val(Base64);
                // $("#imagem_tipo").val(type);
                // $("#imagem_nome").val(name);
                // $("#imagem_size").val(size);

                $("div[showImage] object").attr("data",Base64);
                $("div[showImage]").css("display",'block');

                };
                fileReader.readAsDataURL(file);
            })(files[i]);
        }
  }
});
} else {
  alert('Nao suporta HTML5');
}

</script>