<?php
require_once '../Datos/DaoEmpleados.php';
require_once '../Pojos/PojoEmpleados.php';

// Recepción de los datos enviados mediante POST desde el JS   
$daoEmpleados = new DaoEmpleados();
$pojoEmpleados = new PojoEmpleados();
$dato = "";
$datos = "";
$registro = "";

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$passwordActual = (isset($_POST['passwordActual'])) ? $_POST['passwordActual'] : '';
$estatus = (isset($_POST['estatus'])) ? $_POST['estatus'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['idEmpleado'])) ? $_POST['idEmpleado'] : '';

switch($opcion){
	case "insertar": //alta
	$pojoEmpleados->idusuario = null;
	$pojoEmpleados->nombre = $nombre;
	$pojoEmpleados->usuario = $usuario;
	$pojoEmpleados->password = password_hash($password, PASSWORD_DEFAULT);
	$pojoEmpleados->correo = $correo;
	$pojoEmpleados->estatus = intval($estatus);
	$registro = $daoEmpleados->registrarEmpleado($pojoEmpleados);
		//$dato = $daoEmpleados->getDatosEmpleadosTabla();
	break;
	case "modificar":
	$pojoEmpleados->idusuario = $id;
	$pojoEmpleados->nombre = $nombre;
	$pojoEmpleados->usuario = $usuario;
	if(!empty($password)){
		$pojoEmpleados->password = password_hash($password, PASSWORD_DEFAULT);
	}else{
		$pojoEmpleados->password = $passwordActual;
	}
	$pojoEmpleados->correo = $correo;
	$pojoEmpleados->estatus = intval($estatus);
	$registro = $daoEmpleados->editarEmpleado($pojoEmpleados);

	break;
	case "eliminar":
	$registro = $daoEmpleados->EliminarEstatusEmpleados($id);
	break; 
}

echo  $registro;


class NegEmpledos{

	function mostrar(){
		$daoEmpleados = new DaoEmpleados();
		$datos = $daoEmpleados->getDatosEmpleados();
		return $datos; 
	}
}

?>