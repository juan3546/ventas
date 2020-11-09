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
$estatus = (isset($_POST['correo'])) ? $_POST['estatus'] : '';
$nombre = (isset($_POST['telefono'])) ? $_POST['nombre'] : '';
$estatus = (isset($_POST['direccion'])) ? $_POST['estatus'] : '';
$nombre = (isset($_POST['estatus'])) ? $_POST['nombre'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['idCategoria'])) ? $_POST['idCategoria'] : '';

switch($opcion){
    case "insertar": //alta
        $pojoCategoria->id_categoria = null;
        $pojoCategoria->nombre = $nombre;
        $pojoCategoria->estatus = intval($estatus);
        $registro = $daoCliente->registrarCliente($pojoCategoria);
        $dato = $daoCliente->getDatosCliente();
        break;
    case "modificar":
        $pojoCategoria->id_categoria = $id;
        $pojoCategoria->nombre = $nombre;
        $pojoCategoria->estatus = $estatus;
        $registro = $daoCliente->editarCategoria($pojoCategoria);
        $dato = $daoCliente->getDatosCategoriaTabla();
    break;
    case "eliminar":
        $registro = $daoCliente->EliminarEstatusCategoria($id);
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