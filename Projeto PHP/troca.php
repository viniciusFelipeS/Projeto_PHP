<?php
session_start();
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
  <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">
  <title>Feira PERNAMBUCANA</title>
  <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href=img/favicon/favicon-16x16.png" />
  <link rel="manifest" href="img/favicon/site.webmanifest" />
  <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5" />
  <link rel="shortcut icon" href="img/favicon/favicon.ico" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <style>
    html {
      overflow-y: scroll;
    }

    :root {
      overflow-y: auto;
      overflow-x: hidden;
    }

    :root body {
      position: absolute;
    }

    body {
      width: 100vw;
    }
  </style>
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
              <li><a href="index.php?categoria=verduras/legumes" class="dropdown-item" href="#">Verduras/Legumes</a></li>
              <li><a href="index.php?categoria=frutas" class="dropdown-item" href="#">Frutas</a></li>
              <li><a href="index.php?categoria=folhagens" class="dropdown-item" href="#">Folhagens</a></li>
              <li><a href="index.php?categoria=raizes/tuberculos" class="dropdown-item" href="#">Raízes/Tubérculos</a></li>
            </ul>
          </li>
        </ul>
        <div class="align-self-end">
          <ul class="navbar-nav">
            <?php if (isset($_SESSION['nome'])) { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo  strtok($_SESSION['nome'], " ") ?></a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item" href="meusdados.php">Meus Dados</a></li>
                  <li><a class="dropdown-item" href="meuspedidos.php">Meus Pedidos</a></li>
                  <li><a class="dropdown-item text-dark bg-danger" href="config/logout.php">Sair</a></li>
                </ul>
              </li><?php } else { ?>
              <li class="nav-item">
                <a href="cadastrar.php" class="nav-link text-white">Cadastrar</a>
              </li>
              <li class="nav-item">
                <a href="entrar.php" class="nav-link text-white">Entrar</a>
              </li><?php } ?>
            <a href="carrinho.php" class="nav-link text-white">
              <svg class="bi" width="24" height="24" fill="currentColor">
                <use xlink:href="bi.svg#cart3" />
              </svg>
            </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <main class="pb-5 mb-5">
    <div class="container">
      <h1>POLÍTICA DE TROCA, DEVOLUÇÃO E ARREPENDIMENTO</h1>
      <hr>
      <p>
        A Feira PERNAMBUCANA utiliza tecnologia de ponta para a fabricação de
        seus produtos, primando pela qualidade e satisfação de seus clientes.
        Pelo respeito e para que seja mantida a credibilidade conquistada
        junto aos seus consumidores, a empresa criou uma política de troca e
        devolução de acordo com o Código de Defesa do Consumidor, e preocupada
        para que você (cliente) obtenha uma negociação eficaz, ágil e
        principalmente satisfatória.
      </p>

      <p>
        Caso opte pelo contato via correio eletrônico ou telefônico, será
        encaminhado a você o formulário para preenchimento e envio junto à(s)
        peça(s). O produto devolvido sem esse formulário e/ou sem a
        comunicação ao SAC será reenviado sem consulta prévia.
      </p>
      <p>
        Ao efetuar o processo de devolução/troca o cliente deverá no verso da
        nota fiscal a ser devolvida/trocada, informar o motivo da
        devolução/troca, o nome de quem está devolvendo, CPF e a data da
        devolução.
      </p>

      <p>
        *ATENÇÃO: Para efetuar o processo de troca é necessário estar logado.
        Devolução por Arrependimento/Desistência Se ao receber o produto, você
        resolver devolvê-lo por arrependimento, deverá fazê-lo em até sete
        dias corridos, a contar da data de recebimento.
      </p>

      <p>
        Observando as seguintes condições: O produto não poderá ter indícios
        de uso.
      </p>

      <p>
        O produto deverá ser encaminhado preferencialmente na embalagem
        original, acompanhado de nota fiscal, etiquetas, tags (etiqueta com
        código de referência do produto) devidamente fixada no produto e todos
        os seus acessórios.
      </p>

      <p>
        Ao efetuar o processo de devolução o cliente deverá no verso da nota
        fiscal a ser devolvida, informar o motivo da recusa/devolução, o nome
        de quem está devolvendo, CPF e a data da devolução.
      </p>
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
</body>

</html>