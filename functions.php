<?php
require_once('includes/wp-bootstrap-navwalker.php');

define('WOOCOMMERCE_USE_CSS', false);

//Add thumbnail, automatic feed links and title tag support
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );

//Add content width (desktop default)
if ( ! isset( $content_width ) ) {
    $content_width = 768;
}

//Add menu support and register main menu
if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(
        array(
            'main_menu' => 'Main Menu',
            'inner_menu' => 'Internas Menu'
        )
    );
}


// filter the Gravity Forms button type
add_filter('gform_submit_button', 'form_submit_button', 10, 2);
function form_submit_button($button, $form){
    return "<button class='button btn' id='gform_submit_button_{$form["id"]}'><span>{$form['button']['text']}</span></button>";
}

// Register sidebar
add_action('widgets_init', 'theme_register_sidebar');
function theme_register_sidebar() {
    if ( function_exists('register_sidebar') ) {
        register_sidebar(array(
            'id' => 'sidebar-1',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>',
        ));
    }
}

// Bootstrap_Walker_Nav_Menu setup

add_action( 'after_setup_theme', 'bootstrap_setup' );

if ( ! function_exists( 'bootstrap_setup' ) ):

function bootstrap_setup(){



    class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {


        function start_lvl( &$output, $depth = 0, $args = array() ) {

            $indent = str_repeat( "\t", $depth );
            $output	   .= "\n$indent<ul class=\"dropdown-menu\">\n";

        }

        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

            if (!is_object($args)) {
                return; // menu has not been configured
            }

            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

            $li_attributes = '';
            $class_names = $value = '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = ($args->has_children) ? 'dropdown' : '';
            $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
            $classes[] = 'menu-item-' . $item->ID;


            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
            $class_names = ' class="' . esc_attr( $class_names ) . '"';

            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            $attributes .= ($args->has_children) 	    ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }

        function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

            if ( !$element )
                return;

            $id_field = $this->db_fields['id'];

            //display this element
            if ( is_array( $args[0] ) )
                $args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
            else if ( is_object( $args[0] ) )
                $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
            $cb_args = array_merge( array(&$output, $element, $depth), $args);
            call_user_func_array(array(&$this, 'start_el'), $cb_args);

            $id = $element->$id_field;

            // descend only when the depth is right and there are childrens for this element
            if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

                foreach( $children_elements[ $id ] as $child ){

                    if ( !isset($newlevel) ) {
                        $newlevel = true;
                        //start the child delimiter
                        $cb_args = array_merge( array(&$output, $depth), $args);
                        call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
                    }
                    $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
                }
                unset( $children_elements[ $id ] );
            }

            if ( isset($newlevel) && $newlevel ){
                //end the child delimiter
                $cb_args = array_merge( array(&$output, $depth), $args);
                call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
            }

            //end this element
            $cb_args = array_merge( array(&$output, $element, $depth), $args);
            call_user_func_array(array(&$this, 'end_el'), $cb_args);
        }
    }
}
endif;


// START THEME OPTIONS
// custom theme options for user in admin area - Appearance > Theme Options
function pu_theme_menu()
{
    add_theme_page( 'Theme Option', 'Theme Options', 'manage_options', 'pu_theme_options.php', 'pu_theme_page');  
}
add_action('admin_menu', 'pu_theme_menu');

function pu_theme_page()
{
?>
<div class="section panel">
    <h1>Custom Theme Options</h1>
    <form method="post" enctype="multipart/form-data" action="options.php">
        <hr>
        <?php 

    settings_fields('pu_theme_options'); 

    do_settings_sections('pu_theme_options.php');
    echo '<hr>';
        ?>
        <p class="submit">  
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
        </p>
    </form>
</div>
<?php
}

add_action( 'admin_init', 'pu_register_settings' );

/**
 * Function to register the settings
 */
