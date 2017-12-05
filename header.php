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
                background-image: url(<?php echo get_template_directory_uri(); ?>/images/orangine-header-background.png);
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                color: white;
                position: relative;
            }
            .navbar{
                background: none;
                border: none;
                border-radius: 0px;
            }
            .orangine-menu-items .dropdown-menu{
                padding: 0px;
            }
            .dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover{
                color: white;
                font-weight: bold;
                background: #FF4E00;
            }
            .navbar-default .navbar-nav>li>a{
                color: white;
                text-transform: uppercase;
                padding-bottom: 6px;
                padding-top: 6px;
                background: none;
                transition: background ease-in .2s;
            }
            .navbar-nav>li>.dropdown-menu{
                border-top-left-radius: 0px; 
                border-top-right-radius: 0px; 
            }
            .navbar-default .navbar-nav>li>a:hover,.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover{
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
            /*.navbar-default .navbar-nav>li>a:hover,.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover{
                color: #FF4E00;
                font-weight: bold;
                background: none;
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
            .dropdown-menu li.active a, .dropdown-menu li:hover a{
                background-color: #FF4E00;
            }
            .orangine-logo-link{
                margin-top: 18px;
                display: block;
                min-height: 180px;
                z-index: 999999999;
                position: relative;
            }
            .contact-info{
                margin-bottom: 36px;
            }
            .orangine-menu-items{
                margin-top: 40px;
            }
            .orange-bar{
                background-color: #ff4e00;
                position: absolute;
                height: 40px;
                top: 44%;
                width: 100%;
                z-index: 99;
            }
            .orange-bar .social-icons li a{
                font-size: 18px;
                color: white;
                display: inline-block;
                margin-top: 7px;
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
            .woocommerce #content div.product div.summary, .woocommerce div.product div.summary, .woocommerce-page #content div.product div.summary, .woocommerce-page div.product div.summary{
                float: left;
            }
            .onsale{
                display:none;
            }
        </style>
    </head>

    <body <?php body_class(isset($class) ? $class : ''); ?>>
        <div class="orangine-wrapper">
            <div class="orangine-navbar">
                <div class="orange-bar">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-8 hidden-xs text-right">
                                <ul class="list-inline social-icons">
                                    <li><a href="#"><span class="fa fa-search"></span></a></li>
                                    <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fa fa-youtube"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-2">
                            <a class="navbar-brand orangine-logo-link" href="<?php echo home_url(); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Orangine Logo" title="Disfruta Orangine!" width="150">
                            </a>    
                        </div>
                        <div class="col-xs-10">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="pull-right contact-info">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/call-center.png" width="80" alt="Telefono Oralgine" style="float:left; margin: 10px auto; margin-right: 18px;">
                                        <span class="servicio-al-cliente-texto text-right" style="float: left; text-transform: uppercase; margin-top: 18px;">Servicio a domicilio: <span class="telefono-oralgine" style="text-transform: uppercase; font-size: 28px;">1800 008 008</span></span>
                                        <br />
                                        <span class="servicio-al-cliente-texto text-right" style="float: left; text-transform: uppercase;">Tel&eacute;fono: <span class="telefono-oralgine" style="text-transform: uppercase; font-size: 28px;">02 2628 871</span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
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

            <div id="main-container" class="orangine-master">