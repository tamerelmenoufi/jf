<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");

    $query = "select * from processos where codigo = '{$_POST['cod']}'";
    $result = mysqli_query($con, $query);
    $d = mysqli_fetch_object($result);
?>
<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between">
    <span>Registro do índice do processo</span>
    <a href="http://moh1.com.br/jf/SIGLO_AM/CONVENIO 2000\08-Titulos Plotados\AM\01-Livros\03-Indice Remissivo de Processo/ÍNDICE REMISSIVO DE PROCESSOS.pdf" target="_blank" style="text-decoration:none;">PDF Origem <i class="fa-regular fa-file-pdf"></i></a>
  </li>


  <li class="list-group-item d-flex justify-content-column">
    <!-- <div class="form-floating"> -->

      <div showImage class="form-floating" style="display:<?=(($d->imagem)?'block':'none')?>">
        <object data="" type="" class="mt-3 mb-3 h-100 w-100" ></object>
      </div>

      <input type="file" class="form-control" placeholder="Banner">
      <input type="hidden" id="base64" name="base64" value="" />
      <input type="hidden" id="imagem_tipo" name="imagem_tipo" value="" />
      <input type="hidden" id="imagem_nome" name="imagem_nome" value="" />
      <input type="hidden" id="imagem" name="imagem" value="<?=$d->imagem?>" />
      <!-- <label for="url">Banner</label> -->
      <div class="form-text mb-3">Selecione a imagem para o Banner</div>
    <!-- </div> -->
  </li>

  <li class="list-group-item d-flex justify-content-between" style="height:500px;">
    <object data="<?=$urlData.substr($d->url,1,strlen($d->url))?>" type="" class="h-100 w-100" ></object>
  </li>
</ul>


<script>




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

                $("#base64").val(Base64);
                $("#imagem_tipo").val(type);
                $("#imagem_nome").val(name);

                $("div[showImage] data").attr("src",Base64);
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