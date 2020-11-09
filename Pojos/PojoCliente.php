<?php
	class PojoCliente
	{
		//Definiendo atributos
		public $id_cliente;
		public $nombre;
        public $correo;
        public $telefono;
        public $direccion;
        public $estatus;


		function __construct1(){}

		function __construct2($id_cliente,$nombre,$correo,$telefono,$direccion,$estatus)
		{
			$this->id_cliente=$id_cliente;
			$this->nombre=$nombre;
            $this->correo=$correo;
            $this->telefono=$telefono;
            $this->direccion=$direccion;
			$this->estatus=$estatus;
		}
	}
?>