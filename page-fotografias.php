<?php get_header(); the_post(); ?>
<?php
    $query_images_args = array(
        'post_type'      => 'attachment',
        'post_mime_type' => 'image',
        'post_status'    => 'inherit',
        'posts_per_page' => -1,
    );

    $query_images = new WP_Query( $query_images_args );

    /*$images = array();
    foreach ( $query_images->posts as $image ) {
        $images[] = wp_get_attachment_url( $image->ID );
    }*/
?>
<div class="container-fluid">
    <div class="row">
        <?php foreach( $query_images->posts as $image ) { ?>
        <div class="col-sm-4">
            <div class="image-frame" style="min-height: 300px; overflow: hidden;">
                <img src="<?php echo wp_get_attachment_url( $image->ID ) ?>" alt="Oragine Galeria" class="img-responsive" style="position: absolute; top:50%; left: 50%; transform: translateX(-50%) translateY(-50%);">
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php get_footer(); ?>