function pu_register_settings()
{
    // Register the settings with Validation callback
    register_setting( 'pu_theme_options', 'pu_theme_options' );

    // Add settings section
    add_settings_section( 'pu_text_section', 'Social Links', 'pu_display_section', 'pu_theme_options.php' );

    // Create textbox field
    $field_args = array(
        'type'      => 'text',
        'id'        => 'twitter_link',
        'name'      => 'twitter_link',
        'desc'      => 'Twitter Link - Example: http://twitter.com/username',
        'std'       => '',
        'label_for' => 'twitter_link',
        'class'     => 'css_class'
    );

    // Add twitter field
    add_settings_field( 'twitter_link', 'Twitter', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args );   

    $field_args = array(
        'type'      => 'text',
        'id'        => 'facebook_link',
        'name'      => 'facebook_link',
        'desc'      => 'Facebook Link - Example: http://facebook.com/username',
        'std'       => '',
        'label_for' => 'facebook_link',
        'class'     => 'css_class'
    );

    // Add facebook field
    add_settings_field( 'facebook_link', 'Facebook', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args );

    $field_args = array(
        'type'      => 'text',
        'id'        => 'gplus_link',
        'name'      => 'gplus_link',
        'desc'      => 'Google+ Link - Example: http://plus.google.com/user_id',
        'std'       => '',
        'label_for' => 'gplus_link',
        'class'     => 'css_class'
    );

    // Add Google+ field
    add_settings_field( 'gplus_link', 'Google+', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args );

    $field_args = array(
        'type'      => 'text',
        'id'        => 'youtube_link',
        'name'      => 'youtube_link',
        'desc'      => 'Youtube Link - Example: https://www.youtube.com/channel/channel_id',
        'std'       => '',
        'label_for' => 'youtube_link',
        'class'     => 'css_class'
    );

    // Add youtube field
    add_settings_field( 'youtube_ink', 'Youtube', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args );

    $field_args = array(
        'type'      => 'text',
        'id'        => 'linkedin_link',
        'name'      => 'linkedin_link',
        'desc'      => 'LinkedIn Link - Example: http://linkedin.com/in/username',
        'std'       => '',
        'label_for' => 'linkedin_link',
        'class'     => 'css_class'
    );

    // Add LinkedIn field
    add_settings_field( 'linkedin_link', 'LinkedIn', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args );

    $field_args = array(
        'type'      => 'text',
        'id'        => 'instagram_link',
        'name'      => 'instagram_link',
        'desc'      => 'Instagram Link - Example: http://instagram.com/username',
        'std'       => '',
        'label_for' => 'instagram_link',
        'class'     => 'css_class'
    );

    // Add Instagram field
    add_settings_field( 'instagram_link', 'Instagram', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args );

    // Add settings section title here
    add_settings_section( 'section_name_here', 'Section Title Here', 'pu_display_section', 'pu_theme_options.php' );

    // Create textarea field
    $field_args = array(
        'type'      => 'textarea',
        'id'        => 'settings_field_1',
        'name'      => 'settings_field_1',
        'desc'      => 'Setting Description Here',
        'std'       => '',
        'label_for' => 'settings_field_1'
    );

    // section_name should be same as section_name above (line 116)
    add_settings_field( 'settings_field_1', 'Setting Title Here', 'pu_display_setting', 'pu_theme_options.php', 'section_name_here', $field_args );   


    // Copy lines 118 through 129 to create additional field within that section
    // Copy line 116 for a new section and then 118-129 to create a field in that section
}


// allow wordpress post editor functions to be used in theme options
function pu_display_setting($args)
{
    extract( $args );

    $option_name = 'pu_theme_options';

    $options = get_option( $option_name );

    switch ( $type ) {  
        case 'text':  
            $options[$id] = stripslashes($options[$id]);  
            $options[$id] = esc_attr( $options[$id]);  
            echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";  
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
            break;
        case 'textarea':  
            $options[$id] = stripslashes($options[$id]);  
            //$options[$id] = esc_attr( $options[$id]);
            $options[$id] = esc_html( $options[$id]); 

            printf(
                wp_editor($options[$id], $id, 
                          array('textarea_name' => $option_name . "[$id]",
                                'style' => 'width: 200px'
                               )) 
            );
            // echo "<textarea id='$id' name='" . $option_name . "[$id]' rows='10' cols='50'>".$options[$id]."</textarea>";  
            // echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
            break; 
    }
}

function pu_validate_settings($input)
{
    foreach($input as $k => $v)
    {
        $newinput[$k] = trim($v);

        // Check the input is a letter or a number
        if(!preg_match('/^[A-Z0-9 _]*$/i', $v)) {
            $newinput[$k] = '';
        }
    }

    return $newinput;
}

// Add custom styles to theme options area
add_action('admin_head', 'custom_style');

