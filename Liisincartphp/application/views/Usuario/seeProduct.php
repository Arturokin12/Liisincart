
<div class="banner-top">
    <div class="container">
        <h1>Detalle Producto</h1> <em></em>
        <h2><a onclick="location.reload()">Home</a><label>/</label><a onclick="cargarProductos('Usuario/Products', 'divIndex', 'slade')">Producto</a></h2></div>
</div>
<!--Filter-->
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Buscar" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" method="POST" action="<?= base_url() ?>controladorCliente/buscarProducto">
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
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//filter-->
<script>

</script>
<div class="single" id="divBuscar">
    <div class="container">
        <div class="col-md-10">
            <div class="col-md-5 grid">
                <div class="flexslider">
                    <ul class="slides">
                        <?php foreach ($imagenes as $value) { ?>
                            <li data-thumb="<?php echo base_url() . "../" . $value->ruta ?>">
                                <div class="thumb-image"> <img src="<?php echo base_url() . "../" . $value->ruta ?>" width="100%" height="100%" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-7 single-top-in">
                <div class="span_2_of_a1 simpleCart_shelfItem">
                    <h3><?php echo $producto->Descripcion ?></h3>
                    <div class="price_single"> <span class="reducedfrom item_price">$<?php echo $producto->precio ?></span>
                        <div class="clearfix"></div>
                    </div>
                    <h4 class="quick">Vista Rápida:</h4>
                    <p class="quick_desc"><?php echo $producto->Detalles ?></p>
                    <form id="formProducto" action="<?= base_url() ?>catalogo/agregarProducto" method="POST">
                        <div class="wish-list">
                            <input type="text" id="id_prod" name="id_prod" class="hidden" value="<?php echo $producto->id_producto ?>"/>
                            <ul>
                                <li class="wish"> <button class="add-to item_add hvr-skew-backward btn-contratar">Contratar Servicio</button>
                                <li class="compare"><button type="submit" class="add-to item_add hvr-skew-backward btn-agregar">Agregar al  Carrito</button> </li>
                            </ul>
                        </div>
                    </form>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
            <!---->
            <div class="tab-head">
                <nav class="nav-sidebar">
                    <ul class="nav tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">Descripción del Producto</a></li>
                        <?php
                        if ($producto->video != "") {
                            echo "<li ><a href='#tab2' data-toggle='tab'>Video Promocional</a></li>";
                            $videoVER = "visible";
                        } else {
                            $videoVER = "hidden";
                        }
                        ?>

                    </ul>
                </nav>
                <div class="tab-content one">
                    <div class="tab-pane active text-style" id="tab1">
                        <div class="facts">
                            <p> <?php echo $producto->Detalles ?></p>
                        </div>
                    </div>
                    <div class="tab-pane text-style" id="tab2" style="visibility: <?= $videoVER ?>">
                        <div class="facts">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/kI4uwZ1AewQ" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!---->
        </div>
        <!----->
        <div class="clearfix"> </div>
    </div>
</div>
<!--abrir-cuenta-->
<div class="abrir-cuenta">
    <div class="clearfix"></div>
</div>
<script defer src="<?= base_url() ?>../js/jquery.flexslider.js" type="text/javascript"></script>
<script src="<?= base_url() ?>../js/imagezoom.js"></script>
<script>
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });
</script>
<script src="<?= base_url() ?>../js/main.js"></script>
