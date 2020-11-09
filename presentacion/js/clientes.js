$(document).ready(function(){
	$('#tablaClientes').DataTable({
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
		status = $('#status').val();
		opcion = "insertar";
		
		agregarCliente(nombre,email,telefono,direccion,estatus,opcion);
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
            console.log(data);
            alert("Hola");
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


	id=$('#idCategoriau').val();
	nombre=$('#nombreu').val();
	estatus=$('#estatusu').val();
	opcion = "modificar";

	cadena= "idCategoria=" + id +
	"&nombre=" + nombre + 
	"&estatus=" + estatus+
	"&opcion="+opcion;
	console.log("Llego a actualizar");
	$.ajax({
		type:"POST",
		url:"../negociacion/NegClientes.php",
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

	$('#idCategoriau').val(d[0]);
	$('#nombreu').val(d[1]);
	$('#estatusu').val(d[2]);

	
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

function eliminarDatos(id){
	opcion = "eliminar";
	cadena="idCategoria="+ id+"&opcion="+opcion;
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