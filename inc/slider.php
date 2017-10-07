<?php 
// configurar shortcode carrusel
$height_slide;

function as_slider_code($atts, $content = null){  
	$slider_op = shortcode_atts( array (  
	  'height' => '300px', 
	  'descripcion' => '', 
	  'link' => '' 
	  ), $atts );
	
	global $height_slide;
	 $height_slide = "height:" . $slider_op['height'] .";"; 
	
	$content = "<div class='as-carrusel' >" . do_shortcode($content) . "</div>";
	
	
	
	return $content;  
}
   
add_shortcode('asslider','as_slider_code');



function as_slide_code($atts, $content = null){  
	$slide_op = shortcode_atts( array (  
	  'titulo' => 'Titulo de prueba', 
	  'descripcion' => 'Descripción de prueba', 
	  'link' => '#' 
	  ), $atts ); 
	  
$titulo = $slide_op['titulo'] ? "<h3>" .$slide_op['titulo'] . "</h3>" : ' ' ; 
$descripcion = $slide_op['descripcion'] ? "<p class='p-banner'>" .$slide_op['descripcion'] . "</p>" : ' ' ; 
$link = $slide_op['link'] ? "<p class='link-slide'><a class='btn-v1' href='" .$slide_op['link'] . "'>Ver más</a></p>" : ' ' ; 
	  
	
	global $height_slide;
	
	$render_slide = "<div class='slide-bg' style='$height_slide'><div class='texto-banner'> $titulo $descripcion $link </div></div>";
	
	return $render_slide;  
}
   
add_shortcode('asslide','as_slide_code');