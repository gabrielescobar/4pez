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
					<table>
						<tr>
							<th>Nombre</th>
							<th>Rut</th>
							<th>E-mail</th>
							<th>Télefono</th>
							<th>Dirección</th>
							<th>Mensaje</th>
						</tr>
						<?php
							for ($i = 0; $i < count($this->contenidoFormulario); $i++) {
						?>
						<tr>
							<td><?php echo $this->contenidoFormulario[$i]['nombre'] ?></td>
							<td><?php echo $this->contenidoFormulario[$i]['rut'] ?></td>
							<td><?php echo $this->contenidoFormulario[$i]['email'] ?></td>
							<td><?php echo $this->contenidoFormulario[$i]['telefono'] ?></td>
							<td><?php echo $this->contenidoFormulario[$i]['direccion'] ?></td>
							<td><?php echo $this->contenidoFormulario[$i]['mensaje'] ?></td>
						</tr>
								
						<?php
							}
						?>
					</table>
				</article>
			</section>
		</div>
	</body>
</html>