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