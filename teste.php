<?php 
include 'conecta.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Fancy</title>

        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/elegant-icon/style.css" rel="stylesheet">
        <link href="vendors/themify-icon/themify-icons.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        <link href="vendors/animate-css/animate.css" rel="stylesheet">

        <!-- Extra plugin css -->
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <!--================Search Area =================-->
        <section class="search_area">
            <div class="search_inner">
                <input type="text" placeholder="Enter Your Search...">
                <i class="ti-close"></i>
            </div>
        </section>
        <!--================End Search Area =================-->

        <!--================Header Menu Area =================-->
       

        <section class="latest_news_area p_100">
            <div class="container">
                <div class="b_center_title">
                    <h2>Nossas Obras</h2>
                    <p>Conheça atrvés da nossa galeria um pouco mais do nosso trabalho</p>
                </div>
              
                    <div class="row">
                    
                    <?php 
$result_logs = "SELECT * FROM obra";
$resultado_logs = mysqli_query($conn, $result_logs);
$total_logs = mysqli_num_rows($resultado_logs);
$marcadores =0;
while($titulos = mysqli_fetch_assoc($resultado_logs)){ ?>
                    <div class="col-lg-4 col-md-4">


                        <br><br>
                        <?php 
          $pesquisaCapa = "SELECT * from imagemObra i  where i.obra = " .$titulos["idObra"] . " and i.capa = 1";
          $imgCapa = mysqli_query($conn, $pesquisaCapa);
          $capa = mysqli_fetch_assoc($imgCapa);
          
          
          ?>


<div class="thumbnail">
      
<img  src="admin/UP/<?php echo $capa["imagem"] ?>"  alt="Lights" style="width:100%">
        </div>

        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $titulos['idObra']; ?>">Visualizar</a>


                        </div>


                        <!-- Modal -->
                        
                        <!-- Fim modal -->


                        
<?php } ?>

<div id="#verGaleria?id=<?php echo $titulos["idObra"] ?>" class="modal fade" role="dialog" class="form-group">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ver imagens de uma obra</h4>
      </div>
      <div class="modal-body">
      kkkkkkkkkkkkkkkkkkkkkkkkkkkkk
  
            </div>
      </div>
      <div class="modal-footer">

        <button type="submit" class=" btn btn-primary" data-dismiss="modal">Voltar</button>
      </div>
    </div>

  </div>
            </div>

     
</div>
        </section>


        
    
     
        <!--================End Footer Area =================-->




        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <!-- Extra plugin css -->
        <script src="vendors/counterup/jquery.waypoints.min.js"></script>
        <script src="vendors/counterup/jquery.counterup.min.js"></script>
        <script src="vendors/counterup/apear.js"></script>
        <script src="vendors/counterup/countto.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/parallaxer/jquery.parallax-1.1.3.js"></script>
        <!--Tweets-->
        <script src="vendors/tweet/tweetie.min.js"></script>
        <script src="vendors/tweet/script.js"></script>

        <script src="js/theme.js"></script>
    </body>
</html>
