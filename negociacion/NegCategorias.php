<?php

require_once '../Datos/DaoCategoria.php';
require_once '../Pojos/PojoCategoria.php';

// Recepción de los datos enviados mediante POST desde el JS   
$daoCategoria = new DaoCategoria();
$pojoCategoria = new PojoCategoria();
$dato = "";
$datos = "";
$registro = "";

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$estatus = (isset($_POST['estatus'])) ? $_POST['estatus'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['idCategoria'])) ? $_POST['idCategoria'] : '';

switch($opcion){
    case "insertar": //alta
        $pojoCategoria->id_categoria = null;
        $pojoCategoria->nombre = $nombre;
        $pojoCategoria->estatus = intval($estatus);
        $registro = $daoCategoria->registrarCategoria($pojoCategoria);
        $dato = $daoCategoria->getDatosCategoriaTabla();
        break;
    case "modificar":
        $pojoCategoria->id_categoria = $id;
        $pojoCategoria->nombre = $nombre;
        $pojoCategoria->estatus = $estatus;
        $registro = $daoCategoria->editarCategoria($pojoCategoria);
        $dato = $daoCategoria->getDatosCategoriaTabla();
    break;
    case "eliminar":
        $registro = $daoCategoria->EliminarEstatusCategoria($id);
    break;      
}


echo  $registro;

class NegCategoria{

    function mostrar(){
        $daoCategoria = new DaoCategoria();
        $datos = $daoCategoria->getDatosCategoria();
        return $datos; 
    }
}





?>