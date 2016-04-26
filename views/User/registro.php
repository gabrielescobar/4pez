<!doctype html>
<html lang="es-ES">
	<head>
		<meta charset="UTF-8">
		<title>página</title>
		
		<!--CSS-->
		<?php require_once('css.php'); ?>

		<!--jQuery-->
		<script src="<?php echo URL; ?>public/js/jquery-1.11.1.min.js"></script>
		<script src="<?php echo URL; ?>public/js/validaciones.js"></script>
		<script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-inverse" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="./index.php">Login dropdown</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float: right;">
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<div class="contenedor">
								<?php if(Session::exist()){  ?>
									<ul class="nav navbar-nav">
										<li><h4 class="register-align">¡Bienvenido! - <?php echo "&nbsp;".Session::getValue('U_NAME'); ?></h4></li>
									</ul>
									<form class="navbar-form navbar-left">
										<button  class="btn btn-danger btn-block" onclick="location.href='<?php echo URL; ?>User/destroySession';">Cerrar Sesión</button>

									</form>
								<?php }  ?>
							</div>
						</div>

					</div>

				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		
		
		<?php 
			$fecha = date('YmdHis'); 
			$nombreImagen = Session::getValue('U_ID').$fecha;
		?>
		<div class="wrapper-registro">
			<div class="caja-registro">
			
					
				<section class="contenido-registro">
					<article class="post">
					
						<div class="contenedor-form">
							<?php
								if($this->empresaData[0]){
							?>
							
								<?php
									if($this->contenidoData[0]){
								?>
									<?php
										if(!$this->contenidoData[0]['logo']){
									?>
										<div class="imagen_paso"><img src="<?php echo URL; ?>public/css/img/registro_paso3.png" alt=""></div>
										<!--<div class="titulo_form"><p>Paso 3: </p></div>-->
										<h1>Ingresa el Banner para tu Sitio</h1>
										<p class='detalle_imagen'>*La imagen debe ser de un formato adecuado(jpg/png) y de un tamaño máximo de 2mbs</p>
										<div class="contenedor_vista_previa"><img id='imagen-logo-usuario'  class=''  src="<?php echo URL; ?>public/css/img/img_preview.png" alt=""></div>
										<br>
										<input name='btn-buscar-img' id='btn-buscar-img'	type="submit" value='Subir imagen' />
										<form enctype="multipart/form-data" name="subir_banner" id="subir_banner" action="" method="post">
											<input type="file" class='hidden' name="file_banner" id="file_banner" required>
											
											<input name='btn_subir_imagen' class='hidden btn_subir_imagen_registro' id='btn_subir_imagen'	type="submit" value='Siguiente' />
										</form>
									<?php
										}else if(!$this->contenidoData[0]['tipo_formulario']){
									?>
										<div class="imagen_paso"><img src="<?php echo URL; ?>public/css/img/registro_paso4.png" alt=""></div>
										<!--<div class="titulo_form"><p>Paso 4: </p></div>-->
										<h1>Elije tu formulario</h1>
										<form action="actualizarContenido" name='info_contenido' >
											<div class="opcion_form">
												<label class='label_tipo_form' for="tipo_formulario">OPCIÓN 1</label>
												<input class='radio_tipo_form' type="radio" name="tipo_formulario" value="1"  >
											</div>
											<div class="elementos_form">
												<div class="elemento_form">
													<img src="<?php echo URL; ?>public/css/img/elemento_mail.png" alt=""><p>Email</p>
												</div>
												<div class="elemento_form">
													<img src="<?php echo URL; ?>public/css/img/elemento_pregunta.png" alt=""><p>¿Qué Necesito?</p>
												</div>
											</div>
											<div class="opcion_form">
												<label class='label_tipo_form' for="tipo_formulario">OPCIÓN 2</label>
												<input class='radio_tipo_form' type="radio" name="tipo_formulario" value="2"  >
											</div>
											<div class="elementos_form">
												<div class="elemento_form">
													<img src="<?php echo URL; ?>public/css/img/elemento_nombre.png" alt=""><p>Nombre</p>
												</div>
												<div class="elemento_form">
													<img src="<?php echo URL; ?>public/css/img/elemento_mail.png" alt=""><p>Email</p>
												</div>
												<div class="elemento_form">
													<img src="<?php echo URL; ?>public/css/img/elemento_fono.png" alt=""><p>Teléfono</p>
												</div>
												<div class="elemento_form">
													<img src="<?php echo URL; ?>public/css/img/elemento_pregunta.png" alt=""><p>¿Qué Necesito?</p>
												</div>
											</div>
											<div class="opcion_form">
												<label class='label_tipo_form' for="tipo_formulario">OPCIÓN 3</label>
												<input class='radio_tipo_form' type="radio" name="tipo_formulario" value="3"  >
											</div>
											<div class="elementos_form">
												<div class="elemento_form">
													<img src="<?php echo URL; ?>public/css/img/elemento_nombre.png" alt=""><p>Nombre</p>
												</div>
												<div class="elemento_form">
													<img src="<?php echo URL; ?>public/css/img/elemento_mail.png" alt=""><p>Email</p>
												</div>
												<div class="elemento_form">
													<img src="<?php echo URL; ?>public/css/img/elemento_fono.png" alt=""><p>Teléfono</p>
												</div>
												<div class="elemento_form">
													<img src="<?php echo URL; ?>public/css/img/elemento_rut.png" alt=""><p>Rut</p>
												</div>
												<div class="elemento_form">
													<img src="<?php echo URL; ?>public/css/img/elemento_direccion.png" alt=""><p>Dirección</p>
												</div>
												<div class="elemento_form">
													<img src="<?php echo URL; ?>public/css/img/elemento_pregunta.png" alt=""><p>¿Qué Necesito?</p>
												</div>
											</div>
											
										</form>
										<button id='btn_actualizar_contenido' onclick='actualizarFormulario(<?php echo $this->contenidoData[0]['id']; ?>);' >Siguiente</button>
									<?php
										}else if(!$this->contenidoData[0]['orden']){
									?>
										<div class="imagen_paso"><img src="<?php echo URL; ?>public/css/img/registro_paso5.png" alt=""></div>
										<!--<div class="titulo_form"><p>Paso 5: </p></div>-->
										<h1>Elije la distribucion de los elementos</h1>
										<form action="actualizarContenido" name='info_contenido' >
											<div class="opcion_orden">
												<label class='label_tipo_form' for="orden">OPCIÓN 1</label>
												<input class='radio_tipo_form' type="radio" name="orden" value="1" >
												<img  class='img_orden' src="<?php echo URL; ?>public/css/img/orden1.png" alt="">
											</div>
											<div class="opcion_orden">
												<label class='label_tipo_form' for="orden">OPCIÓN 2</label>
												<input class='radio_tipo_form' type="radio" name="orden" value="2" >
												<img class='img_orden' src="<?php echo URL; ?>public/css/img/orden2.png" alt="">
											</div>
											<div class="opcion_orden">
												<label class='label_tipo_form' for="orden">OPCIÓN 3</label>
												<input class='radio_tipo_form' type="radio" name="orden" value="3" >
												<img class='img_orden' src="<?php echo URL; ?>public/css/img/orden3.png" alt="">
											</div>
											<div class="opcion_orden">
												<label class='label_tipo_form' for="orden">OPCIÓN 4</label>
												<input class='radio_tipo_form' type="radio" name="orden" value="4" >
												<img class='img_orden' src="<?php echo URL; ?>public/css/img/orden4.png" alt="">
											</div>
											<div class="opcion_orden">
												<label class='label_tipo_form' for="orden">OPCIÓN 5</label>
												<input class='radio_tipo_form' type="radio" name="orden" value="5" >
												<img class='img_orden' src="<?php echo URL; ?>public/css/img/orden5.png" alt="">
											</div>
											<div class="opcion_orden">
												<label class='label_tipo_form' for="orden">OPCIÓN 6</label>
												<input class='radio_tipo_form' type="radio" name="orden" value="6" >
												<img class='img_orden' src="<?php echo URL; ?>public/css/img/orden6.png" alt="">
											</div>
										</form>
										<button id='btn_actualizar_contenido' onclick='actualizarOrden(<?php echo $this->contenidoData[0]['id']; ?>);' >Siguiente</button>
									<?php
										}else if(!$this->contenidoData[0]['template']){
									?>
										<div class="imagen_paso"><img src="<?php echo URL; ?>public/css/img/registro_paso6.png" alt=""></div>
										<!--<div class="titulo_form"><p>Paso 6: </p></div>-->
										<h1>Elije el tema</h1>
										<form action="actualizarContenido" name='info_contenido' >
											<div class="opcion_orden">
												<label class='label_tipo_form' for="template">TEMA 1</label>
												<input class='radio_tipo_form' type="radio" name="template" value="1" <?php if($this->contenidoData[0]['template']==1){ echo 'checked="checked"';} ?> >
												<a class='link_vista' target='blank' href="<?php echo URL ?>User/vistaPrevia/1"><img  class='img_orden img_tema' src="<?php echo URL; ?>public/css/img/btn_tema1.png" alt=""><img  class='img_orden img_tema_h' src="<?php echo URL; ?>public/css/img/btn_tema1_h.png" alt=""></a>
											</div>
											<div class="opcion_orden">
												<label class='label_tipo_form' for="template">TEMA 2</label>
												<input class='radio_tipo_form' type="radio" name="template" value="2" <?php if($this->contenidoData[0]['template']==2){ echo 'checked="checked"';} ?> >
												<a class='link_vista' target='blank' href="<?php echo URL ?>User/vistaPrevia/2"><img  class='img_orden img_tema' src="<?php echo URL; ?>public/css/img/btn_tema2.png" alt=""><img  class='img_orden img_tema_h' src="<?php echo URL; ?>public/css/img/btn_tema2_h.png" alt=""></a>
											</div>
											<div class="opcion_orden">
												<label class='label_tipo_form' for="template">TEMA 3</label>
												<input class='radio_tipo_form' type="radio" name="template" value="3" <?php if($this->contenidoData[0]['template']==3){ echo 'checked="checked"';} ?> >
												<a class='link_vista' target='blank' href="<?php echo URL ?>User/vistaPrevia/3"><img  class='img_orden img_tema' src="<?php echo URL; ?>public/css/img/t3mini.png" alt=""><img  class='img_orden img_tema_h' src="<?php echo URL; ?>public/css/img/btn_tema2_h.png" alt=""></a>
											</div>
											<div class="opcion_orden">
												<label class='label_tipo_form' for="template">TEMA 4</label>
												<input class='radio_tipo_form' type="radio" name="template" value="4" <?php if($this->contenidoData[0]['template']==4){ echo 'checked="checked"';} ?> >
												<a class='link_vista' target='blank' href="<?php echo URL ?>User/vistaPrevia/4"><img  class='img_orden img_tema' src="<?php echo URL; ?>public/css/img/t4mini.png" alt=""><img  class='img_orden img_tema_h' src="<?php echo URL; ?>public/css/img/btn_tema2_h.png" alt=""></a>
											</div>
											
											<div class="opcion_orden">
												<label class='label_tipo_form' for="template">TEMA 5</label>
												<input class='radio_tipo_form' type="radio" name="template" value="5" <?php if($this->contenidoData[0]['template']==5){ echo 'checked="checked"';} ?> >
												<a class='link_vista' target='blank' href="<?php echo URL ?>User/vistaPrevia/5"><img  class='img_orden img_tema' src="<?php echo URL; ?>public/css/img/t5mini.png" alt=""><img  class='img_orden img_tema_h' src="<?php echo URL; ?>public/css/img/btn_tema2_h.png" alt=""></a>
											</div>
											<div class="opcion_orden">
												<label class='label_tipo_form' for="template">TEMA 6</label>
												<input class='radio_tipo_form' type="radio" name="template" value="6" <?php if($this->contenidoData[0]['template']==6){ echo 'checked="checked"';} ?> >
												<a class='link_vista' target='blank' href="<?php echo URL ?>User/vistaPrevia/6"><img  class='img_orden img_tema' src="<?php echo URL; ?>public/css/img/t6mini.png" alt=""><img  class='img_orden img_tema_h' src="<?php echo URL; ?>public/css/img/btn_tema2_h.png" alt=""></a>
											</div>
											<div class="opcion_orden">
												<label class='label_tipo_form' for="template">TEMA 7</label>
												<input class='radio_tipo_form' type="radio" name="template" value="7" <?php if($this->contenidoData[0]['template']==7){ echo 'checked="checked"';} ?> >
												<a class='link_vista' target='blank' href="<?php echo URL ?>User/vistaPrevia/7"><img  class='img_orden img_tema' src="<?php echo URL; ?>public/css/img/t7mini.png" alt=""><img  class='img_orden img_tema_h' src="<?php echo URL; ?>public/css/img/btn_tema2_h.png" alt=""></a>
											</div>
											<div class="opcion_orden">
												<label class='label_tipo_form' for="template">TEMA 8</label>
												<input class='radio_tipo_form' type="radio" name="template" value="8" <?php if($this->contenidoData[0]['template']==8){ echo 'checked="checked"';} ?> >
												<a class='link_vista' target='blank' href="<?php echo URL ?>User/vistaPrevia/8"><img  class='img_orden img_tema' src="<?php echo URL; ?>public/css/img/t8mini.png" alt=""><img  class='img_orden img_tema_h' src="<?php echo URL; ?>public/css/img/btn_tema2_h.png" alt=""></a>
											</div>
											<div class="opcion_orden">
												<label class='label_tipo_form' for="template">TEMA 9</label>
												<input class='radio_tipo_form' type="radio" name="template" value="9" <?php if($this->contenidoData[0]['template']==9){ echo 'checked="checked"';} ?> >
												<a class='link_vista' target='blank' href="<?php echo URL ?>User/vistaPrevia/9"><img  class='img_orden img_tema' src="<?php echo URL; ?>public/css/img/t9mini.png" alt=""><img  class='img_orden img_tema_h' src="<?php echo URL; ?>public/css/img/btn_tema2_h.png" alt=""></a>
											</div>
											<div class="opcion_orden">
												<label class='label_tipo_form' for="template">TEMA 10</label>
												<input class='radio_tipo_form' type="radio" name="template" value="10" <?php if($this->contenidoData[0]['template']==10){ echo 'checked="checked"';} ?> >
												<a class='link_vista' target='blank' href="<?php echo URL ?>User/vistaPrevia/10"><img  class='img_orden img_tema' src="<?php echo URL; ?>public/css/img/t10mini.png" alt=""><img  class='img_orden img_tema_h' src="<?php echo URL; ?>public/css/img/btn_tema2_h.png" alt=""></a>
											</div>
											<div class="opcion_orden">
												<label class='label_tipo_form' for="template">TEMA 11</label>
												<input class='radio_tipo_form' type="radio" name="template" value="11" <?php if($this->contenidoData[0]['template']==11){ echo 'checked="checked"';} ?> >
												<a class='link_vista' target='blank' href="<?php echo URL ?>User/vistaPrevia/11"><img  class='img_orden img_tema' src="<?php echo URL; ?>public/css/img/t11mini.png" alt=""><img  class='img_orden img_tema_h' src="<?php echo URL; ?>public/css/img/btn_tema2_h.png" alt=""></a>
											</div>
											<div class="opcion_orden">
												<label class='label_tipo_form' for="template">TEMA 12</label>
												<input class='radio_tipo_form' type="radio" name="template" value="12" <?php if($this->contenidoData[0]['template']==12){ echo 'checked="checked"';} ?> >
												<a class='link_vista' target='blank' href="<?php echo URL ?>User/vistaPrevia/12"><img  class='img_orden img_tema' src="<?php echo URL; ?>public/css/img/t12mini.png" alt=""><img  class='img_orden img_tema_h' src="<?php echo URL; ?>public/css/img/btn_tema2_h.png" alt=""></a>
											</div>
											<div class="opcion_orden">
												<label class='label_tipo_form' for="template">TEMA 13</label>
												<input class='radio_tipo_form' type="radio" name="template" value="13" <?php if($this->contenidoData[0]['template']==13){ echo 'checked="checked"';} ?> >
												<a class='link_vista' target='blank' href="<?php echo URL ?>User/vistaPrevia/13"><img  class='img_orden img_tema' src="<?php echo URL; ?>public/css/img/t13mini.png" alt=""><img  class='img_orden img_tema_h' src="<?php echo URL; ?>public/css/img/btn_tema2_h.png" alt=""></a>
											</div>
											<div class="opcion_orden">
												<label class='label_tipo_form' for="template">TEMA 14</label>
												<input class='radio_tipo_form' type="radio" name="template" value="14" <?php if($this->contenidoData[0]['template']==14){ echo 'checked="checked"';} ?> >
												<a class='link_vista' target='blank' href="<?php echo URL ?>User/vistaPrevia/14"><img  class='img_orden img_tema' src="<?php echo URL; ?>public/css/img/t14mini.png" alt=""><img  class='img_orden img_tema_h' src="<?php echo URL; ?>public/css/img/btn_tema2_h.png" alt=""></a>
											</div>
										</form>
										<button id='btn_actualizar_contenido' onclick='actualizarTemplate(<?php echo $this->contenidoData[0]['id']; ?>);' >Siguiente</button>
									<?php
										}
									?>

								<?php
									}else{
								?>
									<div class="imagen_paso"><img src="<?php echo URL; ?>public/css/img/registro_paso2.png" alt=""></div>
									<!--<div class="titulo_form"><p>Paso 2:</p></div>-->
									<h1>Ingresa la información de tu página</h1>
									<form name='form_crear_contenido' method='post' action="<?php echo URL; ?>User/generarContenido">
										<label id='detalle_link_registro' for="link"><?php echo URL; ?></label><input type="text" class='input_small_registro' id='input_link' name='link' placeholder='Direccion a la que accedes' >
										<textarea name="descripcion_productos" placeholder='Descripcion del producto' id="" cols="30" rows="10"></textarea>
										<input name='btn_generar_contenido' id='btn_generar_contenido'	type="submit" value='Siguiente' />
									</form>

								<?php
									}
								?>
							<?php
								}else{
							?>

								<div class="contenedor-form">
									<div class="imagen_paso"><img src="<?php echo URL; ?>public/css/img/registro_paso1.png" alt=""></div>
									<!--<div class="titulo_form">Paso 1:</div>-->
									<h1>Ingresa los datos de tu empresa</h1>
									<form name='form_crear_empresa' method='post' action="<?php echo URL; ?>User/crearEmpresa">
										<input name='nombre_empresa'	type="text" 	placeholder='Nombre de la empresa' required/>
										<input name='rut_empresa' 		type="text" 	placeholder='Rut' required/>
										<input name='direccion_empresa' type="text"		placeholder='Dirección de la Empresa' required/>
										<input name='mail_empresa' 		type="text" 	placeholder='E-mail de contacto de la Empresa' required/>
										<input name='mail_empresa2' 	type="text" 	placeholder='Repite el E-mail de la Empresa' required/>
										<input name='razon_social'	    type="text"		placeholder='Razon Social' required/>
										<input name='fono_empresa' 		type="text" 	placeholder='Teléfono de contacto de la Empresa' required/>
										<input name='btn_crear_empresa' id='btn_crear_empresa'	type="submit" value='Siguiente' />
									</form>
								</div>
							<?php
								}
							?>
					</article>
				</section>
			</div>
		</div>
		
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
					e.preventDefault();
					registrarContenido();
					/* uploadFiles2(e); */
				});
				
				$('#btn_registro_empresa').click(function(){
					$('form[name="form_crear_empresa"]').parent().fadeToggle();
				});
				
				$('#subir_banner').on('submit', uploadFiles);
				
				$("#btn-buscar-img").click(function(e){
					$("#file_banner").click();
					e.preventDefault();
				});
				
				$("#file_banner").change(function(){
					readURL(this);
					$('#btn_subir_imagen').fadeToggle();
				});

			});
			
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					
					reader.onload = function (e) {
						var img = new Image;
						img.src = e.target.result;
						
						img.onload = function(){
							$('#imagen-logo-usuario').attr('src', e.target.result);
							/* $("#mascara-330").css({'display':'block'});
							$("#contenedor-avatar").css({'display':'block'}); */
							
							/*Dependiendo de las dimensiones de la foto, condiciono el ancho o el largo al 100%*/
							/* if(img.width>img.height){
								$('#vista-previa').css({'height':'100%', 'width':'auto'});
							}else if(img.width<img.height){
								$('#vista-previa').css({'height':'auto', 'width':'100%'});
							}else if(img.width==img.height){
								$('#vista-previa').css({'height':'100%', 'width':'100%'});
							} */
							
							/* $('#imagen-logo-usuario').fadeToggle(); */
						}
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
			
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
				var mail_empresa2	  = $('form[name="form_crear_empresa"] input[name="mail_empresa2"]')[0].value;
				var direccion_empresa = $('form[name="form_crear_empresa"] input[name="direccion_empresa"]')[0].value;
				var fono_empresa 	  = $('form[name="form_crear_empresa"] input[name="fono_empresa"]')[0].value;

				
				if(!Fn.validaRut(rut_empresa)){
					alert('El RUT debe ser válido y sin puntos(ejemplo:XXXXXXXX-X)');

				}else if(!validaEmail(mail_empresa)){
					alert('El e-mail no es válido');
					
				}else if(mail_empresa != mail_empresa2){
					alert('El e-mail debe coincidir');
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
			
			function registrarContenido(){
			
				var link = $('form[name="form_crear_contenido"] input[name="link"]')[0].value;
				/* var tipo_formulario = $('form[name="form_crear_contenido"] select[name="tipo_formulario"]')[0].value; */
				/* var template = $('form[name="form_crear_contenido"] select[name="template"]')[0].value; */
				var descripcion_productos = $('form[name="form_crear_contenido"] textarea[name="descripcion_productos"]')[0].value;
				
				/* var archivo = $("form[name=form_crear_contenido] input[name=file_banner]")[0].value; */
				$.ajax({
					type: "POST",
					url: "<?php echo URL; ?>Contenido/generarContenido1",
					data: {id_empresa: <?php echo $this->empresaData[0]['id']; ?>, link: link, descripcion_productos: descripcion_productos}
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
			
				function actualizarFormulario(id){
				
					var tipo_formulario = $('form[name="info_contenido"] input:radio[name="tipo_formulario"]:checked').val();
					tipo_formulario = (tipo_formulario != "<?php echo $this->contenidoData[0]['tipo_formulario']; ?>" && tipo_formulario !='' )? tipo_formulario: "<?php echo $this->contenidoData[0]['tipo_formulario']; ?>";

					$.ajax({
						type: "POST",
						url: "<?php echo URL; ?>Contenido/actualizarFormulario",
						data: {id: id, tipo_formulario: tipo_formulario}
					}).done(function(response){
						if(response == 1){
							/* alert("Actualizacion Exitosa"); */
							location.reload();
						}else{
							/* alert("Rut o contraseña incorrecto"); */
							 alert(response);
						}
					});
				}
				
				function actualizarOrden(id){
				
					var orden = $('form[name="info_contenido"] input:radio[name="orden"]:checked').val();

					orden = (orden != "<?php echo $this->contenidoData[0]['orden']; ?>" && orden !='' )? orden: "<?php echo $this->contenidoData[0]['orden']; ?>";

					$.ajax({
						type: "POST",
						url: "<?php echo URL; ?>Contenido/actualizarOrden",
						data: {id: id, orden: orden}
					}).done(function(response){
						if(response == 1){
							/* alert("Actualizacion Exitosa"); */
							location.reload();
						}else{
							/* alert("Rut o contraseña incorrecto"); */
							 alert(response);
						}
					});
				}
			
				function actualizarTemplate(id){
				
					var template = $('form[name="info_contenido"] input:radio[name="template"]:checked').val();

					template = (template != "<?php echo $this->contenidoData[0]['template']; ?>" && template !='' )? template: "<?php echo $this->contenidoData[0]['template']; ?>";

					$.ajax({
						type: "POST",
						url: "<?php echo URL; ?>Contenido/actualizarTemplate",
						data: {id: id, template: template}
					}).done(function(response){
						if(response == 1){
							/* alert("Actualizacion Exitosa"); */
							location.reload();
						}else{
							/* alert("Rut o contraseña incorrecto"); */
							 alert(response);
						}
					});
				}
			
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
							/* alert("Actualizacion Exitosa"); */
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