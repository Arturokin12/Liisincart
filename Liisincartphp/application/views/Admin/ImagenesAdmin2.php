<div>
    <div class="row">
        <?php foreach ($imagenes as $val) { ?>
            <div class="col-md-2" style="text-align: center;padding: ">
                <img id="imgProductos" src="<?php echo base_url()."../".$val->ruta ?>" height="100px" width="100px" style="margin: 0 auto;margin-left: 0px"/>
            </div>
        <?php } ?>
    </div>
</div>