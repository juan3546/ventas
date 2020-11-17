<?php
require_once '../Datos/DaoLogin.php';
require_once '../Pojos/PojoEmpleados.php';
// Recepción de los datos enviados mediante POST desde el JS   
$daoLogin = new DaoLogin();
$pojoEmpleados = new PojoEmpleados();

$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';


$datos = $daoLogin->getDatosLogin($usuario);

 foreach ($datos as $key => $dat) {

 	if(password_verify($password, $dat->{"password"}) ){
 		 echo true;
 	}
 }

?>