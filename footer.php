<?php $prefix = 'orangine__'; ?>
<footer>
    <div class="container-fluid">
        <div class="row" style="background: #E55100; color: white;">
            <div class="col-xs-3"><h3>¿COMO COMPRAR?</h3></div>
            <div class="col-xs-3"><h3>NOSOTROS</h3></div>
            <div class="col-xs-3"><h3>GALERÍA</h3></div>
            <div class="col-xs-3"><h3>CONTACTANOS</h3></div>
        </div>
        <div class="row" style="color: white;">
            <div class="col-xs-3 footer-column-container">
                <ul>
                    <li>Accede a www.orangine.com</li>
                    <li>Selecciona el producto que deseas comprar.</li>
                    <li>Llena los datos del formulario.</li>
                    <li>Da clic en comprar.</li>
                    <li>Descarga nuestra aplicaci&oacute;n m&oacute;vil.</li>
                </ul>
            </div>
            <?php $nosotros = get_page_by_path('nosotros'); ?>
            <div class="col-xs-3 footer-column-container">
                <h4>Misi&oacute;n</h4>
                <p><?php echo get_post_meta($nosotros->ID, $prefix .'orangine_mision', true); ?></p>
                <h4>Visi&oacute;n</h4>
                <p><?php echo get_post_meta($nosotros->ID, $prefix .'orangine_vision', true); ?></p>
                <h4>Valores</h4>
                <p><?php echo get_post_meta($nosotros->ID, $prefix .'orangine_valores', true); ?></p>
                <hr />
                <p><span class="fa fa-map-marker"></span> Carlos Freiles S34-11 e Isidrio Barriga</p>
            </div>
            <div class="col-xs-3 footer-column-container">
                <p><a href="<?php echo home_url('galeria/fotografias/'); ?>">Fotos</a>,<a href="<?php echo home_url('galeria/videos/'); ?>">Videos</a></p>
            </div>
            <div class="col-xs-3 footer-column-container">
                <a href="<?php echo home_url('contactos/'); ?>">Formulario de Contacto</a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</div><!-- orangine master ends -->
</div> <!-- close main container -->
</div> <!-- Close orangine wrapper -->
</body>
</html>