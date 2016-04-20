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
								if($this->contenidoData[0]){
							?>
								<h1>Distribucion de los elementos</h1>
								<form action="actualizarContenido" name='info_contenido' >

									<div class="opcion_orden">
										<label class='label_tipo_form' for="orden">OPCIÓN 1</label>
										<input class='radio_tipo_form' type="radio" name="orden" value="1" <?php if($this->contenidoData[0]['orden']==1){ echo 'checked="checked"';} ?> >
										<img  class='img_orden' src="<?php echo URL; ?>public/css/img/orden1.png" alt="">
									</div>
									<div class="opcion_orden">
										<label class='label_tipo_form' for="orden">OPCIÓN 2</label>
										<input class='radio_tipo_form' type="radio" name="orden" value="2" <?php if($this->contenidoData[0]['orden']==2){ echo 'checked="checked"';} ?> >
										<img class='img_orden' src="<?php echo URL; ?>public/css/img/orden2.png" alt="">
									</div>
									<div class="opcion_orden">
										<label class='label_tipo_form' for="orden">OPCIÓN 3</label>
										<input class='radio_tipo_form' type="radio" name="orden" value="3" <?php if($this->contenidoData[0]['orden']==3){ echo 'checked="checked"';} ?> >
										<img class='img_orden' src="<?php echo URL; ?>public/css/img/orden3.png" alt="">
									</div>
									<div class="opcion_orden">
										<label class='label_tipo_form' for="orden">OPCIÓN 4</label>
										<input class='radio_tipo_form' type="radio" name="orden" value="4" <?php if($this->contenidoData[0]['orden']==4){ echo 'checked="checked"';} ?> >
										<img class='img_orden' src="<?php echo URL; ?>public/css/img/orden4.png" alt="">
									</div>
									<div class="opcion_orden">
										<label class='label_tipo_form' for="orden">OPCIÓN 5</label>
										<input class='radio_tipo_form' type="radio" name="orden" value="5" <?php if($this->contenidoData[0]['orden']==5){ echo 'checked="checked"';} ?> >
										<img class='img_orden' src="<?php echo URL; ?>public/css/img/orden5.png" alt="">
									</div>
									<div class="opcion_orden">
										<label class='label_tipo_form' for="orden">OPCIÓN 6</label>
										<input class='radio_tipo_form' type="radio" name="orden" value="6" <?php if($this->contenidoData[0]['orden']==6){ echo 'checked="checked"';} ?> >
										<img class='img_orden' src="<?php echo URL; ?>public/css/img/orden6.png" alt="">
									</div>
								</form>
								<button id='btn_actualizar_contenido' class='btn_accion' onclick='actualizarOrden(<?php echo $this->contenidoData[0]['id']; ?>);' >Guardar Cambios</button>
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
					actualizarOrden(<?php echo $this->contenidoData[0]['id']; ?>);
				});
			});
		
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
		</script>
	</body>
</html>