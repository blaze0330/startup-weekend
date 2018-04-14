<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>SexPrise - Todo lo que te imaginas estará al alcance de tu mano.</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
          content="..."/>
    <meta name="keywords"
          content="..."/>
    <meta name="author" content="SexPrise"/>
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.png"/>
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.png"/>
    <link rel="stylesheet" href="/assets/libs/bootstrap/css/bootstrap.min.css" media="all"/>
    <link rel="stylesheet" href="/assets/libs/fontawesome/css/font-awesome.min.css" media="all"/>
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700%7cLato:300,400,700"/>
    <link rel="stylesheet" href="/assets/libs/owlcarousel/owl.carousel.min.css" media="all"/>
    <link rel="stylesheet" href="/assets/libs/owlcarousel/owl.theme.default.min.css" media="all"/>
    <link rel="stylesheet" href="/assets/libs/maginificpopup/magnific-popup.css" media="all"/>
    <link id="csi-master-style" rel="stylesheet" href="/assets/css/style-default.min.css" media="all"/>
    <link id="csi-master-style" rel="stylesheet" href="/assets/css/custom.css" media="all"/>
    <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body class="home">

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<div class="csi-container ">
    <header>
        <div id="csi-header" class="csi-header csi-banner-header">
            <div class="csi-header-bottom menu-onscroll">
                <div class="container" style="width: 100%;">
                    <div class="row">
                        <div class="col-xs-12" style="padding: 0px;">
                            <nav class="navbar navbar-default csi-navbar" id="menuTop">
                                <div class="csicontainer">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                                data-target=".navbar-collapse">
                                            <span class="sr-only">Cambiar Navegación</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <div class="csi-logo">
                                            <a href="/#home">
                                                <img src="/assets/img/logo-new.png" alt="Logo"
                                                     style="padding-bottom: 5px;width: 213px;margin-top: 0;margin-left: 8px;"/>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="collapse navbar-collapse">
                                        <ul class="nav navbar-nav csi-nav">
                                            <li><a href="/#home" class="active">INICIO</a></li>
                                            <li><a href="/#quienesSomos">¿QUIÉNES SOMOS?</a></li>
                                            <li><a href="/#faqs">PREGUNTAS FRECUENTES</a></li>
                                            <li><a href="/#hazTuPedido">HAZ TU PEDIDO</a></li>
                                            <li><a href="/#contacto">CONTACTO</a></li>
                                        </ul>
                                    </div>
                                    <!--/.nav-collapse -->
                                </div>
                            </nav>
                        </div>
                    </div>
                    <!--//.ROW-->
                </div>
                <!-- //.CONTAINER -->
            </div>
            <!-- //.INNER-->
        </div>
    </header>
    <style>
        .csi-header .menu-onscroll .csi-navbar .csi-logo a img {
            max-width: 291px;
            margin-top: -8px;
        }
    </style>
    <!--HEADER END-->
@yield('content')
<!--FOOTER-->
    <footer id="contacto">
        <div id="csi-footer" class="csi-footer">
            <div class="csi-inner-bg">
                <div class="csi-inner">
                    <div class="csi-footer-middle">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="csi-footer-logo">
                                        <a class="logo" href="/"><img src="/assets/img/logo-new.png" alt="Logo"></a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <div class="csi-footer-single-area">
                                        <div class="csi-footer-single">
                                            <h3 class="footer-title">Ubicación y Contacto</h3>
                                            <h4 class="date">
                                                -
                                            </h4>
                                            <address>
                                                -
                                            </address>
                                        </div>
                                        <div class="csi-footer-single">
                                            <h3 class="footer-title">Nuestras Redes Sociales</h3>
                                            <p class="text">
                                                Síguenos para estar pendiente <br>de las actualizaciones
                                            </p>
                                            <ul class="list-inline csi-social">
                                                <li><a href="#" target="_blank"><i
                                                                class="fa fa-facebook"
                                                                aria-hidden="true"></i></a>
                                                </li>
                                                <li><a href="#" target="_blank"><i
                                                                class="fa fa-twitter"
                                                                aria-hidden="true"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                       target="_blank">
                                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                <!--<div class="csi-subscriber">
                                    <h3 class="footer-title">Suscríbete y </h3>
                                    <form class="subscribe-form csi-subscribe-form">
                                        <div class="form-group form-group-email">
                                            <input type="email" id="subscribe" placeholder="Ex: themearth@gmail.com"
                                                   class="form-control csi-input-form form-control"/>
                                        </div>
                                        <div class="form-group form-group-submit">
                                            <button type="submit" name="csi-submit" id="csi-submit"
                                                    class="csi-btn csi-submit"><span>Subscribe</span></button>
                                        </div>
                                    </form>
                                </div>-->
                                    <div class="csi-copyright">
                                        <p class="text">
                                            © <?= date('Y') ?> &copy; SEXPRISE All Rights Reserved.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="/assets/libs/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/libs/jquery.validate.js"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzfNvH2kifJQ0PhBIyuuG-swdkW1NPQVE"></script>
<script type="text/javascript" src="/assets/libs/gmap/jquery.googlemap.js"></script>
<script src="/assets/libs/owlcarousel/owl.carousel.min.js"></script>
<script src="/assets/libs/typed/typed.min.js"></script>
<script src="/assets/libs/countdown.js"></script>
<script src="assets/libs/jquery.smooth-scroll.min.js"></script>
<script src="assets/libs/jquery.easing.min.js"></script>
<script type="text/javascript" src="assets/libs/maginificpopup/jquery.magnific-popup.min.js"></script>
<script src="/assets/libs/jquery.smooth-scroll.min.js"></script>
<script src="/assets/libs/jquery.easing.min.js"></script>
<script src="/assets/js/custom.script.js"></script>
<script>
    $("#menuTop a").click(function () {
        var toElement = $(this).attr("href").replace("/", "");
        $('html, body').animate({
            scrollTop: $(toElement).offset().top
        });
    });
</script>
<style>
    @media screen and (max-width: 750px) {
        .csi-single-gallery {
            width: 50%;
        }
    }

    @media screen and (max-width: 400px) {
        .csi-single-gallery {
            width: 100%;
        }
    }
</style>
</body>
</html>