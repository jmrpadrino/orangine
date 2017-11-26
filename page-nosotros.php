<?php get_header(); the_post(); $prefix = 'orangine__'; ?>
<?php //echo the_title(); ?>
<div class="container" style="margin: 36px 0;">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="row">
                <div class="col-sm-7">
                    <?php the_content(); ?>
                    <?php
                    $mision = get_post_meta( get_the_ID(), $prefix . 'orangine_mision', true);
                    if (!empty($mision)){
                        echo '<h2>Misión</h2>';
                        echo '<div class="mision-placeholder">'. $mision . '</div>';
                    }
                    ?>
                </div>
                <div class="col-sm-5">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/contact-redondo-grande.png" class="img-responsive" style="border-radius: 50%; border: 10px solid white; box-shadow: 0px 0px 17px black;" width="350" height="350">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-7">
                    <?php
                    $vision = get_post_meta( get_the_ID(), $prefix . 'orangine_vision', true);
                    if (!empty($vision)){
                        echo '<h2>Visión</h2>';
                        echo '<div class="mision-placeholder">'. $vision . '</div>';
                    }
                    $valores = get_post_meta( get_the_ID(), $prefix . 'orangine_valores', true);
                    if (!empty($valores)){
                        echo '<h2>Valores</h2>';
                        echo '<div class="mision-placeholder">'. $valores . '</div>';
                    }
                    ?>
                </div>
                <div class="col-sm-5">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/contact-redondo-mediano.png" class="img-responsive" style="border-radius: 50%; border: 10px solid white; box-shadow: 0px 0px 17px black;" width="250" height="250">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5 col-sm-offset-7">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/contact-redondo-pequeno.png" class="img-responsive" style="border-radius: 50%; border: 10px solid white; box-shadow: 0px 0px 17px black;" width="150" height="150">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" style="background-color: #FF4E00;">
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