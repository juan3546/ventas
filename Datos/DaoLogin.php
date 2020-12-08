<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../Pojos/PojoEmpleados.php';

class DaoLogin{
	private $conexion; /*Crea una variable conexion*/
	private function conectar()
	{
		try{
			$this->conexion = Conexion::abrirConexion(); /*inicializa la variable conexion, llamando a la funcion abrirConexion(); de la clase Conexion por medio de una instancia*/
		}
		catch(Exception $e)
		{
			die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
		}
	}

	 public function obtenerUsuario($nombre, $clave){
        
  try {
    $lista = array(); 
    
    $this->conectar();
           $select=$this->conexion->prepare("SELECT * FROM usuarios WHERE usuario='$nombre'");
           $select->execute();
           $registro=$select->fetch();
           if($registro != null){ 
          if(password_verify($clave, $registro['contraseña'])){ 
              $usuario = new PojoEmpleados();
              $usuario->idusuario = $registro['idusuario'];
              $usuario->nombre= $registro['nombre'];
              $usuario->usuario= $registro['usuario'];
              $usuario->password = $registro['contraseña'];
              $usuario->estatus = $registro['estatus'];
              
              return $usuario;
          }
        }
  } catch (Exception $e) {
     return null;
  }finally{
    Conexion::cerrarConexion();
  }
           
    }
}
?>