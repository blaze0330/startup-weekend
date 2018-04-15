@extends('layouts.app')
@section('content')
    <!--Banner-->
    <section>
        <div class="csi-banner csi-banner-inner"
             style='background: url("https://media.istockphoto.com/vectors/hands-holding-discount-tag-sale-shopping-special-offer-banner-vector-id697465788?s=2048x2048") top center no-repeat;background-position-y: -200px;'>
            <div style="background: black;position: absolute;width: 100%;height: 100%;opacity: 0.8;"></div>
            <div class="csi-banner-style">
                <div class="csi-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="csi-heading-area">
                                    <div class="csi-heading">
                                        <h2 class="title">Haz tu Pedido</h2>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li><a href="/"><i class="icon-home6"></i>Inicio</a></li>
                                        <li class="active">Hacer Pedido</li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--//.ROW-->
                    </div>
                </div>
                <!-- //.INNER -->
            </div>
        </div>
    </section>
    <!--Banner END-->

    <style>
        .sexItems .sexItem {
            background: white;
            padding: 5px;
        }

        .sexItems .sexItemImage {
            width: 100%;
        }

        .sexItemText {
            color: black;
            font-size: 13pt;
            text-transform: uppercase;
        }
    </style>

    <!--ABOUT-->
    <section>
        <div id="csi-about" class="csi-about" style="background: #eaeaea;">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 col-md-12 text-center">
                            <div class="sexItems">
                                <div class="col-md-4">
                                    <div class="sexItem">
                                        <div class="sexItemImage">
                                            <img src="https://www.jugueterosa.com/media/catalog/product/cache/1/small_image/266x299/9df78eab33525d08d6e5fb8d27136e95/v/i/vibrador_con_estimulador_de_clitoris_rosa.jpg"
                                                 alt="product">
                                        </div>
                                        <div class="sexItemText">
                                            Vibrador con Estimulador<br>de Clitoris Rosa
                                        </div>
                                        <div class="sexItemCheckbox">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="sexItem">
                                        <div class="sexItemImage">
                                            <img src="https://www.jugueterosa.com/media/catalog/product/cache/1/small_image/266x299/9df78eab33525d08d6e5fb8d27136e95/s/h/shunga_pintura_corporal_de_chocolate.jpg"
                                                 alt="product">
                                        </div>
                                        <div class="sexItemText">
                                            Shunga pintura corporal<br>de chocolate
                                        </div>
                                        <div class="sexItemCheckbox">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="sexItem">
                                        <div class="sexItemImage">
                                            <img src="https://www.jugueterosa.com/media/catalog/product/cache/1/small_image/266x299/9df78eab33525d08d6e5fb8d27136e95/h/u/huevo_vibrador_10_velocidades_control_remoto_lila_grande.jpg"
                                                 alt="product">
                                        </div>
                                        <div class="sexItemText">
                                            Huevo vibrador 10 velocidades<br>control remoto lila grande
                                        </div>
                                        <div class="sexItemCheckbox">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--ABOUT END-->
    <script>
        jQuery(function () {
            jQuery("body").removeClass("home").addClass("page page-template");
        })
    </script>
@endsection
