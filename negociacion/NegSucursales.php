 <?php

require_once '../Datos/DaoSucursales.php';
require_once '../Pojos/PojoSucursales.php';

// Recepción de los datos enviados mediante POST desde el JS   
$daoCategoria = new DaoSucursales();
$pojoCategoria = new PojoSucursales();
$dato = "";
$datos = "";
$registro = "";

$id_nombre_precio = (isset($_POST['id_nombre_precio'])) ? $_POST['id_nombre_precio'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$no_corte = (isset($_POST['no_corte'])) ? $_POST['no_corte'] : '';
$estatus = (isset($_POST['estatus'])) ? $_POST['estatus'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id_sucursal = (isset($_POST['id_sucursal'])) ? $_POST['id_sucursal'] : '';


switch($opcion){
    case "insertar": //alta
        $pojoCategoria->id_sucursal = null;
        $pojoCategoria->id_nombre_precio = $id_nombre_precio;
        $pojoCategoria->nombre = $nombre;
        $pojoCategoria->no_corte = $no_corte;
        $pojoCategoria->estatus = intval($estatus);
        $registro = $daoCategoria->registrarSucursales($pojoCategoria);
        $dato = $daoCategoria->getDatosCategoriaTabla();
        break;
    case "modificar":
        $pojoCategoria->id_sucursal = $id_sucursal;
        $pojoCategoria->id_nombre_precio = $id_nombre_precio;
        $pojoCategoria->nombre = $nombre;
        $pojoCategoria->no_corte = $no_corte;
        $pojoCategoria->estatus = $estatus;
        $registro = $daoCategoria->editarSucursales($pojoCategoria);
        $dato = $daoCategoria->getDatosCategoriaTabla();
    break;
    case "eliminar":
        $registro = $daoCategoria->eliminarSucursales($id_sucursal);
    break;      
}


echo  $registro;

class NegSucursales{

    function mostrar(){
        $daoCategoria = new DaoSucursales();
        $datos = $daoCategoria->getDatosSucursales();
        return $datos; 
    }
}





?>