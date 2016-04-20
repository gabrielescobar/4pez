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
						?>
				
							<?php
								if($this->contenidoData[0]){
							?>
								<h1>Banner del Sitio</h1>
								<img id='imagen-logo-usuario' src="<?php echo URL; ?>/public/banners/<?php echo $this->contenidoData[0]['logo']; ?>" alt="">
								<h1>Cambiar tu Banner</h1>
								<input name='btn-buscar-img' id='btn-buscar-img' class='btn_accion' type="submit" value='Subir nuevo banner' />
								
								<!--<div  id='btn-buscar-img' class='btn_form'><a href=""><p><img src="<?php echo URL; ?>public/css/img/flecha_blanca.png" alt=""> Subir nuevo banner</p></a></div>-->
								<form enctype="multipart/form-data" name="subir_banner" id="subir_banner" action="" method="post">
									<input type="file" name="file_banner" id="file_banner" class='hidden' required>
									<input name='btn_subir_imagen' id='btn_subir_imagen' class='hidden'	type="submit" value='Guardar banner' />
								</form>
							<?php
								}
							}
						?>
				</article>
			</section>
		</div>
		
		<script>
			$(document).ready(function(){    
				$('#btn_generar_contenido').click(function(e){
					/* e.preventDefault(); */
					/* registrarContenido(); */
					uploadFiles2(e);
				});
				
				$('#btn_registro_empresa').click(function(){
					$('form[name="form_crear_empresa"]').parent().fadeToggle();
				});
				
				$('#subir_banner').on('submit', uploadFiles);
			
				$("#btn-buscar-img").click(function(e){
					e.preventDefault();
					$("#file_banner").click();
				});
				
				$("#file_banner").change(function(){
					readURL(this);
					$('#btn_subir_imagen').fadeToggle();
				});
			
			});
		
		
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					
					reader.onload = function (e) {
						var img = new Image;
						img.src = e.target.result;
						console.log("tamaño imagen: "+img.width);
						img.onload = function(){
							$('#imagen-logo-usuario').attr('src', e.target.result);
							/* $("#mascara-330").css({'display':'block'});
							$("#contenedor-avatar").css({'display':'block'}); */
							
							/*Dependiendo de las dimensiones de la foto, condiciono el ancho o el largo al 100%*/
							/* if(img.width>img.height){
								$('#vista-previa').css({'height':'100%', 'width':'auto'});
							}else if(img.width<img.height){
								$('#vista-previa').css({'height':'auto', 'width':'100%'});
							}else if(img.width==img.height){
								$('#vista-previa').css({'height':'100%', 'width':'100%'});
							} */
						}
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
		
		
		
		
			
			var files;

			// Add events
			$('input[type=file]').on('change', prepareUpload);
			/*$('form').on('submit', uploadFiles);*/

			// Grab the files and set them to our variable
			function prepareUpload(event){
				files = event.target.files;
			}
			
			function uploadFiles(event){
				event.stopPropagation(); // Stop stuff happening
				event.preventDefault(); // Totally stop stuff happening

				// START A LOADING SPINNER HERE

				// Create a formdata object and add the files
				var data = new FormData();
				$.each(files, function(key, value)
				{
					data.append(key, value);
				});
				
				$.ajax({
					url:"<?php echo URL; ?>Contenido/uploadFile?nombre=<?php echo $nombreImagen; ?>&files",
					type: 'POST',
					data: data,
					cache: false,
					dataType: 'json',
					processData: false, // Don't process the files
					contentType: false, // Set content type to false as jQuery will tell the server its a query string request
					success: function(data, textStatus, jqXHR){
						if(typeof data.error === 'undefined')
						{
							// Success so call function to process the form
							/*submitForm(event, data);*/
							actualizarImagen(<?php echo $this->contenidoData[0]['id']; ?>);
						}
						else
						{
							// Handle errors here
							console.log('ERRORS: ' + data.error);
						}
					},
					error: function(jqXHR, textStatus, errorThrown)
					{
						// Handle errors here
						console.log('ERRORS: ' + textStatus);
						// STOP LOADING SPINNER
					}
				});
			}
			
			

			<?php
				if($this->empresaData[0]){
			?>
			
			<?php
					if($this->contenidoData[0]){
			?>
				
				function actualizarImagen(id){
					var archivo = $("form[name=subir_banner] input[name=file_banner]")[0].value;
					
					$.ajax({
						type: "POST",
						url: "<?php echo URL; ?>Contenido/actualizarImagen",
						data: {id: id, logo: <?php echo $nombreImagen; ?>,archivo:  archivo}
					}).done(function(response){
						if(response == 1){
							alert("Actualizacion Exitosa");
							alert('<?php echo $nombreImagen; ?>');
							location.reload();
						}else{
							/* alert("Rut o contraseña incorrecto"); */
							 alert(response);
						}
					});
					
				}
			<?php
				}
			?>
			<?php
				}
			?>
				
		</script>
	</body>
</html>