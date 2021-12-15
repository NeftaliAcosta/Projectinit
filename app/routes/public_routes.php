<?php 

$this->route->get('/', function() {
	include_once __DIR__.'/../views/pages/inicio.php';
});

$this->route->add('GET|POST', '/editar', function() {
	include_once __DIR__.'/../views/pages/editar.php';
});

$this->route->add('GET|POST', '/crear', function() {
	include_once __DIR__.'/../views/pages/crear.php';
});

$this->route->get('/eliminar', function() {
	include_once __DIR__.'/../views/pages/eliminar.php';
});

$this->route->error(function() {
 	echo "Ocurrió un problema con la ruta. Al parecer no existe.";
});