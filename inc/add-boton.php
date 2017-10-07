<?php 

// Cargar script a la administracion wp
function wptuts_add_buttons( $plugin_array ) {
    $plugin_array['bs_grid'] = plugin_dir_url( __FILE__ ) . '../js/as-carrusel-editor.js';
    return $plugin_array;
}

function wptuts_register_buttons( $buttons ) {
    array_push( $buttons, 'bs_grid' ); 
    return $buttons;
}
add_action( 'admin_init', 'wptuts_buttons' );
function wptuts_buttons() {
	wp_enqueue_style( 'as-slick_css', plugin_dir_url( __FILE__ ) . '../css/slick-editor.css');  
    add_filter( "mce_external_plugins", "wptuts_add_buttons" );
    add_filter( 'mce_buttons_2', 'wptuts_register_buttons' );
}


