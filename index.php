<?php
	require 'simple_html_dom.php';
	$html = new simple_html_dom();
	/**
	 * Variables Usadas:
	 * - $pages:numeros de paginas que hay en la url
	 * - $j: numero de vueltas por pagina
	 * - $html: Recibe los div de la url
	 * - $cantidad: nos permite obtener la cantidad de libros.
	 * - $article: Selecciona la etiqueta html url
	 * - $.list-books: Selecciona la clase del html url
	 * - $e: Almacena la clases y etiquetas buscadas
	 * - $libros: Array donde se almacena todos los array
	 * - $libro: Arrary donde se almacena por cada vuelta
	 */
	
	$pages = 5;
	$cantidad = 12;
	
	for ($j = 0; $j < $pages; $j++) {
		$html->load_file('https://lelibros.online/categoria/infanto-juvenil/page/' . $j . '/');
		$titulo = $html->find('article .list-books');
		foreach ($titulo as $item) {
			for ($i = 0; $i < $cantidad; $i++) {
				$libro = [];
				$libro['titulo'] = $item->find('ul li strong', $i)->plaintext;
				$libro['autor'] = $item->find('ul li span a', $i)->plaintext;
				$img = $item->find('.books li a amp-img', $i);
				$libro['imagen'] = $img->outertext = 'https://lelibros.online' . $img->src;
				//url de pagina  sin https://lelibros.online
				$libro['url'] = $item->find('ul li .down', $i)->href;
				
				/* url de pagina añadiendo https://lelibros.online
					$e = $item->find('ul li .down',$i);
					$libro['url'] =$e->outertext = 'https://lelibros.online' . $e->href;
				*/
				
				$libros[] = $libro;
			}
		}
	}
	
	$estado['libros'] = $libros;
	print json_encode($estado);


?>
