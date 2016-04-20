<!doctype html>
<html lang="es-ES">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $this->empresaData[0]['nombre']; ?> - 4Pez</title>
		
		<!--CSS-->
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/reset.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/tema1.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/style-page.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/distribucion.css">

		<!--jQuery-->
		<script src="<?php echo URL; ?>public/js/jquery-1.11.1.min.js"></script>
	</head>
	<body>
		
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
				<a id="logo-4pez" href="./index.php"><img src="<?php echo URL; ?>public/css/img/logo-hori.png" alt=""></a>
			</div>
		</footer>
		
		<script>
			$(function(){
				$('#btn_contacto').click(function(e){
					e.preventDefault();
					generarConsulta();
				});
				
				function generarConsulta(){

					<?php if($this->contenidoData[0]['tipo_formulario'] != 1){ ?>var nombre_f = $('form[name="form_contacto"] input[name="nombre_f"]')[0].value;<?php } ?>
					<?php if($this->contenidoData[0]['tipo_formulario'] == 3){ ?>var rut_f = $('form[name="form_contacto"] input[name="rut_f"]')[0].value;<?php } ?>
					var mail_f = $('form[name="form_contacto"] input[name="mail_f"]')[0].value;
					<?php if($this->contenidoData[0]['tipo_formulario'] != 1){ ?>var fono_f = $('form[name="form_contacto"] input[name="fono_f"]')[0].value;<?php } ?>
					<?php if($this->contenidoData[0]['tipo_formulario'] == 3){ ?>var direccion_f = $('form[name="form_contacto"] input[name="direccion_f"]')[0].value;<?php } ?>
					var mensaje_f = $('form[name="form_contacto"] textarea[name="mensaje_f"]')[0].value;

					$.ajax({
						type: "POST",
						url: "<?php echo URL; ?>Formulario/generarConsulta",
						data: {
							id_empresa: <?php echo $this->empresaData[0]['id']; ?>,
							formulario: <?php echo $this->contenidoData[0]['tipo_formulario']; ?>,
							<?php if($this->contenidoData[0]['tipo_formulario'] != 1){ ?>nombre: nombre_f,<?php } ?>
							<?php if($this->contenidoData[0]['tipo_formulario'] == 3){ ?>rut: rut_f,<?php } ?>
							email: mail_f,
							<?php if($this->contenidoData[0]['tipo_formulario'] != 1){ ?>telefono: fono_f,<?php } ?>
							<?php if($this->contenidoData[0]['tipo_formulario'] == 3){ ?>direccion: direccion_f,<?php } ?>
							mensaje: mensaje_f
						}
					}).done(function(response){
						if(response == 1){
							alert('Muchas gracias!');
							location.reload();
						}else{
							alert(response);
						}
					});
					
				};
			});
		</script>
	</body>
</html>