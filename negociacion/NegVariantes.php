  <?php

require_once '../Datos/DaoVariante.php';
require_once '../Pojos/PojoVariante.php';

// Recepción de los datos enviados mediante POST desde el JS   
$daoCategoria = new DaoVariante();
$pojoCategoria = new PojoVariante();
$dato = "";
$datos = "";
$registro = "";

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$estatus = (isset($_POST['estatus'])) ? $_POST['estatus'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id_variante = (isset($_POST['id_variante'])) ? $_POST['id_variante'] : '';


switch($opcion){
    case "insertar": //alta
        $pojoCategoria->id_variante = null;
        $pojoCategoria->nombre = $nombre;
        $pojoCategoria->estatus = intval($estatus);
        $registro = $daoCategoria->registrarVariante($pojoCategoria);
        $dato = $daoCategoria->getDatosCategoriaTabla();
        break;
    case "modificar":
        $pojoCategoria->id_variante = $id_variante;
        $pojoCategoria->nombre = $nombre;
        $pojoCategoria->estatus = $estatus;
        $registro = $daoCategoria->editarVariante($pojoCategoria);
        $dato = $daoCategoria->getDatosCategoriaTabla();
    break;
    case "eliminar":
        $registro = $daoCategoria->eliminarVariante($id_variante);
    break;      
}


echo  $registro;

class NegVariantes{

    function mostrar(){
        $daoCategoria = new DaoVariante();
        $datos = $daoCategoria->getDatosVariante();
        return $datos; 
    }
}

?>