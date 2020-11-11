$(document).ready(function(){
	$("#nombre").val("");
	$("#email").val("");
	$("#telefono").val("");
	$("#direccion").val("");
	var t = $('#tablaClientes').DataTable({
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
		nombre = $('#nombre').val();
		email = $('#email').val();
        telefono = $('#telefono').val();
		direccion = $('#direccion').val();
		if($('#status').prop('checked')){
			status = 1;
		}else{
			status = 0;
		}
		opcion = "insertar";
		
		agregarCliente(nombre,email,telefono,direccion,status,opcion);
		$("#nombre").val("");
		$("#email").val("");
		$("#telefono").val("");
		$("#direccion").val("");
	}); 

	$('#actualizadatos').click(function(){
		actualizaDatos();
	});
});

function agregarCliente(nombre,email,telefono,direccion,estatus,opcion){
	cadena = "nombre="+nombre+"&email="+email+"&telefono="+telefono+"&direccion="+direccion+"&estatus="+estatus+"&opcion="+opcion;
	$.ajax({
		type: "POST",
		url: "../negociacion/NegClientes.php",
		data: cadena,
		success: function(data){
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
	
	id=$('#idCliente').val();
	nombre=$('#nombreMod').val();
	email=$('#emailMod').val();
	telefono=$('#telefonoMod').val();
	direccion=$('#direccionMod').val();
	if($('#statusMod').prop('checked')){
		status = 1;
	}else{
		status = 0;
	}
	opcion = "modificar";
	cadena= "id_cliente=" + id +
	"&nombre=" + nombre + 
	"&email=" + email + 
	"&telefono=" + telefono+
	"&direccion=" + direccion + 
	"&estatus=" + status+
	"&opcion="+opcion;
	$.ajax({
		type:"POST",
		url:"../negociacion/NegClientes.php",
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

	$('#idCliente').val(d[0]);
	$('#nombreMod').val(d[1]);
	$('#emailMod').val(d[2]);
	$('#telefonoMod').val(d[3]);
	$('#direccionMod').val(d[4]);
	if(d[5] == 1){
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
	cadena="id_cliente="+ id+"&opcion="+opcion;
	console.log("llego a eliminar");
	$.ajax({
		type:"POST",
		url:"../negociacion/NegClientes.php",
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