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
                    <input type="text" autocomplete="off" class="form-control" id="login" aria-describedby="login">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" autocomplete="off" class="form-control" id="senha">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="conectado">
                    <!-- <label class="form-check-label" for="conectado">Menter-me conectado</label> -->
                </div>
                <button id="entrar" type="button" class="btn btn-primary">Entrar</button>
                <!-- <div id="recuperar_senha" class="form-text">Recuperar meus dados de acesso</div> -->
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $("#entrar").click(function(){

            login = $("#login").val();
            senha = $("#senha").val();

            if(!login || !senha) {
                $.alert('Favor informar os dados de acesso para o login!');
                return false;
            }
            if(login != 'admin' || senha != '123456'){
                $.alert('Dados incorretos!<br><br>Confira seus dados de acesso e tente novamente.');
                return false;
            }
            Carregando();
            $.ajax({
                url:"src/home/index.php",
                type:"POST",
                data:{
                    login,
                    senha,
                    acao:'login'
                },
                success:function(dados){
                    $(".CorpoApp").html(dados);
                    Carregando('none');
                }
            });
        })
    })
</script>