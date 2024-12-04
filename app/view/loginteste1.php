<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
            <a class="nav-link" href="tecnologia.html">TECNOLOGIA</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">ESPORTE</a>
          </li>
          <!-- TESTE -->
          <li class="nav-item">
            <a class="nav-link" href="gerenciador.html">GERENCIADOR</a>
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
      
    <div class="separador"></div>

    
    <!--<?php 

$email = "";
$senha = "";

if(isset($_REQUEST['email']) && isset($_REQUEST['senha'])){  
    $email = $_REQUEST['email'];
    $senha = $_REQUEST['senha'];
}

// consultar o banco e dados para saber se o email e senha batem

$respostaJson = array();

if($email == "admin@localhost" && $senha == "123"){

    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['nome']  =  'Cleber Oliveira';
    
    $respostaJson["login"]  = "true";
    $respostaJson["msg"]    = "Autenticação realizada com sucesso!";
    $respostaJson["nome"]   = $_SESSION['nome'];
    $respostaJson["erro"]   = "0";
    

    echo json_encode($respostaJson, JSON_UNESCAPED_UNICODE);
}else{
    
    session_start();
    unset( $_SESSION['email'] );
    unset( $_SESSION['nome'] );
	session_destroy();
    
    $respostaJson["login"]  = "false";
    $respostaJson["msg"]    = "Usuário ou Senha inválidos!";
    $respostaJson["erro"]   = "1";
    echo json_encode($respostaJson, JSON_UNESCAPED_UNICODE);
}
?>-->

    <!-- caduser.php
     <script>
	$(document).ready(function(){
		//$("#frmLogin").hide();
		$("#frmLembrarSenha").hide();
		$("#frmCadUser").hide();

		$("#btnSendLogin").click(function(){
			alert("Enviar Via Ajax para o login.php");
		});
		$("#btnLembrarSenha").click(function(){
			$("#frmLogin").hide();
			$("#frmLembrarSenha").show();
			$("#frmCadUser").hide();
		})
		$("#btnCadUser").click(function(){
			$("#frmLogin").hide();
			$("#frmLembrarSenha").hide();
			$("#frmCadUser").show();	
		})


		$("#btnEnviarLembrar").click(function(){
			alert("Enviar Via Ajax para o lembrarSenha.php");

		})
		$("#btnSendCadastro").click(function(){
			$.ajax({
				type: 'POST',
				url: 'caduser.php', 
				data: $("frmCadUser").serialize(), 
				success: function(response) {
					console.log(response);
					$("#divxyz").html(response);
					alert('Cadastro realizado com sucesso!');
				},
				error: function(response) {
					console.log(response);
					alert('Erro ao enviar o formulário.');
				}
			});
			
			alert("Enviar Via Ajax para o cadUSer.php");
		})
		
		$("#btnCancelar").click(function(){
			$("#frmLogin").show();
			$("#frmLembrarSenha").hide();
			$("#frmCadUser").hide();	
		})
		$("#btnCancelarLembrar").click(function(){
			$("#frmLogin").show();
			$("#frmLembrarSenha").hide();
			$("#frmCadUser").hide();	
		})
	});
</script>

<form id="frmLogin">
	<div class="input-group mb-3">
		<label class="input-group-text" for="email">Email</label>
		<input type="email" class="form-control" id="email" name="email" required>
	</div>

	<div class="input-group mb-3">
		<label class="input-group-text" for="senha">Senha</label>
		<input type="password" class="form-control" id="senha" name="senha" required>
	</div>
	
	<button  id="btnSendLogin" type="button" class="btn btn-primary  w-100">Entre</button>
	<br><br>
	<a id="btnLembrarSenha" type="button" class="btn-link  w-100">Lembrar Senha</a>
	<br><br>
	<button id="btnCadUser" type="button" class="btn btn-primary  w-100">Cadastre-se</button>
	
</form>

<form id="frmLembrarSenha">
	<div class="input-group mb-3">
		<label class="input-group-text" for="email">Email</label>
		<input type="email" class="form-control" id="email" name="email" required>
	</div>

	<button id="btnEnviarLembrar" type="button" class="btn btn-primary w-100">Lembrar Senha</button>
	<button id="btnCancelarLembrar" type="button" class="btn btn-danger w-100">Cancelar</button>
	
</form>


