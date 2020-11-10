<?php

require_once '../Datos/DaoProveedor.php';
require_once '../Pojos/PojoProveedor.php';

// Recepción de los datos enviados mediante POST desde el JS   
$daoProveedor = new DaoProveedor();
$pojoProveedor = new PojoProveedor();
$dato = "";
$datos = "";
$registro = "";

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$estatus = (isset($_POST['estatus'])) ? $_POST['estatus'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id_proveedor'])) ? $_POST['id_proveedor'] : '';

switch($opcion){
    case "insertar": //alta
        $pojoProveedor->nombre = $nombre;
        $pojoProveedor->estatus = $estatus;
        $registro = $daoProveedor->registrarProveedor($pojoProveedor);
        $dato = $daoProveedor->getDatosProveedor();
        break;
    case "modificar":
        $pojoProveedor->id_categoria = $id;
        $pojoProveedor->nombre = $nombre;
        $pojoProveedor->estatus = $estatus;
        $registro = $daoProveedor->editarProveedor($pojoProveedor);
        $dato = $daoProveedor->getDatosProveedor();
    break;
    case "eliminar":
        $registro = $daoProveedor->eliminarProveedor($id);
    break;      
}


echo  $registro;

class NegProveedores{

    function mostrar(){
        $daoProveedor = new daoProveedor();
        $datos = $daoProveedor->getDatosProveedor();
        return $datos; 
    }
}?>