<?php 
session_start();
if (!isset($_SESSION["logado"])) {
  header("Location:../index.php");
  session_destroy();
}
include '../conecta.php';
include '../funcoes.php';

mysqli_set_charset( $conn, 'utf8');
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
  $pagina_atual = "empresas.php";
//Selecionar todos os logs da tabela
$pesquisaObras = "SELECT nomeEmpresa from empresa e order by e.nomeEmpresa";
   $obras = mysqli_query($conn, $pesquisaObras);

//Contar o total de logs
$totalObras = mysqli_num_rows($obras);

//Seta a quantidade de logs por pagina
$quantidade_pg = 5;

//calcular o número de pagina necessárias para apresentar os logs
$num_pagina = ceil($totalObras/$quantidade_pg);

//Calcular o inicio da visualizacao
$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

//Selecionar os logs a serem apresentado na página
$pesquisa = "";
if(!isset($_POST['termo'])){
  $pesquisaObras = "SELECT idEmpresa,nomeEmpresa,cnpjEmpresa,ativa,telefoneEmpresa,logoEmpresa,nomeUsuario FROM empresa e inner join usuario u on e.usuario = u.idUsuario
  order by e.nomeEmpresa";

}
else{
  $pesquisa = $_POST["termo"];

  $pesquisaObras = "SELECT idEmpresa,nomeEmpresa,cnpjEmpresa,ativa,telefoneEmpresa,logoEmpresa,nomeUsuario FROM empresa e inner join usuario u on e.usuario = u.idUsuario
  order by e.nomeEmpresa";
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
    
<title>Legrano | Área administrativa</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Legrano Orgânicos - Responsive HTML5 Template">
    <meta name="author" content="JSOFT.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="shortcut icon" href="assets/images/logo2.jpg" type="image/x-icon" />
<link rel="shouticon"  >
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
<a href="../" class="logo">
<img src="assets/images/logo2.jpg" height="35" alt="Legrano Orgânicos">
</a>
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
<span class="role">Legrano | Administrativo</span>

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
<a href="home.php"> <li class="list-group-item">Home</li></a>
  <a href="clientes.php"> <li class="list-group-item">Sócios </li></a>
<a href="empresas.php"> <li class="<?php if($pagina_atual="empresas.php"){echo "list-group-item active";}else{echo "list-group-item";} ?>">Empresas </li></a>
  <a href="movimentacoes.php"> <li class="list-group-item">Registros financeiros </li></a>
    <a href="log.php"> <li class="list-group-item">Registros de cadastro</li></a>
    
<a href="mensagens.php"> <li class="list-group-item">Mensagens </li></a>
<a href="promocoes.php"> <li class="list-group-item">Promoções </li></a>




  </ul>
   <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
Filtar compradores por nome

        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
                <form method="POST" action="empresas.php" class="search nav-form">
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



             if($totalObras ==0){
             
              

  $msg_pesquisa = "<div class='alert alert-warning'>Nenhum cliente encontrado no sistema ! </div>";
  }
?>
              <div class="table-responsive">  
              <table class="table table-bordered">
             
              <thead>
      <tr>
        
    <th> Nome da empresa</th>
   
    <th> Responsável </th>
 
    <th> Ações </th>
        
          </tr>
        </tr>
    </thead>
    <tbody>
             <?php 


             while($row = mysqli_fetch_assoc($resultadoObras)){ ?>


      <tr>

<th> <?php echo $row["nomeEmpresa"] ?> </th>

<th> <?php echo $row["nomeUsuario"] ?> </th>
  
  <th>     
           
       <a href="#edicao<?php echo $row["idEmpresa"] ?>" data-toggle="modal"><button type='button' class='btn btn-primary btn-sm'>Editar</button></a>

       <a href="#verDados<?php echo $row["idEmpresa"] ?>" data-toggle="modal"><button type='button' class='btn btn-warning btn-sm'>Ver dados</button></a>


          </th>
          <div id="verDados<?php echo $row["idEmpresa"] ?>" class="modal fade" role="dialog" class="form-group">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ver dados de uma empresa</h4>
      </div>
      <div class="modal-body">

      <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="UP/<?php echo $row['logoEmpresa']; ?>" alt="Imagem de capa da empresa">

</div>

      <div class="form-group row">
    <label for="inputEmail3" class="col-sm-6 col-form-label">Nome da empresa</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="nome02" value="<?php echo $row["nomeEmpresa"] ?>"readonly>
    </div>
  </div>

  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-6 col-form-label">CNPJ da empresa</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="nome02" value="<?php echo $row["cnpjEmpresa"] ?>"readonly>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-6 col-form-label">Telefone da empresa</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="nome02" value="<?php echo $row["telefoneEmpresa"] ?>"readonly>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-6 col-form-label">Situação da empresa</label>
    <div class="col-sm-4">

    <?php 
        $situacao;
        if($row["ativa"]==1){
          $situacao = "Ativa";
        }
        else $situacao = "Intiva";
    ?>
      <input type="text" class="form-control" name="nome02" value="<?php echo $situacao ?>"readonly>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-6 col-form-label">Responsável pela empresa</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="nome02" value="<?php echo $row["nomeUsuario"] ?>"readonly>
    </div>
  </div>

      </div>
      <div class="modal-footer">

        <button type="submit" class=" btn btn-primary" data-dismiss="modal">Voltar</button>
      </div>
    </div>

  </div>
</div>



<form action="editarEmpresa.php?id=<?php echo $row["idEmpresa"]; ?>" method="POST" enctype="multipart/form-data">


<div id="edicao<?php echo $row["idEmpresa"] ?>" class="modal fade" role="dialog" class="form-group">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Entrega de uma obra</h4>
</div>
<div class="modal-body">
<div class="form-group row">
    <label for="inputEmail3" >Nome da empresa</label>
    <div class="col-sm-10">
      <input type="text" name="nomeEmpresa" class="form-control" id="inputEmail3" value="<?php echo $row["nomeEmpresa"]?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" >CNPJ da empresa</label>
    <div class="col-sm-10">
      <input type="text" name="cnpjEmpresa" class="form-control" id="inputEmail3" value="<?php echo $row["cnpjEmpresa"]?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" >Telefone da empresa</label>
    <div class="col-sm-10">
      <input type="text" name="telefoneEmpresa" class="form-control" id="inputEmail3" value="<?php echo $row["telefoneEmpresa"]?>">
    </div>
  </div>
    <div class="form-group row">
      <label for="inputEstado">Responsável pela empresa</label>
      <select id="inputEstado" name="responsavel" class="form-control">

      <?php 
$sql = "SELECT idUsuario,nomeUsuario FROM usuario u INNER JOIN empresa e on e.usuario = u.idUsuario where e.idEmpresa = " .$row["idEmpresa"];
$result = $conn->query($sql);
$administrador = $result->fetch_assoc();
      
      ?>
        <option selected value="<?php echo $administrador["idUsuario"]; ?>"><?php echo $administrador["nomeUsuario"];?></option>
        <?php
        
        $sql2 = "SELECT * from usuario u WHERE not u.idUsuario= " .$administrador["idUsuario"] . " order by u.nomeUsuario" ;
        $result2 = $conn->query($sql2);
        
        while($socio2 = $result2->fetch_assoc()) { 
        
                ?>
            <option value="<?php echo $socio2["idUsuario"]; ?>"><?php echo $socio2["nomeUsuario"];?></option>
                                    <?php
                                }
        
        ?>
      </select>
    </div>

    <div class="form-group row">
    <label for="inputEmail3" >Situação da empresa</label>
   <?php 
if ($row["ativa"]==1){?>
<div class="form-check">
  <input class="form-check-input" type="radio" name="situacao" id="situacao1" value="1" checked>
  <label class="form-check-label" for="situacao1">
Ativa
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="situacao" id="situacao2" value="0">
  <label class="form-check-label" for="situacao2">
Inativa

  </label>
</div>

<?php } else {?>

  <div class="form-check">
  <input class="form-check-input" type="radio" name="situacao" id="situacao1" value="1" >
  <label class="form-check-label" for="situacao1">
    Ativa
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="situacao" id="situacao2" value="0" checked>
  <label class="form-check-label" for="situacao2">
    Inativa
  </label>
</div>
<?php } 
   ?>
  </div>

                                
    <div class="form-group">
    Selecione uma imagem: <input name="arquivo" type="file" />   
    </div>



</div>
<div class="modal-footer">

<button type="submit" class=" btn btn-primary">Confirmar dados</button>
<button type="submit" class=" btn btn-default" data-dismiss="modal">Voltar</button>

</div>
</div>

</div>
</div>




</form>


<form action="cadastroEmpresa.php" method="POST" class="form-group"  enctype="multipart/form-data">
       
       <div id="cadastro" class="modal fade" role="dialog" class="form-group">
         <div class="modal-dialog">

   <!-- Modal content-->
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
       
       <h4 class="modal-title">Cadastro de empresa</h4>
     </div>
     <div class="modal-body">

     <div class="form-group row">
    <label for="inputEmail3" >Nome da empresa</label>
    <div class="col-sm-10">
      <input type="text" name="nomeEmpresa" class="form-control" id="inputEmail3" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" >CNPJ da empresa</label>
    <div class="col-sm-10">
      <input type="text" name="cnpjEmpresa" class="form-control" id="inputEmail3" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" >Telefone da empresa</label>
    <div class="col-sm-10">
      <input type="text" name="telefoneEmpresa" class="form-control" id="inputEmail3">
    </div>
  </div>
    <div class="form-group row">
      <label for="inputEstado">Responsável pela empresa</label>
      <select id="inputEstado" name="responsavel" class="form-control">


        <option>Selecione </option>
        <?php
        
        $sql2 = "SELECT * from usuario u  order by u.nomeUsuario" ;
        $result2 = $conn->query($sql2);
        
        while($socio2 = $result2->fetch_assoc()) { 
        
                ?>
            <option value="<?php echo $socio2["idUsuario"]; ?>"><?php echo $socio2["nomeUsuario"];?></option>
                                    <?php
                                }
        
        ?>
      </select>
    </div>

   

                                
    <div class="form-group">
    Selecione uma logo: <input name="arquivo" type="file" />   
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

  <a href="#cadastro" data-toggle="modal"><button type='button' class='btn btn-success'>Cadastrar empresa</button></a>

       <?php
       
$result_log = "SELECT * from obra";

$obras = mysqli_query($conn, $result_log);

//Contar o total de logs
$totalObras = mysqli_num_rows($obras);
$limitador =1;
if($totalObras > $quantidade_pg){?>
            <nav class="text-center">
               <ul class="pagination">

              <li><a href="empresas.php?pagina=1"> Primeira página </a></li>


                 <?php
                for($i = $pagina - $limitador; $i <= $pagina-1; $i++){
                  if($i>=1){
                    ?>
                        <li><a href="empresas.php?pagina=<?php echo $i; ?>"> <?php echo $i;?></a></li>


                  <?php }
                }
              ?>
                <li class="active">  <span><?php echo $pagina; ?></span></li>

                  <?php
                      for ($i = $pagina+1; $i <= $pagina+$limitador; $i++){
                        if($i<=$num_pagina){?>
                              <li><a href="empresas.php?pagina=<?php echo $i; ?>"> <?php echo $i;?></a></li>

                  <?php }
                      } 
                        
                      

                   ?>
              <li><a href="empresas.php?pagina=<?php echo $num_pagina; ?>"> <span aria-hidden="true"> Ultima página </span></a></li>



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

