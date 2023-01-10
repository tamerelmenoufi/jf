<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");

    if($_POST['acao'] == 'valor_campo'){
        $q = "update processos set valida_livro_registro = JSON_SET(valida_livro_registro, '$.{$_POST['campo']}','{$_POST['valor']}') where codigo = '{$_POST['cod']}'";
        mysqli_query($con, $q);

        RegLog([
          'dados' => $_POST,//POST, GET e ETC
          'query' => $q //Comando SQL da Operação
      ]);

        exit();
    }

    if($_POST['acao'] == 'livro_registro'){
      $arq = str_replace("data:{$_POST['type']};base64,",false,$_POST['Base64']);
      $arq = base64_decode(trim($arq));
      $ext = substr($_POST['name'], strrpos($_POST['name'],'.'), strlen($_POST['name']));
      $nom = md5($_POST['cod'])."{$ext}";
      if(file_put_contents("../../volume/livro_registro/{$nom}", $arq)){
        $q = "update processos set valida_livro_registro = JSON_SET(valida_livro_registro, '$.arquivo','{$nom}') where codigo = '{$_POST['cod']}'";
        mysqli_query($con, $q);

        RegLog([
          'dados' => $_POST,//POST, GET e ETC
          'query' => $q //Comando SQL da Operação
      ]);

      }
      exit();
    }

    $query = "select * from processos where codigo = '{$_POST['cod']}'";
    $result = mysqli_query($con, $query);
    $d = mysqli_fetch_object($result);

    $v = json_decode($d->valida_livro_registro);
    // var_dump($v);
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

<?php
  $lista = file("http://moh1.com.br/jf/SIGLO_AM/CONVENIO%202000/08-Titulos%20Plotados/AM/01-Livros/02_Livros%20de%20Registro/lista.txt");
?>

    <div>Registro do índice do processo</div>
    <a
      ArqOrg="http://moh1.com.br/jf/SIGLO_AM/CONVENIO%202000/08-Titulos%20Plotados/AM/01-Livros/02_Livros%20de%20Registro/"
      href="http://moh1.com.br/jf/SIGLO_AM/CONVENIO%202000/08-Titulos%20Plotados/AM/01-Livros/02_Livros%20de%20Registro/<?=$v->arquivo_origem?>"
      target="_blank" style="text-decoration:none;">PDF Origem <i class="fa-regular fa-file-pdf"></i></a>
  </li>




  <li class="list-group-item">
    <!-- <div class="form-floating"> -->

      <div showImage class="form-floating" style="display:<?=((is_file("../../volume/livro_registro/{$v->arquivo}"))?'block':'none')?>">
        <div class="d-flex justify-content-between">
          <span class="titulo_tela_cheia">Documento Inserido</span>
          <i class="fa-solid fa-maximize acao_tela_cheia"></i>
          <i class="fa-solid fa-close acao_tela_min"></i>
        </div>
        <object data="../../volume/livro_registro/<?=$v->arquivo?>?<?=md5(date("YmdHis"))?>" type="" class="mt-3 mb-3 h-100 w-100" ></object>
      </div>

      <input type="file" class="form-control" placeholder="Banner" accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps">
      <!-- <input type="hidden" id="base64" name="base64" value="" />
      <input type="hidden" id="imagem_tipo" name="imagem_tipo" value="" />
      <input type="hidden" id="imagem_nome" name="imagem_nome" value="" />
      <input type="hidden" id="imagem" name="imagem" value="<?=$d->imagem?>" /> -->
      <!-- <label for="url">Banner</label> -->
      <div class="form-text mb-3">Selecione a IMAGEM ou o PDF do recorte do Índice do processo.</div>
    <!-- </div> -->
  </li>


  <?php

    $dados = [
      // ID, TITLE, COL, VALUE, TYPE, MASK
    //   ['ch_arq', 'CH ARQ', 4, $v->ch_arq,'text',false],
    //   ['fol', 'FOL', 4, $v->fol,'text',false],
    //   ['ic_pro', 'IC PRO', 4, $v->ic_pro,'text',false],
    //   ['proprietario', 'Proprietário', 4, $v->proprietario,'text',false],
    //   ['nome_imovel', 'Nome Imóvel', 4, $v->nome_imovel,'text',false],
    //   ['mun', 'MUM', 4, $v->mun,'text',false],
    //   ['com', 'COM', 4, $v->com,'text',false],
    //   ['loc', 'LOC', 4, $v->loc,'text',false],
    //   ['area', 'Área', 4, $v->area,'number',false],
    //   ['data_td', 'Data TD', 4, $v->data_td,'text','99/99/9999'],
    //   ['sit', 'SIT', 4, $v->sit,'text',false],
    //   ['est', 'EST', 4, $v->est,'text',false],
    //   ['part', 'PART', 4, $v->part,'text',false],
    //   ['cai', 'CAI', 4, $v->cai,'text',false],

      ['Arquivo Origem', 'arquivo_origem', 3, $v->arquivo_origem,'select',false],
      ['lv', 'LV', 3, $v->lv,'text',false],
      ['folhas', 'Folhas', 3, $v->folhas,'text',false],
      ['pag_pdf_orig', 'Página no PDF de Origem', 3, $v->pag_pdf_orig,'text',false],
      ['detalhes', 'Informações/Detalhes', 12, $v->detalhes,'textarea',false],
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
          <?php
          if(strtolower($row[4]) == 'textarea'){
          ?>
          <textarea
                type="<?="{$row[4]}"?>"
                class="form-control is-<?=(($row[3])?'valid':'invalid')?> acao_dados"
                id="<?=$row[0]?>"
                atual="<?="{$row[3]}"?>"
          ><?="{$row[3]}"?></textarea>
          <?php
          }else if(strtolower($row[4]) == 'select'){
          ?>
          <select name="<?=$row[0]?>" id="<?=$row[0]?>" class="form-control">
            <option value="">::Arquivo::</option>
            <?php
              foreach($lista as $i => $val){
            ?>
            <option value="<?=$val?>" <?=(($v->arquivo_origem == $val)?'selected':false)?>><?=$val?></option>
            <?php
              }
            ?>
          </select>
          <label for="<?=$row[0]?>" class="form-label"><?=$row[1]?></label>
          <?php
          }else{
          ?>
          <input
                type="<?="{$row[4]}"?>"
                class="form-control is-<?=(($row[3])?'valid':'invalid')?> acao_dados"
                id="<?=$row[0]?>"
                value="<?="{$row[3]}"?>"
                atual="<?="{$row[3]}"?>"
                mask="<?="{$row[5]}"?>"
          >
          <?php
          }
          ?>
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

    $("#arquivo_origem").change(function(){
      opc = $(this).val();
      cam = $("a[ArqOrg]").attr("ArqOrg");

      $("a[ArqOrg]").attr("href",`${cam}${opc}`);

    });

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
        url:"src/processos/livro_registro.php",
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
                  url:"src/processos/livro_registro.php",
                  type:"POST",
                  data:{
                    cod:'<?=$_POST['cod']?>',
                    Base64,
                    type,
                    name,
                    size,
                    acao:'livro_registro'
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