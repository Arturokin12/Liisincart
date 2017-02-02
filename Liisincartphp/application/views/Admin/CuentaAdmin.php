<div>
    <div class="panel panel-primary">
        <?php
        $consulta = "select * from usuario where rol = 'admin'";
        $users = $this->db->query($consulta)->result();
        foreach ($users as $value) {
            $admin = $value;
        }
        ?>
        <div class="panel-heading">
            <h2>Configurar Cuenta Administrador</h2>
        </div>
        <script>

            $("#modalAdmin").dialog({
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
            $(function () {
                $("#formCuentaAdmin").submit(function (event) {
                    event.preventDefault();
                    $.ajax({
                        url: $("form").attr("action"),
                        type: $("form").attr("method"),
                        data: $("form").serialize(),
                        dataType: 'JSON',
                        success: function (vector) {
                            if (vector.Error == true) {
                                $("#modalAdmin").html(vector.Mensaje);
                                $("#modalAdmin").dialog("open");
                                cargarPagina('Admin/CuentaAdmin', 'divIndexAdmin', 'fade')
                            } else {
                                $("#modalAdmin").html(vector.Mensaje);
                                $("#modalAdmin").dialog("open");
                            }
                        }
                    });
                });

            });
        </script>
        <form method="POST" action="<?= base_url() ?>ControladorAdmin/EditarAdmin" id="formCuentaAdmin">
            <div class="panel-body">
                <div class="form-group">
                    <label for="txtNombre">Nombre: </label>
                    <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Email" value="<?= $admin->Nombre ?>">
                </div>
                <div class="form-group">
                    <label for="txtCorreo">E-Mail: </label>
                    <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" placeholder="Correo electrónico" value="<?= $admin->correo ?>"> 
                </div>
                <div class="form-group">
                    <label for="txtPass1">Contraseña: </label>
                    <input type="password" class="form-control" id="txtPass1" name="txtPass1" placeholder="Contraseña">
                </div>
                <div class="form-group">
                    <label for="txtPass2">Ingrese nuevamente: </label>
                    <input type="password" class="form-control" id="txtPass2" name="txtPass2" placeholder="Contraseña">
                </div>
                <div class="form-group">
                    <label for="txtTelefono">Teléfono: </label>
                    <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Teléfono" value="<?= $admin->telefono ?>">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>

    </div>
</div>
<div id="modalAdmin">cacaaaa</div>
