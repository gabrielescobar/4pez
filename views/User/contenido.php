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
						
						<?php
							if($this->empresaData[0]){
						?>
				
							<?php
								if($this->contenidoData[0]){
							?>
								<h1>Contenido de tu Página</h1>
								<form action="actualizarContenido" name='info_contenido' >
									<label for="link">Dirección de tu página</label>
									<label id='detalle_link' for="link"><?php echo URL; ?></label>
									
									<input type="text" id='input_link'	name='link' class='input_small'	value='<?php echo $this->contenidoData[0]['link']; ?>' placeholder='Direccion a la que accedes' >
									<label for="descripcion_productos">Descripcion del producto</label>
									<textarea name="descripcion_productos" placeholder='Descripcion del producto' id="" cols="30" rows="10"><?php echo $this->texto; ?></textarea>
								</form>
								<button id='btn_actualizar_empresa' class='btn_accion' onclick='actualizarContenido(<?php echo $this->contenidoData[0]['id']; ?>);' >Actualizar Contenido</button>
								<!--<div  id='btn_actualizar_empresa' class='btn_form'><a href=""><p><img src="<?php echo URL; ?>public/css/img/flecha_blanca.png" alt=""> Actualizar Contenido</p></a></div>-->
								
							<?php
								}
							}
						?>
				</article>
			</section>
		
		</div>
		<script>
			$(function(){
				$('#btn_actualizar_empresa').click(function(e){
					e.preventDefault();
					/* actualizarContenido(<?php echo $this->contenidoData[0]['id']; ?>); */
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
			

			<?php
				if($this->empresaData[0]){
			?>
			
			<?php
					if($this->contenidoData[0]){
			?>
				function actualizarContenido(id){
					
					var link = $('form[name="info_contenido"] input[name="link"]')[0].value;
					link = (link != "<?php echo $this->contenidoData[0]['link']; ?>" && link !='' )? link: "<?php echo $this->contenidoData[0]['link']; ?>";
					
					/* var tipo_formulario = $('form[name="info_contenido"] select[name="tipo_formulario"]')[0].value;
					tipo_formulario = (tipo_formulario != "<?php echo $this->contenidoData[0]['tipo_formulario']; ?>" && tipo_formulario !='' )? tipo_formulario: "<?php echo $this->contenidoData[0]['tipo_formulario']; ?>"; */
					
					/* var template = $('form[name="info_contenido"] select[name="template"]')[0].value;
					template = (template != "<?php echo $this->contenidoData[0]['template']; ?>" && template !='' )? template: "<?php echo $this->contenidoData[0]['template']; ?>"; */

					var descripcion_productos = $('form[name="info_contenido"] textarea[name="descripcion_productos"]')[0].value;
					descripcion_productos = (descripcion_productos != "<?php echo $this->contenidoData[0]['descripcion_productos']; ?>" && descripcion_productos !='' )? descripcion_productos: "<?php echo $this->contenidoData[0]['descripcion_productos']; ?>";
					
					/* var palabras_clave = $('form[name="info_contenido"] textarea[name="palabras_clave"]')[0].value;
					palabras_clave = (palabras_clave != "<?php echo $this->contenidoData[0]['palabras_claves']; ?>" && palabras_clave !='' )? palabras_clave: "<?php echo $this->contenidoData[0]['palabras_claves']; ?>"; */

					$.ajax({
						type: "POST",
						url: "<?php echo URL; ?>Contenido/actualizarContenido",
						data: {id: id,link: link, descripcion_productos: descripcion_productos}
						/* data: {id: id,link: link, tipo_formulario: tipo_formulario, template: template, descripcion_productos: descripcion_productos, palabras_clave: palabras_clave} */
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
				
		</script>
	</body>
</html>