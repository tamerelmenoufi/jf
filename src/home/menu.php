<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CONSULTORIA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" url="src/home/index.php">Resumo do projeto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" url="src/home/plataforma_gestao.php">Plataformas de Gestão</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" url="src/home/estrutura_bd.php">Banco de Dados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" url="src/home/estrutura_gis.php">PostGis</a>
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