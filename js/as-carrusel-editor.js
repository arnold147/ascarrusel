tinymce.PluginManager.add('bs_grid', function(editor, url) {
    editor.addButton('bs_grid', {
        tooltip: 'As Carrusel', 
		icon: 'bs-grid',
		class: 'carta',
       onclick: function() {
                // Open window
                editor.windowManager.open({
                    title: 'As Carrusel',
                    body: [{
                        type: 'textbox',
                        name: 'as_idimages',
                        value: '1,2,3',
						tooltip: 'Id de las imagenes separadas por coma sin espacios', 
                        label: 'Id de Imagenes'
                    },{
						type: 'textbox',
                        name: 'as_titulos',
                        value: 'Titulo 1, Titulo 2, etc',
						tooltip: 'Titulos separados por coma', 
                        label: 'Titulos carrusel'
						
					},{
                        type: 'textbox',
                        name: 'as_imgporpagina',
                        value: '4',
						tooltip: 'Imagenes que se muestran por pagina', 
                        label: 'Imagenes por pagina'
                    }],
                    onsubmit: function(e) {
						var idimages = e.data.as_idimages;
						var titulos = e.data.as_titulos;
						var imgporpagina = e.data.as_imgporpagina;
							
						var shortcode = '[ascarrusel ';
						shortcode += idimages? 'images="' + idimages + '"': '' ;  
						
						shortcode += titulos? ' titulos="' + titulos + '"': '' ;  
						
						shortcode += imgporpagina? ' mostrar="' + imgporpagina + '"': '' ;  
						
						shortcode += ']';
						
						editor.insertContent(shortcode);
                    }
                });
            }
    });
});

 // function guid() {
        // function s4() {
            // return Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1);
        // }
        // return s4() + '-' + s4();
    // }
