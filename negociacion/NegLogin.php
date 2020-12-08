<?php
require_once '../Datos/DaoLogin.php';
require_once '../Pojos/PojoEmpleados.php';
// Recepción de los datos enviados mediante POST desde el JS   
$daoLogin = new DaoLogin();
$pojoEmpleados = new PojoEmpleados();

$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';


$datos = $daoLogin->getDatosLogin($usuario, $password);

 if ($datos !=null) {
  	$_SESSION['nombre'] = $datos->usuario ;
    $_SESSION['id']= $datos->id ;
  	 	echo "<script> window.location.href = '../presentacion/index.php '</script>";
	    header('Location: ../presentacion/index.php');
  }else{
  	echo '<script> window.location.href = "../index.php ";</script>';
  }
 }

?>