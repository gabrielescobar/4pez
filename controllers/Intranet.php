<?php
	Class Intranet extends Controller{
		function __construct(){
			parent::__construct();

			/*Obtengo todos los datos del usuario*/
			/* $this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
			$this->view->userNombre = $this->view->userData[0]['nombre']." ".$this->view->userData[0]['apellido_p']; */
		}
		
		public function index(){
			if(Session::exist() && Session::getValue('I_ID') != null ){
				/* $this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
				$this->view->empresaData = $this->model->getEmpresa(Session::getValue('U_ID'));
				$id_empresa = $this->model->getEmpresa(Session::getValue('U_ID'));
				$this->view->contenidoData = $this->model->getContenido($id_empresa[0]['id']); */
				/* $empresa = new Empresa; */
				/* $this->view->empresa = new Empresa; */
				
				$this->view->userData = $this->model->getUsuarios();
				$this->view->render($this, 'index');
				

			}else{
				header("Location: ".URL."Intranet/login/");
			}
		}
		
		public function detalle($id){
			if(Session::exist() && Session::getValue('I_ID') != null ){
				$this->view->userData = $this->model->getUsuario($id);
				$this->view->empresaData = $this->model->getEmpresa($id);
				$id_empresa = $this->model->getEmpresa($id);
				$this->view->contenidoData = $this->model->getContenido($id_empresa[0]['id']);

				

				$this->view->render($this, 'detalle');
				

			}else{
				header("Location: ".URL."Intranet/login/");
			}
		}
		
		public function data(){
			if(Session::exist() && Session::getValue('I_ID') != null ){
				/* $this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
				$this->view->empresaData = $this->model->getEmpresa(Session::getValue('U_ID'));
				$id_empresa = $this->model->getEmpresa(Session::getValue('U_ID')) */;
				$this->view->contenidoFormulario = $this->model->getFormulario();
				/* $empresa = new Empresa; */
				/* $this->view->empresa = new Empresa; */
				$this->view->render($this, 'data');
				

			}else{
				header("Location: ".URL);
			}
		}
		
		function activarPagina(){
			if(Session::exist() && Session::getValue('I_ID') != null ){
				$fecha_registro = date('Y-m-d H:i:s');
				
				if($_POST['id']){
					$data['estado'] = 'activo';
					$data['fecha_registro'] = $fecha_registro;
					echo $this->model->actualizarContenido($_POST['id'],$data);
				}else{
					print('error al actualizar');
				}
			}else{
				echo 'Error';
			}
		}
		function desactivarPagina(){
			if(Session::exist() && Session::getValue('I_ID') != null ){
				$fecha_registro = date('Y-m-d H:i:s');
				
				if($_POST['id']){
					$data['estado'] = 'pendiente';
					$data['fecha_registro'] = $fecha_registro;
					echo $this->model->actualizarContenido($_POST['id'],$data);
				}else{
					print('error al actualizar');
				}
			}else{
				echo 'Error';
			}
		}
		
		function login(){
			if(Session::exist() && Session::getValue('I_ID') != null ){
				header("Location: ".URL."Intranet/index/");
			}else{
				$this->view->render($this, 'login');
			}
		}
		
		public function logearUsuario(){

			if(isset($_POST['rut']) && isset($_POST['password'])){
				
				/*$response = $this->model->loginUsuario("*", "rut='".$_POST["username"]."'" );*/
				$response = $this->model->loginUsuario(array(':rut'=>$_POST["rut"]));
				$response = $response[0];
				/* var_dump($response); */
				
				/* if ($response['password'] == $_POST["password_cliente"]){
					$this->createSession($response['nombre']." ".$response['apellido_p'], $response['id']);
					echo 1;
				}else{
					echo 2;
				} */
				
				
				/* if($response!=NULL && $response['estado_cuenta']=="activa"){ */
					$saltBase = $response['salt'];
					$passwordBase = $response['password'];

					$password = $this->encriptaPassword($saltBase, $_POST['password']);
					/* echo "pass : ".$password; */
					if($passwordBase == $password){
						$this->createSession($response['nombre']." ".$response['apellido_paterno'], $response['id']);
						echo 1;
					}else{
						echo 2;
					}
				/* } */
			}
		}
		
		function createSession($username, $id){
			Session::setValue('I_NAME', $username);
			Session::setValue('I_ID', $id);
		}
		
		function destroySession(){
			Session::destroy();
			header('location:'.URL);
		}
	}
?>