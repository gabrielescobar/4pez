<!doctype html>
<html lang="es-ES">
	<head>
		<meta charset="UTF-8">
		<title>4pez</title>
		
		<!--CSS-->
		<?php require_once('css.php'); ?>

		<!--jQuery-->
		<script src="<?php echo URL; ?>public/js/jquery-1.11.1.min.js"></script>
		<script src="<?php echo URL; ?>public/js/validaciones.js"></script>
	</head>
	<body>
		<!-- HEADER DEL USUARIO -->
		<?php require_once('header.php'); ?> 
		<div class="contenedor">
			<!-- MENU LATERAL -->
			<?php require_once('menu.php'); ?> 

			
			<?php 
				$fecha = date('YmdHis'); 
				$nombreImagen = Session::getValue('U_ID').$fecha;
			?>
			<section class="contenido">
				<article class="post">
					<div class="contenedor-form">

						<h1>Los Datos de tu Empresa</h1>
						<form action="actualizarEmpresa" name='info_empresa' >
							<label for="nombre_empresa">Nombre Empresa</label>
							<input type="text" 	name='nombre_empresa' 		value='<?php echo $this->empresaData[0]['nombre']; ?>' placeholder='Nombre Empresa' >
							<label for="rut_empresa">Rut Empresa</label>
							<input type="text"	name='rut_empresa' 			value='<?php echo $this->empresaData[0]['rut']; ?>' placeholder='Rut de la Empresa' >
							<label for="razon_social">Razón Social</label>
							<input type="text"	name='razon_social'			value='<?php echo $this->empresaData[0]['razon_social']; ?>' placeholder='Razon Social' >
							<label for="mail_empresa">E-mail Contacto</label>
							<input type="text" 	name='mail_empresa' 		value='<?php echo $this->empresaData[0]['mail_contacto']; ?>' placeholder='E-mail contacto' >
							<label for="direccion_empresa">Dirección de la Empresa</label>
							<input type="text"	name='direccion_empresa'	value='<?php echo $this->empresaData[0]['direccion']; ?>' placeholder='Dirección de la Empresa' >
							<label for="fono_empresa">Teléfono de contacto</label>
							<input type="text" 	name='fono_empresa' 		value='<?php echo $this->empresaData[0]['telefono']; ?>' placeholder='Teléfono de contacto' >
						</form>
						<button id='btn_actualizar_empresa' class='btn_accion' onclick='actualizarEmpresa(<?php echo $this->empresaData[0]['id']; ?>);' >Actualizar Empresa</button>
						<!--<div  id='btn_actualizar_empresa' class='btn_form'><a href=""><p><img src="<?php echo URL; ?>public/css/img/flecha_blanca.png" alt=""> Actualizar Empresa</p></a></div>-->
				</article>
			</section>
		
		</div>
		<script>
		
			$(function(){
				$('#btn_actualizar_empresa').click(function(e){
					e.preventDefault();
					actualizarEmpresa(<?php echo $this->empresaData[0]['id']; ?>);
				});
			});

			function actualizarEmpresa(id){
			
				if(!Fn.validaRut($('form[name="info_empresa"] input[name="rut_empresa"]')[0].value)){
					alert('El RUT debe ser válido y sin puntos(ejemplo:XXXXXXXX-X)');
					
				}else if(!validaEmail($('form[name="info_empresa"] input[name="mail_empresa"]')[0].value)){
					alert('El e-mail no es válido');
					
				}else if(!validaTelefono($('form[name="info_empresa"] input[name="fono_empresa"]')[0].value)){
					alert('El teléfono solo debe contener números');
					
				}else{
					var nombre_empresa = $('form[name="info_empresa"] input[name="nombre_empresa"]')[0].value;
					nombre_empresa = (nombre_empresa != "<?php echo $this->empresaData[0]['nombre']; ?>" && nombre_empresa !='' )? nombre_empresa: "<?php echo $this->empresaData[0]['nombre']; ?>";
					
					var rut_empresa = $('form[name="info_empresa"] input[name="rut_empresa"]')[0].value;
					rut_empresa = (rut_empresa != "<?php echo $this->empresaData[0]['rut']; ?>" && rut_empresa !='' )? rut_empresa: "<?php echo $this->empresaData[0]['rut']; ?>";
					
					var razon_social = $('form[name="info_empresa"] input[name="razon_social"]')[0].value;
					razon_social = (razon_social != "<?php echo $this->empresaData[0]['razon_social']; ?>" && razon_social !='' )? razon_social: "<?php echo $this->empresaData[0]['razon_social']; ?>";
					
					var mail_empresa = $('form[name="info_empresa"] input[name="mail_empresa"]')[0].value;
					mail_empresa = (mail_empresa != "<?php echo $this->empresaData[0]['mail_contacto']; ?>" && mail_empresa !='' )? mail_empresa: "<?php echo $this->empresaData[0]['mail_contacto']; ?>";
					
					var direccion_empresa = $('form[name="info_empresa"] input[name="direccion_empresa"]')[0].value;
					direccion_empresa = (direccion_empresa != "<?php echo $this->empresaData[0]['direccion']; ?>" && direccion_empresa !='' )? direccion_empresa: "<?php echo $this->empresaData[0]['direccion']; ?>";

					var fono_empresa = $('form[name="info_empresa"] input[name="fono_empresa"]')[0].value;
					fono_empresa = (fono_empresa != "<?php echo $this->empresaData[0]['telefono']; ?>" && fono_empresa !='' )? fono_empresa: "<?php echo $this->empresaData[0]['telefono']; ?>";

					$.ajax({
						type: "POST",
						url: "<?php echo URL; ?>Empresa/actualizarEmpresa",
						data: {id: id, nombre_empresa: nombre_empresa,razon_social: razon_social,direccion_empresa: direccion_empresa, rut_empresa: rut_empresa, mail_empresa: mail_empresa, fono_empresa: fono_empresa}
					}).done(function(response){
						if(response == 1){
							alert("Actualizacion Exitosa");
							location.reload();
						}else{
							 alert(response);
						}
					});
				}
			}
		</script>
	</body>
</html>