<?php 


namespace App\controllers;

use App\libs\validaciones; 

class usuarios{
		public $id;
		public $email; 
		public $password;
		public $nombre;
		public $apellido1;
		public $apellido2;
		public $telefono;
		public $curp;
		public $direccion; 

		public function __construct($id=null){
			
			$resp = models::container()->usuarios->queryConstructor($id);

			if($resp){
				$this->id = $resp['id'];
				$this->email = $resp['email'];
				$this->password = $resp['password'];
				$this->nombre = $resp['nombre'];
				$this->apellido1 = $resp['apellido1'];
				$this->apellido2 = $resp['apellido2'];
				$this->telefono = $resp['telefono'];
				$this->curp = $resp['curp'];
				$this->direccion = $resp['direccion'];
			}

		}

		public function __get($variable){
			if(property_exists($this, $variable)){
				return $this->$variable;
			}else{
				return false;
			}
		}

		public function setId($valor){
			$this->id = $valor;
		}

		public function setEmail($valor){
			$this->email = $valor;
		}

		public function setPassword($valor){
			$this->password = $valor;
		}

		public function setNombre($valor){
			$this->nombre = $valor;
		}

		public function setApellido1($valor){
			$this->apellido1 = $valor;
		}

		public function setApellido2($valor){
			$this->apellido2 = $valor;
		}

		public function setTelefono($valor){
			$this->telefono = $valor;
		}

		public function setCurp($valor){
			$this->curp = $valor;
		}

		public function setDireccion($valor){
			$this->direccion = $valor;
		}

		public function getUsuarios(){
			return models::container()->usuarios->getUsuarios();
		}

		public function save(){
			self::update(false, true, "email", $this->email)
			->update(false, true, "password", $this->password)
			->update(false, true, "nombre", $this->nombre)
			->update(false, true, "apellido1", $this->apellido1)
			->update(false, true, "apellido2", $this->apellido2)
			->update(false, true, "telefono", $this->telefono)
			->update(false, true, "curp", $this->curp)
			->update(false, true, "direccion", $this->direccion);

			return true;
			
		}


		private function update($entero=false, $string=false, $propiedad, $valor){
			if($entero){
				models::container()->usuarios->updateInteger($propiedad, $valor, $this->id);
			}

			if($string){
				models::container()->usuarios->updateString($propiedad, $valor, $this->id);
			}
			return $this;
				
		}

		public function eliminar(){
			if($this->id !== NULL){
				return self::delete();
			}
		}

		public function crear(){
			if($this->nombre !== NULL){
				return self::create();
			}
		}

		public function crearr($key){
			
			$mensaje = array("guardado"=>false, "mensaje"=>"");
			$key="registroNombre";
			$datos = $_POST;

			if(isset($datos[$key])){
				$resp = validaciones::validarTexto($datos[$key]);

				if(!$resp){
					$mensaje['mensaje'] .= "<li>El nombre tiene caracteres no validos.</li>";
				}

			}else{
				$mensaje['mensaje'] .= "<li>El nombre es un parametro obligario.</li>";
			}
			
			

			$key="registroEmail";


			if(isset($datos[$key])){
				$resp = validaciones::validarEmail($datos[$key]);

				if(!$resp){
					$mensaje['mensaje'] .= "<li>El email no tiene una estructura valida.</li>";
				}

			}else{
				$mensaje['mensaje'] .= "<li>El email es un parametro obligario.</li>";
			}

			$key="registroTelefono";

			if(isset($datos[$key])){
				$resp = validaciones::validarTelefono($datos[$key]);

				if(!$resp){
					$mensaje['mensaje'] .= "<li>El telefono no tiene una estructura valida.</li>";
				}

			}else{
				$mensaje['mensaje'] .= "<li>El telefono es un parametro obligario.</li>";
			}

			$key="registroCurp";

			if(isset($datos[$key])){
				$resp = validaciones::validarCurp($datos[$key]);

				if(!$resp){
					$mensaje['mensaje'] .= "<li>El curp tiene caracteres no validos.</li>";
				}

			}else{
				$mensaje['mensaje'] .= "<li>El curp es un parametro obligario.</li>";
			}

			$key="registroDireccion";

			if(isset($datos[$key]) && !empty($datos['$key'])){
				$resp = validaciones::validarDireccion($datos[$key]);

				if(!$resp){
					$mensaje['mensaje'] .= "<li>La Direccion tiene caracteres no validos.</li>";
				}
			}

			if($mensaje["mensaje"] ==""){
				$mensaje['guardado'] = true;
				//guardo en base de datos el usuario
				$resp = self::created($datos);

				if($resp){
					$mensaje['guardado'] = true;
				}else{
					$mensaje['mensaje'] .= "<li>Ocurrio un problema al insertar el registro en la base de datos</li>";
				}

			}

			return json_encode($mensaje, true);
		}

		private function delete(){
			return models::container()->usuarios->delete($this->id);
		}
 		

		private function created($datos){
			return models::container()->usuarios->created($datos);
		}

		private function create(){
			return models::container()->usuarios->create($this->email, $this->password, $this->nombre, $this->apellido1, $this->apellido2, $this->telefono, $this->curp, $this->direccion, $activo=NULL);
		}







































		/**Validar texto*/
		public static function validarTexto($texto){
			$datos = [
				"val"=> false,
				"texto"=> "",
			];

			$texto = trim($texto);

			if($texto==""){
				return $datos;
			}else{
				$patron = '/^[a-zA-ZñÑáéíóúÁÉÍÓÚ()\s]*$/';

				if(preg_match($patron, $texto)){
					$datos['val'] = true;
					$datos['texto'] = $texto;

					return $datos;
				}else{
					return $datos;
				}
			}

      }
		

		/**Validar numero telefonico */ 
		public static function validarTelefono($telefono){
			$patron = '/^[0-9]+$/';

			if(strlen($telefono) <= 10 && is_numeric($telefono)){
				if(preg_match($patron, $telefono)){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}


		/*VAlidar si tiene estructura logica al correo electronico*/
		public static function validarEmail($email){
			$emailErr = "El email no es valido";

			if(filter_var($email, FILTER_VALIDATE_EMAIL)){
				return $email;
			}else{
				return $emailErr;

			}
		}

		/**Valida una direccion pasando como parametro la direccion y la longitud
		 * maxima de la direccion en el campo de la base de datos*/
		
		public static function validarDireccion($direccion){
			$datos = [
				"val"=> false,
				"texto"=> "",
			];

			$direccion = trim($direccion);

			if($direccion==="" || $direccion === NULL){
				return $datos;
			}else{
				$patron = '/^[a-zA-ZñÑáéíóúÁÉÍÓÚ()\s]*$/';
	
				if(preg_match($patron, $direccion) && strlen($direccion) <= 50){
					$datos['val']=true;
					$datos['texto']= $direccion;

					return $datos;
				}else{
					return $datos;
				}
			}
		}

		public static function validarFormularioUsuario($nombre){

			
		}	
	}