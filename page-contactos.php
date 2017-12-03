<?php get_header(); the_post(); ?>
<?php //echo the_title(); ?>
<div class="container" style="font-size: 18px; line-height: 1.5;">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="contact-content" style="margin-bottom: 72px;">
                <?php the_content(); ?>            
            </div>
        </div>
    </div>
    <div class="row content-contact radius-top">
        <div class="col-sm-1">
            <img src="<?php echo get_template_directory_uri(); ?>/images/icon-info.png" alt="Orangine contacto" style="width: 65px;">
        </div>
        <div class="col-sm-11">
            <p>Para nosotros es importante solventar tus dudas y consultas, si deseas comunicarte con un departamento específico d&eacute;janos tus datos y nos pondremos en contacto contigo.</p>
        </div>
    </div>
    <div class="row content-contact bottom">
        <div class="col-sm-3">
            <img src="<?= get_template_directory_uri(); ?>/images/orangine-call-center.png" alt="Orangine Call Center" class="img-responsive">
        </div>
        <div class="col-sm-9">
            <form id="contact-form" role="form" class="contact-form">
                <div class="row">
                    <div class="col-sm-3 text-right">
                        <label for="nombres">Nombres y Apellidos</label>
                    </div>
                    <div class="col-sm-9">
                        <input name="nombres" type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 text-right">
                        <label for="telefono">N&uacute;mero Telef&oacute;nico</label>
                    </div>
                    <div class="col-sm-9">
                        <input name="telefono" type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 text-right">
                        <label for="ciudad">Ciudad</label>
                    </div>
                    <div class="col-sm-9">
                        <input name="ciudad" type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 text-right">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-sm-9">
                        <input name="email" type="email" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 text-right">
                        <label for="mensaje">Mensaje</label>
                    </div>
                    <div class="col-sm-9">
                        <textarea name="mensaje" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <input type="submit" class="btn btn-primary pull-right" value="Enviar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php get_footer(); ?>