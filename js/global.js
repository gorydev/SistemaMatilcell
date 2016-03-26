//funcion para enmascarar los inputs
$(document).ready(function($){
	$('#cedula').mask("99999999");
	$('#telefono').mask("9999-9999999");
	$('#serial').mask("999999999999999");
});

//Funcion para al salir del input cedula busca en la BD por esa cedula
//Si la encuentra regresa los datos de ese cliente y los agrega en los campos correspondientes
$('input#cedula').focusout(function(){
	var cedula = $('input#cedula').val();
	if($.trim(cedula) != ''){
		$.post('ajax/buscar.php', {cedula: cedula}, function(data){
			if(data !== ''){
				//alert(data);
				var mitad = data.split('/');
				$('#nombre').val(mitad[0]);
				$('#telefono').val(mitad[1]);	
				$('#serial').focus();	
				$('#cliente_enc').prop("checked", true);
			}else{
				$('#cliente_enc').prop("checked", false);
			}
		});
	}
});
//Lo mismo de la funcion anterior pero buscando el serial del equipo
$('input#serial').focusout(function(){
	var serial = $('input#serial').val();
	if($.trim(serial) != ''){
		$.post('ajax/buscar.php', {serial: serial}, function(data){
			if(data !== ''){
				//alert(data);
				var mitad = data.split('/');
				$('#marca').val(mitad[0]);
				$('#modelo').val(mitad[1]);	
				$('#modelo').focus();	
				$('#equipo_enc').prop("checked", true);
			}else{
				$('#cliente_enc').prop("checked", false);
			}
		});
	}
});
