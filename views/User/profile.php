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
		<header class="encabezado">
			<a id="logo" href="./index.php">Header</a>
		</header>
		
		
		<!-- MENU LATERAL -->
		<?php require_once('menu.php'); ?> 

		
		<?php 
			$fecha = date('YmdHis'); 
			$nombreImagen = Session::getValue('U_ID').$fecha;
		?>
		<section class="contenido">
			<article class="post">
	
				<div class="contenedor-form">
					<?php /* echo Session::getValue('U_NAME'); */ ?>
					<?php/*  print_r($this->userData); */ ?>
					<a href="<?php echo URL; ?>User/destroySession" class="btn" id="btn_Cerrar_session"  >cerrar</a>
					
					<?php
						if($this->contenidoData[0]){
					?>
					<p>Visita tu Sitio: <a target='_blank' href="<?php echo URL.$this->contenidoData[0]['link']; ?>"><?php echo URL.$this->contenidoData[0]['link']; ?></a></p>
					<?php
						}
					?>
					<h2>Tus Datos</h2>
					<form action="actualizarUsuario" name='info' >
						<input type="text" 		name='nombre_cliente' 	 	value='<?php echo $this->userData[0]['nombre']; ?>' placeholder='Nombre' >
						<input type="text" 		name='apellido_p_cliente' 	value='<?php echo $this->userData[0]['apellido_paterno']; ?>' placeholder='Apellido Paterno' >
						<input type="text" 		name='apellido_m_cliente' 	value='<?php echo $this->userData[0]['apellido_materno']; ?>' placeholder='Apellido Materno' >
						<input type="text" 		name='rut_cliente' 		 	value='<?php echo $this->userData[0]['rut']; ?>' placeholder='Rut' >
						<input type="text" 		name='mail_cliente' 		value='<?php echo $this->userData[0]['mail_contacto']; ?>' placeholder='E-mail' >
						<input type="text" 		name='fono_cliente' 		value='<?php echo $this->userData[0]['telefono']; ?>' placeholder='Teléfono' >
					</form>
					<button id='btn_actualizar' onclick='actualizarUsuario(<?php echo $this->userData[0]['id']; ?>);' >Actualizar Perfil</button>
				</div>
				<div class="contenedor-form">
					<h2>Cambia tu password</h2>
					<form action="actualizarPassword" name='form_pass' >
						<input type="password"	name='password_cliente'		value='' placeholder='Password' >
						<input type="password"	name='password_cliente2'		value='' placeholder='Reescriba su Password' >
					</form>
					<button id='btn_actualizar_password' onclick='actualizarPassword(<?php echo $this->userData[0]['id']; ?>);' >Actualizar Password</button>
				</div>
			
				<div class="contenedor-form">
					<?php
						if($this->empresaData[0]){
					?>
						<h2>Los Datos de tu Empresa</h2>
						<form action="actualizarEmpresa" name='info_empresa' >
							<input type="text" 	name='nombre_empresa' 		value='<?php echo $this->empresaData[0]['nombre']; ?>' placeholder='Nombre Empresa' >
							<input type="text"	name='rut_empresa' 			value='<?php echo $this->empresaData[0]['rut']; ?>' placeholder='Rut de la Empresa' >
							<input type="text"	name='razon_social'			value='<?php echo $this->empresaData[0]['razon_social']; ?>' placeholder='Razon Social' >
							<input type="text" 	name='mail_empresa' 		value='<?php echo $this->empresaData[0]['mail_contacto']; ?>' placeholder='E-mail contacto' >
							<input type="text"	name='direccion_empresa'	value='<?php echo $this->empresaData[0]['direccion']; ?>' placeholder='Dirección de la Empresa' >
							<input type="text" 	name='fono_empresa' 		value='<?php echo $this->empresaData[0]['telefono']; ?>' placeholder='Teléfono de contacto' >
						</form>
						<button id='btn_actualizar_empresa' onclick='actualizarEmpresa(<?php echo $this->empresaData[0]['id']; ?>);' >Actualizar Empresa</button>
						<?php /* var_dump( $this->contenidoData[0]); */ ?>
						<?php
							if($this->contenidoData[0]){
						?>
							<h2>Banner del Sitio</h2>
							<img id='imagen-logo-usuario' src="<?php echo URL; ?>/public/banners/<?php echo $this->contenidoData[0]['logo']; ?>" alt="">
							<h2>Cambiar tu Banner</h2>
							<form enctype="multipart/form-data" name="subir_banner" id="subir_banner" action="" method="post">
								<input type="file" name="file_banner" id="file_banner" required>
								<input name='btn_subir_imagen' id='btn_subir_imagen'	type="submit" value='Subir nuevo banner' />
							</form>
							
							<h2>Contenido de tu Página</h2>
							<form action="actualizarContenido" name='info_contenido' >
								<label id='detalle_link' for="link"><?php echo URL; ?></label><input type="text" id='input_link'	name='link' 	value='<?php echo $this->contenidoData[0]['link']; ?>' placeholder='Direccion a la que accedes' >
								<select name="template" id="">
									<option value="1" <?php if($this->contenidoData[0]['template'] == 1){ ?>selected='selected'<?php } ?> >Template 1</option> 
									<option value="2" <?php if($this->contenidoData[0]['template'] == 2){ ?>selected='selected'<?php } ?> >Template 2</option>
									<option value="3" <?php if($this->contenidoData[0]['template'] == 3){ ?>selected='selected'<?php } ?> >Template 3</option>
								</select>
								<select name="tipo_formulario" id="">
									<option value="1" <?php if($this->contenidoData[0]['tipo_formulario'] == 1){ ?>selected='selected'<?php } ?> >Formulario 1</option> 
									<option value="2" <?php if($this->contenidoData[0]['tipo_formulario'] == 2){ ?>selected='selected'<?php } ?> >Formulario 2</option>
									<option value="3" <?php if($this->contenidoData[0]['tipo_formulario'] == 3){ ?>selected='selected'<?php } ?> >Formulario 3</option>
								</select>
								<textarea name="descripcion_productos" placeholder='Descripcion del producto' id="" cols="30" rows="10"><?php echo $this->contenidoData[0]['descripcion_productos']; ?></textarea>
								<textarea name="palabras_clave" placeholder='Palabras clave' id="" cols="30" rows="10"><?php echo $this->contenidoData[0]['palabras_claves']; ?></textarea>
							</form>
							<button id='btn_actualizar_empresa' onclick='actualizarContenido(<?php echo $this->contenidoData[0]['id']; ?>);' >Actualizar Contenido</button>
							
							<h2>Más Información</h2>
							<form action="actualizarContenido2" name='info_contenido2' >
								<select name="monto" id="">
									<option value="Necesito una orientacion" <?php if($this->contenidoData[0]['monto'] == "Necesito una orientacion"){ ?>selected='selected'<?php } ?> >Necesito una orientacion</option> 
									<option value="$200.000" <?php if($this->contenidoData[0]['monto'] == "$200.000"){ ?>selected='selected'<?php } ?> >$200.000</option>
									<option value="$400.000" <?php if($this->contenidoData[0]['monto'] == "$400.000"){ ?>selected='selected'<?php } ?> >$400.000</option>
									<option value="$600.000" <?php if($this->contenidoData[0]['monto'] == "$600.000"){ ?>selected='selected'<?php } ?> >$600.000</option>
								</select>
								<textarea name="aviso" placeholder='¿Cómo te gustaría que se presentara tu sitio en Google?' id="" cols="30" rows="10"><?php echo $this->contenidoData[0]['aviso']; ?></textarea>
							</form>
							<button id='btn_actualizar_empresa' onclick='actualizarContenido2(<?php echo $this->contenidoData[0]['id']; ?>);' >Actualizar Contenido</button>
						<?php
							}else{
						?>
							<div class="contenedor-form">
								<div class="titulo_form">Ingresa el contenido para tu página</div>
								<form name='form_crear_contenido' method='post' action="<?php echo URL; ?>User/generarContenido">
									<input type="file" name="file_banner" id="file_banner" required>
									<label id='detalle_link' for="link"><?php echo URL; ?></label><input type="text" id='input_link' name='link' placeholder='Direccion a la que accedes' >
									<select name="template" id="">
										<option value="1" >Template 1</option> 
										<option value="2" >Template 2</option>
										<option value="3" >Template 3</option>
									</select>
									<select name="tipo_formulario" id="">
										<option value="1" >Formulario 1</option> 
										<option value="2" >Formulario 2</option>
										<option value="3" >Formulario 3</option>
									</select>
									<textarea name="descripcion_productos" placeholder='Descripcion del producto' id="" cols="30" rows="10"></textarea>
									<textarea name="palabras_clave" placeholder='Palabras clave' id="" cols="30" rows="10"></textarea>
									<input name='btn_generar_contenido' id='btn_generar_contenido'	type="submit" value='Entrar' />
								</form>
							</div>
						<?php
							}
						?>
					<?php
						}else{
					?>
						<p>No haz registrado tu empresa aún</p>
						<span><a href="#" class="btn" id="btn_registro_empresa">Registra tu empresa aquí</a></span>
						<div class="contenedor-form hidden">
							<div class="titulo_form">Registrar</div>
							<form name='form_crear_empresa' method='post' action="<?php echo URL; ?>User/crearEmpresa">
								<input name='nombre_empresa'	type="text" 	placeholder='nombre de la empresa' required/>
								<input name='rut_empresa' 		type="text" 	placeholder='Rut' required/>
								<input name='direccion_empresa' type="text"		placeholder='Dirección de la Empresa' required/>
								<input name='mail_empresa' 		type="text" 	placeholder='E-mail de contacto de la Empresa' required/>
								<input name='razon_social'	    type="text"		placeholder='Razon Social' required/>
								<input name='fono_empresa' 		type="text" 	placeholder='Teléfono de contacto de la Empresa' required/>
								<input name='btn_crear_empresa' id='btn_crear_empresa'	type="submit" value='Entrar' />
							</form>
						</div>
					<?php
						}
					?>
			</article>
		</section>
		
		
		<script>
			$(function(){
				$('#btn_Cerrar_session').click(function(e){
					document.location = "<?php echo URL; ?>User/destroySession";
				});
				
				$('#btn_crear_empresa').click(function(e){
					e.preventDefault();
					registrarEmpresa();
				});
				$('#btn_generar_contenido').click(function(e){
					/* e.preventDefault(); */
					/* registrarContenido(); */
					uploadFiles2(e);
				});
				
				$('#btn_registro_empresa').click(function(){
					$('form[name="form_crear_empresa"]').parent().fadeToggle();
				});
				
				$('#subir_banner').on('submit', uploadFiles);

			});
			
			var files;

			// Add events
			$('input[type=file]').on('change', prepareUpload);
			/*$('form').on('submit', uploadFiles);*/

			// Grab the files and set them to our variable
			function prepareUpload(event){
				files = event.target.files;
			}
			
			function uploadFiles(event){
				event.stopPropagation(); // Stop stuff happening
				event.preventDefault(); // Totally stop stuff happening

				// START A LOADING SPINNER HERE

				// Create a formdata object and add the files
				var data = new FormData();
				$.each(files, function(key, value)
				{
					data.append(key, value);
				});
				
				$.ajax({
					url:"<?php echo URL; ?>Contenido/uploadFile?nombre=<?php echo $nombreImagen; ?>&files",
					type: 'POST',
					data: data,
					cache: false,
					dataType: 'json',
					processData: false, // Don't process the files
					contentType: false, // Set content type to false as jQuery will tell the server its a query string request
					success: function(data, textStatus, jqXHR){
						if(typeof data.error === 'undefined')
						{
							// Success so call function to process the form
							/*submitForm(event, data);*/
							actualizarImagen(<?php echo $this->contenidoData[0]['id']; ?>);
						}
						else
						{
							// Handle errors here
							console.log('ERRORS: ' + data.error);
						}
					},
					error: function(jqXHR, textStatus, errorThrown)
					{
						// Handle errors here
						console.log('ERRORS: ' + textStatus);
						// STOP LOADING SPINNER
					}
				});
			}
			
			function uploadFiles2(event){
				event.stopPropagation(); // Stop stuff happening
				event.preventDefault(); // Totally stop stuff happening

				// START A LOADING SPINNER HERE

				// Create a formdata object and add the files
				var data = new FormData();
				$.each(files, function(key, value)
				{
					data.append(key, value);
				});
				
				$.ajax({
					url:"<?php echo URL; ?>Contenido/uploadFile?nombre=<?php echo $nombreImagen; ?>&files",
					type: 'POST',
					data: data,
					cache: false,
					dataType: 'json',
					processData: false, // Don't process the files
					contentType: false, // Set content type to false as jQuery will tell the server its a query string request
					success: function(data, textStatus, jqXHR){
						if(typeof data.error === 'undefined')
						{
							// Success so call function to process the form
							/*submitForm(event, data);*/
							registrarContenido();
						}
						else
						{
							// Handle errors here
							console.log('ERRORS: ' + data.error);
						}
					},
					error: function(jqXHR, textStatus, errorThrown)
					{
						// Handle errors here
						console.log('ERRORS: ' + textStatus);
						// STOP LOADING SPINNER
					}
				});
			}
			
			function registrarEmpresa(){
				var nombre_empresa 	  = $('form[name="form_crear_empresa"] input[name="nombre_empresa"]')[0].value;
				var rut_empresa		  = $('form[name="form_crear_empresa"] input[name="rut_empresa"]')[0].value;
				var razon_social 	  = $('form[name="form_crear_empresa"] input[name="razon_social"]')[0].value;
				var mail_empresa	  = $('form[name="form_crear_empresa"] input[name="mail_empresa"]')[0].value;
				var direccion_empresa = $('form[name="form_crear_empresa"] input[name="direccion_empresa"]')[0].value;
				var fono_empresa 	  = $('form[name="form_crear_empresa"] input[name="fono_empresa"]')[0].value;

				
				if(!Fn.validaRut(rut_empresa)){
					alert('El RUT debe ser válido y sin puntos(ejemplo:XXXXXXXX-X)');

				}else if(!validaEmail(mail_empresa)){
					alert('El e-mail no es válido');
					
				}else if(!validaTelefono(fono_empresa)){
					alert('El teléfono solo debe contener números');
					
				}else{
					$.ajax({
						type: "POST",
						url: "<?php echo URL; ?>Empresa/crearEmpresa",
						data: {id_cliente: <?php echo Session::getValue('U_ID'); ?>,nombre_empresa: nombre_empresa, razon_social: razon_social,direccion_empresa: direccion_empresa, rut_empresa: rut_empresa, mail_empresa: mail_empresa, fono_empresa: fono_empresa}
					}).done(function(response){
						if(response == 1){
							location.reload();
						}else{
							alert(response);
						}
					});
				}
			};
			
			<?php
				if($this->empresaData[0]){
			?>
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
							/* alert("Rut o contraseña incorrecto"); */
							 alert(response);
						}
					});
				}
			}
			
			function registrarContenido(){
			
				var link = $('form[name="form_crear_contenido"] input[name="link"]')[0].value;
				var tipo_formulario = $('form[name="form_crear_contenido"] select[name="tipo_formulario"]')[0].value;
				var template = $('form[name="form_crear_contenido"] select[name="template"]')[0].value;
				var descripcion_productos = $('form[name="form_crear_contenido"] textarea[name="descripcion_productos"]')[0].value;
				var palabras_clave = $('form[name="form_crear_contenido"] textarea[name="palabras_clave"]')[0].value;
				
				var archivo = $("form[name=form_crear_contenido] input[name=file_banner]")[0].value;
				$.ajax({
					type: "POST",
					url: "<?php echo URL; ?>Contenido/generarContenido",
					data: {id_empresa: <?php echo $this->empresaData[0]['id']; ?>,logo: <?php echo $nombreImagen; ?>,archivo:  archivo, link: link, tipo_formulario: tipo_formulario, template: template, descripcion_productos: descripcion_productos, palabras_clave: palabras_clave}
				}).done(function(response){
					if(response == 1){
						location.reload();
					}else{
						alert(response);
					}
				});
			};
			
			<?php
					if($this->contenidoData[0]){
			?>
				function actualizarContenido(id){
					
					var link = $('form[name="info_contenido"] input[name="link"]')[0].value;
					link = (link != "<?php echo $this->contenidoData[0]['link']; ?>" && link !='' )? link: "<?php echo $this->contenidoData[0]['link']; ?>";
					
					var tipo_formulario = $('form[name="info_contenido"] select[name="tipo_formulario"]')[0].value;
					tipo_formulario = (tipo_formulario != "<?php echo $this->contenidoData[0]['tipo_formulario']; ?>" && tipo_formulario !='' )? tipo_formulario: "<?php echo $this->contenidoData[0]['tipo_formulario']; ?>";
					
					var template = $('form[name="info_contenido"] select[name="template"]')[0].value;
					template = (template != "<?php echo $this->contenidoData[0]['template']; ?>" && template !='' )? template: "<?php echo $this->contenidoData[0]['template']; ?>";

					var descripcion_productos = $('form[name="info_contenido"] textarea[name="descripcion_productos"]')[0].value;
					descripcion_productos = (descripcion_productos != "<?php echo $this->contenidoData[0]['descripcion_productos']; ?>" && descripcion_productos !='' )? descripcion_productos: "<?php echo $this->contenidoData[0]['descripcion_productos']; ?>";
					
					var palabras_clave = $('form[name="info_contenido"] textarea[name="palabras_clave"]')[0].value;
					palabras_clave = (palabras_clave != "<?php echo $this->contenidoData[0]['palabras_claves']; ?>" && palabras_clave !='' )? palabras_clave: "<?php echo $this->contenidoData[0]['palabras_claves']; ?>";

					$.ajax({
						type: "POST",
						url: "<?php echo URL; ?>Contenido/actualizarContenido",
						data: {id: id,link: link, tipo_formulario: tipo_formulario, template: template, descripcion_productos: descripcion_productos, palabras_clave: palabras_clave}
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
				
				function actualizarContenido2(id){
					
					var monto = $('form[name="info_contenido2"] select[name="monto"]')[0].value;
					monto = (monto != "<?php echo $this->contenidoData[0]['monto']; ?>" && monto !='' )? monto: "<?php echo $this->contenidoData[0]['monto']; ?>";

					var aviso = $('form[name="info_contenido2"] textarea[name="aviso"]')[0].value;
					aviso = (aviso != "<?php echo $this->contenidoData[0]['aviso']; ?>" && aviso !='' )? aviso: "<?php echo $this->contenidoData[0]['aviso']; ?>";
					
					$.ajax({
						type: "POST",
						url: "<?php echo URL; ?>Contenido/actualizarContenido2",
						data: {id: id, monto: monto, aviso: aviso}
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
				
				function actualizarImagen(id){
					var archivo = $("form[name=subir_banner] input[name=file_banner]")[0].value;
					
					$.ajax({
						type: "POST",
						url: "<?php echo URL; ?>Contenido/actualizarImagen",
						data: {id: id, logo: <?php echo $nombreImagen; ?>,archivo:  archivo}
					}).done(function(response){
						if(response == 1){
							alert("Actualizacion Exitosa");
							alert('<?php echo $nombreImagen; ?>');
							location.reload();
						}else{
							/* alert("Rut o contraseña incorrecto"); */
							 alert(response);
						}
					});
					
				}
			<?php
					}
			?>
			<?php
				}
			?>
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
					
					var password_cliente = $('form[name="info"] input[name="password_cliente"]')[0].value;
					password_cliente = (password_cliente != "<?php echo $this->userData[0]['password']; ?>" && password_cliente !='' )? password_cliente: "<?php echo $this->userData[0]['password']; ?>";
					
					$.ajax({
						type: "POST",
						url: "<?php echo URL; ?>User/actualizarUsuario",
						data: {id: id, nombre_cliente: nombre_cliente, apellido_p_cliente: apellido_p_cliente, apellido_m_cliente: apellido_m_cliente, rut_cliente: rut_cliente, mail_cliente: mail_cliente, fono_cliente: fono_cliente, password_cliente: password_cliente}
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
			
			function eliminarUsuario(id){
				var response = confirm('¿está seguro que quiere darse de baja?');
				if(response){
					
				}
			}
				
		</script>
	</body>
</html>