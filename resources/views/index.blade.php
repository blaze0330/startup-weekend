@extends('layouts.app')
@section('content')

    <!--Banner-->
    <section id="home">
        <div style="width:100%;max-width:100%; margin-top: 80px;">
            <img class="mySlides" src="/assets/img/Baner-1.png" style="width:100%;">
        </div>
    </section>
    <!--Banner END-->

    <!--ABOUT-->
    <section id="quienesSomos">
        <div id="csi-about" class="csi-about">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-7 text-justify">
                            <b>¿QUIÉNES SOMOS?</b><br>
                            ...
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <div class="csi-about-content-area">
                                <div class="csi-about-content text-left text-justify" style="text-align: justify;">
                                    <b>MISION:</b><br>...
                                    <br><br>
                                    <b>VISIÓN:</b><br> ...
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 text-justify">
                            <b>OBJETIVOS</b><br>
                            <ul class="text-justify">
                                <li>
                                    ...
                                </li>
                                <li>
                                    ...
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--ABOUT END-->

    <!--countdown-->
    <section id="faqs">
        <div id="csi-countdowns" class="csi-countdowns3">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-heading  csi-heading-white">
                                <h2 class="heading">PREGUNTAS FRECUENTES</h2>
                                <h3 class="subheading" style="margin-top: -10px;opacity: 1;">
                                    ...
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-justify" style="color: white;">
                            <b>...</b> ...
                            <br><br>
                            ...
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--countdown END-->


    <!--SPEAKERS-->
    <section id="hazTuPedido">
        <div id="csi-speakers" class="csi-speakers csi-speakers2">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-heading  csi-heading-white">
                                <h2 class="heading">HAZ TU PEDIDO</h2>
                                <h3 class="subheading" style="opacity: 1;">...</h3>
                            </div>
                        </div>
                    </div>
                    <!--//.ROW-->
                    <div class="row">
                        <div class="col-xs-12 text-justify" style="color: white;">
                            ...
                            <div class="text-center">
                                <div class="btn-area">
                                    <a class="csi-btn csi-btn-brand"
                                       href="#"
                                       target="_blank">HACER EL PEDIDO</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- //.CONTAINER -->
            </div>
            <!-- //.INNER -->
        </div>
    </section>
    <!--SPEAKERS END-->

    <style>
        .csi-single-gallery figure img {
            height: 226px;
            width: 100%;
        }
    </style>
@endsection
