<?php
    $home = true;
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");

    if($_POST['acao'] == 'login'){
        $login = $_POST['login'];
        $senha = md5($_POST['senha']);

        $query = "select * from usuarios where login = '{$login}' and senha = '{$senha}'";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result)){
            $d = mysqli_fetch_object($result);
            $_SESSION['usuario'] = $d;
            $retorno = [
                'sucesso' => true,
                'usuario' => $d->codigo,
                'MaterConnectado' => $_POST['MaterConnectado'],
                'msg' => 'Login Realizado com sucesso',
            ];
        }else{
            $retorno = [
                'sucesso' => false,
                'usuario' => false,
                'MaterConnectado' => false,
                'msg' => 'Ocorreu um erro no seu login',
            ];
        }
        echo json_encode($retorno);
        exit();
    }

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
                <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="conectado">
                    <label class="form-check-label" for="conectado">Menter-me conectado</label>
                </div> -->
                <button id="entrar" type="button" class="btn btn-primary">Entrar</button>
                <!-- <div id="recuperar_senha" class="form-text">Recuperar meus dados de acesso</div> -->
            </div>
        </div>
    </div>
</div>
<script>



$(function(){
        Carregando('none');
        AcaoBotao = ()=>{
            login = $("#login").val();
            senha = $("#senha").val();
            Carregando();
            $.ajax({
                url:"src/login/index.php",
                type:"POST",
                dataType:"json",
                data:{
                    acao:'login',
                    login,
                    senha
                },
                success:function(dados){
                    // let retorno = JSON.parse(dados);
                    // $.alert(dados.sucesso);
                    console.log(dados.usuario);
                    if(dados.usuario > 0){
                        window.location.href='./';
                    }else{
                        $.alert('Ocorreu um erro.<br>Favor confira os dados do login.')
                        Carregando('none');
                    }

                }
            });
        };

        $("#entrar").click(function(){
            AcaoBotao();
        });

        $(document).on('keypress', function(e){

            var key = e.which || e.keyCode;
            if (key == 13) { // codigo da tecla enter
                AcaoBotao();
            }


        });

    })



    // $(function(){
    //     $("#entrar").click(function(){

    //         login = $("#login").val();
    //         senha = $("#senha").val();

    //         if(!login || !senha) {
    //             $.alert('Favor informar os dados de acesso para o login!');
    //             return false;
    //         }
    //         if(login != 'admin' || senha != '123456'){
    //             $.alert('Dados incorretos!<br><br>Confira seus dados de acesso e tente novamente.');
    //             return false;
    //         }
    //         Carregando();
    //         $.ajax({
    //             url:"src/home/index.php",
    //             type:"POST",
    //             data:{
    //                 login,
    //                 senha,
    //                 acao:'login'
    //             },
    //             success:function(dados){
    //                 $(".CorpoApp").html(dados);
    //                 Carregando('none');
    //             }
    //         });
    //     })
    // })
</script>