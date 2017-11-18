<?php get_header(); the_post(); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
        <?php echo the_post_thumbnail('', array('class' => 'img-responsive pull-left blog-thumbnail')); ?>
        <?php echo the_title('<h1>','</h1>'); ?>
        <?php the_content(); ?>
        </div>
    </div>
</div>
<div class="container-fluid" style="background-color: #FF4E00; margin-top: 36px;">
    <div class="row">
        <div class="col-sm-2" style="display: flex; align-items: center; justify-content: center;">
            <img src="<?php echo get_template_directory_uri(); ?>/images/icon-news-contact.png" alt="Orangine noticias" style="margin: auto; margin-top:60px;" class="img-responsive" width="100">
        </div>
        <div class="col-sm-10">
            <div class="row">
                <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 4
                    );
                    $noticias = get_posts($args);
                    //var_dump($noticias);
                    foreach ($noticias as $noticia){
                        $img = get_the_post_thumbnail_url($noticia->ID);
                        echo '<div class="col-sm-3" style="padding: 18px;">';
                        echo '<a href="'.get_post_permalink($noticia->ID).'">';
                        echo '<div class="inner-page-news-container" style="background-image: url('.$img.'); background-repeat: no-repeat; background-position: center; background-size: cover; width: 100%; min-height: 160px; overflow:auto; -webkit-box-shadow: 20px 0 80px 0 rgba(0,0,0,.2); box-shadow: 20px 0 80px 0 rgba(0,0,0,.2);">';
                        echo '</div>';
                        echo '</a>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>