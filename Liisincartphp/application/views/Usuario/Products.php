<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Liisin | Productos</title>
        <link href="<?= base_url() ?>../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Styles -->
        <link href="<?= base_url() ?>../css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?= base_url() ?>../css/slider.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url() ?>../css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
        <link href="<?= base_url() ?>../css/font-awesome.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="<?= base_url() ?>../css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
        <!--- Light Box ---->
        <link rel="stylesheet" href="<?= base_url() ?>../css/chocolat.css" type="text/css" media="screen" charset="utf-8">
        <link rel="stylesheet" href="<?= base_url() ?>../css/flexslider.css" type="text/css" media="screen" />
        <link href="<?= base_url() ?>../css/Jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="<?= base_url() ?>../js/jquery.min.js"></script>
        <script src="<?= base_url() ?>../js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>../js/Funciones.js"></script>
        <script src="<?= base_url() ?>../js/simpleCart.min.js"></script>
        <script src="<?= base_url() ?>../css/Jquery-ui/jquery-ui.js" type="text/javascript"></script>
        <!--Light Box-->
        <script src="<?= base_url() ?>../js/jquery.chocolat.js"></script>
        <!--Star Box-->
        <script src="<?= base_url() ?>../js/jstarbox.js"></script>
        <!--<script src="<?= base_url() ?>../js/smoothscroll.js"></script>-->
        <script src="<?= base_url() ?>../js/main.js"></script>
        <script src="<?= base_url() ?>../js/paso.js"></script>
        <script type="text/javascript">
            var base_url = '<?= base_url() ?>';
            function Buscarproductos1() {
                var form = document.createElement("form");
                form.method = 'post';
                form.action = '<?=  base_url()?>catalogo/buscarProductos1?pr=true';
                var input = document.createElement('input');
                input.type = "text";
                input.name = "texto";
                input.value = document.getElementById("txtBuscarTexto").value;
                input.id = "texto";
                form.appendChild(input);
                var input2 = document.createElement('input');
                input2.type = "text";
                input2.name = "cbEstadoBuscar";
                input2.value = document.getElementById("cbEstadoBuscar").value;
                input2.id = "cbEstadoBuscar";
                form.appendChild(input2);
                form.submit();
            }
        </script>
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
                                    <script>
                                        cargarLoginMensaje();
                                        cargarPagina("Usuario/carrito", "divCarrito", "fade");
                                    </script>
                                    <li><a class="color3" href="product.html">Buscar Servicios</a></li>
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
                </div>
            </div>
        </div>
    </div>
    <!--banner-->
    <div id="divIndex">
        <!--//filter-->
        <div id="productos">
            <div class="banner-top">
                <div class="container">
                    <h1>Productos</h1>
                </div>
            </div>
            <!--content-->
            <!--Filter-->
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group" id="adv-search">
                            <input type="text" class="form-control" placeholder="Buscar" id="txtBuscarTexto" onchange="document.getElementById('texto').innerHTML = document.getElementById('txtBuscarTexto').value"/>
                            <div class="input-group-btn">
                                <div class="btn-group" role="group">
                                    <div class="dropdown dropdown-lg">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <form class="form-horizontal" method="POST" action="<?= base_url() ?>catalogo/buscarProductos1?pr=true">
                                                <input type="text" class="hidden" id="texto" name="texto"/>
                                                <div class="form-group">
                                                    <label for="filter">Por Estado</label>
                                                    <select id="cbEstadoBuscar" name="cbEstadoBuscar" class="form-control">
                                                        <option value="0" selected>Todos</option>
                                                        <?php foreach ($estados as $est) { ?>
                                                            <option value="<?= $est->nombre ?>"><?= $est->nombre ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="filter">Por Ciudad</label>
                                                    <select class="form-control">
                                                        <option value="0" selected>Todos</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="filter">Por Servicio</label>
                                                    <select class="form-control">
                                                        <option value="0" selected>Todos</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                            </form>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="Buscarproductos1()"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--//filter-->
            <div class="product container">
                <div style="padding: 0px">
                    <div class="col-md-12" style="padding: 0px">
                        <div class="mid-popular">

                            <div id="paginacion" style="">
                                <?php foreach ($productos as $val) { ?>
                                    <div class="col-md-4 item-grid1 simpleCart_shelfItem">
                                        <div class=" mid-pop">
                                            <?php
                                            $imagen = $this->db->query("select ruta from imagen where id_producto = " . $val->id_producto . " limit 1")->result();
                                            ?>
                                            <?php
                                            foreach ($imagen as $valu) {
                                                $ruta2 = $valu->ruta;
                                                ?>
                                                <div class="pro-img"> <img src="<?= base_url() ?>../<?php echo $ruta2 ?>" class="img-responsive img-cart" alt="">
                                                <?php } ?>  
                                                <div class="zoom-icon "> 
                                                    <a class="picture" href="<?= base_url() ?>../<?php echo $ruta2 ?>" rel="title" class="b-link-stripe b-animate-go  thickbox">
                                                        <i class="glyphicon glyphicon-search icon "></i>
                                                    </a> 
                                                    <a onclick="verProducto(<?php echo $val->id_producto ?>, 'divIndex', 'fade')">
                                                        <i class="glyphicon glyphicon-menu-right icon"></i>
                                                    </a> 
                                                </div>
                                            </div>
                                            <div class="mid-1">
                                                <div class="category">
                                                    <div class="category-top"> <span><?php echo $val->state ?></span>
                                                        <h6><a href="#" onclick="verProducto(<?php echo $val->id_producto ?>, 'divIndex', 'fade')"><?php echo $val->Descripcion ?></a></h6> </div>
                                                    <div class="img item_add">

                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="mid-2">
                                                    <p>
                                                        <em class="item_price">$<?= $val->precio ?></em> </p>
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?= form_hidden('uri', $this->uri->segment(3)) ?>
                                <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="grid_7">
                        <?= $this->pagination->create_links() ?>
                    </div>
                    <div class="clearfix"></div>
                    <br/>
                    <br/>
                </div>
                <br/>
            </div>
        </div>
    </div>
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
    <!--//footer-->
    <script type="text/javascript" charset="utf-8">
        $(function () {
            $('a.picture').Chocolat();
        });
    </script>
</body>

</html>

