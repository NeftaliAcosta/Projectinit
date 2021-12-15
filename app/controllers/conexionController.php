<?php

namespace App\Controllers;

use \PDO,
Monolog\Logger,
Monolog\Handler\StreamHandler,
Monolog\Handler\FirePHPHandler;



class conexion{
	public $dbus;
	public $bdname;
	public $bdpw;
	public $bdhost;
	public $logger;

	public function __construct(){
		$this->dbus = DB_USER;;
		$this->bdname = DB_NAME;
		$this->bdpw= DB_PASS;
		$this->bdhost = DB_HOST;

		$this->logger = new Logger('myapp');
		$this->logger->pushHandler(new StreamHandler(ROOT_PATH.'/my_app.log',Logger::DEBUG));
	}

	public  function conectar(){
		$dsn = "mysql:host=".$this->bdhost.";dbname=".$this->bdname.";charset=utf8";
		$usuario =  $this->dbus;
		$password = $this->bdpw;
		try {
			$mbd = new PDO($dsn, $usuario, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'", PDO::ATTR_PERSISTENT => true));
			$mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$mbd->exec('SET NAMES "utf8"');
		} catch (PDOException $e) {
			self::catchmsj(NULL, $e);
			echo '<br><div class="container"><div class="section">'.$e->getMessage().'</div></div>';
			return false;
		}
		return $mbd;
		$mbd = null;
		sleep(60);
	}

	public function catchError($sql, $e){
		$this->logger->warning("SQL->'".$sql."' ".$e);
		die("Ups, ocurrió un problema con el servidor de base de datos que ya hemos notificado.");
		//Ejecutar código para enviar por correo electrónico una notifiación en cada error del sistema.
	}


}

