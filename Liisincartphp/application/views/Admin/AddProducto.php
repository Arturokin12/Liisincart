<script>
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
        var img = JSON.stringify(imagenesArray);
        $.ajax({
            url: base_url + 'ControladorAdmin/addProducto',
            type: 'POST',
            dataType: 'json',
            data: {descripcion: des, detalles: desc2, precio: precio, tipo: tipo, imagenes: img, state: estado},
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
</script>
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
                    <?php foreach ($datos as $value) { ?>
                        <option value="<?php echo $value->nombre ?>"><?php echo $value->nombre ?></option>
                    <?php } ?>
                </select> 
            </div>
            <div class="form-group">
                <label>Imágenes: </label>
                <form method="POST" id="upload_form" action="">
                    <label for="btSubirImagen">Imagen 1:</label><input type="file" style="display: inline" accept="image/*" name="userfile" id="userfile" /><br /><br />
                    <input type="submit" name="btSubirImagen" id="btSubirImagen" value="Subir imágen"/>
                </form>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <div id="imagenesAddProducto" class="row">

        </div>
        <br/>
        <button style="float: right;margin-right: 18%" type="submit" id="btCancelarAddProducto" class="btn btn-danger" >Cancelar</button>
        <button style="float: right;margin-right: 1%" type="submit" id="btAgregarProducto" class="btn btn-primary" onclick="guardarProducto()">Agregar</button>

    </div>
</div>
