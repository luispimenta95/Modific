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
    <header class="main_menu_area">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Pages</a></li>
                    <li class="nav-item"><a href="static.html">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact-us.html">Contact</a></li>
                </ul>
                <ul class="navbar-nav justify-content-end">
                    <li><a href="#"><i class="icon_search"></i></a></li>
                    <li><a href="#"><i class="icon_bag_alt"></i></a></li>
                </ul>
            </div>
        </nav>
    </header>
    <!--================End Header Menu Area =================-->

    <!--================Slider Area =================-->
    <section class="main_slider_area">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                $sql_carousel = "SELECT * from imagemObra i order by i.idImagem desc limit 4 ";
                $resultado_carousels = $conn->query($sql_carousel);
                $qnt_slide = mysqli_num_rows($resultado_carousels);
                $cont_marc = 0;
                while ($cont_marc < $qnt_slide) {
                    echo "<li id='valor-car' data-target='#myCarousel' data-slide-to='$cont_marc'></li>";
                    $cont_marc++;
                }
                ?>
            </ol>
            <div class="carousel-inner">

                <?php
                $cont_slide = 0;
                while ($row_slide = mysqli_fetch_assoc($resultado_carousels)) {
                    $active = "";
                    if ($cont_slide == 0) {
                        $active = "active";
                    }
                    echo "<div class='carousel-item $active'>";
                    echo "<img class='d-block w-100' src='admin/UP/" . $row_slide['imagem'] . "'>";
                    echo "</div>";
                    $cont_slide++;
                }
                ?>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>



    </section>
    <!--================End Slider Area =================-->

    <!--================Creative Feature Area =================-->

    <!--================End Creative Feature Area =================-->

    <!--================Industries Area =================-->

    <!--================End Industries Area =================-->

    <!--================Our Service Area =================-->
    <section class="latest_news_area p_100">
        <div class="container">
            <div class="b_center_title">
                <h2>A empresa</h2>
                <p>Fundada sobre aspectos que priorizavam o bem estar de seus colaboradores e parceiros, tinha em princípios familiares a sua base.
                    Hoje, com mais de 30 anos de mercado, reforçando sempre tais princípios, consolidou uma imagem
                    forte e cada vez mais evidente no mercado atual. O seu formato moderno compreende exatamente a perfeita fusão entre
                    os princípios basilares e a expansão dos negócios por meio de processos definidos e o foco no
                    desenvolvimento e maximização dos ganhos do cliente parceiro.</p>
            </div>
            <div class="l_news_inner">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong> VONTADE DE CONCRETIZAR</strong>
                        <br><br>

                        A força que sustenta a Modific Construções e Reformas se encontra no fortalecimento constante das relações,
                        com processos compactos, definidos e completos, assim como técnicas
                        inovadoras e sustentáveis, em consonância com a maximização dos ganhos do cliente parceiro,
                        que estará focado em seu negócio.
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>RESPEITO E FUTURO</strong>
                        <br><br>

                        Inserir no mercado atual e futuro uma forma de processo pautada em princípios de colaboração e distribuição de vantagens,
                        sempre com foco na sustentabilidade e necessidades constantes de nossos clientes parceiros.
                        O foco do cliente parceiro deve estar em seu negócio. Assim delineamos a nossa missão!



                    </div>
                </div>
    </section>

    <section class="latest_news_area p_100">
        <div class="container">
            <div class="b_center_title">
                <h2>Nossas Obras</h2>
                <p>Conheça atrvés da nossa galeria um pouco mais do nosso trabalho</p>
            </div>
            <div class=" row">
                <?php




                $pesquisaObras = "SELECT * from obra order by obra.tituloObra";

                $resultadoObras = mysqli_query($conn, $pesquisaObras);
                $totalObras = mysqli_num_rows($resultadoObras);
                while ($row = mysqli_fetch_assoc($resultadoObras)) { ?>
                    <div class="col-lg-4 col-md-4">

                        <a href="#verGaleria<?php echo $row["idObra"] ?>" data-toggle="modal"><?php echo $row["tituloObra"] ?>
                            <?php
                            $pesquisaCapa = "SELECT * from imagemObra i  where i.obra = " . $row["idObra"] . " and i.capa = 1";
                            $imgCapa = mysqli_query($conn, $pesquisaCapa);
                            $capa = mysqli_fetch_assoc($imgCapa);


                            ?>
                            <div class="thumbnail">

                                <img src="admin/UP/<?php echo $capa["imagem"] ?>" alt="Lights" style="width:100%">
                            </div>
                        </a>


                        <!-- Adicionando imagens para uma obra -->





                        </p>
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



                                        <?php
                                        $result_logs = "SELECT * from imagemObra i  where i.obra = " . $row["idObra"];
                                        $resultado_logs = mysqli_query($conn, $result_logs);
                                        $totalImagens = mysqli_num_rows($resultado_logs);
                                        $marcadores = 0;
                                        ?>
                                        <?php
                                        while ($lista = mysqli_fetch_assoc($resultado_logs)) { ?>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="thumbnail">
                                                        <img src="admin/UP/<?php echo $lista["imagem"] ?>" alt="Lights" style="width:100%">

                                                    </div>
                                                </div>
                                            </div>

                                        <?php } ?>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="submit" class=" btn btn-primary" data-dismiss="modal">Voltar</button>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>


                    <!-- ======================== FIM VER OBRAS ================== -->


                    <!-- ================================== Edição obra ========================== -->




                <?php } ?>

            </div>

    </section>





    <!--================End Our Service Area =================-->

    <!--================Testimonials Area =================-->
    <div class="b_center_title">
        <h2>Nossos clientes</h2>
        <p>Conheça um pouco mais sobre o que nossos clientes dizem do nosso trabalho</p>
    </div>


    <section class="latest_news_area p_100">
        <div class="container">
            <div class="testimonials_slider owl-carousel">
                <?php

                $result_empresas = "SELECT * FROM empresa";
                $resultado_empresas = mysqli_query($conn, $result_empresas);
                $total_empresas = mysqli_num_rows($resultado_empresas);
                $marcadores = 0;
                while ($empresa = mysqli_fetch_assoc($resultado_empresas)) { ?>

                    <div class="item">
                        <div class="media">
                            <img class="d-flex rounded-circle" src="admin/UP/<?php echo $empresa["logoEmpresa"] ?>" alt="">
                            <div class="media-body">

                                <p>I wanted to mention that these days, when the opposite of good customer and tech support tends to be the norm, it’s always great having a team like you guys at Fancy! So, be sure that I’ll always spread the word about how good your product is and the extraordinary level of support that you provide any time there is any need for it.</p>
                                <h4><?php echo $empresa["nomeEmpresa"] ?></h4>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </section>
    <!--================End Testimonials Area =================-->

    <!--================Project Area =================-->

    <!--================End Project Area =================-->

    <!--================Latest News Area =================-->

    <!--================End Latest News Area =================-->

    <!--================Footer Area =================-->
    <footer class="footer_area">
        <div class="footer_widgets_area">
            <div class="container">
                <div class="f_widgets_inner row">
                    <div class="col-lg-3 col-md-6">
                        <aside class="f_widget subscribe_widget">
                            <div class="f_w_title">
                                <h3>Our Newsletter</h3>
                            </div>
                            <p>Subscribe to our mailing list to get the updates to your email inbox.</p>
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="E-mail" aria-label="E-mail">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary submit_btn" type="button">Subscribe</button>
                                </span>
                            </div>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <aside class="f_widget twitter_widget">
                            <div class="f_w_title">
                                <h3>Twitter Feed</h3>
                            </div>
                            <div class="tweets_feed"></div>
                        </aside>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <aside class="f_widget categories_widget">
                            <div class="f_w_title">
                                <h3>Link Categories</h3>
                            </div>
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Agency</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Studio</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Studio</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Blogs</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Shop</a></li>
                            </ul>
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Home</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>About</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Services</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Work</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Privacy</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <aside class="f_widget contact_widget">
                            <div class="f_w_title">
                                <h3>Contact Us</h3>
                            </div>
                            <a href="#">1 (800) 686-6688</a>
                            <a href="#">info.deercreative@gmail.com</a>
                            <p>40 Baria Sreet 133/2 <br />NewYork City, US</p>
                            <h6>Open hours: 8.00-18.00 Mon-Fri</h6>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy_right_area">
            <div class="container">
                <div class="float-md-left">
                    <h5>Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></h5>
                </div>
                <div class="float-md-right">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Disclaimer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Privacy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Advertisement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
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