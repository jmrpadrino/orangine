<?php get_header(); the_post(); ?>
<?php
    $query_images_args = array(
        'post_type'      => 'post',
        'posts_per_page' => -1,
    );

    $query_images = new WP_Query( $query_images_args );

    /*$images = array();
    foreach ( $query_images->posts as $image ) {
        $images[] = wp_get_attachment_url( $image->ID );
    }*/
?>
<div class="container-fluid img-container" style="min-height: 70vh;">
    <div class="row">
        <?php foreach( $query_images->posts as $image ) { ?>
        <div class="col-sm-3">
            <div class="image-frame" style="margin: 36px; overflow: hidden;">
                <?php $image = get_the_post_thumbnail_url( $image->ID, 'medium' ); ?>
                <img class="img-responsive" src="<?php echo $image; ?>" alt="Oragine Galeria" style="margin: 0 auto;">
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php get_footer(); ?>