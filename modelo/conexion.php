<?php
	class Conexion{
		public $mysqli;
		public function conectar(){
			$this->mysqli = new mysqli("localhost", "root", "", "facebook");
			return($this->mysqli);
			/* comprobar la conexión 
			if ($mysqli->connect_errno) {
			    printf("Falló la conexión: %s\n", $mysqli->connect_error);
			    exit();
			}*/
		}
	}
?>
