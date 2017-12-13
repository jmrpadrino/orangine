<?php
    if (is_home() or is_front_page()){
        get_header('2');
    }else{
        get_header(); 
    }
?>
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
                <div class="item active" style="background-image: url(<?php echo  get_the_post_thumbnail_url($slide->ID); ?>);">
                    <!--img src="<?php echo  get_the_post_thumbnail_url($slide->ID); ?>" class="img-responsive"-->
                </div>
                <?php }else{ ?>
                <div class="item" style="background-image: url(<?php echo  get_the_post_thumbnail_url($slide->ID); ?>);">
                    <!--img src="<?php echo  get_the_post_thumbnail_url($slide->ID); ?>" class="img-responsive"-->
                </div>
                <?php } ?>
                <?php $count++; } // fin foreach ?>
            </div>
            <!--
            <a class="left carousel-control" href="#orangine-home-carousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#orangine-home-carousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            -->
        </div>
    </div>
</div>
<?php } //fin si hay slides para el carousel ?>
<?php 
    //obtener los productos de woocommerce
    /*$args = array(
        'post_type' => 'product',
        'posts_per_page' => 7,
        'meta_query' => array(
            'key'   => '_featured',
            'value' => 'yes'
        )
    );*/
$args = array(
    'post_type'   =>  'product',    
    'posts_per_page'   =>  7,
    'tax_query' => array(
        array(
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured',
        ),
    ),
);
    $productos = get_posts($args);
?>
<div class="row">
    <div class="col-sm-4">
        <div class="row">
            <div class="col-xs-12 home-product-container">
                <?php
                    $las_categorias = get_the_terms( $productos[0]->ID,  'product_cat');
                    //echo $las_categorias[0]->term_id;
                ?>
                <a href="<?php echo get_term_link($las_categorias[0]->term_id, 'product_cat'); ?>"><img src="<?php echo get_post_meta( $productos[0]->ID, 'orangine_frontpage_image', true ); ?>" class="img-responsive" height="600" width="600"></a>
                <a href="<?php echo home_url('carrito/?add-to-cart=' . $productos[0]->ID); ?>"><span class="home-grid-cart-icon">Ca</span></a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 home-product-container">
                <?php
                    $las_categorias = get_the_terms( $productos[1]->ID,  'product_cat');
                    //var_dump($las_categorias);
                ?>
                <a href="<?php echo get_term_link($las_categorias[0]->term_id, 'product_cat'); ?>"><img src="<?php echo get_post_meta( $productos[1]->ID, 'orangine_frontpage_image', true ); ?>" class="img-responsive" height="600" width="600"></a>
                <a href="<?php echo home_url('carrito/?add-to-cart=' . $productos[1]->ID); ?>"><span class="home-grid-cart-icon">Ca</span></a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 home-product-container">
                <?php
                    $las_categorias = get_the_terms( $productos[2]->ID,  'product_cat');
                    //var_dump($las_categorias);
                ?>
                <a href="<?php echo get_term_link($las_categorias[0]->term_id, 'product_cat'); ?>"><img src="<?php echo get_post_meta( $productos[2]->ID, 'orangine_frontpage_image', true ); ?>" class="img-responsive" height="600" width="600"></a>
                <a href="<?php echo home_url('carrito/?add-to-cart=' . $productos[2]->ID); ?>"><span class="home-grid-cart-icon">Ca</span></a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="row">
            <div class="col-xs-12 home-product-container">
                <?php
                    $las_categorias = get_the_terms( $productos[3]->ID,  'product_cat');
                    //var_dump($las_categorias);
                ?>
                <a href="<?php echo get_term_link($las_categorias[0]->term_id, 'product_cat'); ?>"><img src="<?php echo get_post_meta( $productos[3]->ID, 'orangine_frontpage_image', true ); ?>" class="img-responsive" height="600" width="600"></a>
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
                <?php
                    $las_categorias = get_the_terms( $productos[4]->ID,  'product_cat');
                    //var_dump($las_categorias);
                ?>
                <a href="<?php echo get_term_link($las_categorias[0]->term_id, 'product_cat'); ?>"><img src="<?php echo get_post_meta( $productos[4]->ID, 'orangine_frontpage_image', true ); ?>" class="img-responsive" height="600" width="600"></a>
                <a href="<?php echo home_url('carrito/?add-to-cart=' . $productos[4]->ID); ?>"><span class="home-grid-cart-icon">Ca</span></a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 home-product-container">
                <?php
                    $las_categorias = get_the_terms( $productos[5]->ID,  'product_cat');
                    //var_dump($las_categorias);
                ?>
                <a href="<?php echo get_term_link($las_categorias[0]->term_id, 'product_cat'); ?>"><img src="<?php echo get_post_meta( $productos[5]->ID, 'orangine_frontpage_image', true ); ?>" class="img-responsive" height="600" width="600"></a>
                <a href="<?php echo home_url('carrito/?add-to-cart=' . $productos[5]->ID); ?>"><span class="home-grid-cart-icon">Ca</span></a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 home-product-container">
                <?php
                    $las_categorias = get_the_terms( $productos[6]->ID,  'product_cat');
                    //var_dump($las_categorias);
                ?>
                <a href="<?php echo get_term_link($las_categorias[0]->term_id, 'product_cat'); ?>"><img src="<?php echo get_post_meta( $productos[6]->ID, 'orangine_frontpage_image', true ); ?>" class="img-responsive" height="600" width="600"></a>
                <a href="<?php echo home_url('carrito/?add-to-cart=' . $productos[6]->ID); ?>"><span class="home-grid-cart-icon">Ca</span></a>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>