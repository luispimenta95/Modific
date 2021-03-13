<?php
session_start();
if (!isset($_SESSION["logado"])) {
  header("Location:../index.php");
  session_destroy();
}
include '../conecta.php';
include '../funcoes.php';

mysqli_set_charset($conn, 'utf8');
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
$pagina_atual = "obras.php";
//Selecionar todos os logs da tabela
$pesquisaObras = "SELECT idObra, tituloObra, dataInicial, dataProvavel, dataEntrega,
 entregue, nomeEmpresa, nomeUsuario, nomeStatus, observacoes FROM obra inner join usuario u
  on obra.usuario = u.idUsuario inner join statusObra s
   on obra.statusObra = s.idStatus inner join empresa e on obra.empresa = e.idEmpresa order by obra.idObra asc";
$obras = mysqli_query($conn, $pesquisaObras);

//Contar o total de logs
$totalObras = mysqli_num_rows($obras);

//Seta a quantidade de logs por pagina
$quantidade_pg = 5;

//calcular o número de pagina necessárias para apresentar os logs
$num_pagina = ceil($totalObras / $quantidade_pg);

//Calcular o inicio da visualizacao
$incio = ($quantidade_pg * $pagina) - $quantidade_pg;

//Selecionar os logs a serem apresentado na página
$pesquisa = "";
if (!isset($_POST['termo'])) {
  $pesquisaObras = "SELECT idObra, tituloObra, dataInicial, dataProvavel, dataEntrega,
 entregue, nomeEmpresa, nomeUsuario, nomeStatus, observacoes FROM obra inner join usuario u
  on obra.usuario = u.idUsuario inner join statusObra s
   on obra.statusObra = s.idStatus inner join empresa e on obra.empresa = e.idEmpresa order by obra.tituloObra limit $incio, $quantidade_pg";
} else {
  $pesquisa = $_POST["termo"];

  $pesquisaObras = "SELECT idObra, tituloObra, dataInicial, dataProvavel, dataEntrega,
  entregue, nomeEmpresa, nomeUsuario, nomeStatus, observacoes FROM obra inner join usuario u
   on obra.usuario = u.idUsuario inner join statusObra s
    on obra.statusObra = s.idStatus inner join empresa e on obra.empresa = e.idEmpresa 
    WHERE obra.tituloObra LIKE '%" . $pesquisa . "%' order by obra.tituloObra,e.nomeEmpresa";
}


$resultadoObras = mysqli_query($conn, $pesquisaObras);
$totalObras = mysqli_num_rows($resultadoObras);


?>
<!doctype html>
<html class="fixed">

<head>

  <!-- Basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Modific | Área administrativa</title>
  <meta name="keywords" content="HTML5 Admin Template" />
  <meta name="description" content="Modific  - Responsive HTML5 Template">
  <meta name="author" content="JSOFT.net">

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="shortcut icon" href="assets/images/logo2.jpg" type="image/x-icon" />
  <link rel="shouticon">
  <!-- Web Fonts  -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
  <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
  <link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

  <!-- Specific Page Vendor CSS -->
  <link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
  <link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
  <link rel="stylesheet" href="assets/vendor/morris/morris.css" />

  <!-- Theme CSS -->
  <link rel="stylesheet" href="assets/stylesheets/theme.css" />

  <!-- Skin CSS -->
  <link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

  <!-- Theme Custom CSS -->
  <link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

  <!-- Head Libs -->
  <script src="assets/vendor/modernizr/modernizr.js"></script>

</head>

