<?php
	Class Empresa extends Controller{
		function __construct(){
			parent::__construct();

			/*Obtengo todos los datos del usuario*/
			/* $this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
			$this->view->userNombre = $this->view->userData[0]['nombre']." ".$this->view->userData[0]['apellido_p']; */
		}
		
		public function actualizarEmpresa(){
			if($_POST['id']){
				$empresa = $this->model->getEmpresa($_POST['id']);
				$empresa = $empresa[0];
				
				$validacionRut = $this->model->validacionRut(array(':rut'=>$_POST["rut_empresa"]));
				$validacionRut = $validacionRut[0];
				if(!$validacionRut || $_POST['rut_empresa']==$empresa['rut']){

					$validacionMail = $this->model->validacionMail(array(':mail_contacto'=>$_POST["mail_empresa"]));
					$validacionMail = $validacionMail[0];
					if(!$validacionMail || $_POST['mail_empresa']==$empresa['mail_contacto']){
						$fecha_registro = date('Y-m-d H:i:s');
			
				
						$data['nombre'] = $_POST['nombre_empresa'];
						$data['rut'] = $_POST['rut_empresa'];
						$data['razon_social'] = $_POST['razon_social'];
						$data['direccion'] = $_POST['direccion_empresa'];
						$data['mail_contacto'] = $_POST['mail_empresa'];
						$data['telefono'] = $_POST['fono_empresa'];
						$data['fecha_modificacion'] = $fecha_registro;
						/* echo 'llega al controlador'; */
						/* return var_dump($data); */
						echo $this->model->actualizarEmpresa($_POST['id'],$data);
				
				
				
				
					}else{
						echo "Ya existe una empresa con ese Mail";
					}
				}else{
					echo "Ya existe una empresa con ese RUT";
				}
			}else{
				print('error al actualizar');
			}
		}
		
		public function crearEmpresa(){
			/* echo 'llega al controlador'; */
			if(isset($_POST['id_cliente']) && isset($_POST['nombre_empresa']) && isset($_POST['razon_social']) && isset($_POST['direccion_empresa']) && isset($_POST['rut_empresa']) && isset($_POST['mail_empresa']) && isset($_POST['fono_empresa'])  ){
				if($_POST['id_cliente']!='' && $_POST['nombre_empresa']!='' && $_POST['razon_social']!='' && $_POST['direccion_empresa']!='' && $_POST['rut_empresa']!='' && $_POST['mail_empresa']!='' && $_POST['fono_empresa']!='' ){
					
					$validacionRut = $this->model->validacionRut(array(':rut'=>$_POST["rut_empresa"]));
					$validacionRut = $validacionRut[0];

					if(!$validacionRut){

						$validacionMail = $this->model->validacionMail(array(':mail_contacto'=>$_POST["mail_empresa"]));
						$validacionMail = $validacionMail[0];

						if(!$validacionMail){
							$fecha_registro = date('Y-m-d H:i:s');
							
							/*Creo arreglo para enviar los datos*/
							$data['id_cliente'] = $_POST['id_cliente'];
							$data['nombre'] = $_POST['nombre_empresa'];
							$data['rut'] = $_POST['rut_empresa'];
							$data['mail_contacto'] = $_POST['mail_empresa'];
							$data['telefono'] = $_POST['fono_empresa'];
							$data['razon_social'] = $_POST['razon_social'];
							$data['direccion'] = $_POST['direccion_empresa'];
							$data['fecha_registro'] = $fecha_registro;

							/* echo var_dump($data); */
							echo $this->model->registrarEmpresa($data);
						}else{
							echo "Ya existe una empresa con ese Mail";
						}
					}else{
						echo "Ya existe una empresa con ese RUT";
					}
				}else{
					echo "Debes completar todos los campos";
				}
			}
		}
	}
?>