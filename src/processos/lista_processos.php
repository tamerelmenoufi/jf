<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");


    $query = "select * from processos where {$_POST['campo']} LIKE '%{$_POST['busca']}%' limit 100";
    $result = mysqli_query($con, $query);
    $n = mysqli_num_rows($result);
    if(!$n){
?>
<div style="color:#a1a1a1; text-align:center" >
    <h1>Nenhum resultado para<br><?="{$_POST['busca']}"?></h1>
</div>
<?php
    }else{
?>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Processo</th>
            <th>Requerente</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
<?php
    while($d = mysqli_fetch_object($result)){
?>
        <tr >
            <td><?=$d->processo?></td>
            <td><?=$d->requerente?></td>
            <td>
                <button
                    class="btn btn-secondary"
                    data-bs-toggle="offcanvas"
                    href="#offcanvasDireita"
                    role="button"
                    aria-controls="offcanvasDireita"
                    opc_processo="<?=$d->codigo?>"
                >
                    <i class="fa fa-cog"></i>
                </button>
            </td>
        </tr>
<?php
    }
?>
    </tbody>
</table>
<?php
    }
?>
<script>
    $(function(){
        $("button[opc_processo]").click(function(){
            cod = $(this).attr("opc_processo");
            $.ajax({
                url:"src/processos/home.php",
                type:"POST",
                data:{
                    cod,
                },
                success:function(dados){
                    $("#offcanvasDireita").html(dados);
                }
            });
        });
    })
</script>