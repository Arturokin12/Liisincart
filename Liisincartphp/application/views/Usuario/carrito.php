<div class="cart box_1">
    <?php
    $carrito = $this->cart->contents();
    $cantidad = "";
    $precio = 0;
    foreach ($carrito as $value) {
     $precio = $precio + $value["price"];
}
    if (count($carrito) > 0) {
        $cantidad = count($carrito) . " Productos en el carro";
    } else {
        $cantidad = "No hay elementos";
    }
    ?>
    <a href="#" onclick="cargarPagina('Usuario/checkout', 'divIndex', 'fade')">
        <h3> 
            <div class="total">
                <span class="simpleCart_total">$<?=$precio?></span>
            </div>
            <img class="imgcart" src="<?=  base_url()?>../images/cart.png" alt=""/>
        </h3> </a>
    <p><a href="javascript:;" class="simpleCart_empty"><?= $cantidad ?></a></p>
</div>