<form id="frmCadUser">

	<div class="input-group mb-3">
		<label class="input-group-text" for="nome">Nome</label>
		<input type="text" class="form-control" id="nome" name="nome" required>
	</div>

	<div class="input-group mb-3">
		<label class="input-group-text" for="cpf">CPF</label>
		<input type="text" class="form-control" id="cpf" name="cpf" required>
	</div>

	<div class="input-group mb-3">
		<label class="input-group-text" for="dtNasc">Data de Nascimento</label>
		<input type="date" class="form-control" id="dtNasc" name="dtNasc" required>
	</div>

	<div class="input-group mb-3">
		<label class="input-group-text" for="sexo">Sexo</label>
		<select id="sexo" name="sexo" class="form-select">
			<option value="M">Masculino</option>
			<option value="F">Feminino</option>
			<option value="O">Outro</option>
			<option value="N">Prefiro não dizer</option>
		</select>
	</div>

	<div class="input-group mb-3">
		<label class="input-group-text" for="email">Email</label>
		<input type="email" class="form-control" id="email" name="email" required>
	</div>

	<div class="input-group mb-3">
		<label class="input-group-text" for="senha">Senha</label>
		<input type="password" class="form-control" id="senha" name="senha" required>
	</div>

	<div class="input-group mb-3">
		<label class="input-group-text" for="confsenha">Senha</label>
		<input type="password" class="form-control" id="confsenha" name="confsenha" required>
	</div>
	
	<button  id="btnSendCadastro" type="button" class="btn btn-primary  w-100">Cadastrar</button>
	<button  id="btnCancelar" type="button" class="btn btn-danger  w-100">Cancelar</button>
</form>
-->

<!-- index caduser.php
	<div id="topo" > Topo 
	
		<svg id="usericon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>
		<div id="menuuser" style="display: none;">
			<hr>
			<a href="" class="btn btn-primary"> Sair		 </a><br>
			<a href="" class="btn btn-primary"> Configurações</a><br>
			<hr>
		</div>

	</div>


	<div id="esquerda" > 
	
		<button id="btnCep"> Abrir via CEP</button>  <br><hr>
		<button id="btnLknCadUser"> Cadastro do Usuário </button>  <br><hr>


	
	
	</div>
	<div id="direita" > direita </div>
-->

<!-- AQUI -->

