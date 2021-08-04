// JavaScript Document
// A $( document ).ready() block.
function ConexionServidor(Accion){
	NombreEmpresa = $("#EmpresaBuscar").val();
		if(NombreEmpresa.length === 0 ){
				$("#empty-message").css("display", "block");
				$("#empty-message").html("  <strong>Oh oh!</strong> Ingresa un nombre para buscar la empresa");
				$('#btnBuscarEmpresa').attr("disabled", true);
				return;
            } else {
                $("#empty-message").css("display", "none");
				$("#empty-message").html("");
				$('#btnBuscarEmpresa').attr("disabled", false);
			}
		Desde = "2020-01-01";
		Hasta = "2022-01-01";
		EmpresaBuscar = $("#EmpresaBuscar").val();
		   $.ajax({
		url:"php/ConexionServidor.php",
		method:"POST",
		dataType: "json",		
		data:{Accion:Accion, Desde:	Desde, Hasta:Hasta, EmpresaBuscar:EmpresaBuscar},
		success:function(data){ console.log(data.html);
			$('#AnunciosEmpresa').html(data.html);
		},
		error: function(data){ console.log(data.html);
			$('#AnunciosEmpresa').html(data.html);
		}
	});
		
	}


function ActualizaAnuncio(Accion,IdAnuncio){
	   swal({
                        title: "Estas seguro de ejecutar esta acción?",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#e74c3c",
                        confirmButtonText: "Si!",
                        cancelButtonText: "No, cancelar por favor!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }, function(isConfirm){
                        if (isConfirm) {
                            	if(Accion=="InputPaq"){
									var NuevoValor = $("#InputPaq"+IdAnuncio).val();
									var contentType = 'application/x-www-form-urlencoded';
									var processData = true;
									$.ajax({
											url: "php/ActualizarAnuncios.php?Accion=ActualizaPaquete",
											type: "POST",
											data: {"NuevoValor": NuevoValor,'IdAnuncio':IdAnuncio}, 
											contentType: contentType,
											processData: processData,
											dataType: "json",
											success:function(data){
												console.log(data);
												if(data.status === 'success'){
													//EjecutaToast(data.status,data.mensaje,data.titulo);
												swal(data.titulo, data.mensaje, data.status);
												}else if(data.status === 'warning'){
													//EjecutaToast(data.status,data.mensaje,data.titulo);
													swal(data.titulo, data.mensaje, data.status);
												}else  if(data.status === 'error'){
													//EjecutaToast(data.status,data.mensaje,data.titulo);
													swal(data.titulo, data.mensaje, data.status);
												}
											},
											error:function(x,e) {
												if (x.status==0) {
													alert('You are offline!!\n Please Check Your Network.');
												} else if(x.status==404) {
													alert('Requested URL not found.');
												} else if(x.status==500) {
													alert('Internel Server Error.');
												} else if(e=='parsererror') {
													alert('Error.\nParsing JSON Request failed.');
												} else if(e=='timeout'){
													alert('Request Time out.');
												} else {
													alert('Unknow Error.\n'+x.responseText);
												}
											}
										  });
								}else{
									var contentType = 'application/x-www-form-urlencoded';
									var processData = true;
									$.ajax({
											url: "php/ActualizarAnuncios.php?Accion=anuncioEstadoPago",
											type: "POST",
											data: {"IdAnuncio":IdAnuncio},
											contentType: contentType,
											processData: processData,
											dataType: "json",
											success:function(data){
												console.log(data);
												if(data.status === 'success'){
													//EjecutaToast(data.status,data.mensaje,data.titulo);
												if(data.EstadoPago==="0"){
													$("#EstadoPago-"+IdAnuncio).removeClass('color-success');
													$("#EstadoPago-"+IdAnuncio).addClass('color-warning');
												}else{
													$("#EstadoPago-"+IdAnuncio).removeClass('color-warning');
													$("#EstadoPago-"+IdAnuncio).addClass('color-success');
												}
												swal(data.titulo, data.mensaje, data.status);
												}else if(data.status === 'warning'){
													//EjecutaToast(data.status,data.mensaje,data.titulo);
													swal(data.titulo, data.mensaje, data.status);
												}else  if(data.status === 'error'){
													//EjecutaToast(data.status,data.mensaje,data.titulo);
													swal(data.titulo, data.mensaje, data.status);
												}
											},
											error:function(x,e) {
												if (x.status==0) {
													alert('You are offline!!\n Please Check Your Network.');
												} else if(x.status==404) {
													alert('Requested URL not found.');
												} else if(x.status==500) {
													alert('Internel Server Error.');
												} else if(e=='parsererror') {
													alert('Error.\nParsing JSON Request failed.');
												} else if(e=='timeout'){
													alert('Request Time out.');
												} else {
													alert('Unknow Error.\n'+x.responseText);
												}
											}
										  });
								}

							
							
                        } else {
                            swal("Acción Cancelada", "Se cancelo la acción", "error");
                        }
                    });	
	
						
 
				 
}
