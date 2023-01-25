<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");
?>
<div class="p-3">
    <div class="row">
        <div class="col">


        <div class="input-group mb-3">
            <button class="btn btn-outline-secondary dropdown-toggle select_ativo_busca" type="button" data-bs-toggle="dropdown" aria-expanded="false">Requerente</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item select_busca" href="#" >Processo</a></li>
                <li><a class="dropdown-item select_busca" href="#">Requerente</a></li>
                <!-- <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Separated link</a></li> -->
            </ul>
            <input type="text" class="form-control" id="busca_processo">
            <button class="btn btn-success buscar_resultado" >
                Buscar
            </button>
            <button class="btn btn-secondary cadastro_processo" >
                Cadastro
            </button>
        </div>


        <div class="card mv-3 p-3 pesquisa_resultado">
            Aqui o resultado da pesquisa
        </div>

        </div>
    </div>
</div>

<script>
    $(function(){
        $(".select_busca").click(function(){
            opc = $(this).text();
            $(".select_ativo_busca").text(opc)
        });

        $(".buscar_resultado").click(function(){
            campo = $(".select_ativo_busca").text()
            busca = $("#busca_processo").val();
            // $.alert(opc)
            if(campo && busca && busca.length <= 3){
                if(busca.length <= 3){
                    $.alert('A informação para a busca deve ser superior a três dígitos!');
                    return false;
                }
                $.alert('Digite as informações para a busca!');
                return false;
            }

            $.ajax({
                url:`src/processos/lista_processos.php`,
                type:"POST",
                data:{
                    campo,
                    busca
                },
                success:function(dados){
                    $(".pesquisa_resultado").html(dados)
                }
            });


        });


        $(".cadastro_processo").click(function(){


            $.ajax({
                url:`src/processos/cadastro_processo.php`,
                success:function(dados){
                    $(".pesquisa_resultado").html(dados)
                }
            });


        });


    })
</script>