<?php
session_start();
if (isset($_SESSION['email'])){
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ptbr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="msapplication-TileColor" content="#da532c" />
  <meta name="msapplication-config" content="img/favicon/browserconfig.xml" />
  <meta name="theme-color" content="#ffffff" />
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css" />
  <title>Feira PERNAMBUCANA</title>
  <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png" />
  <link rel="manifest" href="img/favicon/site.webmanifest" />
  <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5" />
  <link rel="shortcut icon" href="img/favicon/favicon.ico" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<body style="min-width: 372px">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom shadow-sm mb-3 sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="img/pernambuco-alfabeto-f.png" alt="FeiraPERNAMBUCANA" width="35px" style="margin-right: 8px" /><strong>Feira PERNAMBUCANA </strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse">
        <ul class="navbar-nav flex-grow-1">
          <li class="nav-item">
            <a href="index.php" class="nav-link text-white">Principal</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Lista de produtos
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Frutas</a></li>
              <li><a class="dropdown-item" href="#">Verduras/Legumes</a></li>
              <li><a class="dropdown-item" href="#">Folhagens</a></li>
              <li><a class="dropdown-item" href="#">Raízes/Tubérculos</a></li>
            </ul>
          </li>
        </ul>
        <div class="align-self-end">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="cadastro.php" class="nav-link text-white">Cadastrar</a>
            </li>
            <li class="nav-item">
              <a href="login.php" class="nav-link text-white">Entrar</a>
            </li>
            <li class="nav-item">
              <a href="carrinho.php" class="nav-link text-white">
              <svg class="bi" width="24" height="24" fill="currentColor">
                    <use xlink:href="bi.svg#cart3"></use>
                  </svg>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <main class="mb-5 pb-5">
    <div class="container">
      <h1>Informe seus dados, por favor</h1>
      <hr />
      <form>
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <fieldset class="row">
              <legend>Dados Pessoais</legend>
              <div class="mb-3">
                <label for="txtNome" class="form-label">Nome</label>
                <input name="nome" type="text" class="form-control" id="txtNome" />
              </div>
              <div class="col-md-6 col-xl-5 mb-3">
                <label for="txtCPF" CPF class="form-label">CPF</label>
                <span class="form-text">(somente números)</span>
                <input name="cpf" type="text" class="form-control" id="txtCPF" />
              </div>
              <div class="col-md-6 col-xl-4 mb-3">
                <label for="txtDataNascimento" class="form-label">Data de Nascimento</label>
                <input name="datanascimento" type="date" class="form-control" id="txtDataNascimento" />
              </div>
            </fieldset>
            <fieldset>
              <legend>Contatos</legend>
              <div class="mb-3 col-md-8">
                <label for="txtEmail" class="form-label">E-mail</label>
                <input name="email" type="email" class="form-control" id="txtEmail" />
              </div>
              <div class="mb-3 col-md-8">
                <label for="txtTelefone" class="form-label">Telefone</label>
                <input name="telefone" type="tel" class="form-control" id="txtTelefone" placeholder="8140028922" />
                <span class="form-text">(com DDD, somente números) </span>
              </div>
            </fieldset>
          </div>
          <div class="col-sm-12 col-md-6">
            <fieldset class="row">
              <legend>Endereço</legend>
              <div class="mb-3 col-md-6 col-lg-4">
                <label for="textCEP" class="form-label">CEP</label>
                <span class="form-text">(somente números)</span>
                <div class="input-group">
                  <input name="cep" type="text" class="form-control" id="textCEP" required>
                  <span class="input-group-text p-1"><i class="bi bi-hourglass-split" style="font-size: 20px;"></i>
                  </span>
                </div>
              </div>
              <div class="mb-3 col-md-6 col-lg-8 align-self-end">
                <textarea name="endereco" id="endereco" class="form-control text-muted bg-light" style="height: 68px; resize: none;" disabled >Digite o CEP para buscarmos o endereço.</textarea>
              </div>
              <div class="mb-3 col-md-4">
                <label for="txtNumero" class="form-label">Número</label>
                <input name="numero" type="text" class="form-control" id="txtNumero" />
              </div>
              <div class="mb-3 col-md-8">
                <label for="txtComplemento" class="form-label">Complemento</label>
                <input name="complemento" type="text" class="form-control" id="txtComplemento" />
              </div>
              <div class="mb-3">
                <label for="txtReferencia" class="form-label">Referência</label>
                <input name="referencia" type="text" class="form-control" id="txtReferencia" />
              </div>
            </fieldset>
            <fieldset>
              <legend>Senha de Acesso</legend>
              <div class="mb-3">
                <label for="txtSenha" class="form-label">Senha</label>
                <input name="senha" type="text" class="form-control" id="txtSenha" />
              </div>
              <div class="mb-3">
                <label for="txtConfSenha" class="form-label">Confirme a Senha</label>
                <input name="confsenha" type="text" class="form-control" id="txtConfSenha" />
              </div>
            </fieldset>
          </div>
        </div>
        <hr>
        <div class="form-check mb-3">
          <input type="checkbox" class="form-check-input" value="" id="chkPromocoes">
          <label for="chkPromocoes" class="form-chekc-label">Desejo receber informações sobre promoções.</label>
        </div>
        <div class="mb-3">
          <a class="btn btn-outline-danger" href="index.php">Cancelar</a>
          <input type="button" value="Criar meu cadastro" class="btn btn-primary" onclick="window.location.href=''">
        </div>
      </form>
    </div>
  </main>

  <footer class="boder-top fixed-bottom text-muted bg-light">
    <div class="container">
      <div class="row py-3">
        <div class="col-12 col-md-4 text-center text-md-left">
          &copy; 2020 - Feira PERNAMBUCANA
        </div>
        <div class="col-12 col-md-4 text-center text-md-left">
          <a href="contato.php">Contato</a>
        </div>
        <div class="col-12 col-md-4 text-center text-md-left">
          <a href="troca.php">Trocas e Devoluções</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script type="text/javascript">
		$("#textCEP").focusout(function(){
			//Início do Comando AJAX
			$.ajax({
				//O campo URL diz o caminho de onde virá os dados
				//É importante concatenar o valor digitado no CEP
				url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
				//Aqui você deve preencher o tipo de dados que será lido,
				//no caso, estamos lendo JSON.
				dataType: 'json',
				//SUCESS é referente a função que será executada caso
				//ele consiga ler a fonte de dados com sucesso.
				//O parâmetro dentro da função se refere ao nome da variável
				//que você vai dar para ler esse objeto.
				success: function(resposta){
					//Agora basta definir os valores que você deseja preencher
					//automaticamente nos campos acima.
          $("#endereco").val(resposta.logradouro+', '+resposta.bairro+', '+resposta.localidade+' - '+resposta.uf);
					//Vamos incluir para que o Número seja focado automaticamente
					//melhorando a experiência do usuário
					$("#txtNumero").focus();
				}
			});
		});
	</script>
</body>

</html>