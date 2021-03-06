<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php wp_title(); ?></title>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon-16x16.png" sizes="16x16" />
        <?php wp_head(); ?>
        <style>
            @font-face {
                font-family: vagRounded;
                src: url(<?php echo get_template_directory_uri(); ?>/fonts/VAGRoundedStd-Thin.otf);
            }
            @font-face {
                font-family: Orator;
                src: url(<?php echo get_template_directory_uri(); ?>/fonts/OratorStd.otf);
            }
            body{
                font-family: 'vagRounded', sans-serif;
                overflow: hidden;
            }
            footer{
                background-image: url(<?php echo get_template_directory_uri(); ?>/images/orangine-header-background.png);
                background-position: center bottom;
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            footer h3{
                font-size: 18px;
                margin: 12px 0;
            }
            footer .footer-column-container{
                padding-top:36px;
            }
            .orangine-wrapper{
                opacity: 0;
            }
            .orangine-loader{
                width: 100%;
                height: 100vh;
                display: flex;
                align-content: center;
                justify-content: center;
                background: white;
            }
            .loader-gif{
                margin: auto;
            }
            .item{
                display: flex; 
                background-repeat: no-repeat; 
                background-position: center;
                background-size: cover;
            }
            .orangine-navbar{
                background: rgba(255,255,255,0.6);
                background: -moz-linear-gradient(top, rgba(255,255,255,0.6) 0%, rgba(255,255,255,0) 100%);
                background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,0.6)), color-stop(100%, rgba(255,255,255,0)));
                background: -webkit-linear-gradient(top, rgba(255,255,255,0.6) 0%, rgba(255,255,255,0) 100%);
                background: -o-linear-gradient(top, rgba(255,255,255,0.6) 0%, rgba(255,255,255,0) 100%);
                background: -ms-linear-gradient(top, rgba(255,255,255,0.6) 0%, rgba(255,255,255,0) 100%);
                background: linear-gradient(to bottom, rgba(255,255,255,0.6) 0%, rgba(255,255,255,0) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff', GradientType=0 );
                position: fixed;
                width: 100%;
                top: 0;
            }
            .set-small.orangine-navbar{
                position: fixed;
                top:0;
                z-index: 99999;
                width: 100%;
                background-image: url(<?php echo get_template_directory_uri(); ?>/images/orangine-header-background.png);
                background-position: center bottom;
                transition: background ease-in .2s;
                height: 80px;
            }
            .navbar{
                background: none;
                border: none;
                border-radius: 0px;
            }
            .navbar-default .navbar-nav>li>a{
                color: #001B7A;
                font-size: 14px;
                font-weight: bold;
                padding: 6px 3px;
                padding-top: 10px;
                display: inline-block;
                margin-left: 18px;
                background: none;
                transition: background ease-in .2s;
                font-family: 'Orator', sans-serif;
                text-transform: uppercase;
            }
            .navbar-default .navbar-nav>li>a:hover{
                color: #e55100;
            }
            .set-small .navbar-default .navbar-nav>li>a{
                color: white;
            }
            .navbar-nav>li>.dropdown-menu{
                border-top-left-radius: 0px; 
                border-top-right-radius: 0px; 
                padding: 0 0;
            }
            .navbar-nav>li>.dropdown-menu>li>.dropdown-menu{
                transform: translateX(150px) translateY(-20px);
                border-top-left-radius: 0px; 
                border-top-right-radius: 0px; 
                padding: 0 0;
            }
            /*.navbar-default .navbar-nav>li:after{
            content: '|';
            display: inline-block;
            margin-right: 5px;
            position: absolute;
            top: 5px;
            }*/
            .navbar-default .navbar-nav>li:last-child:after{
                display: none;
            }
            .set-small .navbar-default .navbar-nav>li:after{
                color: white;
            }
            .set-small .navbar-default .navbar-nav>li>a:hover,.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover{
                color: white;
                background: rgba(42,64,149,1);
                background: -moz-linear-gradient(left, rgba(42,64,149,1) 0%, rgba(255,76,3,1) 25%, rgba(255,76,3,1) 50%, rgba(255,76,3,1) 75%, rgba(42,64,149,1) 100%);
                background: -webkit-gradient(left top, right top, color-stop(0%, rgba(42,64,149,1)), color-stop(25%, rgba(255,76,3,1)), color-stop(50%, rgba(255,76,3,1)), color-stop(75%, rgba(255,76,3,1)), color-stop(100%, rgba(42,64,149,1)));
                background: -webkit-linear-gradient(left, rgba(42,64,149,1) 0%, rgba(255,76,3,1) 25%, rgba(255,76,3,1) 50%, rgba(255,76,3,1) 75%, rgba(42,64,149,1) 100%);
                background: -o-linear-gradient(left, rgba(42,64,149,1) 0%, rgba(255,76,3,1) 25%, rgba(255,76,3,1) 50%, rgba(255,76,3,1) 75%, rgba(42,64,149,1) 100%);
                background: -ms-linear-gradient(left, rgba(42,64,149,1) 0%, rgba(255,76,3,1) 25%, rgba(255,76,3,1) 50%, rgba(255,76,3,1) 75%, rgba(42,64,149,1) 100%);
                background: linear-gradient(to right, rgba(42,64,149,1) 0%, rgba(255,76,3,1) 25%, rgba(255,76,3,1) 50%, rgba(255,76,3,1) 75%, rgba(42,64,149,1) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#2a4095', endColorstr='#2a4095', GradientType=1 );
                box-shadow: 0px 0px 17px black;
            }
            li.is-cart a,.home-grid-cart-icon{
                color: transparent!important;
                width: 48px;
                height: 48px;
                background-image: url(<?php echo get_template_directory_uri(); ?>/images/carrito-comprar.png)!important;
                background-repeat: no-repeat;
                cursor: pointer;
                background-size: contain!important;
                margin-top: -10px;
                margin-left: 16px;
            }
            li.is-cart a:hover, li.is-cart.active a,.home-grid-cart-icon{
                box-shadow: none!important;
                color: transparent!important;
            }
            .navbar-cart-icon{
                display: block;
                margin-top: 36px;
                transition: all ease-in .2s;
            }
            .set-small .navbar-cart-icon{
                margin-top: 23px;
                position: absolute;
                left: 0px;
                max-width: 46px;
            }
            .dropdown-menu li.active a, .dropdown-menu li:hover a{
                background-color: #FF4E00;
            }
            .orangine-logo-link{
                margin-top: 18px;
                z-index: 99;
                position: relative;
                transition: all ease-in .2s;
            }
            .set-small .orangine-logo-link{
                margin-top: -8px;
            }
            .orangine-logo-link img{
                max-width: 120px;
                width: 100%;
                transition: all ease-in .5s;
            }
            .set-small .orangine-logo-link img{
                width: 60px;
            }
            .servicio-al-cliente-texto, .text-shadow-orange{
                text-shadow: 1px 1px 2px rgba(255, 128, 0, 0.7);
            }
            .contact-info{
                margin-bottom: 36px;
                z-index: -1;
            }
            .set-small .contact-info{                
                display: none;
            }
            .orangine-menu-items{
                margin-top: 0px;
                transition: all ease-in .2s;
                margin-right: 15px;
            }
            @media screen and (min-width: 768px){
                .set-small .orangine-menu-items{
                    margin-top: 26px;
                    margin-bottom: 10px;
                    margin-right: 80px;
                }
            }
            .orange-bar{
                background-color: #ff4e00;
                position: absolute;
                height: 40px;
                top: 44%;
                width: 100%;
                display:block;
                z-index: 1;
            }
            .set-small .orange-bar{
                display:none;
            }
            .search-and-social-links{
                font-size: 24px;
                padding-top: 4px;
                margin-top: 36px;
            }
            .search-and-social-links a{
                color: white;                
            }
            .set-small .search-and-social-links{
                display: none;
            }
            .home-product-container{
                position: relative;
                padding: 0px;
                overflow: hidden;
            }
            .home-product-container img{
                width: 100%;
                transform: scale(1);
                transition: all ease-in .2s;
            }
            .home-product-container:hover img{
                transform: scale(1.2);
            }
            .home-grid-cart-icon{
                position: absolute;
                bottom: 12px;
                right: 18px;
                width: 58px;
                height: 58px;
            }
            .home-grid-cart-icon.tower{
                top: 30px;
            }
            .contact-form{
                margin-top: 72px;
            }
            .contact-form label{
                font-size: 14px;
            }
            .contact-form input,.contact-form textarea{
                margin-bottom: 36px;
            }
            /* Carrusel */
            .carousel-container{
                height: 100vh;
                position: relative;
            }
            .scroll-indicator{
                position: absolute;
                bottom: 12px;
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            @keyframes bubblesUpdown{
                0%{
                    transform: translateY(0);
                }
                30%{
                    transform: translateY(-10px);
                }
                60%{
                    transform: translateY(10px);
                }
                100%{
                    transform: translateY(0);
                }
            }
            .bubbles{
                -webkit-animation-name: bubblesUpdown;
                animation-name: bubblesUpdown;
                -webkit-transform-origin: center bottom;
                transform-origin: center bottom;
                -webkit-animation-duration: 1s;
                animation-duration: 1s;
                -webkit-animation-iteration-count: infinite;
                animation-iteration-count: infinite;
            }
            .carousel-container .item{
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                height: 100vh;
            }
            .navbar-collapse.in{
                overflow: hidden;
                border: none;
            }
            @media screen and (max-width: 768px){
                .navbar-nav>li>.dropdown-menu>li>.dropdown-menu{
                    transform: translateX(40px) translateY(0px);
                }
            }
            @media screen and (min-width: 700px) and (max-width: 800px){
                .set-small .orangine-menu-items{
                    position: absolute;
                    top: 0;
                    left: -50px;
                    width: 100vw;
                    font-size: 8px;
                }
                .navbar-default .navbar-nav>li>a{
                    font-size: 12px;
                    margin-left: 5px;
                }
                .set-small .navbar-default .navbar-nav>li>a{
                    font-size: 12px;
                    margin-left: 8px;
                }
                .set-small .navbar-cart-icon{
                    margin-top: 18px;
                    position: absolute;
                    left: 50px;
                    max-width: 46px;
                    display: block;
                    z-index: 99999;
                }
                .set-small .navbar-cart-icon img{
                    width: 100%;

                }
            }
            .orange-footer-links a,.orange-footer-links a:hover{
                color: white;
                text-decoration: none;
            }
            .telefono-orangine{
                text-transform: uppercase; 
                font-size: 28px; 
                line-height: 1;
            }
            .call-center-img{
                width: 60px;
                margin: 10px auto; 
                margin-top: 40px;
            }
            @media screen and (min-width: 1000px) and (max-width: 1040px){
                .telefono-orangine{
                    font-size: 22px; 
                }   
                .call-center-img{
                    width: 40px;
                    margin-top: 20px;
                }
                .orangine-inner-navbar{
                    width: 100vw;
                    transform: translateX(-80px);
                }
                .orangine-menu-items{
                    float:left!important;
                }
                .set-small .orangine-menu-items{
                    transform: translateX(-50px);
                }
            }
        </style>
    </head>

    <body <?php body_class(isset($class) ? $class : ''); ?>>
        <div class="orangine-wrapper">
            <div class="orangine-navbar navbar-fixed-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-2 col-md-4 hidden-xs">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="navbar-brand orangine-logo-link pull-right" href="<?php echo home_url(); ?>">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Orangine Logo" title="Disfruta Orangine!" width="150" class="img-responsive">
                                    </a>  
                                </div>
                                <div class="col-md-8 hidden-xs hidden-sm">
                                    <div class="contact-info">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <img class="call-center-img pull-right" src="<?php echo get_template_directory_uri(); ?>/images/call-center.png" alt="Telefono Oralgine" style="">
                                            </div>
                                            <div class="col-xs-9">
                                                <p><span class="servicio-al-cliente-texto" style="text-transform: uppercase; margin-top: 18px; color: white; font-size: 12px; display: block;"><span class="telefono-orangine">1800 008 008</span><br />Servicio a domicilio</span></p>
                                                <p><span class="servicio-al-cliente-texto" style="text-transform: uppercase; margin-top: 9px; color: white; font-size: 12px;"><span class="telefono-orangine">02 2628 871</span><br />Tel&eacute;fono</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-8">
                            <div class="row">
                                <div class="col-xs-12 text-right">
                                    <div class="row hidden-xs">
                                        <div class="col-sm-10 col-md-11">
                                            <ul class="list-inline search-and-social-links text-shadow-orange">
                                                <?php 
                                                $contacto = get_page_by_path('contactos');
                                                $facebook = get_post_meta( $contacto->ID, 'orangine__facebook', true);
                                                $instagram = get_post_meta( $contacto->ID, 'orangine__instagram', true);
                                                $youtube = get_post_meta( $contacto->ID, 'orangine__youtube', true);

                                                if ($facebook){
                                                    echo '<li><a href="'.$facebook.'" target="_blank"><span class="fa fa-facebook"></span></a></li>';
                                                }
                                                if ($instagram){
                                                    echo '<li><a href="'.$instagram.'" target="_blank"><span class="fa fa-twitter"></span></a></li>';
                                                }
                                                if ($youtube){
                                                    echo '<li><a href="'.$youtube.'" target="_blank"><span class="fa fa-youtube"></span></a></li>';
                                                }
                                                ?>
                                                <li><a href="#" data-toggle="modal" data-target="#searcher"><span class="fa fa-search"></span></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-2 col-md-1">
                                            <!-- http://orangine.com.ec/realizar-pedido/ -->
                                            <a href="<?php echo home_url('realizar-pedido'); ?>" class="navbar-cart-icon">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/carrito-comprar.png" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 text-right">
                                    <nav class="navbar navbar-default" role="navigation">
                                        <!-- Brand and toggle get grouped for better mobile display -->
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                        </div>

                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                        <div class="collapse navbar-collapse">
                                            <?php 
                                            /*wp_nav_menu( array(
                                                    'menu' => 'Main', 
                                                    'menu_class' => 'nav navbar-nav navbar-right orangine-menu-items', 
                                                    'depth'=> 4, 
                                                    'container'=> false, 
                                                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                                    'walker'            => new WP_Bootstrap_Navwalker(),
                                                )); */
                                            wp_nav_menu( array(
                                                'theme_location'    => 'main_menu',
                                                'depth'             => 4,
                                                'container'         => 'div',
                                                'container_class'   => 'collapse navbar-collapse orangine-inner-navbar',
                                                'container_id'      => 'bs-example-navbar-collapse-1',
                                                'menu_class'        => 'nav navbar-nav navbar-right orangine-menu-items',
                                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                                'walker'            => new WP_Bootstrap_Navwalker(),
                                            ) );
                                            ?>
                                        </div><!-- /.navbar-collapse -->
                                    </nav>                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="main-container" class="orangine-master">