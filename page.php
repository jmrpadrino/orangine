<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="container woocommerce">
    <div class="row">
        <div class="col-xs-12">
            <?= the_title('<h1 class="page_title">','</h1>'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
<?php the_content(); ?>
        </div>
    </div>
</div>

<?php endwhile; ?>
<?php get_footer(); ?>