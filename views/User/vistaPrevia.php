<!doctype html>
<html lang="es-ES">
	<head>
		<meta charset="UTF-8">
		<title>VISTA PREVIA <?php echo $this->empresaData[0]['nombre']; ?> - 4Pez</title>
		<link rel="icon" href="<?php echo URL; ?>public/css/img/favicon.png" type="image/png" />
		<!--CSS-->
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/reset.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/tema<?php echo $this->tema; ?>.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/style-page.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/distribucion.css">

		<!--jQuery-->
		<script src="<?php echo URL; ?>public/js/jquery-1.11.1.min.js"></script>
	


	</head>
	<body>
		
		
		<header class="barra_preview">
			<div class="contenedor">
				<a id="logo-preview" href="<?php echo URL; ?>"><img src="<?php echo URL; ?>public/css/img/logo-hori.png" alt=""></a>
				<div id="titulo_preview"><h1>Vista Previa</h1></div>
				
				<div class="caja_derecha_header">
					<div class="btn_preview"><a href="<?php echo URL ?>User/data"><p>Volver</p></a></div>
					<div class="btn_preview"><a id='btn_guardar_preview' href="<?php echo URL ?>User/data"><p>Guardar Cambios</p></a></div>
					
				</div>
			</div>
		</header>
		<script>
			$(function(){
				$('#btn_guardar_preview').click(function(e){
					e.preventDefault();
					actualizarTemplate(<?php echo $this->contenidoData[0]['id']; ?>);
				});
			});
		
		
			function actualizarTemplate(id){
			

				$.ajax({
					type: "POST",
					url: "<?php echo URL; ?>Contenido/actualizarTemplate",
					data: {id: id, template: <?php echo $this->tema; ?>}
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
		
		<header class="encabezado">
			<div class="contenedor">
				<img id='logo-usuario' class='<?php echo $this->logo; ?>' src="<?php  echo URL; ?>public/banners/<?php echo $this->contenidoData[0]['logo']; ?>" alt="">
				<?php /* echo $this->empresaData[0]['nombre']; */ ?>
			</div>
		</header>
		
		<div class="contenedor">
			<section class="contenido <?php echo $this->info; ?>">
				<article class="post">
					<h1><?php echo $this->empresaData[0]['nombre']; ?></h1>
					<p><?php echo $this->contenidoData[0]['descripcion_productos']; ?></p>
				</article>
			</section>
			<section class="contenido <?php echo $this->form; ?>">
				<article class="post">
					<div class="contenedor-form">
						<h2>Formulario de contacto</h2>
						<form name='form_contacto' method='post' action="<?php echo URL; ?>User/crearEmpresa">
							<?php if($this->contenidoData[0]['tipo_formulario'] != 1){ ?><input name='nombre_f'		type="text" 	placeholder='Nombre' required/><?php } ?>
							<?php if($this->contenidoData[0]['tipo_formulario'] == 3){ ?><input name='rut_f' 		type="text" 	placeholder='Rut' required/><?php } ?>
							<input name='mail_f' 		type="text" 	placeholder='E-mail' required/>
							<?php if($this->contenidoData[0]['tipo_formulario'] != 1){ ?><input name='fono_f' 		type="text" 	placeholder='Teléfono' required/><?php } ?>
							<?php if($this->contenidoData[0]['tipo_formulario'] == 3){ ?><input name='direccion_f' 	type="text" 	placeholder='Dirección' required/><?php } ?>
							<textarea name="mensaje_f" placeholder='¿Qué necesito?' id="" cols="30" rows="10"></textarea>
							<input name='btn_contacto' id='btn_contacto'	type="submit" value='Enviar' />
						</form>
					</div>
				</article>
			</section>
		</div>
		<footer class="pie-pagina" >
			<div class="contenedor">
				<a id="logo-4pez" href="<?php echo URL; ?>"><img src="<?php echo URL; ?>public/css/img/logo-hori.png" alt=""></a>
			</div>
		</footer>
		
		
	</body>
</html>