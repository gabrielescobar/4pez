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
					
						<h1>Tus Datos</h1>
						<form action="actualizarUsuario" name='info' >
							<label for="nombre_cliente">Nombre</label>
							<input type="text" 		name='nombre_cliente' 	 	value='<?php echo $this->userData[0]['nombre']; ?>' placeholder='Nombre' >
							<label for="apellido_p_cliente">Apellido Paterno</label>
							<input type="text" 		name='apellido_p_cliente' 	value='<?php echo $this->userData[0]['apellido_paterno']; ?>' placeholder='Apellido Paterno' >
							<label for="apellido_m_cliente">Apellido Materno</label>
							<input type="text" 		name='apellido_m_cliente' 	value='<?php echo $this->userData[0]['apellido_materno']; ?>' placeholder='Apellido Materno' >
							<label for="rut_cliente">Rut</label>
							<input type="text" 		name='rut_cliente' 		 	value='<?php echo $this->userData[0]['rut']; ?>' placeholder='Rut' >
							<label for="mail_cliente">E-mail</label>
							<input type="text" 		name='mail_cliente' 		value='<?php echo $this->userData[0]['mail_contacto']; ?>' placeholder='E-mail' >
							<label for="fono_cliente">Teléfono</label>
							<input type="text" 		name='fono_cliente' 		value='<?php echo $this->userData[0]['telefono']; ?>' placeholder='Teléfono' >
						</form>
						<button id='btn_actualizar' class='btn_accion' onclick='actualizarUsuario(<?php echo $this->userData[0]['id']; ?>);' >Actualizar Perfil</button>
						<!--<div  id='btn_actualizar' class='btn_form'><a href=""><p><img src="<?php echo URL; ?>public/css/img/flecha_blanca.png" alt=""> Actualizar Perfil</p></a></div>-->
					</div>
					<div class="contenedor-form">
						<h1>Cambia tu password</h1>
						<form action="actualizarPassword" name='form_pass' >
							<input type="password"	name='password_cliente'		value='' placeholder='Password' >
							<input type="password"	name='password_cliente2'		value='' placeholder='Reescriba su Password' >
						</form>
						<button id='btn_actualizar_password' class='btn_accion' onclick='actualizarPassword(<?php echo $this->userData[0]['id']; ?>);' >Actualizar Password</button>
						<!--<div  id='btn_actualizar_password' class='btn_form'><a href=""><p><img src="<?php echo URL; ?>public/css/img/flecha_blanca.png" alt=""> Actualizar Password</p></a></div>-->
					</div>
				</article>
			</section>
		</div>
		<script>
			$(function(){
				$('#btn_actualizar').click(function(e){
					e.preventDefault();
					actualizarUsuario(<?php echo $this->userData[0]['id']; ?>);
				});
				$('#btn_actualizar_password').click(function(e){
					e.preventDefault();
					actualizarPassword(<?php echo $this->userData[0]['id']; ?>);
				});
			});
		
			function actualizarUsuario(id){
			
			
				if(!Fn.validaRut($('form[name="info"] input[name="rut_cliente"]')[0].value)){
					alert('El RUT debe ser válido y sin puntos(ejemplo:XXXXXXXX-X)');
					
				}else if(!validaEmail($('form[name="info"] input[name="mail_cliente"]')[0].value)){
					alert('El e-mail no es válido');
					
				}else if(!validaTelefono($('form[name="info"] input[name="fono_cliente"]')[0].value)){
					alert('El teléfono solo debe contener números');
					
				}else{
			
					var nombre_cliente = $('form[name="info"] input[name="nombre_cliente"]')[0].value;
					nombre_cliente = (nombre_cliente != "<?php echo $this->userData[0]['nombre']; ?>" && nombre_cliente !='' )? nombre_cliente: "<?php echo $this->userData[0]['nombre']; ?>";
					
					var apellido_p_cliente = $('form[name="info"] input[name="apellido_p_cliente"]')[0].value;
					apellido_p_cliente = (apellido_p_cliente != "<?php echo $this->userData[0]['apellido_paterno']; ?>" && apellido_p_cliente !='' )? apellido_p_cliente: "<?php echo $this->userData[0]['apellido_paterno']; ?>";
					
					var apellido_m_cliente = $('form[name="info"] input[name="apellido_m_cliente"]')[0].value;
					apellido_m_cliente = (apellido_m_cliente != "<?php echo $this->userData[0]['apellido_materno']; ?>" && apellido_m_cliente !='' )? apellido_m_cliente: "<?php echo $this->userData[0]['apellido_materno']; ?>";

					var rut_cliente = $('form[name="info"] input[name="rut_cliente"]')[0].value;
					rut_cliente = (rut_cliente != "<?php echo $this->userData[0]['rut']; ?>" && rut_cliente !='' )? rut_cliente: "<?php echo $this->userData[0]['rut']; ?>";
					
					var mail_cliente = $('form[name="info"] input[name="mail_cliente"]')[0].value;
					mail_cliente = (mail_cliente != "<?php echo $this->userData[0]['mail_contacto']; ?>" && mail_cliente !='' )? mail_cliente: "<?php echo $this->userData[0]['mail_contacto']; ?>";
					
					var fono_cliente = $('form[name="info"] input[name="fono_cliente"]')[0].value;
					fono_cliente = (fono_cliente != "<?php echo $this->userData[0]['telefono']; ?>" && fono_cliente !='' )? fono_cliente: "<?php echo $this->userData[0]['telefono']; ?>";
					
					$.ajax({
						type: "POST",
						url: "<?php echo URL; ?>User/actualizarUsuario",
						data: {id: id, nombre_cliente: nombre_cliente, apellido_p_cliente: apellido_p_cliente, apellido_m_cliente: apellido_m_cliente, rut_cliente: rut_cliente, mail_cliente: mail_cliente, fono_cliente: fono_cliente}
					}).done(function(response){
						if(response == 1){
							alert("Actualizacion Exitosa");
							location.reload();
						}else{
							/* alert("Rut o contraseña incorrecto"); */
							 alert(response);
						}
					});
				}
			}
			
			function actualizarPassword(id){
				var pass1 = $('form[name="form_pass"] input[name="password_cliente"]')[0].value
				var pass2 = $('form[name="form_pass"] input[name="password_cliente2"]')[0].value
				if(pass1 != pass2){
					alert('El password debe coincidir');
				}else{

					var password_cliente = $('form[name="form_pass"] input[name="password_cliente"]')[0].value;
					password_cliente = (password_cliente != "<?php echo $this->userData[0]['password']; ?>" && password_cliente !='' )? password_cliente: "<?php echo $this->userData[0]['password']; ?>";
					
					$.ajax({
						type: "POST",
						url: "<?php echo URL; ?>User/actualizarPassword",
						data: {id: id, password_cliente: password_cliente}
					}).done(function(response){
						if(response == 1){
							alert("Actualizacion Exitosa");
							location.reload();
						}else{
							/* alert("Rut o contraseña incorrecto"); */
							 alert(response);
						}
					});
				}
			}	
		</script>
	</body>
</html>