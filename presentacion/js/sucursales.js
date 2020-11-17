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
	//$('#tabla').load('tablas/tablaCategorias.php');

	$("#guardarnuevo").click(function(){
		//idCategoria = $('#idCategoria').val();
		id_nombre_precio = $('#id_nombre_precio').val();
		nombre = $('#nombre').val();
		no_corte = $('#no_corte').val();
		estatus = $('#estatus').val();
		opcion = "insertar";
	
		agregarSucursal(id_nombre_precio, nombre, no_corte, estatus, opcion);
	}); 

	$('#actualizadatos').click(function(){
		actualizaDatos();
	});
});

function agregarSucursal(id_nombre_precio, nombre, no_corte, estatus, opcion){
	cadena = "id_nombre_precio="+id_nombre_precio+"&nombre="+nombre+"&no_corte="+no_corte+"&estatus="+estatus+"&opcion="+opcion;
	$.ajax({
		type: "POST",
		url: "../negociacion/NegSucursales.php",
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
	id_sucursal=$('#id_sucursal2').val();
	id_nombre_precio = $('#id_nombre_precio2').val();
	nombre = $('#nombre2').val();
	no_corte = $('#no_corte2').val();
	estatus = $('#estatus2').val();
	opcion = "modificar";

	cadena= "id_sucursal="+id_sucursal+"&id_nombre_precio="+id_nombre_precio+"&nombre="+nombre+"&no_corte="+no_corte+"&estatus="+estatus+"&opcion="+opcion;

	$.ajax({
		type:"POST",
		url:"../negociacion/NegSucursales.php",
		data:cadena,
		success:function(r){
			console.log(r);
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

    $('#id_sucursal2').val(d[0]);
	$('#id_nombre_precio2').val(d[1]);
	$('#nombre2').val(d[2]);	
	$('#no_corte2').val(d[3]);
	$('#estatus2').val(d[4]);
}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
		function(){ eliminarDatos(id) }
		, function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){
	opcion = "eliminar";
	cadena="idCategoria="+ id+"&opcion="+opcion;
	console.log("llego a eliminar");
	$.ajax({
		type:"POST",
		url:"../negociacion/NegSucursales.php",
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

function eliminarDatos(id){
	opcion = "eliminar";
	cadena="id_sucursal="+ id+"&opcion="+opcion;
	console.log("llego a eliminar");
	$.ajax({
		type:"POST",
		url:"../negociacion/NegSucursales.php",
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