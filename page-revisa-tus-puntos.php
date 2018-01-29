<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<style>
    .revisa-tus-puntos{
        background-color: #E65101;
        background-position: bottom center;
        background-size: cover;
        background-repeat: no-repeat;
        background-image: url(<?= get_template_directory_uri(); ?>/images/puntos-bkg.png);
        min-height: 960px;
    }
</style>
<div class="revisa-tus-puntos">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center">
                <img src="<?= get_template_directory_uri(); ?>/images/puntos-img.png" alt="Orangine - Acumula puntos" class="img-responsive">
            </div> 
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <p class="esperalo" style="color: #152183; font-size: 36px;">INICIO <span>|</span> <strong style="font-weight: 900;"><span style="font-size: 60px;transform: translateY(17px);display: inline-block;font-family: 'Helvetica', sans-serif;  ">3</span><sup style="top: -6px;text-decoration: underline;">RA</sup> SEMANA DE FEBRERO</strong> <span>|</span> ¡ESP&Eacute;RALO!</p>
            </div>
        </div>
    </div>
</div>

<?php endwhile; ?>
<?php get_footer(); ?>