<body>
  <section class="body">

    <!-- start: header -->
    <header class="header">
      <div class="logo-container">
        <?php
        if ($_SESSION["logado"]) { ?>
          <a href="home.php" class="logo">
            <img src="assets/images/logo2.jpg" height="35" alt="Modific Orgânicos">
          </a>
        <?php } ?>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
          <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
      </div>

      <div class="header-right">



        <span class="separator"></span>
        <div id="userbox" class="userbox">
          <a href="#" data-toggle="dropdown">
            <figure class="profile-picture">
              <img src="assets/images/user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg">
            </figure>
            <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
              <span class="name"><?php echo $_SESSION["nomeAdministrador"] ?></span>
              <span class="role">Modific | Administrativo</span>

            </div>
            <i class="fa custom-caret"></i>
          </a>
          <div class="dropdown-menu">
            <ul class="list-unstyled">
              <li class="divider"></li>
              <li>
                <a role="menuitem" tabindex="-1" href="../logout_adm.php"><i class="fa fa-power-off"></i> Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      </div>

    </header>
    <!-- end: header -->

    <div class="inner-wrapper">
      <!-- start: sidebar -->


      <aside id="sidebar-left" class="sidebar-left">

        <div class="sidebar-header ">


        </div>

        <div class="nano">
          <!-- Menu Lateral -->

          <ul class="list-group">
            <a href="home.php">
              <li class="list-group-item">Home</li>
            </a>
            <a href="empresas.php">
              <li class="list-group-item">Empresas </li>
            </a>
            <a href="usuarios.php">
              <li class="list-group-item">Usuários </li>
            </a>

            <a href="obras.php">
              <li class="<?php if ($pagina_atual = "obras.php") {
                            echo "list-group-item active";
                          } else {
                            echo "list-group-item";
                          } ?>">Obras </li>
            </a>




          </ul>
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Filtar obras por nome

                  </button>
                </h5>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <form method="POST" action="obras.php" class="search nav-form">
                    <div class="input-group input-search">
                      <input type="text" class="form-control" name="termo" id="q" placeholder="Pesquisa por nome...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                      </span>
                    </div>
                  </form>
                </div>
              </div>
            </div>


          </div>
        </div>
      </aside>
      <!-- end: sidebar -->

      <section role="main" class="content-body">
        <header class="page-header">

        </header>

        <div class="row">
          <div class="col-md-12">

            <?php



            if ($totalObras == 0) {
              $pesquisaObras = "SELECT idObra, tituloObra, dataInicial, dataProvavel, dataEntrega,
              entregue, nomeEmpresa, nomeUsuario, nomeStatus, observacoes FROM obra inner join usuario u
               on obra.usuario = u.idUsuario inner join statusObra s
                on obra.statusObra = s.idStatus inner join empresa e on obra.empresa = e.idEmpresa order by obra.tituloObra limit $incio, $quantidade_pg";
              $_SESSION['msg'] = "<div class='alert alert-danger'>Nenhuma obra encontrada . </div>";

              $resultadoObras = mysqli_query($conn, $pesquisaObras);
              $totalObras = mysqli_num_rows($resultadoObras);
            }
            ?>
            <div class="table-responsive">

              <?php
              if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
              }

              ?>
              <table class="table table-bordered">
                <thead>
                  <tr>

                    <th>Nome da obra </th>
                    <th>Nome da empresa </th>



                    <th> Ações de edição </th>

                    <th> Ações de imagem </th>

                  </tr>
                </thead>
                <tbody>
                  <?php


                  while ($row = mysqli_fetch_assoc($resultadoObras)) { ?>


                    <tr>
                      <th> <?php echo $row["tituloObra"] ?> </th>

                      <th> <?php echo $row["nomeEmpresa"] ?> </th>


                      </th>

                      <th> <a href="#edicao<?php echo $row["idObra"] ?>" data-toggle="modal"><button type='button' class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></a>
                        <a href="#verObra<?php echo $row["idObra"] ?>" data-toggle="modal"><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></button></a>


                        <!-- Adicionando imagens para uma obra -->
                        <?php
                        if ($row["entregue"] == 0) { ?>

                          <a href="#entregarObra<?php echo $row["idObra"] ?>" data-toggle="modal"><button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button></a>
                        <?php } ?>





                      </th>


                      <th> <a href="#verGaleria<?php echo $row["idObra"] ?>" data-toggle="modal"><button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-camera' aria-hidden='true'></span></button></a>
                        <a href="#novaImagem<?php echo $row["idObra"] ?>" data-toggle="modal"><button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></button></a>


                        <!-- Adicionando imagens para uma obra -->





                      </th>
                      <!-- ================================== Ver obra ========================== -->


                      <div id="verGaleria<?php echo $row["idObra"] ?>" class="modal fade" role="dialog" class="form-group">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Ver imagens de uma obra</h4>
                            </div>
                            <div class="modal-body">
                              <?php
                              $pesquisaImagens = "SELECT * from imagemObra i  where i.obra = " . $row["idObra"];
                              $imagens = mysqli_query($conn, $pesquisaImagens);

                              //Contar o total de logs
                              $totalImagens = mysqli_num_rows($imagens);

                              if ($totalImagens == 0) {

                                echo "Não existem imagens cadastradas para essa obra";
                              }



                              ?>


                              <div class="row">

                                <?php
                                $result_logs = "SELECT * from imagemObra i  where i.obra = " . $row["idObra"];
                                $resultado_logs = mysqli_query($conn, $result_logs);
                                $totalImagens = mysqli_num_rows($resultado_logs);
                                $marcadores = 0;
                                while ($lista = mysqli_fetch_assoc($resultado_logs)) { ?>
                                  <form action="updateCapa.php?id=<?php echo $row["idObra"]; ?>" method="POST" enctype="multipart/form-data">

                                    <div class="col-md-4">
                                      <div class="thumbnail">

                                        <img src="UP/<?php echo $lista["imagem"] ?>" alt="Lights" style="width:100%">
                                        <div class="caption">
                                          <?php
                                          if ($lista["capa"] == 0) { ?>

                                            <a href="updateCapa.php?id=<?php echo $lista["idImagem"] ?>&&idObra=<?php echo $row["idObra"]; ?>"" onclick=" return confirm('Deseja realmente definir como capa ?')"> <button type="button" class="btn btn-primary btn-xs">Definir como capa</button></a>
                                            <a href="excluirImagem.php?idImagem=<?php echo $lista["idImagem"] ?> " onclick="return confirm('Deseja realmente excluir o registro ?')"><button type="button" class="btn btn-danger btn-xs">Excluir imagem</button></a>
                                            <?php } else {

                                            if ($totalImagens > 1 && $lista["capa"] == 0) { ?>
                                              <a href="excluirImagem.php?id=<?php echo $lista["idImagem"] ?>"" onclick=" return confirm('Deseja realmente excluir o registro ?')"><button type="button" class="btn btn-danger btn-xs">Excluir imagem</button></a>


                                            <?php } else { ?>
                                              <p> Essa imagem está definida como capa </p>
                                          <?php }
                                          } ?>

                                          <input type="hidden" name="obra" value="<?php echo $row["idObra"] ?>">
                                        </div>
                                        </a>

                                      </div>

                                    </div>
                                  </form>

                                <?php } ?>
                              </div>
                            </div>
                            <div class="modal-footer">

                              <button type="submit" class=" btn btn-primary" data-dismiss="modal">Voltar</button>
                            </div>
                          </div>

                        </div>
                      </div>




                      <form action="imagemObra.php?id=<?php echo $row["idObra"]; ?>" method="POST" enctype="multipart/form-data">


                        <div id="novaImagem<?php echo $row["idObra"] ?>" class="modal fade" role="dialog" class="form-group">

                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                <h4 class="modal-title">Cadastro de imagens para a obra <?php echo $row["tituloObra"] ?></h4>
                              </div>
                              <div class="modal-body">






                                <div class="form-group">

                                  <input type="file" id="exampleInputEmail1" name="arquivo[]" multiple="multiple" required>

                                </div>
                              </div>



                              <div class="modal-footer">
                                <button type="submit" class=" btn btn-primary">Realizar cadastro</button>

                                <button type="submit" class=" btn btn-danger" data-dismiss="modal">Cancelar</button>
                              </div>
                            </div>

                          </div>
                        </div>

                      </form>

                      <!-- ======================== FIM VER OBRAS ================== -->


                      <!-- ================================== Edição obra ========================== -->


                      <form action="editarObra.php?id=<?php echo $row["idObra"]; ?>" method="POST" enctype="multipart/form-data">


                        <div id="edicao<?php echo $row["idObra"] ?>" class="modal fade" role="dialog" class="form-group">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edição de uma obra</h4>
                              </div>
                              <div class="modal-body">
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-2 col-form-label">Titulo da obra</label>
                                  <div class="col-sm-10">
                                    <input type="text" name="titulo" class="form-control" id="inputEmail3" value="<?php echo $row["tituloObra"] ?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputPassword3" class="col-sm-2 col-form-label">Data Inicial</label>
                                  <div class="col-sm-10">
                                    <input type="text" name="dataIni" class="form-control" id="inputEmail3" value="<?php
                                                                                                                    $dataView = explode("-", $row["dataInicial"]);
                                                                                                                    $dataView = $dataView[2] . "/" . $dataView[1] . "/" . $dataView[0];

                                                                                                                    echo $dataView;


                                                                                                                    ?>">

                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputPassword3" class="col-sm-2 col-form-label">Data de previsão de entrega</label>
                                  <div class="col-sm-10">
                                    <input type="text" name="dataProv" class="form-control" id="inputEmail3" value="<?php
                                                                                                                    $dataView = explode("-", $row["dataProvavel"]);
                                                                                                                    $dataView = $dataView[2] . "/" . $dataView[1] . "/" . $dataView[0];

                                                                                                                    echo $dataView;

                                                                                                                    ?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputPassword3" class="col-sm-2 col-form-label">Data da entrega</label>
                                  <div class="col-sm-10">
                                    <input type="text" name="dataEntrega" class="form-control" id="inputEmail3" value="<?php
                                                                                                                        $dataEntrega = $row["dataEntrega"];
                                                                                                                        if ($dataEntrega == null) {
                                                                                                                          echo "Ainda não entregue";
                                                                                                                        } else {
                                                                                                                          $dataView = explode("-", $row["dataEntrega"]);
                                                                                                                          $dataView = $dataView[2] . "/" . $dataView[1] . "/" . $dataView[0];

                                                                                                                          echo $dataView;
                                                                                                                        }


                                                                                                                        ?>">
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="inputEstado">Empresa</label>
                                  <select id="inputEstado" name="empresa" class="form-control">

                                    <?php
                                    $sql = "SELECT idEmpresa,nomeEmpresa FROM empresa e INNER JOIN obra o on o.empresa = e.idEmpresa where o.idObra = " . $row["idObra"];
                                    $result = $conn->query($sql);
                                    $empresa = $result->fetch_assoc();

                                    ?>
                                    <option selected value="<?php echo $empresa["idEmpresa"]; ?>"><?php echo $empresa["nomeEmpresa"]; ?></option>
                                    <?php

                                    $sql2 = "SELECT idEmpresa,nomeEmpresa FROM empresa e  where not e.idEmpresa = " . $empresa["idEmpresa"] . " order by e.nomeEmpresa";


                                    $result2 = $conn->query($sql2);

                                    while ($socio2 = $result2->fetch_assoc()) {

                                    ?>
                                      <option value="<?php echo $socio2["idEmpresa"]; ?>"><?php echo $socio2["nomeEmpresa"]; ?></option>
                                    <?php
                                    }

                                    ?>
                                  </select>
                                </div>

                                <div class="form-group row">
                                  <label for="inputEstado">Engenheiro</label>
                                  <select id="inputEstado" name="engenheiro" class="form-control">

                                    <?php
                                    $sql = "SELECT idUsuario,nomeUsuario FROM usuario u INNER JOIN obra o on o.usuario = u.idUsuario where o.idObra = " . $row["idObra"];
                                    $result = $conn->query($sql);
                                    $administrador = $result->fetch_assoc();

                                    ?>
                                    <option selected value="<?php echo $administrador["idUsuario"]; ?>"><?php echo $administrador["nomeUsuario"]; ?></option>
                                    <?php

                                    $sql2 = "SELECT * from usuario u WHERE u.engenheiro = '1' and not u.idUsuario= " . $administrador["idUsuario"] . " order by u.nomeUsuario";
                                    $result2 = $conn->query($sql2);

                                    while ($socio2 = $result2->fetch_assoc()) {

                                    ?>
                                      <option value="<?php echo $socio2["idUsuario"]; ?>"><?php echo $socio2["nomeUsuario"]; ?></option>
                                    <?php
                                    }

                                    ?>
                                  </select>
                                </div>



                                <div class="form-group row">
                                  <label for="inputEstado">Situação da obra </label>
                                  <select id="inputEstado" name="situacao" class="form-control">

                                    <?php
                                    $sql = "SELECT idStatus,nomeStatus FROM statusObra s INNER JOIN obra o on o.statusObra = s.idStatus where o.idObra = " . $row["idObra"];
                                    $result = $conn->query($sql);
                                    $statusObra = $result->fetch_assoc();

                                    ?>
                                    <option selected value="<?php echo $statusObra["idStatus"]; ?>"><?php echo $statusObra["nomeStatus"]; ?></option>
                                    <?php

                                    $sql2 = "SELECT idStatus,nomeStatus FROM statusObra s  where not s.idStatus = " . $statusObra["idStatus"] . " order by s.nomeStatus";


                                    $result2 = $conn->query($sql2);

                                    while ($socio2 = $result2->fetch_assoc()) {

                                    ?>
                                      <option value="<?php echo $socio2["idStatus"]; ?>"><?php echo $socio2["nomeStatus"]; ?></option>
                                    <?php
                                    }

                                    ?>
                                  </select>
                                </div>

                              </div>
                              <div class="modal-footer">

                                <button type="submit" class=" btn btn-primary">Confirmar dados</button>
                              </div>
                            </div>

                          </div>
                        </div>




                      </form>



                      <!-- ============== Fim edição ============== -->

                      <div id="verObra<?php echo $row["idObra"] ?>" class="modal fade" role="dialog" class="form-group">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Detalhes de uma obra</h4>
                            </div>
                            <div class="modal-body">
                              <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Titulo da obra</label>
                                <div class="col-sm-10">
                                  <input type="text" name="titulo" class="form-control" id="inputEmail3" value="<?php echo $row["tituloObra"] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Data Inicial</label>
                                <div class="col-sm-10">
                                  <input type="text" name="dataIni" class="form-control" id="inputEmail3" value="<?php
                                                                                                                  $dataView = explode("-", $row["dataInicial"]);
                                                                                                                  $dataView = $dataView[2] . "/" . $dataView[1] . "/" . $dataView[0];

                                                                                                                  echo $dataView;


                                                                                                                  ?>" readonly>

                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Data de previsão de entrega</label>
                                <div class="col-sm-10">
                                  <input type="text" name="dataProv" class="form-control" id="inputEmail3" value="<?php
                                                                                                                  $dataView = explode("-", $row["dataProvavel"]);
                                                                                                                  $dataView = $dataView[2] . "/" . $dataView[1] . "/" . $dataView[0];

                                                                                                                  echo $dataView;

                                                                                                                  ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Data da entrega</label>
                                <div class="col-sm-10">
                                  <input type="text" name="dataEntrega" class="form-control" id="inputEmail3" value="<?php
                                                                                                                      $dataEntrega = $row["dataEntrega"];
                                                                                                                      if ($dataEntrega == null) {
                                                                                                                        echo "Ainda não entregue";
                                                                                                                      } else {
                                                                                                                        $dataView = explode("-", $row["dataEntrega"]);
                                                                                                                        $dataView = $dataView[2] . "/" . $dataView[1] . "/" . $dataView[0];

                                                                                                                        echo $dataView;
                                                                                                                      }


                                                                                                                      ?>" readonly>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="inputEstado">Empresa</label>

                                <?php
                                $sql = "SELECT idEmpresa,nomeEmpresa FROM empresa e INNER JOIN obra o on o.empresa = e.idEmpresa where o.idObra = " . $row["idObra"];
                                $result = $conn->query($sql);
                                $empresa = $result->fetch_assoc();

                                ?>
                                <input type="text" name="empresa" class="form-control" id="inputEmail3" value="<?php echo $empresa["nomeEmpresa"] ?>" readonly>

                              </div>

                              <div class="form-group row">
                                <label for="inputEstado">Engenheiro</label>

                                <?php
                                $sql = "SELECT idUsuario,nomeUsuario FROM usuario u INNER JOIN obra o on o.usuario = u.idUsuario where o.idObra = " . $row["idObra"];
                                $result = $conn->query($sql);
                                $engenheiro = $result->fetch_assoc();

                                ?>
                                <input type="text" name="engenheiro" class="form-control" id="inputEmail3" value="<?php echo $engenheiro["nomeUsuario"] ?>" readonly>

                              </div>



                              <div class="form-group row">
                                <label for="inputEstado">Situação da obra </label>


                                <?php
                                $sql = "SELECT idStatus,nomeStatus FROM statusObra s INNER JOIN obra o on o.statusObra = s.idStatus where o.idObra = " . $row["idObra"];
                                $result = $conn->query($sql);
                                $statusObra = $result->fetch_assoc();

                                ?>
                                <input type="text" name="statusObra" class="form-control" id="inputEmail3" value="<?php echo $statusObra["nomeStatus"] ?>" readonly>

                              </div>

                            </div>
                          </div>

                        </div>
                      </div>


                      <!-- ============== Começo  entrega de obras ============== -->


                      <form action="nova.php?id=<?php echo $row["idObra"]; ?>" method="POST" enctype="multipart/form-data">


                        <div id="entregarObra<?php echo $row["idObra"] ?>" class="modal fade" role="dialog" class="form-group">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Entrega de uma obra</h4>
                              </div>
                              <div class="modal-body">
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-6 col-form-label">Nome da obra</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" name="nome02" value="<?php echo $row["tituloObra"] ?>" readonly>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-6 col-form-label">Data da entrega</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" name="dataEntrega">
                                  </div>
                                </div>

                              </div>
                              <div class="modal-footer">

                                <button type="submit" class=" btn btn-primary">Confirmar dados</button>
                              </div>
                            </div>

                          </div>
                        </div>




                      </form>


                      <!-- ============== Fim  entrega de obras ============== -->


                      <!-- ============== Começo  cadastro de obras ============== -->




                      <form action="cadastroObra.php" method="POST" class="form-group" enctype="multipart/form-data">

                        <div id="cadastro" class="modal fade" role="dialog" class="form-group">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                <h4 class="modal-title">Cadastro de obra</h4>
                              </div>
                              <div class="modal-body">

                                <div class="form-group">
                                  <label for="exampleInputEmail1">Titulo da obra</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" name="tituloObra">

                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Data inicial</label>
                                  <input type="text" class="form-control" name="dataIni">
                                  <small id="emailHelp" class="form-text text-muted">Por Favor , insira conforme o padrão : 01/01/2020.</small>

                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Data de previsão para entrega</label>
                                  <input type="text" class="form-control" name="dataProv">
                                  <small id="emailHelp" class="form-text text-muted">Por Favor , insira conforme o padrão : 01/01/2020.</small>

                                </div>


                                <div class="form-group row">
                                  <label for="inputEstado">Empresa esponsável pela obra</label>
                                  <select id="inputEstado" name="empresa" class="form-control">


                                    <option>Selecione </option>
                                    <?php

                                    $sql2 = "SELECT * from empresa u  order by u.nomeEmpresa";
                                    $result2 = $conn->query($sql2);

                                    while ($socio2 = $result2->fetch_assoc()) {

                                    ?>
                                      <option value="<?php echo $socio2["idEmpresa"]; ?>"><?php echo $socio2["nomeEmpresa"]; ?></option>
                                    <?php
                                    }

                                    ?>
                                  </select>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEstado">Engenheiro esponsável pela obra</label>
                                  <select id="inputEstado" name="responsavel" class="form-control">


                                    <option>Selecione </option>
                                    <?php

                                    $sql2 = "SELECT * from usuario u  order by u.nomeUsuario";
                                    $result2 = $conn->query($sql2);

                                    while ($socio2 = $result2->fetch_assoc()) {

                                    ?>
                                      <option value="<?php echo $socio2["idUsuario"]; ?>"><?php echo $socio2["nomeUsuario"]; ?></option>
                                    <?php
                                    }

                                    ?>
                                  </select>
                                </div>





                              </div>



                              <div class="modal-footer">
                                <button type="submit" class=" btn btn-primary">Realizar cadastro</button>

                                <button type="submit" class=" btn btn-danger" data-dismiss="modal">Cancelar</button>
                              </div>
                            </div>

                          </div>
                        </div>

                      </form>



                    <?php } ?>
                    </tr>

                </tbody>
              </table>

              <a href="#cadastro" data-toggle="modal"><button type='button' class='btn btn-success'>Cadastrar obra</button></a>

              <?php

              $result_log = "SELECT * from obra";

              $obras = mysqli_query($conn, $result_log);

              //Contar o total de logs
              $totalObras = mysqli_num_rows($obras);
              $limitador = 1;
              if ($totalObras > $quantidade_pg) { ?>
                <nav class="text-center">
                  <ul class="pagination">

                    <li><a href="obras.php?pagina=1"> Primeira página </a></li>


                    <?php
                    for ($i = $pagina - $limitador; $i <= $pagina - 1; $i++) {
                      if ($i >= 1) {
                    ?>
                        <li><a href="obras.php?pagina=<?php echo $i; ?>"> <?php echo $i; ?></a></li>


                    <?php }
                    }
                    ?>
                    <li class="active"> <span><?php echo $pagina; ?></span></li>

                    <?php
                    for ($i = $pagina + 1; $i <= $pagina + $limitador; $i++) {
                      if ($i <= $num_pagina) { ?>
                        <li><a href="obras.php?pagina=<?php echo $i; ?>"> <?php echo $i; ?></a></li>

                    <?php }
                    }



                    ?>
                    <li><a href="obras.php?pagina=<?php echo $num_pagina; ?>"> <span aria-hidden="true"> Ultima página </span></a></li>



                  <?php } ?>
                  </ul>
                </nav>

            </div>



          </div>


          <!-- start: page -->




        </div>

    </div>


  </section>
  </div>
  </div>
  <!-- end: page -->
  </section>
  </div>


  </section>

  <!-- Vendor -->
  <script src="assets/vendor/jquery/jquery.js"></script>
  <script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
  <script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
  <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
  <script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

  <!-- Specific Page Vendor -->
  <script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
  <script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
  <script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
  <script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
  <script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
  <script src="assets/vendor/flot/jquery.flot.js"></script>
  <script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
  <script src="assets/vendor/flot/jquery.flot.pie.js"></script>
  <script src="assets/vendor/flot/jquery.flot.categories.js"></script>
  <script src="assets/vendor/flot/jquery.flot.resize.js"></script>
  <script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
  <script src="assets/vendor/raphael/raphael.js"></script>
  <script src="assets/vendor/morris/morris.js"></script>
  <script src="assets/vendor/gauge/gauge.js"></script>
  <script src="assets/vendor/snap-svg/snap.svg.js"></script>
  <script src="assets/vendor/liquid-meter/liquid.meter.js"></script>
  <script src="assets/vendor/jqvmap/jquery.vmap.js"></script>
  <script src="assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
  <script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
  <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
  <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
  <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
  <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
  <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
  <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>

  <!-- Theme Base, Components and Settings -->
  <script src="assets/javascripts/theme.js"></script>

  <!-- Theme Custom -->
  <script src="assets/javascripts/theme.custom.js"></script>

  <!-- Theme Initialization Files -->
  <script src="assets/javascripts/theme.init.js"></script>


  <!-- Examples -->
  <script src="assets/javascripts/dashboard/examples.dashboard.js"></script>
</body>

</html>