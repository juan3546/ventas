<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../Pojos/PojoEmpleados.php';

class DaoEmpleados{
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

	public function getDatosEmpleados()
	{
		try{
			$this->conectar();
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/
			$sentenciaSQL = $this->conexion->prepare("SELECT idusuario, nombre, usuario, contraseña, correo, estatus FROM usuarios"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
			/*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new PojoEmpleados();
				$obj->idusuario = $fila->idusuario;
				$obj->nombre = $fila->nombre;
				$obj->usuario = $fila->usuario;
				$obj->password = $fila->contraseña;
				$obj->correo = $fila->correo;
				$obj->estatus = $fila->estatus;
				$lista[] = $obj;
			}
			return $lista;
		}catch(Exception $e){
			echo $e->getMessage();
			return null;
		}finally {
			Conexion::cerrarConexion();
		}
	}

	public function registrarEmpleado(PojoEmpleados $obj)
	{
		$clave=0;
		try 
		{
			$sql = "INSERT INTO usuarios(idusuario, nombre, usuario, contraseña, correo, estatus)values(?, ?, ?, ?, ?, ?)";

			$this->conectar();
			$this->conexion->prepare($sql)
			->execute(
				array(
					$obj->idusuario,
					$obj->nombre,
					$obj->usuario,
					$obj->password,
					$obj->correo,
					$obj->estatus
				)
			);
			$clave=$this->conexion->lastInsertId();
			return $clave;
		} catch (Exception $e) 
		{
			return $clave;
		}finally{
    /*
    En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
    */
    Conexion::cerrarConexion();
}
}
public function editarEmpleado(PojoEmpleados $obj)
{
	$sql = "UPDATE usuarios SET 
	nombre= ?,
	usuario= ?,
	contraseña= ?,
	correo= ?,
	estatus= ?
	WHERE idusuario = ?";
	$this->conectar();
	$sentenciaSQL = $this->conexion->prepare($sql); 
	$sentenciaSQL->execute(
		array(
			$obj->nombre,
			$obj->usuario,
			$obj->password,
			$obj->correo,
			$obj->estatus,
			$obj->idusuario
		));
	return true;
	Conexion::cerrarConexion();
}
public function EliminarEstatusEmpleados($id)
{
	try 
	{
		$this->conectar();    
		$sentenciaSQL = $this->conexion->prepare("UPDATE usuarios SET estatus= 0 WHERE idusuario = ?");                             
		$sentenciaSQL->execute([$id]);
		return true;
	} catch (Exception $e) 
	{
		return false;
	}finally{
		Conexion::cerrarConexion();
	}
}

}


?>