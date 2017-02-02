<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Liisin</title>
        <!-- Bootstrap files -->
        <link href="<?=  base_url()?>../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Styles -->
        <link href="<?=  base_url()?>../css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?=  base_url()?>../css/paso.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="<?=  base_url()?>../css/font-awesome.min.css" rel="stylesheet" media="screen">
        <!--- Light Box ---->
        <link rel="stylesheet" href="<?=  base_url()?>../css/reset.css" type="text/css" media="screen" charset="utf-8">
    </head>

    <body>
        <section class="container flex-container">
            <div class="flex-item">
                <img class="img-logo" src="<?=  base_url()?>../images/logo.png" alt="">
                <div class="lijntje"></div>
                <h1 class="evento">Tu Orden ha sido registrada satisfactoriamente! puede esperar la respuesta del administrador.</h1>
                <a href="<?php echo rtrim(base_url(), "/") ?>">Volver al Inicio</a>
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
        <script src="<?=  base_url()?>../js/jquery.min.js"></script>
        <script src="<?=  base_url()?>../js/bootstrap.min.js"></script>
        <script src="<?=  base_url()?>../js/paso.js"></script>
    </body>

</html>