<?php
	Class Contenido extends Controller{
		function __construct(){
			parent::__construct();

			/*Obtengo todos los datos del usuario*/
			/* $this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
			$this->view->userNombre = $this->view->userData[0]['nombre']." ".$this->view->userData[0]['apellido_p']; */
		}

		public function uploadFile(){
			$data = array();

			if(isset($_GET['files']) /*&& isset($_GET['nombre'])*/)
			{	
				$error = false;
				$files = array();
				$idImagen = $_GET['nombre'];

				$nombreImagen=explode('.', $_FILES[0]['name']);
	  			$extension=end($nombreImagen);

				$uploaddir = './public/banners/';
				foreach($_FILES as $file){
					if(move_uploaded_file($file['tmp_name'], $uploaddir .$idImagen.".".$extension)){
						$files[] = $uploaddir .$idImagen.".".$extension;
					}else{
					    $error = true;
					}
				}
				$data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
			}
			else
			{
				$data = array('success' => 'Form was submitted', 'formData' => $_POST);
			}

			echo json_encode($data);

		}
		
		public function actualizarImagen(){
			if($_POST['id']){
			
				$nombreImagen=explode('.', $_POST['archivo']);
	  			$extension=end($nombreImagen);
				$fecha_registro = date('Y-m-d H:i:s');
				
				$data['logo'] = $_POST['logo'].".".$extension;
				$data['fecha_modificacion'] = $fecha_registro;

				echo $this->model->actualizarContenido($_POST['id'],$data);
			}else{
				print('error al actualizar');
			}
		}
		
		public function actualizarContenido(){
			if($_POST['id']){
				$contenido = $this->model->getContenido($_POST['id']);
				$contenido = $contenido[0];
			
				$validacionLink = $this->model->validacionLink(array(':link'=>$_POST["link"]));
				$validacionLink = $validacionLink[0];


				if(Acceso::palabrasReservadas($_POST['link']) || $_POST['link']==$contenido['link']){
					$fecha_registro = date('Y-m-d H:i:s');
					$texto = $_POST['descripcion_productos'];
					$texto = rawurlencode($texto);
					$texto = rawurldecode(str_replace("%0A","<br>",$texto));
					
					$data['link'] = $_POST['link'];
					$data['tipo_formulario'] = $_POST['tipo_formulario'];
					$data['template'] = $_POST['template'];
					$data['descripcion_productos'] = $texto;
					$data['palabras_claves'] = $_POST['palabras_clave'];
					$data['aviso'] = $_POST['aviso'];
					$data['fecha_modificacion'] = $fecha_registro;

					echo $this->model->actualizarContenido($_POST['id'],$data);
				}else{
					echo "Ya existe una empresa asociada a ese link";
				}
			}else{
				print('error al actualizar');
			}
		}
		
		public function actualizarFormulario(){
			if($_POST['id']){

				$fecha_registro = date('Y-m-d H:i:s');
				
				$data['tipo_formulario'] = $_POST['tipo_formulario'];
				$data['fecha_modificacion'] = $fecha_registro;

				echo $this->model->actualizarContenido($_POST['id'],$data);

			}else{
				print('error al actualizar');
			}
		}
		
		public function actualizarOrden(){
			if($_POST['id']){

				$fecha_registro = date('Y-m-d H:i:s');
				
				$data['orden'] = $_POST['orden'];
				$data['fecha_modificacion'] = $fecha_registro;

				echo $this->model->actualizarContenido($_POST['id'],$data);

			}else{
				print('error al actualizar');
			}
		}
		
		public function actualizarTemplate(){
			if($_POST['id']){

				$fecha_registro = date('Y-m-d H:i:s');
				
				$data['template'] = $_POST['template'];
				$data['fecha_modificacion'] = $fecha_registro;

				echo $this->model->actualizarContenido($_POST['id'],$data);

			}else{
				print('error al actualizar');
			}
		}
		
		public function actualizarContenido2(){
			if($_POST['id']){
				$fecha_registro = date('Y-m-d H:i:s');
				$data['monto'] = $_POST['monto'];
				$data['aviso'] = $_POST['aviso'];
				$data['palabras_claves'] = $_POST['palabras_clave'];
				$data['fecha_modificacion'] = $fecha_registro;

				echo $this->model->actualizarContenido($_POST['id'],$data);

			}else{
				print('error al actualizar');
			}
		}
		

		
		public function generarContenido(){
			
			/* echo 'llega al controlador'; */
			if(isset($_POST['id_empresa']) && isset($_POST['link']) && isset($_POST['logo']) && isset($_POST['archivo']) && isset($_POST['template']) && isset($_POST['tipo_formulario']) && isset($_POST['descripcion_productos']) && isset($_POST['palabras_clave'])  ){
				if($_POST['id_empresa']!='' && $_POST['link']!='' && $_POST['template']!='' && $_POST['tipo_formulario']!='' && $_POST['logo']!='' && $_POST['archivo']!='' && $_POST['descripcion_productos']!='' && $_POST['palabras_clave']!=''  ){
					
					$validacionLink = $this->model->validacionLink(array(':link'=>$_POST["link"]));
					$validacionLink = $validacionLink[0];

					if(Acceso::palabrasReservadas($_POST['link']) && !$validacionLink){

						$nombreImagen=explode('.', $_POST['archivo']);
						$extension=end($nombreImagen);
						$fecha_registro = date('Y-m-d H:i:s');
					
						/*Creo arreglo para enviar los datos*/
						$data['link'] = $_POST['link'];
						$data['logo'] = $_POST['logo'].".".$extension;
						$data['tipo_formulario'] = $_POST['tipo_formulario'];
						$data['template'] = $_POST['template'];
						$data['id_empresa'] = $_POST['id_empresa'];
						$data['descripcion_productos'] = $_POST['descripcion_productos'];
						$data['palabras_claves'] = $_POST['palabras_clave'];
						$data['estado'] = 'pendiente';
						$data['monto'] = "Necesito una orientacion";
						$data['fecha_registro'] = $fecha_registro;
						
						echo $this->model->generarContenido($data);
						
					}else{
						echo "Ya existe una empresa asociada a ese link";
					}
				}else{
					echo "Debes completar todos los campos";
				}
			}
		}
		
		public function generarContenido1(){
			
			/* echo 'llega al controlador'; */
			if(isset($_POST['id_empresa']) && isset($_POST['link']) && isset($_POST['descripcion_productos']) ){
				if($_POST['id_empresa']!='' && $_POST['link']!='' && $_POST['descripcion_productos']!=''  ){
					
					$validacionLink = $this->model->validacionLink(array(':link'=>$_POST["link"]));
					$validacionLink = $validacionLink[0];

					if(Acceso::palabrasReservadas($_POST['link']) && !$validacionLink){

						$fecha_registro = date('Y-m-d H:i:s');
					
						/*Creo arreglo para enviar los datos*/
						$data['link'] = $_POST['link'];
						$data['id_empresa'] = $_POST['id_empresa'];
						$data['descripcion_productos'] = $_POST['descripcion_productos'];
						$data['estado'] = 'pendiente';
						$data['monto'] = "Necesito una orientacion";
						$data['fecha_registro'] = $fecha_registro;
						
						echo $this->model->generarContenido($data);
						
					}else{
						echo "Ya existe una empresa asociada a ese link";
					}
				}else{
					echo "Debes completar todos los campos";
				}
			}
		}
	}
?>