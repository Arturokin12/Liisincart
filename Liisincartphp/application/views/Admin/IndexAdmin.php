<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Liisin</title>
        <!-- Bootstrap files -->
        <link href="<?= base_url() ?>../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Styles -->
        <link href="<?= base_url() ?>../css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?= base_url() ?>../css/slider.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url() ?>../css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
        <link href="<?= base_url() ?>../css/font-awesome.min.css" rel="stylesheet" media="screen">
        <!--- Light Box ---->
        <link rel="stylesheet" href="<?= base_url() ?>../css/chocolat.css" type="text/css" media="screen" charset="utf-8">
        <link href="<?= base_url() ?>../css/Jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
        
        <script src="<?= base_url() ?>../js/jquery.min.js"></script>
        <script src="<?= base_url() ?>../js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>../js/Funciones.js"></script>
        <script src="<?= base_url() ?>../js/simpleCart.min.js"></script>
        <script src="<?= base_url() ?>../css/Jquery-ui/jquery-ui.js" type="text/javascript"></script>
        <!--Light Box-->
        <script src="<?= base_url() ?>../js/jquery.chocolat.js"></script>
        <!--Star Box-->
        
        <script type="text/javascript">
            var base_url = '<?= base_url() ?>';
        </script>
    </head>
    <?php if ($this->session->userdata("login") == false && $this->session->userdata("rol") != "admin") {
     redirect(base_url()."ControladorCliente/index");
    }?>
    <body>
        <div class="header" id="home">
            <div class="container">
                <div class="head">
                    <div class="logo2">
                        <a href="<?php echo rtrim(base_url(), "/") ?>"><img src="<?= base_url() ?>../images/logo.png" alt="" style="margin-top: 10px"></a>
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
                                                            <li><a href="javascript:void(0)">CumpleaÃ±os</a></li>
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
                                                            <li><a href="product.html">Presentaciones (niÃ±os 3 aÃ±os)</a></li>
                                                            <li><a href="product.html">Primeras Comuniones</a></li>
                                                            <li><a href="product.html">Recaudaciones</a></li>
                                                            <li><a href="product.html">XV aÃ±os</a></li>
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
                                    </script>
                                    <div id="divSesion" style="display: inline">

                                    </div>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </nav>
                    </div>
                    <!--            <div class="col-sm-2 search-right">
                                    <div class="cart box_1">
                                        <a href="checkout.html">
                                            <h3> 
                                                <div class="total">
                                                    <span class="simpleCart_total"></span>
                                                </div>
                                                <img class="imgcart" src="images/cart.png" alt=""/>
                                            </h3> </a>
                                        <p><a href="javascript:;" class="simpleCart_empty">No hay elementos</a></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>-->
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--banner-->
        <div class="banner-top">
            <div class="container">
                <h1>Administración</h1> <em></em>

            </div>
        </div>
        <!--login-->
        <div class="container">
            <div id="divPrincipalAdmin">

                <script>
                    $(document).ready(function () {
                        $("#modal").dialog({
                            autoOpen: false,
                            modal: true,
                            buttons: {
                                Ok: function () {
                                    $(this).dialog("close");
                                    //location.reload();
                                }
                            }
                        }
                        );
                        $("#modal2").dialog({
                            autoOpen: false,
                            modal: true,
                            width: 1000,
                            buttons: {
                                Editar: function () {
                                    editarProducto();
                                },
                                Cancelar: function () {
                                    $(this).dialog("close");
                                    //location.reload();
                                }
                            }
                        }
                        );
                        $("#modalEliminar").dialog({
                            autoOpen: false,
                            modal: true,
                            buttons: {
                                Si: function () {
                                    $(this).dialog("close");
                                    eliminarProducto(document.getElementById("lbidEliminar").innerHTML);
                                },
                                No: function () {
                                    $(this).dialog("close");
                                    //location.reload();
                                }
                            }
                        }
                        );
                    });
                    var imagenesArray = [];
                    $(function () {
                        $("#upload_form").submit(function (event) {
                            event.preventDefault();
                            //        var ajax = new XMLHttpRequest();
                            //        var data = new FormData();
                            //        data.append("userfile", document.getElementById("userfile").files[0]);
                            //        ajax.open("POST", base_url + "upload/do_upload");
                            //        ajax.send(data);
                            if (imagenesArray.length <= 2) {
                                var form = new FormData(document.getElementById('upload_form'));
                                var file = document.getElementById('userfile').files[0];
                                if (file) {
                                    form.append('userfile', file);
                                }
                                $.ajax({
                                    url: base_url + 'upload/do_upload/',
                                    secureuri: false,
                                    fileElementId: 'userfile',
                                    type: 'POST',
                                    dataType: 'json',
                                    data: form,
                                    contentType: false,
                                    processData: false,
                                    success: function (vector) {
                                        if (vector.error == false) {
                                            imagenesArray.push(vector.imagen);
                                            imagenesdivs = document.getElementById("imagenesAddProducto");
                                            var imagen = "<div class='col-md-2 item-grid1' style='text-align: center;padding: 0px'><img id='imgProductos' src='" + base_url + "../UploadedImages/thumbs/" + vector.imagen + "' height='150px' width='150px' style='margin: 0 auto;margin-left: 0px'/></div>";
                                            imagenesdivs.innerHTML = imagenesdivs.innerHTML + "";
                                            imagenesdivs.innerHTML = imagenesdivs.innerHTML + imagen;
                                            document.getElementById("userfile").value = "";
                                        } else {
                                            $("#modal").html(vector.mensaje);
                                            $("#modal").dialog("open");
                                        }
                                    }
                                });
                            } else {
                                $("#modal").html("máximo de imágenes por producto alcanzado.");
                                $("#modal").dialog("open");
                            }
                        });
                    });


                    function guardarProducto() {
                        var data = new FormData();
                        var des = document.getElementById("txtDescripcion").value;
                        var desc2 = document.getElementById("txtDetalles").value;
                        var precio = document.getElementById("txtPrecio").value;
                        var tipo = document.getElementById("cbTipo").value;
                        var estado = document.getElementById("cbEstado").value;
                        var video = document.getElementById("txtVideo").value;
                        var img = JSON.stringify(imagenesArray);
                        $.ajax({
                            url: base_url + 'ControladorAdmin/addProducto',
                            type: 'POST',
                            dataType: 'json',
                            data: {descripcion: des, detalles: desc2, precio: precio, tipo: tipo, imagenes: img, state: estado, video : video},
                            success: function (vector) {
                                if (vector.error == true) {
                                    $("#modal").html(vector.mensaje);
                                    $("#modal").dialog("open");
                                } else {
                                    location.href = base_url;
                                }
                            }
                        });
                        //        ajax.open("POST", base_url + "ControladorAdmin/addProducto");
                        //        ajax.send(data);
                    }

                    function eliminarProducto(id) {
                        var data = new FormData();
                        var id_prod = document.getElementById("lbidEliminar").innerHTML;
                        $.ajax({
                            url: base_url + 'ControladorAdmin/eliminarProducto',
                            type: 'POST',
                            dataType: 'json',
                            data: {id_prod: id_prod},
                            success: function (vector) {
                                if (vector.error == true) {
                                    $("#modal").html(vector.mensaje);
                                    $("#modal").dialog("open");
                                } else {
                                    location.href = base_url;
                                }
                            }
                        });
                    }

                    function Buscarproductos1() {
                        var form = document.createElement("form");
                        form.method = 'post';
                        form.action = '<?= base_url() ?>catalogo/buscarProductosAdmin?pr=true';
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
                <br/>
                <br/>
                <button type="button" class="btn btn-primary" onclick="cargarPaginaData('Admin/AddProducto', 'divIndexAdmin', 'fade', 'state')">Productos</button>
                <button type="button" class="btn btn-primary" onclick="cargarPagina('Admin/CuentaAdmin', 'divIndexAdmin', 'fade')">Cuenta administrador</button>
                <button type="button" class="btn btn-primary" onclick="cargarPagina('Admin/CorreoAdmin', 'divIndexAdmin', 'fade')">Configurar Correo</button>
                <div id="divIndexAdmin">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2>Administración de productos</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group">
                                    <label for="txtDescripcion">Descripción: </label>
                                    <textarea id="txtDescripcion" class="form-control" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="txtDetalles">Detalles: </label>
                                    <textarea id="txtDetalles" class="form-control" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="txtPrecio">Precio: </label>
                                    <input type="number" style="width: 150px" width="50px" id="txtPrecio" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="txtVideo">Video Promocional de Youtube: </label>
                                    <input type="text" style="width: 150px" width="50px" id="txtVideo" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="cbTipo">Tipo: </label>
                                    <select id="cbTipo" class="form-control" style="width:">
                                        <option value="Seleccionar" disabled="true">Seleccionar</option>
                                        <option value="Venta">Venta</option>
                                        <option value="Renta">Renta</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cbEstado">Estado: </label>
                                    <select id="cbEstado" class="form-control" style="width:">
                                        <option value="Seleccionar" disabled="true">Seleccionar</option>
                                        <?php foreach ($estados as $value) { ?>
                                            <option value="<?php echo $value->nombre ?>"><?php echo $value->nombre ?></option>
                                        <?php } ?>
                                    </select> 
                                </div>
                                <label>Imágenes: </label>
                                <form method="POST" id="upload_form" action="" class="form-group">
                                    <label for="btSubirImagen">Imagen 1:</label><input type="file" style="display: inline" accept="image/*" name="userfile" id="userfile" /><br /><br />
                                    <input type="submit" name="btSubirImagen" id="btSubirImagen" value="Subir imágen"/>
                                </form>
                            </div>
                            <br/>
                            <br/>
                            <br/>
                            <div id="imagenesAddProducto" class="row">

                            </div>
                            <br/>
                            <button style="float: right;margin-right: 18%" type="button"  onclick="location.reload()" id="btCancelarAddProducto" class="btn btn-danger" >Cancelar</button>
                            <button style="float: right;margin-right: 1%" type="submit" id="btAgregarProducto" class="btn btn-primary" onclick="guardarProducto()">Agregar</button>

                        </div>
                    </div>
                </div>
            </div>
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
                                                <form class="form-horizontal" method="POST" action="<?= base_url() ?>catalogo/buscarProductosAdmin?pr=true">
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
                <div class="product">
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
                                                        <a onclick="modalEditarProducto(<?php echo $val->id_producto ?>)" rel="title" class="b-link-stripe b-animate-go  thickbox">
                                                            <i class="glyphicon glyphicon-pencil icon "></i>
                                                        </a> 
                                                        <a onclick="document.getElementById('lbidEliminar').innerHTML = '<?php echo $val->id_producto ?>';
                                                                    $('#modalEliminar').dialog('open');" rel="title" class="b-link-stripe b-animate-go  thickbox">
                                                            <i class="glyphicon glyphicon-trash icon "></i>
                                                        </a> 
                                                        <a href="single.html"></a> </div>
                                                </div>
                                                <div class="mid-1">
                                                    <div class="category">
                                                        <div class="category-top"> <span><?php echo $val->state ?></span>
                                                            <h6><a href="single.html"><?php echo $val->Descripcion ?></a></h6> </div>
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
                        <a href="<?php echo rtrim(base_url(), "/") ?>"><img src="<?= base_url() ?>../images/logo.png"></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus nihil beatae debitis quidem eos deleniti voluptatum iusto dolores. Quos perferendis error eos quisquam accusantium explicabo maxime placeat, modi perspiciatis. Illo?</p>
                    </div>
                    <div class="col-md-3 footer-middle-in">
                        <h6>Información</h6>
                        <ul class=" in">
                            <li><a href="404.html">Acerca de Nosotros</a></li>
                            <li><a href="<?= base_url() ?>ControladorCliente/redireccionar?pag=Usuario/contact">Contáctanos</a></li>
                            <li><a href="#">Por qué comprar</a></li>
                            <li><a href="<?= base_url() ?>ControladorCliente/redireccionar?pag=Usuario/contact">Mapa de Sitio</a></li>
                        </ul>
                        <ul class="in in1">
                            <li><a href="<?= base_url() ?>Catalogo/cargarProductos">Productos</a></li>
                            <li><a href="<?= base_url() ?>ControladorCliente/redireccionar?pag=Usuario/login">Ingresa</a></li>
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
        <div class="scroll-up"> <a href="<?php echo rtrim(base_url(), "/") ?>"><i class="fa fa-angle-up"></i></a> </div>
        <!-- //scroll up -->
        <div id="modal">

        </div>
        <div id="modal2" style="width: 800px">

        </div>
        <label class="hidden" id="lbidEliminar"></label>
        <div id="modalEliminar" title="Eliminar Producto">
            <h3>¿Está seguro que desea eliminar?</h3>
        </div>
        <script>
            /*Light Box Init */
            $(function () {
                $('a.picture').Chocolat();
            });
        </script>
    </body>

</html>