function custom_style() {
    echo '<style>
    .appearance_page_pu_theme_options .wp-editor-wrap {
      width: 75%;
    }
    .regular-textcss_class {
    	width: 50%;
    }
    .appearance_page_pu_theme_options h3 {
    	font-size: 2em;
    	padding-top: 40px;
    }
  </style>';
}

// END THEME OPTIONS


/**
 * Load site scripts.
 */
function bootstrap_theme_enqueue_scripts() {
    $template_url = get_template_directory_uri();

    if( !is_admin() ){
        wp_deregister_script('jquery');  

        // Load a copy of jQuery from the Google API CDN  
        // The last parameter set to TRUE states that it should be loaded  
        // in the footer.  
        wp_register_script(
            'jquery', 
            'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', 
            FALSE, 
            '1.11.0', 
            TRUE
        );  

        wp_enqueue_script('jquery');  
        wp_register_script( 'orangine', get_template_directory_uri() .'/js/orangine.js', array('jquery') );
        wp_localize_script( 'orangine', 'orangine', array( 'orangineAjax' => admin_url( 'admin-ajax.php' ), 'orangineTheme' => get_template_directory_uri()));

        wp_enqueue_script( 'orangine', get_template_directory_uri() . '/js/orangine.js', array ( 'jquery' ), '1.1', true);
        wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/9671498c3e.js', array ( 'jquery' ), '1.1', true);
    }

    // Bootstrap
    wp_enqueue_script( 'bootstrap-script', $template_url . '/js/bootstrap.min.js', array( 'jquery' ), null, true );
    wp_enqueue_style( 'bootstrap-style', $template_url . '/css/bootstrap.min.css' );

    //Main Style
    wp_enqueue_style( 'main-style', get_stylesheet_uri() );

    // Load Thread comments WordPress script.
    if ( is_singular() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    if (is_page('realizar-pedido')){
        wp_enqueue_script( 'jquery-ui-script', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array( 'jquery' ), null, true );
        wp_enqueue_style( 'jquery-ui-style', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css' );
    }
}

add_action( 'wp_enqueue_scripts', 'bootstrap_theme_enqueue_scripts', 1 );
function my_enqueue($hook) {
    $template_url = get_template_directory_uri();
    if ('toplevel_page_orangine_pedidos' !== $hook) {
        return;
    }
    wp_enqueue_script( 'bootstrap-script', $template_url . '/js/bootstrap.min.js', array( 'jquery' ), null, true );
    wp_enqueue_style( 'bootstrap-style', $template_url . '/css/bootstrap.min.css' );
}

add_action('admin_enqueue_scripts', 'my_enqueue');
// Register Custom Post Type
function orangine_home_carousel() {

    $labels = array(
        'name'                  => _x( 'Slides', 'Post Type General Name', 'orangine' ),
        'singular_name'         => _x( 'Slider', 'Post Type Singular Name', 'orangine' ),
        'menu_name'             => __( 'Home Slider', 'orangine' ),
        'name_admin_bar'        => __( 'Home Slider', 'orangine' ),
        'archives'              => __( 'Item Archives', 'orangine' ),
        'attributes'            => __( 'Item Attributes', 'orangine' ),
        'parent_item_colon'     => __( 'Parent Item:', 'orangine' ),
        'all_items'             => __( 'All Items', 'orangine' ),
        'add_new_item'          => __( 'Add New Item', 'orangine' ),
        'add_new'               => __( 'Add New', 'orangine' ),
        'new_item'              => __( 'New Item', 'orangine' ),
        'edit_item'             => __( 'Edit Item', 'orangine' ),
        'update_item'           => __( 'Update Item', 'orangine' ),
        'view_item'             => __( 'View Item', 'orangine' ),
        'view_items'            => __( 'View Items', 'orangine' ),
        'search_items'          => __( 'Search Item', 'orangine' ),
        'not_found'             => __( 'Not found', 'orangine' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'orangine' ),
        'featured_image'        => __( 'Featured Image', 'orangine' ),
        'set_featured_image'    => __( 'Set featured image', 'orangine' ),
        'remove_featured_image' => __( 'Remove featured image', 'orangine' ),
        'use_featured_image'    => __( 'Use as featured image', 'orangine' ),
        'insert_into_item'      => __( 'Insert into item', 'orangine' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'orangine' ),
        'items_list'            => __( 'Items list', 'orangine' ),
        'items_list_navigation' => __( 'Items list navigation', 'orangine' ),
        'filter_items_list'     => __( 'Filter items list', 'orangine' ),
    );
    $args = array(
        'label'                 => __( 'Slider', 'orangine' ),
        'description'           => __( 'Orangine Home slides', 'orangine' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail', 'custom-fields', ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => false,
        'has_archive'           => false,		
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'orangine-carousel', $args );

}
add_action( 'init', 'orangine_home_carousel', 0 );

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
// ORANGINE METABOXES
add_filter( 'rwmb_meta_boxes', 'orangine_register_meta_boxes' );
/*-- METABOXES --*/
function orangine_register_meta_boxes( $meta_box ) {

    $prefix = 'orangine__';

    // Check if plugin is activated or included in theme

    if (!class_exists('RW_Meta_Box') or ! is_admin())
        return $meta_box;

    $post_ID = !empty($_POST['post_ID']) ?
        $_POST['post_ID'] :
    (!empty($_GET['post']) ? $_GET['post'] : FALSE);

    if (!$post_ID)
        return $meta_box;

    $current_post = get_post($post_ID);
    $current_post_type = $current_post->post_type;

    if($current_post_type = 'page'){
        if ($current_post->post_name == 'contactos'){
            /*$meta_box[] = array(
                    'id' => 'orangine_nosotros_ino',
                    'title' => 'Orangine',
                    'pages' => array('page'),
                    'context' => 'normal',
                    'priority' => 'default',
                    'fields' => array(
                        array(
                            'name' => 'Misión',
                            'id' => $prefix .'orangine_mision',
                            'type' => 'wysiwyg',
                        ),
                        array(
                            'name' => 'Visión',
                            'id' => $prefix .'orangine_vision',
                            'type' => 'wysiwyg'
                        ),
                        array(
                            'name' => 'Valores',
                            'id' => $prefix .'orangine_valores',
                            'type' => 'wysiwyg'
                        )
                    )
                );*/
            $meta_box[] = array(
                'id' => 'orangine_rrss',
                'title' => 'Orangine Redes Sociales',
                'pages' => array('page'),
                'context' => 'normal',
                'priority' => 'default',
                'fields' => array(
                    array(
                        'name' => 'Facebook',
                        'id' => $prefix .'facebook',
                        'type' => 'url',
                        'desc' => 'Debe ser una URL válida. https://www.miredsocial.com'
                    ),
                    array(
                        'name' => 'Twitter',
                        'id' => $prefix .'instagram',
                        'type' => 'url',
                        'desc' => 'Debe ser una URL válida. https://www.miredsocial.com'
                    ),
                    array(
                        'name' => 'Youtube',
                        'id' => $prefix .'youtube',
                        'type' => 'url',
                        'desc' => 'Debe ser una URL válida. https://www.miredsocial.com'
                    )
                )
            );
        }
    }

    return $meta_box;
}
add_action( 'woocommerce_checkout_process', 'wc_minimum_order_amount' );
add_action( 'woocommerce_before_cart' , 'wc_minimum_order_amount' );

function wc_minimum_order_amount() {
    // Set this variable to specify a minimum order value
    $minimum = 1;

    if ( WC()->cart->total < $minimum ) {

        if( is_cart() ) {

            wc_print_notice( 
                sprintf( 'You must have an order with a minimum of %s to place your order, your current order total is %s.' , 
                        wc_price( $minimum ), 
                        wc_price( WC()->cart->total )
                       ), 'error' 
            );

        } else {

            wc_add_notice( 
                sprintf( 'You must have an order with a minimum of %s to place your order, your current order total is %s.' , 
                        wc_price( $minimum ), 
                        wc_price( WC()->cart->total )
                       ), 'error' 
            );

        }
    }

}

add_filter( 'woocommerce_get_breadcrumb', '__return_false' );

function or_admin_dashboard(){
    global $wpdb;
    $pedidos = $wpdb->get_results('SELECT * FROM or_pedido');

?>
<h1>Pedidos Orangine</h1>
<div class="contenedor" style="max-width: 98%; margin: 0 auto;">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php foreach($pedidos as $pedido) { $total = 0;?>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $pedido->id ?>" aria-expanded="true" aria-controls="collapseOne"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;
                        Cliente: <?= $pedido->nombre ?> | RUC: <?= $pedido->cedula ?> | <?= $pedido->estado == 'INGRESADO' ? '<span class="text-warning"><strong>Ingresado</strong></span>' : '<span class="text-success"><strong>Procesado</strong></span>'?>
                    </a>
                    <span class="pull-right">Fecha: <?= $pedido->fecha ?> | <?= $pedido->estado == 'INGRESADO' ? '<i class="glyphicon glyphicon-ok text-success" title="Procesar pedido" style="cursor: pointer;"></i>' : '' ?>&nbsp;<i class="glyphicon glyphicon-trash text-danger" title="Borrar de la Lista" style="cursor: pointer;"></i></span>
                </h4>
            </div>
            <div id="collapse<?= $pedido->id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>Datos de contacto</h3>
                                <p><strong>Nombre:</strong> <?= $pedido->nombre ?></p>
                                <p><strong>RUC:</strong> <?= $pedido->cedula ?></p>
                                <p><strong>Email:</strong> <?= $pedido->email ?></p>
                                <p><strong>Direcci&oacute;n:</strong> <?= $pedido->direccion ?></p>
                            </div>
                            <div class="col-sm-6">
                                <?php if ($pedido->mensaje){ ?>
                                <h3>Mensaje</h3>
                                <p><?= $pedido->mensaje ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <hr />
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <td><strong>Producto ID</strong></td>
                                    <td><strong>SKU</strong></td>
                                    <td><strong>Nombre</strong></td>
                                    <td><strong>Presentaci&oacute;n</strong></td>
                                    <td><strong>Cantidad</strong></td>
                                    <td><strong>Subtotal</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $detalles = $wpdb->get_results("SELECT * FROM or_detalle_pedido WHERE pedido_id = $pedido->id");
                                    foreach ( $detalles as $detalle ){ 
                                        $total += $detalle->valor;
                                ?>
                                <tr>
                                    <td><?= $detalle->producto_id ?></td>
                                    <td><?= $detalle->sku ?></td>
                                    <td><?= $detalle->nombre_producto ?></td>
                                    <td><?= $detalle->presentacion_producto ?></td>
                                    <td align="center"><?= $detalle->cantidad ?></td>
                                    <td align="right"><?= $detalle->valor ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><strong>TOTAL</strong></td>
                                    <td align="right"><?= $total ?></td>    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php 
}

function or_admin_menu() {
    // Go Galapagos main menu
    add_menu_page(
        'Orangine Pedidos',
        'Orangine Pedidos',
        'manage_options',
        'orangine_pedidos',
        'or_admin_dashboard',
        get_template_directory_uri() . '/images/favicon-16x16.png',
        60
    );
}
add_action( 'admin_menu', 'or_admin_menu' );

//Agregar otros posttypes a los resultados de busqueda
function orangine_set_all_cpts( $query ) {
    if ( is_search() && $query->is_main_query() && $query->get( 's' ) ){
        if(isset($_GET['blog'])){
            $query->set('post_type', array('post'));
        }else{
            $query->set('post_type', 
                        array(
                            'post', 
                            'page', 
                            'product'
                        )
                       );
        }

    }
    return $query;
};
add_filter('pre_get_posts', 'orangine_set_all_cpts');


/* Send ajax mail */
function orangine_enviar_mail_pedido(){
    global $woocommerce;
    // Recuperar el POST
    $pedidos = $_POST['cartList'];
    $usuario = $_POST['user'];
    $i = 1;

    // insertar pedido en BD
    global $wpdb;

    $wpdb->get_results("INSERT INTO or_pedido (nombre, cedula, email, direccion, mensaje, fecha)
            VALUES ('".$usuario['name']."', 
                    '".$usuario['ruc']."',
                    '".$usuario['email']."',
                    '".$usuario['dir']."',
                    '".$usuario['message']."',
                    NOW())");
    foreach ($pedidos as $pedido){
        $wpdb->get_results("INSERT INTO or_detalle_pedido(pedido_id, producto_id, sku, nombre_producto, presentacion_producto, descripcion_producto, cantidad, valor, fecha, estado)
VALUES (
 (SELECT COALESCE(MAX(id),0) FROM or_pedido),
 '".$pedido['producto_id']."',
 '".$pedido['sku']."',
 '".$pedido['name']."',
 '".$pedido['desc']."',
 '".$pedido['desc']."',".$pedido['quantity'].",".$pedido['subtotal'].",NOW(),'1');");
    }



    ob_start();
?>
<table border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#cccccc" style="width: 100%;">
    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" style="margin-top:35px;margin-bottom:35px;font-family:Verdana, Helvetica;">
        <tr style="background-color: #E55100;">
            <td align="center">
                <h1 style="color: white; text-transform: uppercase;">Tenemos un pedido!</h1>
            </td>
        </tr>
        <tr>
            <td style="color: #393939!important; padding: 30px;">
                <h2 style="color:#ff3c00;text-transform:uppercase;font-weight:800;margin-top: 35px;">Informacion del contacto</h2>
                <p><strong>Nombre:</strong> <?php echo $usuario['name']; ?></p>
                <p><strong>C&eacute;dula o RUC:</strong> <?php echo $usuario['ruc'] ?></p>
                <p><strong>Email:</strong> <a href="mailto:<?php echo $usuario['email'] ?>"><?php echo $usuario['email'] ?></a></p>
                <p><strong>Tel&eacute;fono:</strong> <a href="mailto:<?php echo $usuario['tel'] ?>"><?php echo $usuario['tel'] ?></a></p>
                <p><strong>Direcci&oacute;n:</strong> <?php echo $usuario['dir'] ?></p>

                <h2 style="color:#ff3c00;text-transform:uppercase;font-weight:800; text-align: center;">Mensaje</h2>
                <p style="font-size:20px;"><?php echo $usuario['message'] ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <h2 style="color:#ff3c00;text-transform:uppercase;font-weight:800;margin-top: 18px; text-align: center;">Pedido</h2>
                <table width="500" border="1" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" style="margin-top:18px;margin-bottom:36px;font-family:Verdana, Helvetica;">
                    <thead>
                        <tr style="background: #393939!important; color: #bebebe;">
                            <td align="center">N&deg;</td>
                            <td align="center">Producto</td>
                            <td align="center">Cantidad</td>
                            <td align="center">Subtotal</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pedidos as $pedido){ ?>
                        <?php $total += $pedido['subtotal']; ?>
                        <tr>
                            <td align="center"><?= $i++ ?></td>
                            <td><?= preg_replace('/(\n|\t)+/', ' ', $pedido['name']) ?></td>
                            <td align="center"><?= $pedido['quantity'] ?></td>
                            <td align="right"><?= $pedido['subtotal'] ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td style="background: black; color: white;">Total</td>
                            <td align="right" style="background: black; color: white;"><?= $total ?></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr style="background-color: #FF3C00; color: #ffffff; margin-top: 35px;">
            <td align="center">
                <p style="margin-top:35px;margin-bottom:35px;">Este email fue enviado desde Orangine Website, el <?php echo date("d/m/Y") ?> a las <?php echo date("h:i") ?></p>
            </td>
        </tr>
    </table>
</table>
<?php
        $body = ob_get_clean();
    //$contacto = get_page_by_path('contact');
    //$mail_admin = get_post_meta($contacto->ID, 'em', true);
    //$to = 'colocar un solo email';
    $subject = 'Genia! un pedido web. - Orangine';

    require_once ABSPATH . WPINC . '/class-phpmailer.php';

    $mail = new PHPMailer( true );

    $mail->AddAddress('ventas@orangine.com.ec', 'Ventas Orangine');
    $mail->AddAddress('servicioalcliente@orangine.com.ec', 'Servicio al cliente Orangine');
    $mail->AddBCC('jmrpadrino@gmail.com', 'Webmaster');

    $mail->FromName = 'Pedidos - Orangine';
    $mail->setFrom('noreply@orangine.com.ec', 'Pedidos Orangine');
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->IsHTML();
    $mail->CharSet = 'utf-8';
    $mail->Send();

    /*try {
        $mail->AddAddress($to);
        $mail->FromName = 'Sentry Wellhead Systems - Contact';
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML();
        $mail->CharSet = 'utf-8';
        $mail->Send();
        echo trim($answers ['success']);
    } catch (phpmailerException $e) {
      echo $e->errorMessage(); //Pretty error messages from PHPMailer
    } catch (Exception $e) {
        echo trim($answers ['success']);
      echo $e->getMessage(); //Boring error messages from anything else!
    }*/
    $raq_content = 0;
    echo 'true';
    die();
}
add_action('wp_ajax_orangine_enviar_mail_pedido', 'orangine_enviar_mail_pedido');
add_action('wp_ajax_nopriv_orangine_enviar_mail_pedido', 'orangine_enviar_mail_pedido');



?>