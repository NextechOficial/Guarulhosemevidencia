<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/style.css">
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
            </ul>
          </li>
        </ul>
      </nav> 
      </div>
      <a href="index.html"><img src="../../public/assets/images/logo.png" alt="logo"></a>
    </header>
    <div class="separador"></div>
    <!-- Main -->
    <main>
      <!-- div lateral -->
      <div>
        <button id="DivListarNoticiasBtn" type="button" class="btn btn-dark">Listar as notícias</button>
        <button id="DivListarUsersBtn" type="button" class="btn btn-dark">Listar usuários</button>
      </div>
      <!-- div das tabelas-->
      <section id="UserFunctions">
      <h1>Usuários - Listagem e exclusão</h1>
        <div class="" id="DivListarUsers">
          <table id="usersTable" class="display table table-dark table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Nível</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
          <!-- Os dados serão inseridos aqui dinamicamente -->
          </tbody>
          </table>
        </div>

<!-- LISTAR NOTÍCIAS ABAIXO -->
      </section>
      <section id="NoticiasFunctions">
          <h1>Notícias - Update e Excluir</h1>
          <div class="" id="DivListarNoticias">
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
                  <th scope="col">Ação</th>
                </tr>
              </thead>
              <tbody>
              <!-- Os dados serão inseridos aqui dinamicamente -->
              </tbody>
            </table>
          </div>
            <!-- Formulário de Edição de Notícia -->
          <div id="EditNoticiaForm" style="display: none;">

          <h3>Editar Notícia</h3>

          <input type="hidden" id="editNoticId" />

          <div>

              <label for="editTitulo">Título:</label>

              <input type="text" id="editTitulo" />

          </div>

          <div>

              <label for="editConteudo">Conteúdo:</label>

              <textarea id="editConteudo"></textarea>

          </div>

          <div>

          <label for="editImagemFile">Imagem (upload):</label>

          <input type="file" id="editImagemFile" />
          
          </div>

          <button id="saveEditBtn">Salvar</button>

          <button id="cancelEditBtn">Cancelar</button>

          </div>
          <!-- Formulário de Criação de Notícia -->

<div id="CreateNoticiaForm">

<h3>Criar Nova Notícia</h3>

<div>

    <label for="createTitulo">Título:</label>

    <input type="text" id="createTitulo" required />

</div>

<div>

    <label for="createConteudo">Conteúdo:</label>

    <textarea id="createConteudo" required></textarea>

</div>

<div>

    <label for="createUser Id">ID do Autor:</label>

    <input type="number" id="createUser Id" required />

</div>

<div>

    <label for="createData">Data:</label>

    <input type="date" id="createData" required />

</div>

<div>

    <label for="createImagemFile">Imagem (upload):</label>

    <input type="file" id="createImagemFile" />

</div>

<div>

    <label for="createCategoriaId">ID da Categoria:</label>

    <input type="number" id="createCategoriaId" required />

</div>

<button id="saveCreateBtn">Criar</button>

