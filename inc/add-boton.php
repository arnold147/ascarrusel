<?php 
// Cargar script a la administracion wp
function ascarrusel_add_buttons( $plugin_array ) {
    $plugin_array['bs_grid'] = plugin_dir_url( __FILE__ ) . '../js/as-carrusel-editor.js';
    return $plugin_array;
}

function ascarrusel_register_buttons( $buttons ) {
    array_push( $buttons, 'bs_grid' ); 
    return $buttons;
}
add_action( 'admin_init', 'ascarrusel_buttons' );
function ascarrusel_buttons() {
	wp_enqueue_style( 'as-slick_css', plugin_dir_url( __FILE__ ) . '../css/slick-editor.css');  
    add_filter( "mce_external_plugins", "ascarrusel_add_buttons" );
    add_filter( 'mce_buttons_2', 'ascarrusel_register_buttons' );
}