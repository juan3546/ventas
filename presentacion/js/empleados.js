$(document).ready(function(){
	$('#tablaEmpleados').DataTable({
		language:{
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			},
			"buttons": {
				"copy": "Copiar",
				"colvis": "Visibilidad"
			}
		}


	});
});
$(document).ready(function(){
	//$('#tabla').load('tablas/tablaCategorias.php');

	$("#guardarnuevo").click(function(){
		idEmpleado = $('#idEmpleado').val();
		nombre = $('#nombre').val();
		usuario = $('#usuario').val();
		correo = $('#correo').val();
		password = $('#password').val();
		estatus = $('#estatus').val();
		opcion = "insertar";
		
		agregarEmpleado(idEmpleado, nombre, usuario, correo, password,  estatus, opcion);
	}); 

	$('#actualizadatos').click(function(){
		actualizaDatos();
	});
});

function agregarEmpleado(idEmpleado, nombre, usuario, correo, password,  estatus, opcion){
	cadena = "idEmpleado="+idEmpleado+"&nombre="+nombre+"&usuario="+usuario+"&correo="+correo+"&password="+password+"&estatus="+estatus+"&opcion="+opcion;
	$.ajax({
		type: "POST",
		url: "../negociacion/NegEmpleados.php",
		data: cadena,
		success: function(data){
			console.log(data);
			if(data>=1){
				
				alertify.success("agregado con exito :D");
				location.reload();
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function actualizaDatos(){


	idEmpleado = $('#idEmpleadou').val();
	nombre = $('#nombreu').val();
	usuario = $('#usuariou').val();
	correo = $('#correou').val();
	password = $('#passwordu').val();
	passwordActual = $('#passwordActual').val();
	estatus = $('#estatusu').val();
	opcion = "modificar";

	cadena = "idEmpleado="+idEmpleado+"&nombre="+nombre+"&usuario="+usuario+"&correo="+correo+"&password="+password+"&passwordActual="+passwordActual+"&estatus="+estatus+"&opcion="+opcion;
	//console.log("Llego a actualizar");
	$.ajax({
		type:"POST",
		url:"../negociacion/NegEmpleados.php",
		data:cadena,
		success:function(r){
		//	console.log(r);
		if(r==1){

			alertify.success("Actualizado con exito :)");
			location.reload();
		}else{
			alertify.error("Fallo el servidor :(");
		}
	}
});

}

function agregaform(datos){

	d=datos.split('||');

	$('#idEmpleadou').val(d[0]);
	$('#nombreu').val(d[1]);
	$('#usuariou').val(d[2]);
	$('#passwordActual').val(d[3]);
	$('#correou').val(d[4]);
	$('#estatusu').val(d[5]);

	
}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
		function(){ eliminarDatos(id) }
		, function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){
	opcion = "eliminar";
	cadena="idEmpleado="+ id+"&opcion="+opcion;
//	console.log("llego a eliminar");
	$.ajax({
		type:"POST",
		url:"../negociacion/NegEmpleados.php",
		data:cadena,
		success:function(r){
			console.log(r);
			if(r==1){
				
				alertify.success("Eliminado con exito!");
				location.reload();
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}