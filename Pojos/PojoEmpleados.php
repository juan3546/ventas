<?php
	/**
	* 
	*/
	class PojoEmpleados
	{
		//Definiendo atributos
		public $idusuario;
		public $nombre;
		public $usuario;
		public $password;
		public $correo;
		public $estatus;


		function __construct1(){}

		function __construct2($idusuario,$nombre,$usuario,$password,$correo,$estatus)
		{
			$this->idusuario=$idusuario;
			$this->nombre=$nombre;
			$this->usuario=$usuario;
			$this->password=$password;
			$this->correo=$correo;
			$this->estatus=$estatus;
		}
	}
?>