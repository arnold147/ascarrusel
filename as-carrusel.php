﻿<?php
/*
Plugin Name: AS Carrusel
Plugin URI: https://interacivos123.com
Description: Crea carruseles y sliders con shortcodes [ascarrusel images="12,6,8"]
Version: 1
Author: Arnaldo Salazar
License: GPLv2 or later
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Lo siento no puedes acceder directamente a esta zona';
	exit;
}

define( 'ASCARRUSEL__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );     





// incluir archivos css y js
function as_carrusel_enqueue_script() {       
global $post;
	// comprobar si incluyen shortcode en el post
	// if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'ascarrusel') ) {
		wp_enqueue_script( 'as-slick_js', plugin_dir_url( __FILE__ ) . 'js/slick.min.js', array('jquery'),'', true ); 
		
		wp_enqueue_style( 'as-slick_css', plugin_dir_url( __FILE__ ) . 'css/slick.css');  
		wp_add_inline_script( 'as-slick_js', '
			jQuery(document).ready(function(){
			  jQuery(".as-carrusel").slick({ 
					dots: true,
					autoplay : true
			  });
			});
		');
	//}//fin if para checar si incluyeron el shortcode en el post 
	
}
add_action('wp_enqueue_scripts', 'as_carrusel_enqueue_script');


// incluye carrusel
require_once('inc/carrusel.php');

// incluye slider
require_once('inc/slider.php');

// crear boton en el admin
require_once('inc/add-boton.php');
