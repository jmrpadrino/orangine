<style>
    span.wpcf7-not-valid-tip {
        margin-top: -36px;
        font-size: 12px!important;
        text-transform: uppercase;
        font-weight: 600;
    }
</style>
<?php
get_header();
the_post();
?>
<?php //echo the_title();    ?>
<div class="container" style="font-size: 18px; line-height: 1.5;">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="contact-content" style="margin-bottom: 36px;">
                <?php the_content(); ?>            
            </div>
        </div>
    </div>
    <div class="row" style="display: flex;">
        <div class="col-sm-3 hidden-xs">
            <img src="<?= get_template_directory_uri(); ?>/images/orangine-call-center.png" alt="Orangine Call Center" class="img-responsive" style="position: absolute; bottom: 0;">
        </div>
        <div class="col-sm-9">
            <div class="row content-contact radius-top">
                <div class="col-sm-1">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon-info.png" alt="Orangine contacto" style="width: 45px;">
                </div>
                <div class="col-sm-11">
                    <p>Para nosotros es importante solventar tus dudas y consultas, sin deseas comunicarte con un departamento específico, d&eacute;janos tus datos y nos pondremos en contacto contigo.</p>
                </div>
            </div>
            <div class="row content-contact bottom">
                <div class="col-sm-12">
                    <?php //funcion_correo(); ?>
                    <?php echo do_shortcode('[contact-form-7 id="307" title="Contact-US" html_class="contact-form" html_role="form"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="min-height: 150px; display: flex; align-content: center; justify-content: center; color: white; background-color: #152183;">
    <h3 style="margin: auto; font-size: 36px; font-weight: bold;">¿C&oacute;mo llegar?</h3>
</div>
<div id="gmap" style="height: 350px;"></div>
<?php get_footer(); ?>