<?php
session_start();
if (!$_SESSION["usuario"]) {
  header("location: app/view/loginteste1.php");
}
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <title>Guarulhos em Evidências</title>
</head>
<body>
    <header>
      <!-- Navegador no celular -->
      <div class="d-block d-sm-none">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" href="#">HOME</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="tecnologia.html">TECNOLOGIA</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">ESPORTE</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">SAÚDE</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">POLÍTICA</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">BRASIL</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">ENTRE</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">CADASTRO</a></li>
                    <li><a class="dropdown-item" href="#">LOGIN</a></li>
                    <li><a class="dropdown-item" href="#">ESQUECI MINHA<br>SENHA</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    <!-- Navegador no computador e tablet -->
      <div class="d-none d-sm-block">
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="#">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="app/view/tecnologia.html">TECNOLOGIA</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">ESPORTE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">SAÚDE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">POLÍTICA</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">BRASIL</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">ACESSO</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">CADASTRO</a></li>
              <li><a class="dropdown-item" href="#">LOGIN</a></li>
              <li><a class="dropdown-item" href="#">ESQUECI MINHA<br>SENHA</a></li>
              <button name="sair" id="sair" class="btn btn-danger">Sair</button>
            </ul>
          </li>
        </ul>
      </nav> 
      </div>
      <a href="index.html"><img src="public/assets/images/logo.png" alt="logo"></a>
    </header>
    <div class="separador"></div>
    <section id="NoticiasListar">
    <div class="" id="DivListarNoticias">
    <div class="row">
            <table id="NoticiasTable" class="display table table-dark table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Título</th>
                <th scope="col">Conteúdo</th>
                <th scope="col">Autor</th>
                <th scope="col">Data</th>
                <th scope="col">Imagem</th>
                <th scope="col">Categoria</th>
              </tr>
            </thead>
            <tbody>
            <!-- Os dados serão inseridos aqui dinamicamente -->
            </tbody>
            </table>
          </div>
          </div>
    </section>
    <script>
      $(document).ready(function () {

			$("#sair").click(function(){
				window.location.href = "sair.php";
						});
    carregarNoticias();  // Chama a função para carregar as notícias
});

// Função para carregar as notícias
function carregarNoticias() {
    $.ajax({
        url: "app/controllers/GetAllNoticias.php",  // Caminho para o script PHP que retorna as notícias
        type: "POST",
        dataType: "json",
        success: function (response) {
            if (response.success) {
                mostrarNoticias(response.noticias);  // Chama mostrarNoticias com a lista de notícias recebida
            } else {
                console.error(response.message);
                alert('Erro: ' + response.message); // Exibe mensagem de erro
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Erro ao carregar notícias:', textStatus, errorThrown);
            alert('Erro ao carregar notícias.'); // Mensagem de erro genérica
        }
    });
}

// Função para preencher as notícias como cards
function mostrarNoticias(noticias) {
    var container = $('#DivListarNoticias .row');
    container.empty(); // Limpa o container antes de adicionar as notícias

    noticias.forEach(function (noticia) {
        // Criar o card de cada notícia
        var cardHtml = `
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="${noticia.imagem}" class="card-img-top" alt="Imagem da notícia" style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">${noticia.titulo}</h5>
                        <p class="card-text">${noticia.conteudo.length > 100 ? noticia.conteudo.substring(0, 100) + '...' : noticia.conteudo}</p>
                        <p class="card-text"><small class="text-muted">Autor: ${noticia.fk_user_id} | Data: ${noticia.data}</small></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Categoria: ${noticia.fk_categoria_id}</small>
                    </div>
                </div>
            </div>
        `;

        // Adicionar o card ao container
        container.append(cardHtml);
    });
}
    </script>
    <!-- Footer -->
    <div class="container">
      <footer class="py-5">
        <div class="row">
          <div class="col-6 col-md-2 mb-3">
            <h5>Páginas</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="index.html" class="nav-link p-0 text-body-secondary">Home</a></li>
              <li class="nav-item mb-2"><a href="tecnologia.html" class="nav-link p-0 text-body-secondary">Tecnologia</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Esporte</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Saúde</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Política</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Brasil</a></li>
            </ul>
          </div>
    
          <div class="col-6 col-md-2 mb-3">
            <h5>Acesso</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Cadastro</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Login</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Esqueci minha<br>senha</a></li>
            </ul>
          </div>
    
          <div class="col-6 col-md-2 mb-3">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
            </ul>
          </div>
    
          <div class="col-md-5 offset-md-1 mb-3">
            <form>
              <h5>Envie as notícias do seu bairro</h5>
              <p>Nos envie as notícias através do e-mail/Facebook/Whatsapp</p>
              <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <label for="newsletter1" class="visually-hidden">Endereço de e-mail</label>
                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                <button class="btn btn-primary" type="button">Enviar</button>
              </div>
            </form>
          </div>
        </div>
        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
          <p>&copy; 2024 Guarulhos Em Evidências. Todos os direitos reservados.</p>
          <ul class="list-unstyled d-flex">
            <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
            <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
            <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
          </ul>
        </div>
      </footer>
    </div>
</body>
</html>