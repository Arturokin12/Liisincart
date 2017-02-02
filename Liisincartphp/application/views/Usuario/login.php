<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Liisin | Ingresa</title>
        <link href="<?= base_url() ?>../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?= base_url() ?>../css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?= base_url() ?>../css/font-awesome.min.css" rel="stylesheet" media="screen">
        <link href="<?= base_url() ?>../css/Jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="<?= base_url() ?>../js/jquery.min.js"></script>
        <script src="<?= base_url() ?>../js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>../js/jquery.min.js"></script>
        <script src="<?= base_url() ?>../css/Jquery-ui/jquery-ui.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>../js/simpleCart.min.js"></script>
        <script src="<?= base_url() ?>../js/Funciones.js"></script>
        <script type="text/javascript">
            var base_url = '<?= base_url() ?>';
        </script>
    </body>
</head>

<body>
    <!--header-->
    <div class="header" id="home">
        <div class="container">
            <div class="head">
                <div class="logo2">
                    <a href="<?php echo rtrim(base_url(), "/") ?>"><img src="<?= base_url() ?>../images/logo.png" alt=""></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="head-top">
                <div class="col-sm-8 col-md-offset-2 h_menu4">
                    <nav class="navbar nav_bottom" role="navigation">
                        <div class="navbar-header nav_2">
                            <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                            <ul class="nav navbar-nav nav_1">
                                <li class="dropdown mega-dropdown active"> <a class="color1" href="#" class="dropdown-toggle" data-toggle="dropdown">Eventos<span class="caret"></span></a>
                                    <div class="dropdown-menu ">
                                        <div class="menu-top">
                                            <h4 class="text-center mb-1">Organiza cualquiera de estos eventos paso a paso</h4>
                                            <div class="col1">
                                                <div class="h_nav">
                                                    <ul>
                                                        <li><a href="paso.html">Baby Shower</a></li>
                                                        <li><a href="javascript:void(0)">Bautizos</a></li>
                                                        <li><a href="javascript:void(0)">Bodas</a></li>
                                                        <li><a href="javascript:void(0)">Conciertos</a></li>
                                                        <li><a href="javascript:void(0)">Conferencias</a></li>
                                                        <li><a href="javascript:void(0)">Cumpleaños</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col1">
                                                <div class="h_nav">
                                                    <ul>
                                                        <li><a href="product.html">Despedida de Soltera</a></li>
                                                        <li><a href="product.html">Eventos Corporativos</a></li>
                                                        <li><a href="product.html">Exposiciones</a></li>
                                                        <li><a href="product.html">Ferias</a></li>
                                                        <li><a href="product.html">Fiestas infantiles</a></li>
                                                        <li><a href="product.html">Graduaciones</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col1">
                                                <div class="h_nav">
                                                    <ul>
                                                        <li><a href="product.html">Presentaciones (niños 3 años)</a></li>
                                                        <li><a href="product.html">Primeras Comuniones</a></li>
                                                        <li><a href="product.html">Recaudaciones</a></li>
                                                        <li><a href="product.html">XV años</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col1">
                                            </div>
                                            <div class="col1 col6"> <img src="<?= base_url() ?>../images/paso.png" class="img-responsive paso" alt=""> </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </li>
                                <li><a class="color3" href="<?= base_url() ?>Catalogo/cargarProductos">Buscar Servicios</a></li>
                                <script>
                                    cargarLoginMensaje();
                                    cargarPagina("Usuario/carrito", "divCarrito", "fade");
                                </script>
                                <div id="divSesion" style="display: inline">

                                </div>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                </div>
                <div class="col-sm-2 search-right" id="divCarrito">

                </div>
                <div class="clearfix"></div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--banner-->
    <div class="banner-top">
        <div class="container">
            <h1>Ingresa</h1> <em></em>
            <h2><a href="index.html">Home</a><label>/</label><a href="">Ingresa</a></h2>
        </div>
    </div>
    <!--login-->
    <div class="container">
        <div class="login">
            <script type="text/javascript">
                $(function () {
                    $("form").submit(function (event) {
                        event.preventDefault();
                        $.ajax({
                            url: $("form").attr("action"),
                            type: $("form").attr("method"),
                            data: $("form").serialize(),
                            dataType: 'JSON',
                            success: function (vector) {
                                if (vector.error == true) {
                                    $("#modal").html(vector.mensaje);
                                    $("#modal").dialog("open");
                                } else {
                                    location.href = base_url;
                                }
                            }
                        });
                    });
                });
            </script>
            <form method="POST" action="<?= base_url() ?>ControladorCliente/iniciarSesion">
                <div class="col-md-6 login-do">
                    <div class="login-mail">
                        <input type="text" placeholder="Email" id="mail" name="mail" required=""> <i class="glyphicon glyphicon-envelope"></i> </div>
                    <div class="login-mail">
                        <input type="password" placeholder="Contraseña" id="pass" name="pass" required=""> <i class="glyphicon glyphicon-lock"></i> </div>
                    <a class="news-letter " href="#">
                        <a href="#" class="olvidar">Olvidaste tu contraseña?</a>
                        <label class="checkbox1">
                            <input type="checkbox" name="checkbox"><i></i>Recordarme</label>
                    </a>
                    <button type="submit" class="btn btn-default btn-login hvr-skew-backward">Entrar</button>
                </div>
                <div class="col-md-6 login-right">
                    <?php $cb = base_url() . "ControladorCliente/loginFacebook";
                    $url = $this->fb->getLoginUrl($cb);
                    ?>
                    <h3>Ingresa con tus redes sociales</h3>
                    <div class="social-box">
                        <div class="row mg-btm">
                            <div class="col-md-8">
                                <a href="<?=$url?>" class="btn btn-primary btn-block">
                                    <i class="fa fa-facebook"></i>Login with Facebook</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <a href="#" class="btn btn-info btn-block">
                                    <i class="fa fa-twitter"></i>Login with Twitter </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <a href="#" class="btn btn-danger btn-block">
                                    <i class="fa fa-google"></i>Login with Google </a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </form>
        </div>
    </div>
    <!--//login-->
    <!--abrir-cuenta-->
    <div class="abrir-cuenta">
        <div class="clearfix"></div>
    </div>
    <!--//abrir-cuenta-->
    <!--//content-->
    <!-- footer -->
    <div class="footer">
        <div class="footer-middle">
            <div class="container">
                <div class="col-md-3 footer-middle-in">
                    <a href="index.html"><img src="<?= base_url() ?>../images/logo.png"></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus nihil beatae debitis quidem eos deleniti voluptatum iusto dolores. Quos perferendis error eos quisquam accusantium explicabo maxime placeat, modi perspiciatis. Illo?</p>
                </div>
                <div class="col-md-3 footer-middle-in">
                    <h6>Información</h6>
                    <ul class=" in">
                        <li><a href="404.html">Acerca de Nosotros</a></li>
                        <li><a href="contact.html">Contáctanos</a></li>
                        <li><a href="#">Por qué comprar</a></li>
                        <li><a href="contact.html">Mapa de Sitio</a></li>
                    </ul>
                    <ul class="in in1">
                        <li><a href="#">Productos</a></li>
                        <li><a href="#">Servicios</a></li>
                        <li><a href="login.html">Ingresa</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-3 footer-middle-in">
                    <h6>Redes Sociales</h6>
                    <ul class="tag-in">
                        <a href="https://www.facebook.com/Liisin-626800804177581/" target='_blank'> <span class="fa fa-facebook"></span> </a>
                        <a href="https://twitter.com/Liisin_App" target='_blank'> <span class="fa fa-twitter"></span> </a>
                        <a href="https://www.instagram.com/liisin.app" target='_blank'> <span class="fa fa-instagram"></span> </a>
                        <a href="https://plus.google.com/u/1/100269599005365969922" target='_blank'> <span class="fa fa-google"></span> </a>
                        <a href="https://www.youtube.com/channel/UCyWLZoVhpsGof6MvLC-EsqA" target='_blank'> <span class="fa fa-youtube"></span> </a>
                        <a href="https://es.pinterest.com/appliisin/" target='_blank'> <span class="fa fa-pinterest"></span> </a>
                        <a href="https://www.linkedin.com/in/liisinapp" target='_blank'> <span class="fa fa-linkedin"></span> </a>
                    </ul>
                </div>
                <div class="col-md-3 footer-middle-in">
                    <h6>Noticias</h6> <span>Suscribete para las Novedades</span>
                    <form>
                        <input type="text" value="Ingresa tu e-mail" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'Ingresa tu e-mail';
                                }">
                        <input type="submit" value="Suscribete"> </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div id="modal">

    </div>
    <!--//footer-->

</html>

