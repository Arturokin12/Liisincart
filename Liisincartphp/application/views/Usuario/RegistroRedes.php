<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Liisin</title>
        <!-- Bootstrap files -->
        <link href="<?= base_url() ?>../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Styles -->
        <link href="<?= base_url() ?>../css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?= base_url() ?>../css/paso.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Fonts -->
        <link href="<?= base_url() ?>../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?= base_url() ?>../css/font-awesome.min.css" rel="stylesheet" media="screen">
        <script src="<?= base_url() ?>../js/jquery.min.js"></script>
        <link href="<?= base_url() ?>../css/Jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="<?= base_url() ?>../js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>../js/jquery.min.js"></script>
        <script src="<?= base_url() ?>../css/Jquery-ui/jquery-ui.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>../js/simpleCart.min.js"></script>
        <script type="text/javascript">
            var base_url = '<?= base_url() ?>';
        </script>
        <!--- Light Box ---->
        <link rel="stylesheet" href="<?= base_url() ?>../css/reset.css" type="text/css" media="screen" charset="utf-8">
    </head>

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
        });
        $(function () {
            $("#formRedes").submit(function (event) {
                event.preventDefault();
                var form = new FormData(document.getElementById('formRedes'));
                var nombre = document.getElementById('txtNombre').value;
                var correo = document.getElementById('txtCorreo').value;
                var telefono = document.getElementById('txtTelefono').value;
                var pass1 = document.getElementById('txtPass1').value;
                var pass2 = document.getElementById('txtPass2').value;
                if (pass2 == pass1) {
//                    form.append('nombre', nombre);
//                    form.append('correo', correo);
//                    form.append('telefono', telefono);
//                    form.append('pass', pass2);
                    $.ajax({
                        url: base_url + 'ControladorCliente/RegistroRedes',
                        type: 'POST',
                        dataType: 'json',
                        data: {nombre : nombre, correo : correo, telefono : telefono, pass : pass2},
                        success: function (vector) {
                            location.href = base_url+"ControladorCliente/index";
                        }
                    });
                } else {
                    $("#modal").html("<p>Las contraseñas no coinciden</p>");
                    $("#modal").dialog("open");
                }
            });
        });

    </script>
    <body>
        <section class="container flex-container">
            <div class="flex-item">
                <img class="img-logo" src="<?= base_url() ?>../images/logo.png" alt="">
                <div class="lijntje"></div>
                <h1 class="evento">¡Sólo un paso más para registrarte <?= $usuario['Nombre'] ?>!</h1>
                <form id="formRedes" method="POST">
                    <div style="width: 600px;margin: 0 auto">
                        <input class="form-control hidden" type="text" value="<?= $usuario['Nombre'] ?>" id="txtNombre" >
                        <input class="form-control hidden" type="text" value="<?= $usuario['correo'] ?>" id="txtCorreo">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Telefono</label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="txtTelefono">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Contraseña</label>
                            <div class="col-10">
                                <input class="form-control" type="password" value="" id="txtPass1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Confirmar Contraseña</label>
                            <div class="col-10">
                                <input class="form-control" type="password" value="" id="txtPass2">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrarse!</button>
                </form>
                <a href="<?php echo rtrim(base_url(), "/") ?>">Cancelar</a>
            </div>
        </section>
        <section class="footer">
            <ul class="container">
                <li class="col-lg-2 col-lg-push-3 col-md-2 col-md-push-3 col-xs-4 col-sm-4"><a href="https://www.facebook.com/Liisin-626800804177581/" target='_blank'>Facebook</a></li>
                <li class="col-lg-2 col-lg-push-3 col-md-2 col-md-push-3 col-xs-4 col-sm-4"><a target="_blank" href="https://twitter.com/Liisin_App">Twitter</a></li>
                <li class="col-lg-2 col-lg-push-3 col-md-2 col-md-push-3 col-xs-4 col-sm-4"><a target="_blank" href="https://www.youtube.com/channel/UCyWLZoVhpsGof6MvLC-EsqA" target='_blank'>Youtube</a></li>
            </ul>
        </section>
        <div class="clearfix"></div>
        <div id="modal"></div>
    </body>

</html>