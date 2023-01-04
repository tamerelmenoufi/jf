<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");


    $query = "select * from processos where {$_POST['campo']} LIKE '%{$_POST['busca']}%' limit 100";
    $result = mysqli_query($con, $query);
    $n = mysqli_num_rows($result);
    if(!$n){
?>
<div class="d-flex align-content-center h-100">
    <h1 style="color:#a1a1a1" >Nenhum resultado para<br><?="{$_POST['busca']}"?></h1>
</div>
<?php
    }

    while($d = mysqli_fetch_object($result)){
?>

<p><?=$d->requerente?></p>

<?php
    }
?>

<script>
    $(function(){

    })
</script>