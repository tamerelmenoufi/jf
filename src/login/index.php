<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");
?>
<style>
    #recuperar_senha{
        cursor:pointer;
    }
</style>
<div class="col" style="margin-top:90px;">
    <div class="offset-md-4 col-md-4">
        <div class="card m-3 p-3">
            <div class="card-body">
                <h3>Faça Seu Login</h3>
                <div class="mb-3">
                    <label for="login" class="form-label">Login</label>
                    <input type="text" class="form-control" id="login" aria-describedby="login">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="conectado">
                    <label class="form-check-label" for="conectado">Menter-me conectado</label>
                </div>
                <button id="entrar" type="button" class="btn btn-primary">Entrar</button>
                <div id="recuperar_senha" class="form-text">Recuperar meus dados de acesso</div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $("#entrar").click(function(){
            Carregando();
            $.ajax({
                url:"src/home/index.php",
                success:function(dados){
                    $(".CorpoApp").html(dados);
                    Carregando('none');
                }
            });
        })
    })
</script>