<?php

	namespace App\Models;

	use App\controllers\models,
		\PDO;

	class usuarios{
 
		public function __construct(){
			$this->model = new models;
		}
  
		public function queryConstructor($id){
			try{
				$sql = "SELECT * FROM usuarios WHERE id=:idusuario";
				$stmt = $this->model->conectar()->prepare($sql);
				$stmt->bindParam(":idusuario", $id, PDO::PARAM_INT);
				$stmt->execute();
				$respuesta = $stmt->fetch();
			}catch(\Exception $e){
				$this->model->catchError($sql, $e);
			}
			return $respuesta;
		}
		
		public function getUsuarios(){
			try{
				$sql = "SELECT * FROM usuarios";

				$stmt = $this->model->conectar()->prepare($sql);
				$stmt->execute();
				$respuesta = $stmt->fetchAll();

			}catch(\Exception $e){

			}

			return $respuesta;
		}

		public function updateInteger($propiedad, $valor, $id){
			try{
				$sql = "UPDATE usuarios SET ".$propiedad." = :valor WHERE id=:id";
				$stmt = $this->model->conectar()->prepare($sql);
				$stmt->bindParam(":valor", $valor, PDO::PARAM_INT);
				$stmt->bindParam(":id", $id, PDO::PARAM_INT);
				$stmt->execute();

			}catch(\Exception $e){
				$this->model->catchError($sql, $e);

			}
		}

		public function updateString($propiedad, $valor, $id){
			try{
				$sql = "UPDATE usuarios SET ".$propiedad." = :valor WHERE id=:id";
				$stmt = $this->model->conectar()->prepare($sql);
				$stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
				$stmt->bindParam(":id", $id, PDO::PARAM_INT);
				$stmt->execute();

			}catch(\Exception $e){
				$this->model->catchError($sql, $e);

			}
		}

		public function delete($variable){
			try{
				$sql = "DELETE FROM usuarios WHERE id = :id";
				$stmt = $this->model->conectar()->prepare($sql);
				$stmt->bindParam(":id", $variable, PDO::PARAM_INT);
				$stmt->execute();

			}catch(\Exception $e){
				$this->model->catchError($sql, $e);

			}
			return true;
		}

		public function create($email, $password, $nombre, $apellido1, $apellido2, $telefono, $curp, $direccion, $activo){
			try{
				$sql = "INSERT INTO usuarios(email, password, nombre, apellido1, apellido2, telefono, curp, direccion, activo) VALUES ('$email', '$password', '$nombre', '$apellido1',':$apellido2','$telefono','$curp','$direccion','$activo')";
				
				$stmt = $this->model->conectar()->prepare($sql);
				$stmt->bindParam(":$email", $email, PDO::PARAM_STR);
				$stmt->bindParam(":$password", $password, PDO::PARAM_STR);
				$stmt->bindParam(":$nombre", $nombre, PDO::PARAM_STR);
				$stmt->bindParam(":$apellido1", $apellido1, PDO::PARAM_STR);
				$stmt->bindParam(":$apellido2", $apellido2, PDO::PARAM_STR);
				$stmt->bindParam(":$telefono", $telefono, PDO::PARAM_STR);
				$stmt->bindParam(":$curp", $curp, PDO::PARAM_STR);
				$stmt->bindParam(":$direccion", $direccion, PDO::PARAM_STR);
				$stmt->bindParam(":$activo", $activo, PDO::PARAM_INT);
				$stmt->execute();

			}catch(\Exception $e){
				$this->model->catchError($sql, $e);

			}
			return true;
		}

		public function created($datos){
			$email = $datos['registroEmail'];
			$nombre = $datos['registroNombre'];
			$telefono = $datos['registroTelefono'];
			$curp = $datos['registroCurp'];
			$direccion = $datos['registroDireccion'];

			try{
				$sql = "INSERT INTO usuarios(email, nombre, telefono, curp, direccion) VALUES ('$email', '$nombre', '$telefono','$curp','$direccion')";
				
				$stmt = $this->model->conectar()->prepare($sql);
				$stmt->bindParam(":email", $email, PDO::PARAM_STR);
				$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
				$stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
				$stmt->bindParam(":curp", $curp, PDO::PARAM_STR);
				$stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
				$stmt->execute();

			}catch(\Exception $e){
				$this->model->catchError($sql, $e);

			}
			return true;
		}

	
	}