<header class="encabezado">
	<div id="btn_menu"><img src="<?php echo URL; ?>public/css/img/btn_menu.png" alt=""></div>
	<div class="contenedor">
		<a id="logo" href="<?php echo URL; ?>"><img src="<?php echo URL; ?>public/css/img/4pez-logo.png" alt=""></a>
		
		<?php if(Session::exist()){  ?>
			<div class="caja_derecha_header">
				<div id="bienvenida">
					<h2>¡Bienvenido!</h2>
					<p><?php echo Session::getValue('U_NAME'); ?></p>
				</div>
				<div class="division_header"></div>
				<div id="caja_sitio">
					<?php
						if($this->contenidoData[0]){
							if($this->contenidoData[0]['estado']=='activo'){
					?>
						<a target='_blank' href="<?php echo URL.$this->contenidoData[0]['link']; ?>"><div class="btn_sitio"><p>Mi Sitio</p></div></a>
					<?php
							}else if($this->contenidoData[0][estado]=='pendiente'){
					?>
						<a href="<?php echo URL ?>User/preview"><div class="btn_sitio"><p>Vista Previa</p></div></a>
						<p>Estamos evaluando tu sitio. Por ahora Solo puedes acceder a una vista previa</p>
					<?php
							}
					
						}
					?>
				</div>
			</div>
		<?php }  ?>
	</div>
</header>