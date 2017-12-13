<?php get_header(); the_post(); ?>
<?php //echo the_title(); ?>
<style>
    .skew-border{
        height: 80px;
        background-color: #E55100;
        color: white;
        font-weight: bold;
        font-size: 18px;
    }
    .skew-border:after{
        display: inline-block;
        content:' ';
        height: 80px;
        width: 80px;
        border-top: 80px solid #E55100;
	    border-right: 80px solid transparent;
        position: absolute;
        right: -80px;
        top: 0;
    }
</style>
<div class="container-fluid nopadding">
    <div class="row">
        <div class="col-xs-8 skew-border">
            <div class="row">
                <div class="col-xs-9" style="line-height: 12px; padding-top: 20px;">
                    <p>Compra en &iacute;nea</p>
                    <p>www.orangine.com.ec</p>
                </div>
                <div class="col-xs-3" style="line-height: 12px; padding-top: 20px;">
                    <img class="pull-right" src="<?= get_template_directory_uri(); ?>/images/APP.png" alt="Descarga el App de Orangine" width="60" style="position: absolute; right: 0;top: 9px;">
                    <p class="text-right" style="margin-right: 80px;">Descarga</p>
                    <p class="text-right" style="margin-right: 80px;">Nuestra</p>
                </div>
            </div>
        </div>
        <div class="col-xs-3 col-xs-offset-1"><img src="<?= get_template_directory_uri(); ?>/images/aapstore-androide.png" class="pull-left img-responsive"></div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="fleximage" style="display: flex;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/paso-1.png" style="margin: auto;" class="img-responsive" width="75%">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="fleximage" style="display: flex;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/paso-2.png" style="margin: auto;" class="img-responsive"width="75%">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="fleximage" style="display: flex;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/paso-3.png" style="margin: auto;" class="img-responsive" width="75%">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="fleximage" style="display: flex; align-items: flex-start;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/paso-4.png" style="margin: auto;" class="img-responsive" width="75%">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="fleximage" style="display: flex; align-items: flex-start;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/paso-5.png" style="margin: auto;" class="img-responsive" width="75%">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="fleximage" style="display: flex; align-items: flex-start;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/paso-6.png" style="margin: auto;" class="img-responsive" width="75%">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin: 48px auto;">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="row">
                <div class="col-xs-2">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon-info-blue.png" style="float: right; width: 100px; margin-left: 48px;">        
                </div>
                <div class="col-xs-10">
                    <span style="font-size: 24px;text-align: justify;margin-top: 18px;display: block;color: #001B7A;">Nota: Al momento el servicio a domicilio aplica &uacute;nicamente para la ciudad de Quito. <br />Período de entrega estimado es de 48 horas.</span>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php get_footer(); ?>