<?php
    $home = true;
    include("{$_SERVER['DOCUMENT_ROOT']}/jf/lib/includes.php");

    if($_GET['s']){
        $_SESSION = [];
        header("location:./");
        exit();
    }

    if($_SESSION['usuario']){
        $url = "src/home/index.php";
    }else{
        $url = "src/login/index.php";
    }


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="img/icone.png">
    <title>Consultoria</title>
    <?php
    include("lib/header.php");
    ?>
  </head>
  <body>

    <div class="Carregando">
        <div><i class="fas fa-spinner fa-pulse"></i></div>
    </div>

    <div class="CorpoApp"></div>

    <?php
    include("lib/footer.php");
    ?>

    <script>
        $(function(){
            Carregando();
            $.ajax({
                url:"<?=$url?>",
                success:function(dados){
                    $(".CorpoApp").html(dados);
                    Carregando('none');
                }
            });
        })
    </script>

  </body>
</html>