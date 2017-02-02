<div>
    <script>
        $(function () {
            $("#formMail").submit(function (event) {
                event.preventDefault();
                $.ajax({
                    url: $("form").attr("action"),
                    type: $("form").attr("method"),
                    data: $("form").serialize(),
                    dataType: 'JSON',
                    success: function (vector) {
                        if (vector.Error == true) {
                            $("#modal").html(vector.Mensaje);
                            $("#modal").dialog("open");
                            cargarPagina('Admin/CuentaAdmin', 'divIndexAdmin', 'fade')
                        } else {
                            $("#modal").html(vector.Mensaje);
                            $("#modal").dialog("open");
                        }
                    }
                });
            });

        });
    </script>
    <form action="<?= base_url() ?>ControladorAdmin/editarCorreo" id="formMail" method="POST">
        <?php
        $res = $this->db->query("select * from mail where id_mail = 1")->result();
        foreach ($res as $value) {
            $correo = $value;
        }
        ?>
        <div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Configurar Correo para envío de Mails</h1>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="txtCorreo">Correo electrónico: </label>
                        <input type="text" id="txtCorreo" name="txtCorreo" class="form-control" value="<?= $correo->mail ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="txtPass1">Contraseña: </label>
                        <input type="password" id="txtCorreo" name="txtPass1" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="txtPass2">Confirmar Contraseña: </label>
                        <input type="password" id="txtCorreo" name="txtPass2" class="form-control"/>
                    </div>
                    <button type="submit" id="btGuardarCorreo" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>



