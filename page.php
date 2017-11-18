<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
<?php the_content(); ?>
        </div>
    </div>
</div>

<?php endwhile; ?>
<?php get_footer(); ?>