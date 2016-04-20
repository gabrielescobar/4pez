<!doctype html>
<html lang="es-ES">
	<head>
		<meta charset="UTF-8">
		<title>4pez - Intranet</title>
		
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
			<aside class="contenido-lateral">
				<h1>CONTENIDO LATERAL</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lobortis tempor lorem, vitae mattis augue fermentum id. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur mauris metus, tempor ullamcorper rhoncus et, aliquet a ipsum.</p>
			</aside>

			
			<section class="contenido">
				<article>
					<div class="contenedor-form">
						<h1 class="">Entrar</h1>
						<form name='form_logeo' method='post' action="<?php echo URL; ?>User/logearUsuario">
							<input name='rut' 	type="text" 	placeholder='rut' required/>
							<input name='password'	type="password" placeholder='Password' required/>
							<input name='btn_entrar' id='btn_entrar'	type="submit" value='Entrar' required/>
							<div class="smallText">
								<span>¿Olvidaste tu password?<a href="#">Recordar Password</a></span>
							</div>
						</form>
					</div>
				</article>
			</section>
		</div>
		<script>
			$(function(){
				$('#btn_entrar').click(function(e){
					e.preventDefault();
					logearUsuario();
				});
			});
			
			function logearUsuario(){
				var rut = $('form[name="form_logeo"] input[name="rut"]')[0].value;
				var password = $('form[name="form_logeo"] input[name="password"]')[0].value;

				$.ajax({
					type: "POST",
					url: "<?php echo URL; ?>Intranet/logearUsuario",
					data: {rut: rut, password: password}
				}).done(function(response){
					if(response == 1){
						location.reload();
					}else{
						alert("Rut o contraseña incorrecto");
						/* alert(response); */
					}
				});
				
			};
		</script>

	</body>
</html>