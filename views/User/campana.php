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
			<section class="contenido" id='seccion_campana' >
				<article class="post">
					<div class="contenedor-form">
						<?php
							if($this->empresaData[0]){
						?>
				
							<?php
								if($this->contenidoData[0]){
							?>
								<h1>Información para tu Campaña</h1>
								<form action="actualizarContenido2" name='info_contenido2' >
									<label for="monto">¿Cuanto te gustaría invertir?</label>
									<!--<img src="<?php echo URL; ?>public/css/img/tabla_inversion.png" alt="">-->
									
									<div class="tabla_inversion">
										<div class="caja_opciones_tabla">
											<div class="opcion_tabla">
												<input class='radio_tipo_form' type="radio" name="monto" value="Necesito una orientacion" <?php if($this->contenidoData[0]['monto'] == "Necesito una orientacion"){ echo 'checked="checked"';} ?> >
												<div class="extras_mobile">
													<div class="btn_acordeon" id="btn_gratis"><img src="<?php echo URL; ?>public/css/img/flecha_abajo.png" alt="">Gratuito</div>
													<div class="tabla_opcion" id="tabla_opcion_gratis"><img src="<?php echo URL; ?>public/css/img/tabla_gratuito.png" alt=""></div>
												</div>
											</div>
											<div class="opcion_tabla">
												<input class='radio_tipo_form' type="radio" name="monto" value="$150.000" <?php if($this->contenidoData[0]['monto'] == "$150.000"){ echo 'checked="checked"';} ?> >
												<div class="extras_mobile">
													<div class="btn_acordeon" id="btn_gratis"><img src="<?php echo URL; ?>public/css/img/flecha_abajo.png" alt="">Básico</div>
													<div class="tabla_opcion" id="tabla_opcion_gratis"><img src="<?php echo URL; ?>public/css/img/tabla_basico.png" alt=""></div>
												</div>
											</div>
											<div class="opcion_tabla">
												<input class='radio_tipo_form' type="radio" name="monto" value="$300.000" <?php if($this->contenidoData[0]['monto'] == "$300.000"){ echo 'checked="checked"';} ?> >
												<div class="extras_mobile">
													<div class="btn_acordeon" id="btn_gratis"><img src="<?php echo URL; ?>public/css/img/flecha_abajo.png" alt="">Standard</div>
													<div class="tabla_opcion" id="tabla_opcion_gratis"><img src="<?php echo URL; ?>public/css/img/tabla_standard.png" alt=""></div>
												</div>
											</div>
											<div class="opcion_tabla">
												<input class='radio_tipo_form' type="radio" name="monto" value="$450.000" <?php if($this->contenidoData[0]['monto'] == "$450.000"){ echo 'checked="checked"';} ?> >
												<div class="extras_mobile">
													<div class="btn_acordeon" id="btn_gratis"><img src="<?php echo URL; ?>public/css/img/flecha_abajo.png" alt="">Pro</div>
													<div class="tabla_opcion" id="tabla_opcion_gratis"><img src="<?php echo URL; ?>public/css/img/tabla_pro.png" alt=""></div>
												</div>
											</div>
											<div class="opcion_tabla">
												<input class='radio_tipo_form' type="radio" name="monto" value="$600.000" <?php if($this->contenidoData[0]['monto'] == "$600.000"){ echo 'checked="checked"';} ?> >
												<div class="extras_mobile">
													<div class="btn_acordeon" id="btn_gratis"><img src="<?php echo URL; ?>public/css/img/flecha_abajo.png" alt="">Premium</div>
													<div class="tabla_opcion" id="tabla_opcion_gratis"><img src="<?php echo URL; ?>public/css/img/tabla_premium.png" alt=""></div>
												</div>
											</div>
										</div>
										
										<div class="contenedor_contactanos">
											<img src="<?php echo URL; ?>public/css/img/txt_dominio1.png" alt="">
											<img src="<?php echo URL; ?>public/css/img/txt_domino2.png" alt="">
											<div class="btn_contactanos"></div>
										</div>
										
									</div>
									
									
									
									<label for="palabras_clave">Palabras clave</label>
									<textarea name="palabras_clave" placeholder='Palabras clave' id="" cols="30" rows="10"><?php echo $this->contenidoData[0]['palabras_claves']; ?></textarea>
									<label for="aviso">Avisos en Google</label>
									<textarea name="aviso" placeholder='¿Cómo te gustaría que se presentara tu sitio en Google?' id="" cols="30" rows="10"><?php echo $this->contenidoData[0]['aviso']; ?></textarea>
								</form>
								<button id='btn_actualizar_empresa' class='btn_accion' onclick='actualizarContenido2(<?php echo $this->contenidoData[0]['id']; ?>);' >Actualizar Contenido</button>
								<!--<div  id='btn_actualizar_empresa' class='btn_form'><a href=""><p><img src="<?php echo URL; ?>public/css/img/flecha_blanca.png" alt=""> Guardar Cambios</p></a></div>-->
							<?php
								}
							}
						?>
				</article>
			</section>
		</div>
		
		<script>
			/* ACORDEON */
			$(document).ready(function(){
				$(".btn_acordeon").click(function(){
					//slide up all the link lists
					$(".tabla_opcion").slideUp();
					//slide down the link list below the h3 clicked - only if its closed
					if(!$(this).next().is(":visible"))
					{
						$(this).next().slideDown();
					}
				})
			})
		
		
		
		
			$('#btn_actualizar_empresa').click(function(e){
					e.preventDefault();
					actualizarContenido2(<?php echo $this->contenidoData[0]['id']; ?>);
				});
			$(function(){

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
				
				function actualizarContenido2(id){
					
					/* var monto = $('form[name="info_contenido2"] select[name="monto"]')[0].value; */
					var monto = $('form[name="info_contenido2"] input:radio[name="monto"]:checked').val();

					monto = (monto != "<?php echo $this->contenidoData[0]['monto']; ?>" && monto !='' )? monto: "<?php echo $this->contenidoData[0]['monto']; ?>";
					
					var palabras_clave = $('form[name="info_contenido2"] textarea[name="palabras_clave"]')[0].value;
					palabras_clave = (palabras_clave != "<?php echo $this->contenidoData[0]['palabras_clave']; ?>" && palabras_clave !='' )? palabras_clave: "<?php echo $this->contenidoData[0]['palabras_clave']; ?>";
					
					var aviso = $('form[name="info_contenido2"] textarea[name="aviso"]')[0].value;
					aviso = (aviso != "<?php echo $this->contenidoData[0]['aviso']; ?>" && aviso !='' )? aviso: "<?php echo $this->contenidoData[0]['aviso']; ?>";
					
					$.ajax({
						type: "POST",
						url: "<?php echo URL; ?>Contenido/actualizarContenido2",
						data: {id: id, monto: monto, aviso: aviso,palabras_clave: palabras_clave}
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

			<?php
				}
			?>
			<?php
				}
			?>
				
		</script>
	</body>
</html>