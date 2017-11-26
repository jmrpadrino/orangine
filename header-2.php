<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php wp_title(); ?></title>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
        <style>
            body{
                font-family: 'Arial', sans-serif;
                overflow: hidden;
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
                background: #FF9800;
                transition: background ease-in .2s;
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
                padding-bottom: 6px;
                padding-top: 6px;
                background: none;
                transition: background ease-in .2s;
            }
            .navbar-default .navbar-nav>li>a:hover{
                color: #e55100;
            }
            .set-small .navbar-default .navbar-nav>li>a{
                color: white;
            }
            .navbar-nav>li>.dropdown-menu{
                border-top-left-radius: 4px; 
                border-top-right-radius: 4px; 
            }
            .navbar-default .navbar-nav>li:after{
                content: '|';
                display: inline-block;
                margin-right: 5px;
                position: absolute;
                top: 5px;
            }
            .set-small .navbar-default .navbar-nav>li:after{
                color: white;
            }
            /*.navbar-default .navbar-nav>li>a:hover,.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover{
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
            }*/
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
                margin-top: 0px;
            }
            .orangine-logo-link img{
                width: 150px;
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
            }
            .set-small .orangine-menu-items{
                margin-top: 30px;
                margin-bottom: 10px;
                margin-right: 80px;
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
                transform: scale(1);
                transition: all ease-in .2s;
            }
            .home-product-container:hover img{
                transform: scale(1.2);
            }
            .home-grid-cart-icon{
                position: absolute;
                bottom: 40px;
                right: 40px;
                width: 42px;
                height: 42px;
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
            }
            .carousel-container .item{
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                height: 100vh;
            }
        </style>
    </head>

    <body <?php body_class(isset($class) ? $class : ''); ?>>
        <div class="orangine-wrapper">
            <div class="orangine-navbar navbar-fixed-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="row">
                                <div class="col-xs-4">
                                    <a class="navbar-brand orangine-logo-link pull-right" href="<?php echo home_url(); ?>">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Orangine Logo" title="Disfruta Orangine!" width="150" class="img-responsive">
                                    </a>  
                                </div>
                                <div class="col-xs-8">
                                    <div class="contact-info">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/call-center.png" width="60" alt="Telefono Oralgine" style="float:left; margin: 10px auto; margin-right: 18px; margin-top: 20px;">
                                        <span class="servicio-al-cliente-texto" style="float: left; text-transform: uppercase; margin-top: 18px; color: white; font-size: 12px;"><span class="telefono-oralgine" style="text-transform: uppercase; font-size: 28px; line-height: 1;">1800 008 008</span><br />Servicio al Cliente</span>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="col-xs-8">
                            <div class="row">
                                <div class="col-xs-12 text-right">
                                    <div class="row">
                                        <div class="col-xs-11">
                                            <ul class="list-inline search-and-social-links text-shadow-orange">
                                                <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                                <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                                                <li><a href="#"><span class="fa fa-youtube"></span></a></li>
                                                <li><a href="#"><span class="fa fa-search"></span></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-1">
                                            <a href="<?php echo home_url('cart'); ?>" class="navbar-cart-icon">
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
                                            <?php wp_nav_menu( array('menu' => 'Main', 'menu_class' => 'nav navbar-nav navbar-right pull-right orangine-menu-items', 'depth'=> 3, 'container'=> false, 'walker'=> new Bootstrap_Walker_Nav_Menu)); ?>
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