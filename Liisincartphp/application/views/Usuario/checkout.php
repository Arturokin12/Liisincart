<?php $productosCart = $this->cart->contents() ?>
<!--banner-->
<div class="banner-top">
    <div class="container">
        <h1>Detalle</h1>
        <em></em>
        <h2><a href="<?php echo rtrim(base_url(), "/") ?>">Home</a><label>/</label><a href="#">Detalle Carrito</a></h2>
    </div>
</div>
<!--login-->
<div class="container">
    <div class="check-out">
        <div class="bs-example4" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table-heading simpleCart_shelfItem">
                    <tr>
                        <th class="table-grid">Item</th>

                        <th>Precio</th>
                        <th>Cantidad </th>
                        <th>Subtotal</th>
                    </tr>
                    <?php
                    if (count($productosCart) == 0) {
                        echo "<h1>No hay productos ingresados</h1>";
                        $visible = "hidden";
                    } else {
                        $visible = "visible";
                        foreach ($productosCart as $prod) {
                            if ($prod['qty'] != 0) {
                                $prd = $this->catalogo_model->porId($prod['id']);
                                $imgs = $this->db->query("select * from imagen where id_producto = " . $prod['id'] . " Limit 1");
                                ?>
                                <tr class="cart-header" style="visibility: <?= $visible ?>">
                                    <td class="ring-in">
                                        <?php foreach ($imgs->result() as $i) { ?>
                                            <a href="single.html" class="at-in"><img src="<?php echo base_url() . "../" . $i->ruta ?>" class="img-responsive" alt=""></a>
                                        <?php } ?>
                                        <div class="sed">
                                            <h5><a href="single.html"><?php echo $prd->Descripcion ?></a></h5>
                                            <p><?php echo $prd->Detalles ?> </p>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </td>
                                    <td>$<?php echo $prd->precio ?></td>
                                    <td><?= $prod['qty'] ?></td>
                                    <td class="item_price">$<?php echo $prod['subtotal'] ?></td>
                                    <td><button type="button" class="btn btn-danger" onclick="eliminarDelCarrito('<?= $prod['rowid'] ?>')">Quitar del carrito</button></td>
                                </tr>
                            <?php
                            }
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        <br/><br/><br/>
        <form action="<?= base_url() ?>ControladorCliente/enviarCarrito" method="POST" style="visibility: <?= $visible ?>">
            <div id="datosCarrito">
                <div class="form-group">
                    <label for="">Dirección a la que se entregará el servicio: </label>
                    <input type="text" class="form-control" id="txtDireccion" required="true" name="txtDireccion"/>
                </div>
                <div class="form-group">
                    <label for="txtFecha">Fecha deseada: </label>
                    <input type="date" class="form-control" id="txtFecha" required="true" name="txtFecha"></textarea>
                </div>
                <div class="form-group">
                    <label for="txtDetallesCarro">Escribe otros detalles para tus servicios: </label>
                    <textarea class="form-control" id="txtDetallesCarro" required="true" name="txtDetallesCarro"></textarea>
                </div>
            </div>
            <?php
            if ($this->session->userdata("login") == true) {
                $div1 = "visible";
                $div2 = "hidden";
            } else {
                $div1 = "hidden";
                $div2 = "visible";
            }
            ?>
            <div class="produced" style="visibility: <?= $div1?>">
                <a href="<?= base_url() ?>catalogo/eliminarCarrito" style="visibility: <?= $visible ?>" class="btn btn-danger">Cancelar Orden</a>
                <button type="submit" class="hvr-skew-backward" style="visibility: <?= $visible ?>">Enviar Orden de productos</button>
            </div>
            <div style="visibility: <?= $div2?>">
                <h3>Debe iniciar sesión para enviar orden de productos.</h3>
            </div>
        </form>
        <br/><br/>
    </div>
</div>
<br/><br/>
