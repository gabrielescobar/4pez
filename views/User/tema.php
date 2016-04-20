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
								<button id='btn_actualizar_contenido' onclick='actualizarTemplate(<?php echo $this->contenidoData[0]['id']; ?>);' >Guardar Cambios</button>
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
					actualizarTemplate(<?php echo $this->contenidoData[0]['id']; ?>);
				});
			});
		
		
			function actualizarTemplate(id){
			
				var template = $('form[name="info_contenido"] input:radio[name="template"]:checked').val();

				template = (template != "<?php echo $this->contenidoData[0]['template']; ?>" && template !='' )? template: "<?php echo $this->contenidoData[0]['template']; ?>";

				$.ajax({
					type: "POST",
					url: "<?php echo URL; ?>Contenido/actualizarTemplate",
					data: {id: id, template: template}
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
		</script>
	</body>
</html>