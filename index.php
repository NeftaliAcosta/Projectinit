<?php
    function sanitizeOutput($buffer) {
	    $search = array(
	        '/\>[^\S ]+/s',     // Quitamos espacios en blanco después de las etiquetas, excepto los espacios en sí
	        '/[^\S ]+\</s',     // Quitamos espacios en blanco antes de las etiquetas, excepto los espacios en sí
	        '/(\s)+/s',         // Acortamos los espacios en blanco
	        '/<!--(.|\s)*?-->/' // Quitamos los comentarios HTML
	    );
	    $replace = array(
	        '>',
	        '<',
	        '\\1',
	        ''
	    );
	    $output = preg_replace($search, $replace, $buffer);
	    return $output;
	}
    ob_start("sanitizeOutput");
    //ob_start();
    ob_get_contents();
    include "include/sistema.php";
    ob_end_flush();
