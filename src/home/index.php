<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");
?>

<?php
    include("menu.php");
    include("menu_esquerdo.php");
    include("menu_direito.php");
?>

<div class="PaginaHome"></div>

<script>
    $(function(){

        $.ajax({
            url:'src/home/home.php',
            success:function(dados){
                $("#EstruturaDados").html(dados);
            }
        });


        $("a[url]").click(function(){
            url = $(this).attr("url");
            $.ajax({
                url,
                success:function(dados){
                    $("#EstruturaDados").html(dados);
                }
            });
        });

    })
</script>