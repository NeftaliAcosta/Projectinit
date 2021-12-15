<?php

namespace App\libs;


class validaciones{
	//Valida un texto (Nombre, Apellidos)
	public static function validarTexto($texto){

		$patron = '/^[a-zA-ZñÑáéíóúÁÉÍÓÚ()\s]*$/';
		if(preg_match($patron,$texto)){
			return true;

		}else{
			return false;
		}
			
	}


	//Valida un número telefónico
	public static function validarTelefono($telefono){
		$patron = '/^[0-9]+$/';
		if(strlen($telefono)<=10 &&  is_numeric($telefono) ){
			if(preg_match($patron, $telefono)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	//Valida que tenga la estructura lógica de un correo electrónico
	public static function validarEmail($email){
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}else{
			return false;
		}
	}


	public static function validarCurp($texto){

		$patron = '/^[a-zA-Z0-9]*$/';
		if(preg_match($patron,$texto)){
			return true;
		}else{
			return false;
		}
			
	}

	//Valida una dirección pasando como parámetro la dirección y la longitud máxima de la dirección en el campo de la base de datos
	public static function validarDireccion($texto){

		$patron = '/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ,#.()\s]*$/';
		if(preg_match($patron,$texto)){
			return true;
		}else{
			return false;
		}
		
	}
}