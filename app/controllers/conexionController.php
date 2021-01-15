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
	public $mod;
	public $msj;
	public $logger;

	public function __construct(){
		$this->dbus = tools::my_decrypt(base64_decode());
		$this->bdname = tools::my_decrypt(base64_decode(DB_NAME));
		$this->bdpw= tools::my_decrypt(base64_decode(DB_PASS));
		$this->bdhost = tools::my_decrypt(base64_decode(DB_HOST));
		$this->mod = MOD_MANTENIMIENTO;
		$this->msj = MSJ_MANTENIMIENTO;

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
	}


}

