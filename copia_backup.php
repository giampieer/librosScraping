<?php
 require 'simple_html_dom.php';
$html = new simple_html_dom();

/*
$html->load_file('https://lelibros.online/categoria/infanto-juvenil/');
$titulo = $html->find('article .list-books');
 foreach ($titulo as $item) {
   for ($i=0; $i < 12; $i++) { 
    $libro = [];
        $libro['titulo'] = $item->find('ul li strong',$i)->plaintext;
        $img = $item->find('.books li a amp-img',0);
        $libro['imagen'] =$img->outertext = 'https://lelibros.online' . $img->src;
        $e = $item->find('ul li .down',$i);
        $libro['url'] =$e->outertext = 'https://lelibros.online' . $e->href;
        $libros[] = $libro;
   }
      }
    $estado['libros'] = $libros;
    print json_encode($estado);*/
$pages = 5;
$cantidad =  12;

for ($j=0; $j <$pages ; $j++) { 
$html->load_file('https://lelibros.online/categoria/infanto-juvenil/page/'.$j.'/');
$titulo = $html->find('article .list-books');
 foreach ($titulo as $item) {
   for ($i=0; $i < $cantidad; $i++) { 
    $libro = [];
        $libro['titulo'] = $item->find('ul li strong',$i)->plaintext;
        $img = $item->find('.books li a amp-img',$i);
        $libro['imagen'] =$img->outertext = 'https://lelibros.online' . $img->src;
        $e = $item->find('ul li .down',$i);
        $libro['url'] =$e->outertext = 'https://lelibros.online' . $e->href;
        $libros[] = $libro;
   }
      }
}

    $estado['libros'] = $libros;
    print json_encode($estado);









/*
$html->load_file('https://lelibros.online/libro/descargar-libro-mago-por-casualidad-en-pdf-epub-mobi-o-leer-online/');
$titulo = $html->find('article .list-books');
 foreach ($titulo as $item) {
  foreach ($item->find('.links-livro ul  li .down') as $grabURL) {
     $pdf = [];
        $pdf['titulo'] = $grabURL->href;
       $pdfs[] = $pdf;
     
   }
   
   }
      
    $donwloadpdf['pdf'] = $pdfs;
    print json_encode($donwloadpdf);

*/


?>
