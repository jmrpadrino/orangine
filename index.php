<?php get_header(); ?>
<?php 
    $args = array(
        'post_type' => 'orangine-carousel',
        'posts_per_page' => 5,
        'orderby' => 'post_date',
        'order' => 'ASC'        
    );
    $slides = get_posts( $args );
    if ($slides){ $count = 0;
?>
<div class="row">
    <div class="carousel-container">
        <div id="orangine-home-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <?php foreach ($slides as $slide){ ?>
                <?php if ($count == 0){ ?>
                <div class="item active" style="background-image: url();">
                    <img src="<?php echo  get_the_post_thumbnail_url($slide->ID); ?>" class="img-responsive">
                </div>
                <?php }else{ ?>
                <div class="item" style="background-image: url();">
                    <img src="<?php echo  get_the_post_thumbnail_url($slide->ID); ?>" class="img-responsive">
                </div>
                <?php } ?>
                <?php $count++; } // fin foreach ?>
            </div>
            <a class="left carousel-control" href="#orangine-home-carousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#orangine-home-carousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<?php } //fin si hay slides para el carousel ?>
<?php 
    //obtener los productos de woocommerce
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 7,
    );
    $productos = get_posts($args);
    
?>
<div class="row">
    <div class="col-sm-4">
        <div class="row">
            <div class="col-xs-12 home-product-container">
                <!--h1 style="position: absolute; top: 0; left: 20px; z-index: 1;"><?php echo $productos[0]->post_title; ?></h1-->
                <img src="<?php echo get_the_post_thumbnail_url( $productos[0]->ID, 'medium' ); ?>" class="img-responsive" height="600" width="600">
                <!--a href="<?php echo home_url('carrito/?add-to-cart=' . $productos[0]->ID); ?>"><span class="home-grid-cart-icon">Ca</span></a-->
                <?php
                    $product = get_product($productos[0]->ID);
                    echo '<a href="' . $product->add_to_cart_url() .'"><span class="home-grid-cart-icon">Ca</span></a>"';
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 home-product-container">
                <!--h1 style="position: absolute; top: 0; left: 20px; z-index: 1;"><?php echo $productos[1]->post_title; ?></h1-->
                <img src="<?php echo get_the_post_thumbnail_url( $productos[1]->ID, 'medium' ); ?>" class="img-responsive" height="600" width="600">
                <a href="<?php echo home_url('carrito/?add-to-cart=' . $productos[1]->ID); ?>"><span class="home-grid-cart-icon">Ca</span></a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 home-product-container">
                <!--h1 style="position: absolute; top: 0; left: 20px; z-index: 1;"><?php echo $productos[2]->post_title; ?></h1-->
                <img src="<?php echo get_the_post_thumbnail_url( $productos[2]->ID, 'medium' ); ?>" class="img-responsive" height="600" width="600">
                <a href="<?php echo home_url('carrito/?add-to-cart=' . $productos[2]->ID); ?>"><span class="home-grid-cart-icon">Ca</span></a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="row">
            <div class="col-xs-12 home-product-container">
                <!--h1 style="position: absolute; top: 0; left: 20px; z-index: 1;"><?php echo $productos[3]->post_title; ?></h1-->
                <img src="<?php echo get_the_post_thumbnail_url( $productos[3]->ID, 'large' ); ?>" class="img-responsive" height="1200" width="600">
                <a href="<?php echo home_url('carrito/?add-to-cart=' . $productos[3]->ID); ?>"><span class="home-grid-cart-icon">Ca</span></a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 home-product-container">
                <img src="http://placehold.it/600x400/000000/ffb100?text=ANIMACION" class="img-responsive">
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="row">
            <div class="col-xs-12 home-product-container">
                <!--h1 style="position: absolute; top: 0; left: 20px; z-index: 1;"><?php echo $productos[4]->post_title; ?></h1-->
                <img src="<?php echo get_the_post_thumbnail_url( $productos[4]->ID, 'full' ); ?>" class="img-responsive" height="600" width="600">
                <a href="<?php echo home_url('carrito/?add-to-cart=' . $productos[4]->ID); ?>"><span class="home-grid-cart-icon">Ca</span></a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 home-product-container">
                <!--h1 style="position: absolute; top: 0; left: 20px; z-index: 1;"><?php echo $productos[5]->post_title; ?></h1-->
                <img src="<?php echo get_the_post_thumbnail_url( $productos[5]->ID, 'full' ); ?>" class="img-responsive" height="600" width="600">
                <a href="<?php echo home_url('carrito/?add-to-cart=' . $productos[5]->ID); ?>"><span class="home-grid-cart-icon">Ca</span></a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 home-product-container">
                <!--h1 style="position: absolute; top: 0; left: 20px; z-index: 1;"><?php echo $productos[6]->post_title; ?></h1-->
                <img src="<?php echo get_the_post_thumbnail_url( $productos[6]->ID, 'full' ); ?>" class="img-responsive" height="600" width="600">
                <a href="<?php echo home_url('carrito/?add-to-cart=' . $productos[6]->ID); ?>"><span class="home-grid-cart-icon">Ca</span></a>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>