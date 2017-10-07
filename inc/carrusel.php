<?php 
// configurar shortcode carrusel
function as_carrusel_code($atts, $content = null){  
	$items = shortcode_atts( array (  
	  'images' => '1', 
	  'mostrar' => '4', 
	  'titulos' => '', 
	  'link' => '#' 
	  ), $atts ); 
	  
	// Obtener IDs de Imagenes  
	$images = $items['images'];
	$images = explode("," , $images);
	  
	// Obtener Titulos 
	$titulos = $items['titulos'];
	$titulos = explode("," , $titulos);
	  

	
	$render_carrusel = "<div class='as-carrusel' data-slick='{\"lazyLoad\":\"ondemand\" ,\"slidesToScroll\": 1, \"slidesToShow\": ". $items['mostrar'] . ", \"dots\": false, \"autoplaySpeed\": 2000, \"responsive\": [
						{
						  \"breakpoint\": 1024,
						  \"settings\": {
							\"slidesToShow\": 3
						  }
						},
						{
						  \"breakpoint\": 600,
						  \"settings\": {
							\"slidesToShow\": 2
						  }
						},
						{
						  \"breakpoint\": 480,
						  \"settings\": {
							\"slidesToShow\": 1
						  }
						}
			  ]
	
	
	}'>";
	
	// Contador
	$i = 0;
	
	foreach($images as $image){
		$render_carrusel .= "<div class='as-slide'><div class='as-slide-inner'>"; 
		
		$render_carrusel .= "<a href='" . $items['link'] . "'>"; 
		
		$render_carrusel .= wp_get_attachment_image($image, 'medium', "" , array('class' =>'item-carrusel'));
		
		if($titulos) { $render_carrusel .= "<h3>" . $titulos[$i] . "</h3>"; $i++;}   
		
		$render_carrusel .= "</a>";
		
		$render_carrusel .= "</div></div>";
	}
	 
	$render_carrusel .= "</div>";
	
	return $render_carrusel;  
}
   
add_shortcode('ascarrusel','as_carrusel_code');