<body>
<!-- Área de Login -->
<section id="loginArea" class="area vh-100" style="background-color: #000333; display: flex; justify-content: center; align-items: center;">
    <div class="imglogo">
        <img src="../../public/assets/images/logo.png" alt="logo">
    </div>
    <!-- Formulário de Login -->
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    <form id="frmLogin">
                        <div>
                            <div class="mt-1 p-1 text-black rounded">
                                <h3 class="text-center">Login</h3> 
                            </div><br>
                            <!-- Campo de email -->
                            <div class="input-group mb-3">
                            <span class="input-group-text">Email:</span>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                            <!-- Campo de senha -->
                            <div class="input-group mb-3">
                            <span class="input-group-text">Senha:</span>
                            <input type="password" class="form-control" placeholder="Senha" name="senha">
                            </div>
                            <!-- Botão de login -->
                            <button type="button" id="btnLogin" class="btn btn-success" style="background-color: #000333;" > Entrar </button>
                        </div>
                         <!-- Mensagens de erro ou ações adicionais -->
                        <div>
                            <div id="msgLogin" style="color: red; font-weight: bold;"></div><br>
                             <!-- Link para recuperação de senha -->
                            <a id="lnkLembrarSenha" href="#" class="btn btn-success" style="background-color: #000333;"> Lembrar Senha </a><br><br>
                            <!-- Link para cadastro -->
                            <a id="lnkCadUser" href="#" class="btn btn-primary" style="background-color: #000333;"> Cadastre-se </a>	
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                    <script type="text/javascript">
                      $(document).ready(function () {


                        $("#btnLogin").click(function () {
                          alert($('#frmLogin').serialize());

                          $.ajax({
                            url: '../controllers/Login.php',
                            type: 'POST',
                            data: $('#frmLogin').serialize(),
                            success: function (response) {

                              console.log(response.usuario.nome);
                              window.location.href = "../../index.php";
                            },
                            error: function (xhr, status, error) {
                              console.error('Erro na requisição:', xhr.responseText || error);
                              alert('Erro na requisição. Por favor, tente novamente.');
                            }
                          });

                        });
                    // OK



						$("#btnLogin").click(function(){
							console.log("enviar login!");
							console.log( $("#frmLogin").serialize() );

							$.post("../controllers/Login.php", $("#frmLogin").serialize(), function( dados ){
                console.log(dados);
								var objRetorno = JSON.parse(dados);
								$("#msgLogin").html(objRetorno.msg);

								if ( objRetorno.login == "true"){ 
									$("#usermsg").html("Seja bem vindo(a) "+objRetorno.nome);
									$("#loginArea").hide();
									$("#lembrarSenhaArea").hide();
									$("#CadUseArea").hide();
									$("#logoutArea").show();
									
								}else{
									
								}
								
							});
						});
						$("#btnLogout").click(function(){
							$.get("controlLogin.php", function( dados ){});
							$("#loginArea").show();
							$("#lembrarSenhaArea").hide();
							$("#CadUseArea").hide();
							$("#logoutArea").hide();
							$("#frmLogin")[0].reset();
							$("#msgLogin").html("");
						});
					});


          // OK
                </script>	  
		  </form>
	</div>


    <section id="lembrarSenhaArea"  class="area vh-100" style="background-color: #000333; display: flex; justify-content: center; align-items: center;">
        <div class="imglogo">
            <img src="../../public/assets/images/logo.png" alt="logo">
        </div>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mt-1 p-1 text-black rounded">
                                <h3 class="text-center">Lembrar senha</h3> 
                            </div><br>
                                <form id="frmLembrarSenha">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Email:</span>
                                        <input type="email" class="form-control" placeholder="Email" name="email">
                                    </div>
                                    <button id="btnLembrarSenha"  class="btn btn-success" style="background-color: #000333;" > Enviar Nova Senha</button><br>
                                    <div id="msgLogin" style="color: red; font-weight: bold;"></div><br>
                                    <button id="btnCancelarLembrarSenha"  class="btn btn-success" style="background-color: #000333;" > Cancelar </button><br>          
                                </form>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	

    <section id="CadUseArea" class="area vh-100" style="background-color: #000333; display: flex; justify-content: center; align-items: center;">
        <div class="imglogo">
            <img src="../../public/assets/images/logo.png" alt="logo">
        </div>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mt-1 p-1 text-black rounded">
                                <h3 class="text-center">Cadastro de Usuário</h3> 
                            </div><br>
                                <form id="frmCadUser">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Nome:</span>
                                        <input type="text" class="form-control" placeholder="Nome" name="nome" id="nome">
                                    </div>	
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Email:</span>
                                        <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Senha:</span>
                                        <input type="password" class="form-control" placeholder="Senha" name="senha" id="senha">
                                    </div>
                                     <div class="input-group mb-3">
                                        <span class="input-group-text">Confirmar Senha:</span>
                                        <input type="password" class="form-control" placeholder="Senha" name="confSenha" id="confSenha">
                                    </div>
                                    <div class="input-group mb-3">
                                      <span class="input-group-text"> nivel usuario</span>
                                      <input type="hidden" class="form-control" placeholder="Senha" name="tipo_user" id="tipo_user">
                                  </div>
                         
                                
                                  
                                    <button type="button" id="btnCadastrar"  class="btn btn-success" style="background-color: #000333;" > Enviar Cadastro</button><br>
                                    <div id="msgLogin" style="color: red; font-weight: bold;"></div><br>
                                    <button id="btnCancelarCadastro"  class="btn btn-success" style="background-color: #000333;" > Cancelar</button><br>  
                                </form>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
	
	
	<div id="logoutArea" class="area">
		<div id="usermsg"></div>
		<button id="btnLogout" class="btn btn-danger" > Sair </button><br>
	</div>
	<script type="text/javascript">

		$(document).ready(function(){
// Exibe a área de login inicialmente
			$("#loginArea").show();
			$("#lembrarSenhaArea").hide();
			$("#CadUseArea").hide();
			$("#logoutArea").hide();
			

			
			$("#lnkLembrarSenha").click(function(){
				$("#loginArea").hide();
				$("#lembrarSenhaArea").show();
				$("#CadUseArea").hide();
			});
			$("#lnkCadUser").click(function(){
				$("#loginArea").hide();
				$("#lembrarSenhaArea").hide();
				$("#CadUseArea").show();
			});
			$("#btnCancelarCadastro").click(function(){
				$("#loginArea").show();
				$("#lembrarSenhaArea").hide();
				$("#CadUseArea").hide();
			});
			$("#btnCancelarLembrarSenha").click(function(){
				$("#loginArea").show();
				$("#lembrarSenhaArea").hide();
				$("#CadUseArea").hide();
			})

		 $("#btnCadastrar").click( function(){
				alert( $('#frmCadUser').serialize() );
				senha =  $("#senha").val();
				confSenha =  $("#confSenha").val();

				if(senha === confSenha){
				$.ajax({
		            url: '../controllers/InserirUsuario.php', 
		            type: 'POST', 
		            data: $('#frmCadUser').serialize(),
		            success: function (response) {
		               // console.log(response);
		                alert(response.message);  
		            },
		            error: function (xhr, status, error) {
                  console.error('Erro na requisição:', xhr.responseText || error);
                  alert('Erro na requisição. Por favor, tente novamente.');
                }
		        });
		 }
				else{
					alert("As senhas não estão iguais");
				}
				});
		});
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