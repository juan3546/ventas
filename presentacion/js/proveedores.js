$(document).ready(function(){
	$('#tablaCategorias').DataTable({
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

	$("#guardarnuevo").click(function(){
		idProveedor = $('#idProveedor').val();
		nombre = $('#nombre').val();
		if($('#status').prop('checked')){
			alert("Esta Activo");
			status = 1;
		}else{
			status = 0;
		}
		opcion = "insertar";
		
		agregarProveedor(idProveedor, nombre, status, opcion);
	}); 

	$('#actualizadatos').click(function(){
		actualizaDatos();
	});
});

function agregarProveedor(idProveedor, nombre, status, opcion){
	cadena = "id_proveedor="+idProveedor+"&nombre="+nombre+"&estatus="+status+"&opcion="+opcion;
	$.ajax({
		type: "POST",
		url: "../negociacion/NegProveedores.php",
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


	id=$('#idProveedor').val();
	nombre=$('#nombreMod').val();
	if($('#statusMod').prop('checked')){
		status = 1;
	}else{
		status = 0;
	}
	opcion = "modificar";

	cadena= "id_proveedor=" + id +
	"&nombre=" + nombre + 
	"&estatus=" + status+
	"&opcion="+opcion;
	$.ajax({
		type:"POST",
		url:"../negociacion/NegProveedores.php",
		data:cadena,
		success:function(r){
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
	$('#idProveedor').val(d[0]);
	$('#nombreMod').val(d[1]);
	if(d[2] == 1){
		$("#statusMod").prop('checked', true);
	}
}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
		function(){ eliminarDatos(id) }
		, function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){
	opcion = "eliminar";
	cadena="id_proveedor="+ id+"&opcion="+opcion;
	$.ajax({
		type:"POST",
		url:"../negociacion/NegProveedores.php",
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