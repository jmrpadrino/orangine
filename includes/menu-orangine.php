<?php
if ( ! class_exists( 'Orangine_Bootstrap_Navwalker' ) ) {
    /**
	 * WP_Bootstrap_Navwalker class.
	 *
	 * @extends Walker_Nav_Menu
	 */
    class Orangine_Bootstrap_Navwalker extends Walker_Nav_Menu {
        public function llamada($args){
            return 'hola';
        }
    }
}
?>