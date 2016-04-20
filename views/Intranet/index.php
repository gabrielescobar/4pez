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
							<th>Apellido Paterno</th>
							<th>Apellido Materno</th>
							<th>Rut</th>
							<th>E-mail</th>
							<th>Télefono</th>
							<th>Estado</th>
							<th>Fecha Registro</th>
							<th>Opciones</th>
						</tr>
						<?php
							for ($i = 0; $i < count($this->userData); $i++) {
						?>
						<tr>
							<td><?php echo $this->userData[$i]['nombre'] ?></td>
							<td><?php echo $this->userData[$i]['apellido_paterno'] ?></td>
							<td><?php echo $this->userData[$i]['apellido_materno'] ?></td>
							<td><?php echo $this->userData[$i]['rut'] ?></td>
							<td><?php echo $this->userData[$i]['mail_contacto'] ?></td>
							<td><?php echo $this->userData[$i]['telefono'] ?></td>
							<td><?php echo $this->userData[$i]['estado_cuenta'] ?></td>
							<td><?php echo $this->userData[$i]['fecha_registro'] ?></td>
							<td><a href="<?php echo URL ?>Intranet/detalle/<?php echo $this->userData[$i]['id'] ?>">Detalle</a></td>
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