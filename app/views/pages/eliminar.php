<?php 
use App\controllers\usuarios;

if($_GET['id']){
	//eliminamos el usuario
	$usuarios = new usuarios($_GET['id']);
	$usuarios->eliminar(); 

}

header('Location: http://localhost/crud');

 




/*use App\controllers\usuarios;

$usuarios = new usuarios($_GET['id']);

//Esta condicion cumple con la funcion de ver si el usuario existe si no lo hace entonces redirige a la pagina principal.
if($usuarios->__get('id')){
	//eliminamos el usuario
	
	echo 'Eliminando usuario... '.$_GET['id'].' Adios';
}else{
	header('Location: http://localhost/crud');
}
*/
 
?>