<?php
	Class Formulario extends Controller{
		function __construct(){
			parent::__construct();

		}
		
		public function contenido($link){
			$contenido = $this->model->getContenido($link);
			
			if($contenido[0]){
				if($contenido[0]['estado'] == 'activo'){
			
					$this->view->link = $link;
					$this->view->contenidoData = $this->model->getContenido($link);
					$id_empresa = $this->model->getContenido($link);
					$this->view->empresaData = $this->model->getEmpresa($id_empresa[0]['id_empresa']);
					$orden = $this->view->contenidoData[0]['orden'];
					$tema = $this->view->contenidoData[0]['template'];
					$this->view->logo="izquierda";
					
					
					if($orden == 1 || $orden ==4 ){
						$this->view->logo="logo_izquierda";
					}elseif($orden == 2 || $orden ==5 ){
						$this->view->logo="logo_centro";
					}elseif($orden == 3 || $orden ==6 ){
						$this->view->logo="logo_derecha";
					}
					
					if($orden == 4 || $orden ==5 || $orden ==6){
						$this->view->info= "info_derecha";
						$this->view->form = "form_izquierda";
					}elseif($orden == 1 || $orden ==2 || $orden ==3){
						$this->view->info= "info_izquierda";
						$this->view->form = "form_derecha";
					}
					

					
					$this->view->render($this,'tema'.$tema);
				}else{
					header("Location: ".URL);
				}
			
			}else{
				header("Location: ".URL);
			}
			
		}
		
		public function generarConsulta(){
			if(isset($_POST['formulario']) && isset($_POST['id_empresa']) && isset($_POST['email']) && isset($_POST['mensaje']) ){
				if($_POST['id_empresa']!='' && $_POST['formulario']!='' && $_POST['email']!='' && $_POST['mensaje']!='' ){

					$fecha_registro = date('Y-m-d H:i:s');
					
					switch ($_POST['formulario']) {
						case 1:
							/*Creo arreglo para enviar los datos*/
							$data1['id_empresa'] = $_POST['id_empresa'];
							$data1['email'] = $_POST['email'];
							$data1['mensaje'] = $_POST['mensaje'];
							$data1['fecha_registro'] = $fecha_registro;
							
							echo $this->model->generarConsulta($data1);

							break;
						case 2:
							if(isset($_POST['nombre']) && isset($_POST['telefono']) ){
								if($_POST['nombre']!='' && $_POST['telefono']!='' ){
	
									/*Creo arreglo para enviar los datos*/
									$data2['id_empresa'] = $_POST['id_empresa'];
									$data2['nombre'] = $_POST['nombre'];
									$data2['telefono'] = $_POST['telefono'];
									$data2['email'] = $_POST['email'];
									$data2['mensaje'] = $_POST['mensaje'];
									$data2['fecha_registro'] = $fecha_registro;
									
									echo $this->model->generarConsulta($data2); 

								}else{
									echo "Debes completar todos los campos";
								}
							}
							break;
						case 3:
							if(isset($_POST['nombre']) && isset($_POST['rut']) && isset($_POST['telefono']) && isset($_POST['direccion']) ){
								if($_POST['nombre']!='' && $_POST['rut']!='' && $_POST['telefono']!='' && $_POST['direccion']!='' ){

									/*Creo arreglo para enviar los datos*/
									$data3['id_empresa'] = $_POST['id_empresa'];
									$data3['nombre'] = $_POST['nombre'];
									$data3['rut'] = $_POST['rut'];
									$data3['telefono'] = $_POST['telefono'];
									$data3['email'] = $_POST['email'];
									$data3['direccion'] = $_POST['direccion'];
									$data3['mensaje'] = $_POST['mensaje'];
									$data3['fecha_registro'] = $fecha_registro;
									
									echo $this->model->generarConsulta($data3);

								}else{
									echo "Debes completar todos los campos";
								}
							}
							break;
					}
				}else{
					echo "Debes completar todos los campos";
				}
			}else{
				echo "Debes completar todos los campos";
			}
		}
	}
?>