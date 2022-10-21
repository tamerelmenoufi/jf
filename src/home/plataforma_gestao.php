<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");

    include("menu.php");
?>

<div class="container">
    <div class="row">




        <div class="col-12">
            <div class="m-3">
                <div class="card">
                    <div class="card-header">
                    Gerenciamento de Dados (Banco Mysql e Postgres)
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div style="text-align:center; background-color:#eee; border-radius:7px; padding:10px;">
                                    <a href='http://consultoria.mohatron.com:8000/' target='_blank'><img src="img/phpmyadmin.png" style="width:90%; cursor:pointer;" /></a>
                                    <p style="margin-top:10px;">Gerenciandor do banco de dados e estrutura de informações do sistema. Acesse <a href='http://consultoria.mohatron.com:8000/' target='_blank'>PhpMyadmin</a></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="text-align:center; background-color:#eee; border-radius:7px; padding:10px;">
                                    <a href='http://consultoria.mohatron.com:8083/' target='_blank'><img src="img/pgadmin.png" style="width:90%; cursor:pointer;" /></a>
                                    <p style="margin-top:10px;">Gerenciandor do banco de dados Geográficos e informações relacionadas. Acesse <a href='http://consultoria.mohatron.com:8083/' target='_blank'>PgAdmin</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<script>
    $(function(){

    })
</script>