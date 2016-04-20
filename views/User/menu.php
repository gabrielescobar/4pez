<aside class="contenido-lateral">
	<ul>
		<li class='<?php if($this->pagina=="data"){echo 'activo';} ?>' ><a href="<?php echo URL ?>User/data"><span class='icono_menu' id='icono_data'>Inicio</span></a></li>
		<li class='<?php if($this->pagina=="perfil"){echo 'activo';} ?>' ><a href="<?php echo URL ?>User/perfil"><span class='icono_menu' id='icono_perfil'>Mi Perfil</span></a></li>
		<li class='<?php if($this->pagina=="empresa"){echo 'activo';} ?>' ><a href="<?php echo URL ?>User/empresa"><span class='icono_menu' id='icono_empresa'>Mi empresa</span></a></li>
		<li class='<?php if($this->pagina=="imagen"){echo 'activo';} ?>' ><a href="<?php echo URL ?>User/imagen"><span class='icono_menu' id='icono_imagen'>Editar banner del sitio</span></a></li>
		<li class='<?php if($this->pagina=="contenido"){echo 'activo';} ?>' ><a href="<?php echo URL ?>User/contenido"><span class='icono_menu' id='icono_contenido'>Contenido de mi sitio</span></a></li>
		<li class='<?php if($this->pagina=="formulario"){echo 'activo';} ?>' ><a href="<?php echo URL ?>User/formulario"><span class='icono_menu' id='icono_formulario'>Formulario de mi sitio</span></a></li>
		<li class='<?php if($this->pagina=="orden"){echo 'activo';} ?>' ><a href="<?php echo URL ?>User/orden"><span class='icono_menu' id='icono_orden'>Distribución de mi sitio</span></a></li>
		<li class='<?php if($this->pagina=="tema"){echo 'activo';} ?>' ><a href="<?php echo URL ?>User/tema"><span class='icono_menu' id='icono_tema'>Tema de mi sitio</span></a></li>
		<li class='<?php if($this->pagina=="campana"){echo 'activo';} ?>' ><a href="<?php echo URL ?>User/campana"><span class='icono_menu' id='icono_campana'>Prepara tu Campaña</span></a></li>
		<li class='<?php if($this->pagina=="preview"){echo 'activo';} ?>' >
			
			<?php
				if($this->contenidoData[0]){
					if($this->contenidoData[0]['estado']=='activo'){
			?>
				<a target='_blank' href="<?php echo URL.$this->contenidoData[0]['link']; ?>"><span class='icono_menu' id='icono_preview'>Mi Sitio</span></a>

			<?php
					}else if($this->contenidoData[0][estado]=='pendiente'){
			?>
				<a href="<?php echo URL ?>User/preview"><span class='icono_menu' id='icono_preview'>Vista Previa</span></a>
			<?php
					}
			
				}
			?>
		</li>
		<li ><a href="<?php echo URL; ?>User/destroySession" class="btn" id="btn_Cerrar_session"  ><span class='icono_menu' id='icono_cerrar'>Cerrar Sesión</span></a></li>
	</ul>
	
	<script>
		$(function(){
			$('#btn_menu').click(function(e){
				e.preventDefault();
				$('.contenido-lateral').fadeToggle( );
			});
		});
	</script>
</aside>