<?php

require_once '../Datos/DaoCliente.php';
require_once '../Pojos/PojoCliente.php';

// Recepción de los datos enviados mediante POST desde el JS   
$daoCliente = new DaoCliente();
$pojoCliente = new PojoCliente();
$dato = "";
$datos = "";
$registro = "";

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$correo = (isset($_POST['email'])) ? $_POST['email'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
$estatus = (isset($_POST['estatus'])) ? $_POST['estatus'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id_cliente'])) ? $_POST['id_cliente'] : '';

switch($opcion){
    case "insertar": //alta
        $pojoCliente->nombre = $nombre;
        $pojoCliente->correo = $correo;
        $pojoCliente->telefono = $telefono;
        $pojoCliente->direccion = $direccion;
        $pojoCliente->estatus = $estatus;
        $registro = $daoCliente->registrarCliente($pojoCliente);
        $dato = $daoCliente->getDatosCliente();
        break;
    case "modificar":
        $pojoCliente->id_cliente = $id;
        $pojoCliente->nombre = $nombre;
        $pojoCliente->correo = $correo;
        $pojoCliente->telefono = $telefono;
        $pojoCliente->direccion = $direccion;
        $pojoCliente->estatus = $estatus;
        $registro = $daoCliente->editarCliente($pojoCliente);
        $dato = $daoCliente->getDatosCliente();
    break;
    case "eliminar":
        $registro = $daoCliente->eliminarCliente($id);
    break;      
}


echo  $registro;

class NegClientes{

    function mostrar(){
        $daoCliente = new DaoCliente();
        $datos = $daoCliente->getDatosCliente();
        return $datos; 
    }
}?>