<?php
	require 'simple_html_dom.php';
	$html = new simple_html_dom();
	
	/**
	 * Variables Usadas:
	 * - $pdfs: Array donde se almacena todos los array
	 * - $html0: Recibe los div de la url
	 * - $cant: Nos permite especificar que queremos pruebas insensibles a mayúsculas y minúsculas del valor del selector.
	 * - $html: Recibe los div de la url por cada vuelta
	 * - $article: Selecciona div del html url
	 * - $.list-books: Selecciona la clase del html url
	 * - $pdf: Arrary donde se almacena por cada vuelta
	 * - $grabURL: Almacena la clases y etiquetas buscadas
	 * - $pdf_donwload : recibe el  parametros
	 * -la variable $pdf_donwload debe proceder de la varible $url del archivo index.php
	 * http://localhost/libros/pdf.php?getpdf=/libro/descargar-libro-el-sobrino-del-mago-en-pdf-epub-mobi-o-leer-online/
	 *   $url: /libro/descargar-libro-el-sobrino-del-mago-en-pdf-epub-mobi-o-leer-online/  -> procede del archivo index
	 */
	$pdf_donwload = $_REQUEST['getpdf'];
	$html->load_file('https://lelibros.online'.$pdf_donwload.'');
	$titulo = $html->find('article .list-books');
	foreach ($titulo as $item) {
		foreach ($item->find('.links-livro ul  li .down') as $grabURL) {
			$pdf = [];
			$pdf['pdf_descarga'] = $grabURL->href;
			$pdfs[] = $pdf;
			
		}
	}
	
	$donwloadpdf['pdf'] = $pdfs;
	print json_encode($donwloadpdf);


?>
