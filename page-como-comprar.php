<?php get_header(); the_post(); ?>
<?php //echo the_title(); ?>
<div class="container-fluid" style="background: #FF4E00; padding: 36px;">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="fleximage" style="display: flex;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/paso-1.png" style="margin: auto;" class="img-responsive">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="fleximage" style="display: flex;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/paso-2.png" style="margin: auto; margin-bottom: 36px;" class="img-responsive">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="fleximage" style="display: flex;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/paso-3.png" style="margin: auto;" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="fleximage" style="display: flex;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/paso-4.png" style="margin: auto;" class="img-responsive">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="fleximage" style="display: flex; align-items: flex-start;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/paso-5.png" style="margin: auto;" class="img-responsive" width="50%">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="banda-blanca" style="font-size: 16px; margin-top: 36px;">
            <span style="float: right; margin-left: -28px; background-color: #fff; overflow: auto; border-top-right-radius: 4px; border-bottom-right-radius: 4px;padding: 10px 0; padding-left: 40px; margin-top: 13px;">Nota: Al momento el servicio a domicilio aplica &uacute;nicamente para la ciudad de Quito. <br />Período de entrega estimado es de 48 horas.</span>
            <img src="<?php echo get_template_directory_uri(); ?>/images/icon-info-blue.png" style="float: right; width: 100px; margin-left: 48px;">
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>