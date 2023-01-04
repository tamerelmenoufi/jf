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
            <input type="text" class="form-control" id="busca_processo" opc="requerente">
            <button class="btn btn-secondary buscar_resultado" >
                Buscar
            </button>
        </div>

        </div>
    </div>
</div>

<script>
    $(function(){
        $(".select_busca").click(function(){
            opc = $(this).text();
            $(".select_ativo_busca").text(opc)
            $("#busca_processo").attr("opc",opc)
        });

        $(".buscar_resultado").click(function(){
            opc = $(this).attr("opc");
            $.alert(opc)
        });
    })
</script>