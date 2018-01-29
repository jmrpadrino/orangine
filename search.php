<?php get_header(); $i = 0;?>
<div class="container woocommerce">
    <?php if(have_posts()){ ?>
    <div class="row">
    <?php while (have_posts()) : the_post(); ?>
        <div class="col-xs-3">
            <?php if (has_post_thumbnail()){ ?>
            <div class="row">
                <div class="col-xs-12">
                    <a href="<?= get_the_permalink() ?>">
                        <?= the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
                    </a>
                </div>
            </div>
            <?php }else{ ?>
            <div class="row">
                <div class="col-xs-12">
                    <a href="<?= get_the_permalink() ?>">
                        <img src="http://placehold.it/300x225/ff5800/000aff?text=Orangine" alt="<?= get_the_title(); ?>" class="img-responsive">
                    </a>
                </div>
            </div>
            <?php } ?>
            <?= the_title('<h2 class="item_title"><a href="'.get_the_permalink().'">','</a></h2>'); ?>
            <?= the_excerpt(); ?>
        </div>
    <?php 
        $i++;
        if ($i % 4 == 0){
            echo '<div class="clearfix"></div>';
        }
    ?>
    <?php endwhile; ?>
    </div>
    <div class="row">
        <div class="col-xs-23 text-center">
            <?php the_posts_pagination( array(
                'mid_size' => 4,
                'prev_text' => __( 'Anterior', 'textdomain' ),
                'next_text' => __( 'Siguiente', 'textdomain' ),
            ) ); ?>
        </div>
    </div>
    <?php }else{ ?>
    <div class="row">
        <div class="col-xs-12 text-center">
            <h2>Lo sentimos!. No hay resultados bajo ese par&aacute;metro de b&uacute;squeda.</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <form class="form-inline" action="<?= home_url(); ?>">
                <div class="form-group">
                    <label for="exampleInputName2">¿Que buscas?</label>
                    <input type="text" class="form-control" name="s" id="exampleInputName2" placeholder="Escribe aqui!">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>
        </div>
    </div>
    <?php } ?>
</div>
<?php get_footer(); ?>