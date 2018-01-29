<?php $prefix = 'orangine__'; ?>
<style>
    footer a{
        color: white;
        text-decoration: none;
    }
</style>
<footer>
    <div class="container-fluid">
        <div class="row hidden-xs hidden-sm" style="background: #E55100; color: white;">
            <div class="col-md-4"><h3 class="orange-footer-links"><a href="<?php echo home_url('como-comprar/'); ?>">¿C&Oacute;MO COMPRAR?</a></h3></div>
            <div class="col-md-4"><h3 class="orange-footer-links"><a href="<?= home_url('nosotros'); ?>">NOSOTROS</a></h3></div>
            <div class="col-md-2"><h3 class="orange-footer-links"><a href="<?php echo home_url('galeria/fotografias/'); ?>">GALER&Iacute;A</a></h3></div>
            <div class="col-md-2"><h3 class="orange-footer-links"><a href="<?php echo home_url('contactos/'); ?>">CONTACTANOS</a></h3></div>
        </div>
        <div class="row" style="color: white;">
            <div class="col-md-4 footer-column-container">
                <ul>
                    <li>Accede a www.orangine.com.ec</li>
                    <li>Selecciona el producto que deseas comprar.</li>
                    <li>Llena los datos del formulario.</li>
                    <li>Da clic en comprar.</li>
                    <li>Descarga nuestra aplicaci&oacute;n m&oacute;vil.</li>
                </ul>
            </div>
            <?php $nosotros = get_page_by_path('nosotros'); ?>
            <div class="col-md-4 footer-column-container">
                <h4><a href="<?= home_url('nosotros'); ?>">Misi&oacute;n</a></h4>
                <!--p><?php echo get_post_meta($nosotros->ID, $prefix .'orangine_mision', true); ?></p-->
                <h4><a href="<?= home_url('nosotros'); ?>">Visi&oacute;n</a></h4>
                <!--p><?php echo get_post_meta($nosotros->ID, $prefix .'orangine_vision', true); ?></p-->
                <!--h4>Valores</h4>
<p><?php echo get_post_meta($nosotros->ID, $prefix .'orangine_valores', true); ?></p-->
                <hr />
                <p><span class="fa fa-map-marker"></span> Carlos Freile S34-11 e Isidoro Barriga, Quito Ecuador</p>
            </div>
            <div class="col-md-2 footer-column-container">
                <p><a href="<?php echo home_url('galeria/fotografias/'); ?>">Fotos</a>,<a href="<?php echo home_url('galeria/videos/'); ?>">Videos</a></p>
            </div>
            <div class="col-md-2 footer-column-container">
                <a href="<?php echo home_url('contactos/'); ?>">Formulario de Contacto</a>
            </div>
        </div>
    </div>
</footer>
<div class="modal fade" id="searcher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" style="min-height: 60vh; display: flex; align-items: center; justify-content: center;">
        <div class="modal-content" style="background-color: transparent; color: white; box-shadow: none; border: none; font-size: 48px;">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <form class="" action="<?= home_url(); ?>">
                            <label for="exampleInputName2">¿Que buscas?</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="s" id="exampleInputName2" placeholder="Escribe aqui!">
                                <button type="submit" class="btn btn-default">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
<script type="text/javascript">
    //-0.284778, -78.559154
    function initMap() {
        var map = new google.maps.Map(document.getElementById('gmap'), {
            zoom: 17,
            center: {lat: -0.284778, lng: -78.559154},
            mapTypeId: 'roadmap'
        });
        var marker0 = new google.maps.Marker({
            icon: orangine.orangineTheme + '/images/orangine-map-marker.png',
            position: {lat: -0.284778, lng: -78.559154},
            map: map,
            title: 'Orangine'
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGds9FjlnAoR3dpbkG7iH-c7CYoYWHk1o&callback=initMap"></script>
</div><!-- orangine master ends -->
</div> <!-- close main container -->
</div> <!-- Close orangine wrapper -->
</body>
</html>