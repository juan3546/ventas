$(document).ready(function(){
	//$('#tabla').load('tablas/tablaCategorias.php');

	$("#entrar").click(function(){
		usuario = $('#usuario').val();
		password = $('#password').val();
		
	cadena = "usuario="+usuario+"&password="+password;

	$.ajax({
		type:"POST",
		url:"../negociacion/NegLogin.php",
		data:cadena,
		success:function(r){
		//	console.log(r);
		if(r==1){

			window.location.href = '../presentacion/empleados.php';
			
		}else{
			alertify.error("Fallo el servidor :(");
			location.reload();
		}
	}
});
}); 
});