<?php
session_start();
include_once('config/conexao.php');
include_once('config/paginacao.php');
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
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png" />
  <link rel="manifest" href="img/favicon/site.webmanifest" />
  <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5" />
  <link rel="shortcut icon" href="img/favicon/favicon.ico" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="node_modules/bootstrap/js/src/bootstrap-input-spinner.js"></script>

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

    p.max-3l {
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
    }
  </style>
</head>

<body style="min-width: 372px ">
  <nav class="navbar navbar-expand navbar-dark bg-dark border-bottom shadow-sm mb-3 sticky-top">
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
          <form action="" method="get" class="d-flex ms-lg-5 col-5">
            <input name="buscar" class="form-control me-2" type="search" placeholder="Buscar produto" aria-label="Search" />
            <button type="submit" class="btn btn-outline-primary "><i class="bi-search"></i>
            </button>
          </form>
        </ul>
        <div class="align-self-end">
          <ul class="navbar-nav">
            <?php if (isset($_SESSION['nome'])) { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo  strtok($_SESSION['nome'], " ") ?></a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item" href="meusdados.php">Meus Dados</a></li>
                  <li><a class="dropdown-item" href="meuspedidos.php">Meus Pedidos</a></li>
                  <?php if ($_SESSION['permissao'] == 1) { ?>
                    <li><a class="dropdown-item" href="admin.php">Admin</a></li>
                  <?php } ?>
                  <li><a class="dropdown-item text-dark bg-danger" href="config/logout.php">Sair</a></li>
                </ul>
              </li><?php } else { ?>
              <li class="nav-item">
                <a href="cadastrar.php" class="nav-link text-white">Cadastrar</a>
              </li>
              <li class="nav-item">
                <a href="entrar.php" class="nav-link text-white">Entrar</a>
              </li><?php } ?>
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

  <header class="container">
  <?php if (isset($_SESSION['compra_efetuada'])) { ?>
        <div id=sucesso class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Pedido efetuado!</strong> Acesse a página <b>Meus Pedidos</b> para saber o andamento.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php } unset($_SESSION['compra_efetuada'])?>
    <div class="col-10 offset-1">
      <div id="carouselMain" class="carousel carousel-light slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
          <li data-bs-target="#carouselMain" data-bs-slide-to="0" class="active"></li>
          <li data-bs-target="#carouselMain" data-bs-slide-to="1"></li>
          <li data-bs-target="#carouselMain" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/banner01.jpg" alt="banner1" class="img-fluid w-100" />
          </div>
          <div class="carousel-item">
            <img src="img/banner02.jpg" alt="banner2" class="img-fluid w-100" />
          </div>
          <div class="carousel-item">
            <img src="img/banner03.jpg" alt="banner3" class="img-fluid w-100" />
          </div>
        </div>
        <a href="#carouselMain" role="button" data-bs-slide="prev" class="carousel-control-prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Próximo</span>
        </a>
        <a href="#carouselMain" role="button" data-bs-slide="next" class="carousel-control-next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </a>
      </div>
      <hr class="mt-3" />
    </div>
  </header>

  <main class="mb-5 pb-3">
    <div class="container">
      <?php if (isset($_GET['buscar'])) echo "<legend> Resultados para '$_GET[buscar]': </legend>" ?>
      <div class="row">
        <div class="col-12">
          <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
            <nav class="d-inline-block">
              <ul class="pagination pagination-sm my-0">
                <li class="page-item">
                  <a class="page-link" href="index.php?<?php if (isset($_GET['buscar'])) {
                                                          echo "buscar=";
                                                          echo $_GET['buscar'];
                                                          echo "&";
                                                        } else {
                                                          if (isset($_GET['categoria'])) {
                                                            echo "categoria=";
                                                            echo $_GET['categoria'];
                                                            echo "&";
                                                          }
                                                        } ?>pagina=0" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <?php for ($pagina = 0; $pagina < $num_paginas; $pagina++) { ?>
                  <?php if ($pagina == intval($_GET['pagina'])) { ?>
                    <li class="page-item active" aria-current="page">
                      <span class="page-link"><?php echo $pagina + 1 ?></span>
                    </li>
                  <?php } else { ?>
                    <li class="page-item">
                      <a href="index.php?<?php if (isset($_GET['buscar'])) {
                                            echo "buscar=";
                                            echo $_GET['buscar'];
                                            echo "&";
                                          } else {
                                            if (isset($_GET['categoria'])) {
                                              echo "categoria=";
                                              echo $_GET['categoria'];
                                              echo "&";
                                            }
                                          } ?>pagina=<?php echo $pagina; ?>" class="page-link"><?php echo $pagina + 1 ?></a>
                    </li>
                <?php }
                } ?>
                <li class="page-item">
                  <a class="page-link" href="index.php?<?php if (isset($_GET['buscar'])) {
                                                          echo "buscar=";
                                                          echo $_GET['buscar'];
                                                          echo "&";
                                                        } else {
                                                          if (isset($_GET['categoria'])) {
                                                            echo "categoria=";
                                                            echo $_GET['categoria'];
                                                            echo "&";
                                                          }
                                                        } ?>pagina=<?php echo $num_paginas - 1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <div class="row g-3 mt-3 mb-3">
        <?php while ($dados = $result->fetch_assoc()) { ?>
          <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
            <div class="card text-center bg-light">
              <img src="img/produtos/<?php echo $dados['foto'] ?>" class="card-img-top" />
              <div class="card-header">R$ <?php echo $dados['preco'] ?></div>
              <div class="card-body">
                <h6 class="card-title"><b><?php echo $dados['nome'] ?></b></h6>
                <p class="max-3l card-text description">
                  <small><?php echo $dados['detalhe'] ?></small>
                </p>
              </div>
              <div class="card-footer">
                <form action="carrinho.php?acao=add&id=<?php echo $dados['produto_id'] ?>" method="post">
                  <div class="input-group customSpinner">
                    <button type="button" class="btn btn-outline-primary btn-sm spinnerbutton spinnerMinus spinner-roundbutton">
                      <svg class="bi" width="16" height="16" fill="currentColor">
                        <use xlink:href="bi.svg#caret-down"></use>
                      </svg>
                    </button>
                    <input name="qnt" type="text" readonly value="1" class="text-center w-50 form-control spinnerVal spinner-roundVal" >
                    <button type="button" class="btn btn-outline-primary btn-sm spinnerbutton spinnerPlus spinner-roundbutton">
                      <svg class="bi" width="16" height="16" fill="currentColor">
                        <use xlink:href="bi.svg#caret-up"></use>
                      </svg>
                    </button>
                  </div>
                    <button type="submit" class="btn text-white bg-primary btn-md w-100">
                      <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="bi.svg#cart4"></use>
                      </svg>
                    </button>
                </form>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="row pb-4">
        <div class="col-12">
          <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
            <nav class="d-inline-block">
              <ul class="pagination pagination-sm my-0">
                <li class="page-item">
                  <a class="page-link" href="index.php?<?php if (isset($_GET['buscar'])) {
                                                          echo "buscar=";
                                                          echo $_GET['buscar'];
                                                          echo "&";
                                                        } else {
                                                          if (isset($_GET['categoria'])) {
                                                            echo "categoria=";
                                                            echo $_GET['categoria'];
                                                            echo "&";
                                                          }
                                                        } ?>pagina=0" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <?php for ($pagina = 0; $pagina < $num_paginas; $pagina++) { ?>
                  <?php if ($pagina == intval($_GET['pagina'])) { ?>
                    <li class="page-item active" aria-current="page">
                      <span class="page-link"><?php echo $pagina + 1 ?></span>
                    </li>
                  <?php } else { ?>
                    <li class="page-item">
                      <a href="index.php?<?php if (isset($_GET['buscar'])) {
                                            echo "buscar=";
                                            echo $_GET['buscar'];
                                            echo "&";
                                          } else {
                                            if (isset($_GET['categoria'])) {
                                              echo "categoria=";
                                              echo $_GET['categoria'];
                                              echo "&";
                                            }
                                          } ?>pagina=<?php echo $pagina; ?>" class="page-link"><?php echo $pagina + 1 ?></a>
                    </li>
                <?php }
                } ?>
                <li class="page-item">
                  <a class="page-link" href="index.php?<?php if (isset($_GET['buscar'])) {
                                                          echo "buscar=";
                                                          echo $_GET['buscar'];
                                                          echo "&";
                                                        } else {
                                                          if (isset($_GET['categoria'])) {
                                                            echo "categoria=";
                                                            echo $_GET['categoria'];
                                                            echo "&";
                                                          }
                                                        } ?>pagina=<?php echo $num_paginas - 1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
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