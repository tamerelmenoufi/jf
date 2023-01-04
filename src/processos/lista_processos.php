<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");


    echo $query = "select * from processos where {$_POST['campo']} LIKE '%{$_POST['busca']}%' limit 100";
    $result = mysqli_query($con, $query);
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