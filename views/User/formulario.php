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
								<h1>Opciones para tu formulario</h1>
								<form action="actualizarContenido" name='info_contenido' >
									<div class="opcion_form">
										<label class='label_tipo_form' for="tipo_formulario">OPCIÓN 1</label>
										<input class='radio_tipo_form' type="radio" name="tipo_formulario" value="1" <?php if($this->contenidoData[0]['tipo_formulario']==1){ echo 'checked="checked"';} ?> >
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
										<input class='radio_tipo_form' type="radio" name="tipo_formulario" value="2" <?php if($this->contenidoData[0]['tipo_formulario']==2){ echo 'checked="checked"';} ?> >
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
										<input class='radio_tipo_form' type="radio" name="tipo_formulario" value="3" <?php if($this->contenidoData[0]['tipo_formulario']==3){ echo 'checked="checked"';} ?> >
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
								<button id='btn_actualizar_contenido' onclick='actualizarFormulario(<?php echo $this->contenidoData[0]['id']; ?>);' >Guardar Cambios</button>
								<!--<div  id='btn_actualizar_contenido' class='btn_form'><a href=""><p><img src="<?php echo URL; ?>public/css/img/flecha_blanca.png" alt=""> Guardar Cambios</p></a></div>-->
							<?php
								}
							}
						?>
				</article>
			</section>
		</div>
		<script>
			$(function(){
				$('#btn_actualizar_contenido').click(function(e){
					e.preventDefault();
					actualizarFormulario(<?php echo $this->contenidoData[0]['id']; ?>);
				});
			});
		
		
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
		</script>
	</body>
</html>