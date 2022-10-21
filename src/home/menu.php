<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CONSULTORIA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <button class="nav-link" url="src/home/index.php">Resumo do projeto</button>
        </li>
        <li class="nav-item">
          <button class="nav-link" url="src/home/plataforma_gestao.php">Plataformas de Gestão</button>
        </li>
        <li class="nav-item">
          <button class="nav-link" url="src/home/estrutura_bd.php">Banco de Dados</button>
        </li>
        <li class="nav-item">
          <button class="nav-link" url="src/home/estrutura_gis.php">PostGis</button>
        </li>
      </ul>
      <span class="navbar-text">
        Administrador do Sistema
      </span>
    </div>
  </div>
</nav>

<script>
    $(function(){

        $.ajax({
            url:"src/home/dados/livros_tombo.php",
            success:function(dados){
                $("#EstruturaDados").html(dados);
            }
        });

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