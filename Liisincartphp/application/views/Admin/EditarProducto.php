<div class="panel-heading">
    <script>
        function editarProducto() {
            $.post(
                    base_url + "ControladorAdmin/editarProducto",
                    {
                        id: document.getElementById("id_producto").innerHTML,
                        descripcion: $("#txtDescripcionEdit").val(),
                        detalles: $("#txtDetallesEdit").val(),
                        tipo: $("#cbTipoEdit").val(),
                        precio: $("#txtPrecioEdit").val(),
                        imagenes: imagenesArray2,
                        estado: $("#cbEstadoEdit").val(),
                        videoYou: $("#txtVideoYou").val()
                    },
                    function (vector) {
                        if (vector.error == true) {
                            $("#modal").html(vector.mensaje);
                            $("#modal").dialog("open");
                        } else {
                            location.reload();
                        }
                    }, 'json'
                    );
        }
        ;

        var imagenesArray2 = [];
<?php foreach ($imagenes as $img) { ?>
            imagenesArray2.push('<?php echo $img->ruta ?>');
<?php } ?>
        $(function () {
            $("#upload_form2").submit(function (event) {
                event.preventDefault();
                //        var ajax = new XMLHttpRequest();
                //        var data = new FormData();
                //        data.append("userfile", document.getElementById("userfile").files[0]);
                //        ajax.open("POST", base_url + "upload/do_upload");
                //        ajax.send(data);
                if (imagenesArray2.length <= 2) {
                    var form = new FormData(document.getElementById('upload_form2'));
                    var file = document.getElementById('userfileEdit').files[0];
                    var id_prod = document.getElementById('id_producto').innerHTML
                    if (file) {
                        form.append('userfile', file);
                        form.append('id_prod', id_prod);
                    }
                    $.ajax({
                        url: base_url + 'upload/do_upload2/',
                        secureuri: false,
                        fileElementId: 'userfile',
                        type: 'POST',
                        dataType: 'json',
                        data: form,
                        contentType: false,
                        processData: false,
                        success: function (vector) {
                            if (vector.error == false) {
                                imagenesArray2.push(vector.imagen);
                                imagenesdivs2 = document.getElementById("divImagenes2");
                                imagenesdivs2.innerHTML = "";
                                for (var i = 0; i < imagenesArray2.length; i++) {
                                    var img = imagenesArray2[i].replace("ImagenesProductos/", '');
                                    var imagen2 = "<div class='col-md-2 item-grid1' style='text-align: center;padding: 0px'><img id='imgProductos' src='" + base_url + "../ImagenesProductos/" + img + "' height='150px' width='150px' style='margin: 0 auto;margin-left: 0px'/><button type='button' onclick='eliminarFotoEditar(" + vector.id_imagen + ", " + "&#39;" + img + "" + "&#39;)'><li class='fa fa-trash'></li></button></div>";
                                    imagenesdivs2.innerHTML = imagenesdivs2.innerHTML + "";
                                    alert(imagen2);
                                    imagenesdivs2.innerHTML = imagenesdivs2.innerHTML + imagen2;
                                }
                                document.getElementById("userfileEdit").value = "";
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

        function eliminarFotoEditar(id_foto, foto) {
            $.post(
                    base_url + "ControladorAdmin/eliminarFotoEditar",
                    {
                        id: id_foto
                    },
                    function (vector) {
                        if (vector.error == true) {
                            $("#labelRespuestaEdit").html(vector.mensaje);
                        } else {
                            for (var i = 0; i < imagenesArray2.length; i++) {
                                if (imagenesArray2[i] == foto) {
                                    var img = imagenesArray2[i];
                                    imagenesArray2.splice(img, 1);
                                }
                            }
//                            cargarPagina("Admin/EditarProducto", "modal2", "fade");
                            modalEditarProducto(document.getElementById("id_producto").innerHTML);
                        }
                    }
            );
        }
        ;

        function eliminarFotoEditar2(foto) {
            for (var i = 0; i < imagenesArray2.length; i++) {
                if (imagenesArray2[i] == foto) {
                    var img = imagenesArray2[i];
                    imagenesArray2.splice(img, 1);
                }
            }
        }
        ;
        $('#cbTipoEdit').val('<?= $tipo ?>');
        $('#cbEstadoEdit').val('<?= $state ?>');
    </script>
</div>
<div class="panel-body">
    <div class="row">
        <label id="id_producto" style="display: none;font-size: 14px"><?= $id_producto ?></label>
        <label style="float: top;display: inline;font-size: 14px;">Descripción: </label><textarea style="width: 30%;font-size: 14px;display: inline" id="txtDescripcionEdit" class="form-control" ><?php echo $Descripcion ?></textarea>
        <label style="float: top;display: inline;font-size: 14px;">Detalles: </label><textarea style="width: 30%;font-size: 14px;display: inline" id="txtDetallesEdit" class="form-control" ><?php echo $detalles ?></textarea>
        <br/><label style="display: inline;font-size: 14px;float: top;">Precio: </label><input style="display: inline;width: 13%;font-size: 14px" type="number" style="width: 150px" width="50px" id="txtPrecioEdit" class="form-control" value="<?php echo $precio ?>"/>
        <div class="form-group">
            <label for="txtVideo">Video Promocional de Youtube: </label>
            <input type="text" style="width: 150px" width="50px" id="txtVideoYou" name="txtVideoYou" class="form-control" value="<?=$video?>"/>
        </div>
        <label >Tipo: </label>
        <select id="cbTipoEdit" class="form-control" style="width:20%;display: inline">
            <option value="Seleccionar">Seleccionar</option>
            <option value="Venta">Venta</option>
            <option value="Renta">Renta</option>
        </select>
        <label for="cbEstado">Estado: </label>
        <select id="cbEstadoEdit" class="form-control" style="width:">
            <option value="Seleccionar" disabled="true">Seleccionar</option>
            <?php foreach ($states as $value) { ?>
                <option value="<?php echo $value->nombre ?>"><?php echo $value->nombre ?></option>
            <?php } ?>
        </select> 
        <form method="POST" id="upload_form2" action="">
            <br>
            <label style="display: inline;font-size: 14px">Imágenes: </label>
            <br/>
            <br/>
            <input style="display: inline;font-size: 14px" type="file" accept="image/*" id="userfileEdit" name="userfileEdit"/>
            <br/><br/>
            <input style="display: inline;font-size: 14px" type="submit" id="btSubirImagenes" class="btn btn-default" value="Subir Imagenes"/>
        </form>
        <div class="col-lg-2">
        </div>
    </div>
    <br/>
    <div>
        <div class="row" id="divImagenes2">
            <?php foreach ($imagenes as $val) { ?>
                <div class="col-md-2" style="text-align: center;padding: ">
                    <img id="imgProductos" src="<?php echo base_url() . "../" . $val->ruta ?>" height="100px" width="100px" style="margin: 0 auto;margin-left: 0px"/><button type="button" href="#" onclick="eliminarFotoEditar(<?= $val->id_imagen ?>, '<?php echo str_replace("ImagenesProductos/", "", $val->ruta) ?>')"><li class="fa fa-trash"></li></button>
                </div>
            <?php } ?>
        </div>
    </div>
    <label id="labelRespuestaEdit"></label>
    <br/>
</div>