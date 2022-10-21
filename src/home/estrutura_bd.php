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
                    Estrutura do banco de dados
                    </div>
                    <div class="card-body">
                        <img src="img/estrutura_bd.jpg" style="width:100%;" />
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(function(){
        $("button[url]").click(function(){
            url = $(this).attr("url");
            $.ajax({
                url:`src/home/dados/${url}`,
                success:function(dados){
                    $("#EstruturaDados").html(dados);
                }
            });
        });
    })
</script>