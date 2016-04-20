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
					<h2>Datos Cliente</h2>
					<table>
						<tr><th>Nombre</th><td><?php echo $this->userData[0]['nombre'] ?></td></tr>
						<tr><th>Apellido Paterno</th><td><?php echo $this->userData[0]['apellido_paterno'] ?></td></tr>
						<tr><th>Apellido Materno</th><td><?php echo $this->userData[0]['apellido_materno'] ?></td></tr>
						<tr><th>Rut</th><td><?php echo $this->userData[0]['rut'] ?></td></tr>
						<tr><th>E-mail</th><td><?php echo $this->userData[0]['mail_contacto'] ?></td></tr>
						<tr><th>Télefono</th><td><?php echo $this->userData[0]['telefono'] ?></td></tr>
						<tr><th>Estado</th><td><?php echo $this->userData[0]['estado_cuenta'] ?></td></tr>
						<tr><th>Fecha Registro</th><td><?php echo $this->userData[0]['fecha_registro'] ?></td>    </tr>
						<tr><th>Opciones</th><td></td></tr>
					</table>
					<h2>Datos Empresa</h2>
					<?php
						if($this->empresaData[0]){
					?>
						<table>
							<tr><th>Nombre</th><td><?php echo $this->empresaData[0]['nombre'] ?></td></tr>
							<tr><th>Razón social</th><td><?php echo $this->empresaData[0]['razon_social'] ?></td></tr>
							<tr><th>Rut</th><td><?php echo $this->empresaData[0]['rut'] ?></td></tr>
							<tr><th>E-mail</th><td><?php echo $this->empresaData[0]['mail_contacto'] ?></td></tr>
							<tr><th>Dirección</th><td><?php echo $this->empresaData[0]['rut'] ?></td></tr>
							<tr><th>Télefono</th><td><?php echo $this->empresaData[0]['telefono'] ?></td></tr>
							<tr><th>Fecha Registro</th><td><?php echo $this->empresaData[0]['fecha_registro'] ?></td></tr>
							<tr><th>Opciones</th><td></td></tr>
						</table>
					
					<?php
						}else{
					?>
						<p>El cliente aún no ha ingresado datos de su empresa*</p>
					<?php
						}
					?>
					<h2>Contenido Página</h2>
					<?php
						if($this->contenidoData[0]){
					?>
						<table>
							<tr><th>Link</th><td><a target='_blank' href="<?php echo URL.$this->contenidoData[0]['link']; ?>"><?php echo URL.$this->contenidoData[0]['link']; ?></a></td></tr>
							<tr><th>Logo</th><td><img id='imagen-logo-usuario' src="<?php echo URL; ?>/public/banners/<?php echo $this->contenidoData[0]['logo']; ?>" alt=""></td></tr>
							<tr><th>Tema Elegido</th><td><?php echo $this->contenidoData[0]['template'] ?></td></tr>
							<tr><th>Formulario</th><td><?php echo $this->contenidoData[0]['tipo_formulario'] ?></td></tr>
							<tr><th>Descripción</th><td><?php echo $this->contenidoData[0]['descripcion_productos'] ?></td></tr>
							<tr><th>Palabras Claves</th><td><?php echo $this->contenidoData[0]['palabras_claves'] ?></td></tr>
							<tr><th>Aviso</th><td><?php echo $this->contenidoData[0]['aviso'] ?></td></tr>
							<tr><th>Estado</th><td><?php echo $this->contenidoData[0]['estado'] ?></td></tr>
							<tr><th>Fecha Registro</th><td><?php echo $this->contenidoData[0]['fecha_registro'] ?></td></tr>
							<tr>
								<th>Opciones</th>
								<td>
									<?php
										if($this->contenidoData[0]['estado']=='pendiente'){
									?>
										<a href="#" id='btn_activar' >Activar sitio</a>
									<?php
										}else if( $this->contenidoData[0]['estado']=='activo'){
									?>
										<a href="#" id='btn_desactivar' >Desactivar sitio</a>
									<?php
										}
									?>
								</td>
							</tr>
						</table>
					
					<?php
						}else{
					?>
						<p>El cliente aún no ha ingresado datos para el sitio*</p>
					<?php
						}
					?>
				</article>
			</section>
		</div>
		<script>
			$(function(){
				$('#btn_activar').click(function(e){
					e.preventDefault();
					activarPagina();
				});
				$('#btn_desactivar').click(function(e){
					e.preventDefault();
					desactivarPagina();
				});
			});	
			function activarPagina(){
				$.ajax({
					type: "POST",
					url: "<?php echo URL; ?>Intranet/activarPagina",
					data: {	id: '<?php echo $this->contenidoData[0]['id']; ?>' }
				}).done(function(response){
					if(response == 1){
						alert('Página Activada');
						location.reload();
					}else{
						alert(response);
					}
				});
			};
			function desactivarPagina(){
				$.ajax({
					type: "POST",
					url: "<?php echo URL; ?>Intranet/desactivarPagina",
					data: {	id: '<?php echo $this->contenidoData[0]['id']; ?>' }
				}).done(function(response){
					if(response == 1){
						alert('Página desactivada!');
						location.reload();
					}else{
						alert(response);
					}
				});
			};
			
		</script>
	</body>
</html>