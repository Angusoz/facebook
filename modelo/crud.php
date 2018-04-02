<?php
include("conexion.php");
class Crud extends Conexion{
	public $insertInto;
	public $insertColumns;
	public $insertValues;
	public $select;
	public $from;
	public $condition;
	public $updateTable;
	public $update;
	public $deleteTable;
	public $rows;
	public $mensaje;
	public $campo;
	public $tabla;

	public function create(){
		self::conectar();
		$insertInto = $this->insertInto;
		$insertColumns = $this->insertColumns;
		$insertValues = $this->insertValues;

		/* Consultas de selección que devuelven un conjunto de resultados */
			$resultado = mysqli_query($this->mysqli, "INSERT INTO $insertInto ($insertColumns) VALUES($insertValues)");

		// if (!$resultado) {
		// 	$this->mensaje = "Ha ocurrido un error al ejecutar la inserción";
		// 	echo $this->mensaje;
		// } else {
		// 	$this->mensaje = "Se han insertado los datos";
		// 	echo $this->mensaje;
		// }
	}		

	public function read(){
		self::conectar();
		$select = $this->select; // *, columna1, columna2..
		$from = $this->from; // nombre de la tabla a la que quiero consultar
		$condition = $this->condition;
		if ($condition != '') {
			$condition = " WHERE ".$condition;
		}
		/* Consultas de selección que devuelven un conjunto de resultados */
			$resultado = mysqli_query($this->mysqli, "SELECT $select FROM $from $condition");

		while ($fila = mysqli_fetch_array($resultado)) {
			$this->rows[] = $fila;
		}

		return $this->rows;
		// if (count($this->rows) > 0) {
		// 	foreach ($this->rows as $fila) {
		// 		echo "<input type='text' value='".$fila['id_destino']."'>";
		// 	}
		// }
	}
	
	public function update(){
		self::conectar();
		$updateTable = $this->updateTable; // Nombre de la tabla en la que se va a hacer el update..
		$update = $this->update; // nombre del campo = valor que tendra luego de actualizar
		$condition = $this->condition;

		if ($condition != '') {
			$condition = "WHERE ".$condition;
		}
		/* Consultas de selección que devuelven un conjunto de resultados */
			$resultado = mysqli_query($this->mysqli, "UPDATE $updateTable SET $update $condition");
		
		// if($resultado){
		// 	echo $this->mensaje = "se han actualizado los datos de manera correcta...";
		// } else {
		// 	echo $this->mensaje = "HA OCURRIDO UN ERROR AL INTENTAR ACTUALIZAR LOS DATOS...";
		// }
	}
	
	public function delete(){
		self::conectar();
		$deleteTable = $this->deleteTable; // Nombre de la tabla en la que se va a hacer el delete...		
		$condition = $this->condition;

		if ($condition != '') {
			$condition = "WHERE ".$condition;
		}

		/* Consultas de selección que devuelven un conjunto de resultados */
			$resultado = mysqli_query($this->mysqli, "DELETE FROM $deleteTable $condition");
		
		// if(!$resultado){
		// 	$this->mensaje = "HA OCURRIDO UN ERROR AL INTENTAR ELIMINAR LOS DATOS...";
		// 	//echo $this->mensaje;
		// } else {
		// 	$this->mensaje = "se han eliminado los datos de manera correcta...";
		// 	//echo $this->mensaje;
		// }
	}

	public function ultimo(){
		self::conectar();
		$campo = $this->campo;
		$tabla = $this->tabla;

		/* Consultas de selección que devuelven un conjunto de resultados */
			$resultado = mysqli_query($this->mysqli, "SELECT MAX($campo) FROM $tabla");

		while ($fila = mysqli_fetch_array($resultado)) {
			$this->rows[] = $fila;
		}

		// if (!$resultado) {
		// 	$this->mensaje = "Ha ocurrido un error al buscar el ultimo id";
		// 	echo $this->mensaje;
		// } else {
		// 	$this->mensaje = "Se ha consegui el ultimo id";
		// 	echo $this->mensaje;
		// }
	}	
}
// $crud = new Crud();
// $crud->select = '*';
// $crud->from = 'destinos';
// $crud->condition = '';
// $crud->read();

// $crud->insertInto = '';
// $crud->insertColumns = '';
// $crud->insertValues = '';
// $crud->create();

// $crud->updateTable = '';
// $crud->update = '';
// $crud->condition = '';
// $crud->update();

// $crud->deleteTable = '';
// $crud->condition = '';
// $crud->delete();

// $ultimo = new Crud();
	// $ultimo->campo = 'id_destino';
	// $ultimo->tabla = 'destinos';
	// $ultimo->ultimo();

 //    if (count($ultimo->rows) > 0) {
 //        foreach ($ultimo->rows as $fila) {     
 //        	$id = trim($fila[0]);
 //        }
 //    }

?>