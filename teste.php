<?php 
include 'conecta.php';
include 'funcoes.php';

mysqli_set_charset( $conn, 'utf8');
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
  $pagina_atual = "teste.php";
//Selecionar todos os logs da tabela
$result_log = "SELECT * from empresa";
$resultado_log = mysqli_query($conn, $result_log);

//Contar o total de logs
$total_logs = mysqli_num_rows($resultado_log);

//Seta a quantidade de logs por pagina
$quantidade_pg = 5;

//calcular o número de pagina necessárias para apresentar os logs
$num_pagina = ceil($total_logs/$quantidade_pg);

//Calcular o inicio da visualizacao
$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

//Selecionar os logs a serem apresentado na página
if(!isset($_POST['termo'])){
$result_logs = "SELECT idEmpresa,nomeEmpresa,cnpjEmpresa,ativa,telefoneEmpresa,logoEmpresa,nomeUsuario FROM empresa e inner join usuario u on e.usuario = u.idUsuario order by e.nomeEmpresa";
}

else{
  $pesquisa = $_POST["termo"];

  $result_logs = "SELECT idEmpresa,nomeEmpresa,cnpjEmpresa,ativa,telefoneEmpresa,logoEmpresa,nomeUsuario FROM empresa e inner join usuario u on e.usuario = u.idUsuario WHERE e.nomeEmpresa LIKE '%".$pesquisa."%'  
  order by e.nomeEmpresa";
}


$resultado_logs = mysqli_query($conn, $result_logs);
$total_logs = mysqli_num_rows($resultado_logs);
?>
<!doctype html>
<html lang="pt-BR">

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


  <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
Filtar clientes por nome

        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
                <form method="POST" action="teste.php" class="search nav-form">
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



             if($total_logs ==0){
              $result_logs = "SELECT idEmpresa,nomeEmpresa,cnpjEmpresa,ativa,telefoneEmpresa,logoEmpresa,nomeUsuario FROM empresa e inner join usuario u on e.usuario = u.idUsuario  
  order by e.nomeEmpresa";
}

$resultado_logs = mysqli_query($conn, $result_logs);
$total_logs = mysqli_num_rows($resultado_logs);

  $msg_pesquisa = "<div class='alert alert-warning'>Nenhum cliente encontrado no sistema ! </div>";
  
?>
              <div class="table-responsive">          
  <table class="table table-bordered">
    <thead>
      <tr>
        
   <th>Cliente </th>
  


        </tr>
    </thead>
    <tbody>
             <?php 


             while($row = mysqli_fetch_assoc($resultado_logs)){ ?>


      <tr>

  <th> <?php echo $row["nomeEmpresa"] ?> </th>

              <!-- ================================== lista de dependentes ========================== -->




        <?php } ?>
        </tr>
          
    </tbody>
  </table>
  <?php
          if(isset($msg_pesquisa)){
            echo $msg_pesquisa;
            unset($msg_pesquisa);
          }
        ?>
<?php
$result_log = "SELECT * from empresa";

$resultado_log = mysqli_query($conn, $result_log);

//Contar o total de logs
$total_logs = mysqli_num_rows($resultado_log);
$limitador =1;
if($total_logs > $quantidade_pg){?>
            <nav class="text-center">
               <ul class="pagination">

              <li><a href="teste.php?pagina=1"> Primeira página </a></li>


                 <?php
                for($i = $pagina - $limitador; $i <= $pagina-1; $i++){
                  if($i>=1){
                    ?>
                        <li><a href="teste.php?pagina=<?php echo $i; ?>"> <?php echo $i;?></a></li>


                  <?php }
                }
              ?>
                <li class="active">  <span><?php echo $pagina; ?></span></li>

                  <?php
                      for ($i = $pagina+1; $i <= $pagina+$limitador; $i++){
                        if($i<=$num_pagina){?>
                              <li><a href="teste.php?pagina=<?php echo $i; ?>"> <?php echo $i;?></a></li>

                  <?php }
                      } 
                        
                      

                   ?>
              <li><a href="teste.php?pagina=<?php echo $num_pagina; ?>"> <span aria-hidden="true"> Ultima página </span></a></li>



<?php } ?>
</ul>
</nav>
                  <a href="#cadastro" data-toggle="modal"><button type='button' class='btn btn-success'>Cadastrar sócio</button></a>


    <a href = "relatorio_teste.php"><button type="button" class="btn btn-dark">Gerar relatório </button>
  

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