</div>
        </section>
      <script>
          $(document).ready(function() {
            $('#UsersFunctions').hide();
            $('#NoticiasFunctions').hide();
            $('#usersTable').hide();
            $('#NoticiasTable').hide();
//USERS FUNCTIONS
$('#DivListarUsersBtn').on('click', function () {

$('#UsersFunctions').show();
$('#NoticiasFunctions').hide();
$('#usersTable').show();
$('#NoticiasTable').hide();  // Mostra as funções relacionadas aos usuários

carregarUsuarios();  // Chama a função para carregar os usuários

});


// Função para carregar os usuários

function carregarUsuarios() {

$.ajax({

    url: "../controllers/GetAllUsers.php",  // Caminho para o script PHP que retorna os usuários

    type: "POST",

    dataType: "json",

    success: function (response) {

        if (response.success) {

            mostrarUsuarios(response.usuario);  // Chama mostrarUsuarios com a lista de usuários recebida

        } else {

            console.error(response.message);

            alert('Erro: ' + response.message); // Exibe mensagem de erro

        }

    },

    error: function (jqXHR, textStatus, errorThrown) {

        console.error('Erro ao carregar os usuários:', textStatus, errorThrown);

        alert('Erro ao carregar os usuários.'); // Mensagem de erro genérica

    }

});

}

// Função para preencher a tabela com os dados dos usuários

function mostrarUsuarios(usuarios) {

var table = $('#usersTable').DataTable();

table.clear();  // Limpa a tabela

usuarios.forEach(function(usuario) {

    table.row.add([

        usuario.user_id,  // ID do usuário

        usuario.nome,      // Nome do usuário

        usuario.email,     // Email do usuário

        usuario.fk_nivel_user_id, // ID do nível do usuário

        '<button class="btn btn-danger btn-delete">Excluir</button>' // Botão de exclusão

    ]).draw();

});


// Adiciona o evento de clique para os botões de exclusão

$('.btn-delete').on('click', function() {

    var row = $(this).closest('tr'); // Obtém a linha da tabela onde o botão foi clicado

    var userId = table.row(row).data()[0]; // Obtém o ID do usuário a partir da primeira coluna da linha


    if (confirm('Tem certeza que deseja excluir este usuário?')) {
        excluirUsuario(userId); // Chama a função para excluir o usuário

    }

});

}


function excluirUsuario(userId) {

$.ajax({

    url: "../controllers/DeleteUsuario.php", // Caminho para o script PHP que processa a exclusão

    type: "POST",

    data: { user_id: userId },

    dataType: "json",

    success: function(response) {

        if (response.success) {

            alert(response.message); // Exibe mensagem de sucesso

            carregarUsuarios(); // Recarrega a lista de usuários após a exclusão

        } else {

            alert('Erro: ' + response.message); // Exibe mensagem de erro

        }

    },

    error: function(jqXHR, textStatus, errorThrown) {

        console.error('Erro ao excluir o usuário:', textStatus, errorThrown);

        alert('Erro ao excluir o usuário.'); // Mensagem de erro genérica

    }

});

}
//NOTICIAS FUNCTIONS



$('#DivListarNoticiasBtn').on('click', function () {
    $('#UsersFunctions').hide();
    $('#NoticiasFunctions').show();
    $('#usersTable').hide();
    $('#NoticiasTable').show(); // Mostra as funções relacionadas às notícias

    carregarNoticias();  // Chama a função para carregar as notícias

});


// Função para carregar as notícias

function carregarNoticias() {

    $.ajax({

        url: "../controllers/GetAllNoticias.php",  // Caminho para o script PHP que retorna as notícias

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


// Função para preencher a tabela com os dados das notícias

function mostrarNoticias(noticias) {

    var table = $('#NoticiasTable').DataTable();

    table.clear();  // Limpa a tabela


    noticias.forEach(function (noticia) {

        table.row.add([

            noticia.notic_id,  // ID da notícia

            noticia.titulo,      // Título da notícia

            noticia.conteudo.length > 100 ? noticia.conteudo.substring(0, 100) + '...' : noticia.conteudo,    // Conteúdo da notícia

            noticia.fk_user_id, // ID do autor da notícia

            noticia.data,        // Data de publicação

            noticia.imagem ? '<img src="' + noticia.imagem + '" width="50" height="50">' : 'Sem imagem', // Imagem (se houver)

            noticia.fk_categoria_id, // ID da categoria da notícia

            '<button class="btn btn-danger btn-delete" data-id="' + noticia.notic_id + '">Excluir</button>' + // Botão de exclusão
            '<button class="btn btn-warning btn-edit" data-id="' + noticia.notic_id + '" data-titulo="' + noticia.titulo + '" data-conteudo="' + noticia.conteudo + '" data-imagem="' + noticia.imagem + '">Editar</button>' // Botão de edição

        ]).draw();

    });
    $('.btn-delete').on('click', function() {

var row = $(this).closest('tr'); // Obtém a linha da tabela onde o botão foi clicado

var NoticId = table.row(row).data()[0]; // Obtém o ID do usuário a partir da primeira coluna da linha


if (confirm('Tem certeza que deseja excluir esta Noticia?')) {
    excluirNoticia(NoticId); // Chama a função para excluir o usuário
}

});
// Evento para o botão de edição

$(document).on('click', '.btn-edit', function() {

var noticId = $(this).data('id');

var titulo = $(this).data('titulo');

var conteudo = $(this).data('conteudo');

var imagem = $(this).data('imagem');


// Preenche o formulário com os dados da notícia

$('#editNoticId').val(noticId);

$('#editTitulo').val(titulo);

$('#editConteudo').val(conteudo);

$('#editImagem').val(imagem);


// Exibe o formulário de edição

$('#EditNoticiaForm').show();

});
}
// Evento para o botão de salvar

$('#saveEditBtn').on('click', function() {

var noticId = $('#editNoticId').val();

var titulo = $('#editTitulo').val();

var conteudo = $('#editConteudo').val();

var imagem = $('#editImagem').val();


// Chama a função para atualizar a notícia

atualizarNoticia(noticId, titulo, conteudo, imagem);


});
//-- Evento para o botão de cancelar

$('#cancelEditBtn').on('click', function() {

    $('#EditNoticiaForm').hide(); // Oculta o formulário de edição

});

// Função para atualizar a notícia

function atualizarNoticia(noticId, titulo, conteudo, imagem) {

$.ajax({

    url: "../controllers/AtualizarNoticia.php", // Caminho para o script PHP que processa a atualização

    type: "POST",

    data: {

        notic_id: noticId,

        titulo: titulo,

        conteudo: conteudo,

        imagem: imagem

    },
    dataType: "json",

    success: function(response) {

        if (response.success) {

            alert(response.message); // Exibe mensagem de sucesso

            carregarNoticias(); // Recarrega a lista de notícias após a atualização

            $('#EditNoticiaForm').hide(); // Oculta o formulário de edição após a atualização

            } else {

                alert('Erro: ' + response.message); // Exibe mensagem de erro

            }

        },

        error: function(jqXHR, textStatus, errorThrown) {

            console.error('Erro ao atualizar a notícia:', textStatus, errorThrown);

            alert('Erro ao atualizar a notícia.'); // Mensagem de erro genérica

        }

    });

}

function excluirNoticia(NoticId) {

$.ajax({

url: "../controllers/DeleteNoticia.php", // Caminho para o script PHP que processa a exclusão

type: "POST",

data: { notic_id: NoticId },

dataType: "json",

success: function(response) {

    if (response.success) {

        alert(response.message); // Exibe mensagem de sucesso

        carregarNoticias(); // Recarrega a lista de usuários após a exclusão

    } else {

        alert('Erro: ' + response.message); // Exibe mensagem de erro

    }

},

error: function(jqXHR, textStatus, errorThrown) {

    console.error('Erro ao excluir a notícia:', textStatus, errorThrown);

    alert('Erro ao excluir a notícia.'); // Mensagem de erro genérica

}
})}

// Evento para o botão de criar

$('#saveCreateBtn').on('click', function() {

    var titulo = $('#createTitulo').val();

    var conteudo = $('#createConteudo').val();

    var fk_user_id = $('#createUser Id').val();

    var data = $('#createData').val();

    var imagem = $('#createImagemFile').prop('files')[0]; // Obtém o arquivo da imagem

    var fk_categoria_id = $('#createCategoriaId').val();


    // Chama a função para criar a notícia

    criarNoticia(titulo, conteudo, fk_user_id, data, imagem, fk_categoria_id);

});


// Função para criar a notícia

function criarNoticia(titulo, conteudo, fk_user_id, data, imagem, fk_categoria_id) {

    var formData = new FormData(); // Cria um objeto FormData para enviar os dados

    formData.append('titulo', titulo);

    formData.append('conteudo', conteudo);

    formData.append('fk_user_id', fk_user_id);

    formData.append('data', data);

    if (imagem) {

        formData.append('imagem', imagem); // Adiciona a imagem se houver

    }

    formData.append('fk_categoria_id', fk_categoria_id); // Adiciona o ID da categoria


    $.ajax({

        url: "../controllers/InserirNoticia.php", // Caminho para o script PHP que processa a criação

        type: "POST",

        data: formData,

        processData: false, // Não processa os dados

        contentType: false, // Não define o tipo de conteúdo

        dataType: "json",

        success: function(response) {

            if (response.success) {

                alert(response.message); // Exibe mensagem de sucesso

                // Limpa os campos do formulário

                $('#createTitulo').val('');

                $('#createConteudo').val('');

                $('#createUser Id').val('');

                $('#createData').val('');

                $('#createImagemFile').val('');

                $('#createCategoriaId').val('');

            } else {

                alert('Erro: ' + response.message); // Exibe mensagem de erro

            }

        },

        error: function(jqXHR, textStatus, errorThrown) {

            console.error('Erro ao criar a notícia:', textStatus, errorThrown);

            alert('Erro ao criar a notícia.'); // Mensagem de erro genérica

        }

    });

}
})
        </script>
    </main>
    <!-- Footer -->
    <div class="container">
        <footer class="py-5">
          <div class="row">
            <div class="col-6 col-md-2 mb-3">
              <h5>Páginas</h5>
              <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="app/view/index.html" class="nav-link p-0 text-body-secondary">Home</a></li>
                <li class="nav-item mb-2"><a href="app/view/tecnologia.html" class="nav-link p-0 text-body-secondary">Tecnologia</a></li>
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