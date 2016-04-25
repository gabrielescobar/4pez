<!doctype html>
<html lang="es-ES">
<head>
	<meta charset="UTF-8">
	<title>4pez</title>



	<!--CSS-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/reset.css">
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css">
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap-theme.min.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

	<!--jQuery-->
	<script src="<?php echo URL; ?>public/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo URL; ?>public/js/validaciones.js"></script>
	<script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

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
			<a class="navbar-brand" href="#">Login dropdown</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float: right;">
			<div class="row">
				<div class="col-md-12">
					<ul class="nav navbar-nav">
						<li><a href="#">Conocenos</a></li>

					</ul>
					<form class="navbar-form navbar-left" role="search">
						<button type="submit" class="btn btn-default">Registrarse</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li><p class="navbar-text">Ya tienes una cuenta?</p></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
							<ul id="login-dp" class="dropdown-menu">
								<li>


									<form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											<input type="email" class="form-control" id="exampleInputEmail2" placeholder="RUT" required>
										</div>
										<div class="form-group">
											<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Contraseña" required>
											<div class="help-block text-right"><a href="">Olvidaste tu contraseña ?</a></div>
										</div>
										<div class="form-group" style="width: 100%">
											<button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
										</div>
									</form>
								</li>
							</ul>
						</li>
					</ul>
				</div>

			</div>

		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>



<?php if(!Session::exist()){  ?>
	<div class="contenedor">
		<section class="contenido home">
			<article>
				<div class="contenedor-form">
					<h1>Bienvenido</h1>
					<form name='form_registro' method='post' action="<?php echo URL; ?>User/registrarUsuario">
						<input name='nombre_cliente' 		type="text" 	placeholder='Nombre' required/>
						<input name='apellido_p_cliente' 	type="text" 	placeholder='Apellido Paterno' required/>
						<input name='apellido_m_cliente' 	type="text" 	placeholder='Apellido Materno' required/>
						<input name='rut_cliente' 			type="text" 	placeholder='Rut(12345678-9)' class='input_small left' required/>
						<input name='fono_cliente' 			type="text" 	placeholder='Teléfono' class='input_small' required/>
						<input name='mail_cliente' 			type="text" 	placeholder='E-mail' class='input_small left' required/>
						<input name='mail_cliente2' 		type="text" 	placeholder='Vuelva a escribir el E-mail' class='input_small' required/>
						<input name='password_cliente'		type="password" placeholder='Contraseña' class='input_small left' required/>
						<input name='password_cliente2'		type="password" placeholder='Repetir Contraseña' class='input_small' required/>
						<input class='' name='btn_registrar' id='btn_registrar2'	type="submit" value='Registrarse' required/>
						<div  id='btn_registrar' class='btn_form esconder'><a href=""><p><img src="<?php echo URL; ?>public/css/img/flecha_blanca.png" alt=""> Entrar</p></a></div>
					</form>
				</div>
			</article>
		</section>

		<section class="contenido detalle_planes esconder">
			<article>
				<h1>Tipos de plan</h1>
				<img src="<?php echo URL; ?>/public/css/img/tabla-grande.png" alt="">
			</article>
		</section>
	</div>
	<script>
		$(function(){
			$('#btn_ver_planes').click(function(e){
				$("#btn_ver_planes").toggleClass("esconder");
				$("#btn_ver_registro").toggleClass("esconder");
				$(".detalle_planes").toggleClass("esconder");
				$(".contenido.home").toggleClass("esconder");
			});
			$('#btn_ver_registro').click(function(e){
				$("#btn_ver_planes").toggleClass("esconder");
				$("#btn_ver_registro").toggleClass("esconder");
				$(".detalle_planes").toggleClass("esconder");
				$(".contenido.home").toggleClass("esconder");
			});


			$('#btn_entrar2').click(function(e){
				e.preventDefault();
				logearUsuario();
			});

			$('#btn_entrar a').click(function(e){
				e.preventDefault();
				logearUsuario();
			});
			$('#btn_registrar2').click(function(e){
				e.preventDefault();
				registrarUsuario();
			});

			$('#btn_registrar a').click(function(e){
				e.preventDefault();
				registrarUsuario();
			});
		});

		function registrarUsuario(){
			var nombre_cliente = $('form[name="form_registro"] input[name="nombre_cliente"]')[0].value;
			var apellido_p_cliente = $('form[name="form_registro"] input[name="apellido_p_cliente"]')[0].value;
			var apellido_m_cliente = $('form[name="form_registro"] input[name="apellido_m_cliente"]')[0].value;
			var rut_cliente = $('form[name="form_registro"] input[name="rut_cliente"]')[0].value;
			var mail_cliente = $('form[name="form_registro"] input[name="mail_cliente"]')[0].value;
			var mail_cliente2 = $('form[name="form_registro"] input[name="mail_cliente2"]')[0].value;
			var fono_cliente = $('form[name="form_registro"] input[name="fono_cliente"]')[0].value;
			var password_cliente = $('form[name="form_registro"] input[name="password_cliente"]')[0].value;
			var password_cliente2 = $('form[name="form_registro"] input[name="password_cliente2"]')[0].value;


			if(!Fn.validaRut(rut_cliente)){
				alert('El RUT debe ser válido y sin puntos(ejemplo:XXXXXXXX-X)');

			}else if(!validaEmail(mail_cliente)){
				alert('El e-mail no es válido');

			}else if(!validaTelefono(fono_cliente)){
				alert('El teléfono solo debe contener números');

			}else if(mail_cliente != mail_cliente2){
				alert('El e-mail no coincide');

			}else if(password_cliente != password_cliente2){
				alert('El password no coincide');

			}else{
				$.ajax({
					type: "POST",
					url: "<?php echo URL; ?>User/registrarUsuario",
					data: {nombre_cliente: nombre_cliente, apellido_p_cliente: apellido_p_cliente, apellido_m_cliente: apellido_m_cliente, rut_cliente: rut_cliente, mail_cliente: mail_cliente, fono_cliente: fono_cliente, password_cliente: password_cliente}
				}).done(function(response){
					if(response == 1){
						location.reload();
					}else{
						alert(response);
					}
				});
			}
		};

		function logearUsuario(){
			var rut_cliente = $('form[name="form_logeo"] input[name="rut_cliente"]')[0].value;
			var password_cliente = $('form[name="form_logeo"] input[name="password_cliente"]')[0].value;

			$.ajax({
				type: "POST",
				url: "<?php echo URL; ?>User/logearUsuario",
				data: {rut_cliente: rut_cliente, password_cliente: password_cliente}
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

<?php  }else{  ?>
	<div class="wrapper">
		<div class="contenedor">
			<?php echo Session::getValue('U_NAME'); ?>
			<div class="btn" id="btn_Cerrar_session">cerrar</div>
		</div>
	</div>

	<script>
		$(function(){
			$('#btn_Cerrar_session').click(function(e){
				document.location = "<?php echo URL; ?>User/destroySession";
			});
		});
	</script>
<?php  }  ?>
</body>
</html>