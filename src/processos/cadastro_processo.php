<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");

    if($_POST['acao'] == 'processo'){
        $q = "INSERT INTO processos set processo = '{$_POST['processo']}', valida_indice_processo = '{}', valida_indice_registro = '{}', valida_livro_registro = '{}'";
        mysqli_query($con, $q);
        // echo $cod = mysqli_insert_id($con);

        RegLog([
            'dados' => $_POST,//POST, GET e ETC
            'query' => $q //Comando SQL da Operação
        ]);

        exit();
    }

?>
<style>


</style>


<ul class="list-group">
  <li class="list-group-item">
    <h5>Cadastrar um Processo</h5>

    <div>
      <div class="mb-3">
        <label for="numero_processo" class="form-label">Digite o Número do Processo</label>
        <input type="text" class="form-control" id="numero_processo" aria-describedby="numero_processoHelp">
        <div id="numero_processoHelp" class="form-text">Digite no campo acima o número do processo.</div>
      </div>
      <button type="submit" class="btn btn-primary inserir_processo">Inserir</button>
    </div>

  </li>
</ul>


<script>

  $(function(){

    Carregando('none');


    $(".inserir_processo").click(function(){

      processo = $("#numero_processo").val();

      console.log(processo)
      console.log(processo.length)

      return

      if(!processo && processo.length <= 3) {
        $.alert('Digite o número do processo!')
        return false;
      }
      Carregando();
      $.ajax({
        url:"src/processos/cadastro_processo.php",
        type:"POST",
        data:{
          processo,
          acao:'processo'
        },
        success:function(dados){

          $.ajax({
              url:`src/processos/lista_processos.php`,
              type:"POST",
              data:{
                  campo:'Processo',
                  busca:processo
              },
              success:function(dados){
                  $(".pesquisa_resultado").html(dados)
              }
          });

          Carregando('none');
        },
        error:function(){
          Carregando('none');
          $.alert('Ocorreu um erro de conexão!')
        }
      });

    });

  })



</script>