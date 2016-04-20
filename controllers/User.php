<?php
	Class User extends Controller{
		function __construct(){
			parent::__construct();

			/*Obtengo todos los datos del usuario*/
			/* $this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
			$this->view->userNombre = $this->view->userData[0]['nombre']." ".$this->view->userData[0]['apellido_p']; */
		}
		
		public function perfil(){
			if(Session::exist() && Session::getValue('U_ID') != null){
				$this->view->pagina = "perfil";
				$this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
				$empresa = $this->model->getEmpresa(Session::getValue('U_ID'));

				if($empresa){
					$this->view->empresaData = $empresa;
					$id_empresa = $this->model->getEmpresa(Session::getValue('U_ID'));
					$this->view->contenidoData = $this->model->getContenido($id_empresa[0]['id']);

					$this->view->render($this, 'perfil');
				}else{
					header("Location: ".URL."User/registro");
				}
			}else{
				header("Location: ".URL);
			}
		}
		
		public function empresa(){
			if(Session::exist() && Session::getValue('U_ID') != null){
				$this->view->pagina = "empresa";
				$this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
				$empresa = $this->model->getEmpresa(Session::getValue('U_ID'));

				if($empresa){
					$this->view->empresaData = $empresa;
					$id_empresa = $this->model->getEmpresa(Session::getValue('U_ID'));
					$this->view->contenidoData = $this->model->getContenido($id_empresa[0]['id']);

					$this->view->render($this, 'empresa');
				}else{
					header("Location: ".URL."User/registro");
				}
			}else{
				header("Location: ".URL);
			}
		}
		
		
		public function imagen(){
			if(Session::exist() && Session::getValue('U_ID') != null){
				$this->view->pagina = "imagen";
				$this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
				$empresa = $this->model->getEmpresa(Session::getValue('U_ID'));

				if($empresa){
					$this->view->empresaData = $empresa;
					$id_empresa = $this->model->getEmpresa(Session::getValue('U_ID'));
					$this->view->contenidoData = $this->model->getContenido($id_empresa[0]['id']);

					$this->view->render($this, 'imagen');
				}else{
					header("Location: ".URL."User/registro");
				}
			}else{
				header("Location: ".URL);
			}
		}
		
		
		public function contenido(){
			if(Session::exist() && Session::getValue('U_ID') != null){
				$this->view->pagina = "contenido";
				$this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
				$empresa = $this->model->getEmpresa(Session::getValue('U_ID'));
				
				
				
				
				
				if($empresa){
					$this->view->empresaData = $empresa;
					$id_empresa = $this->model->getEmpresa(Session::getValue('U_ID'));
					$this->view->contenidoData = $this->model->getContenido($id_empresa[0]['id']);
					$contenidoData = $this->model->getContenido($id_empresa[0]['id']);
					$texto = $contenidoData[0]['descripcion_productos'];
					
					/* $texto = rawurlencode($texto); */
					$this->view->texto = rawurldecode(str_replace("<br>","%0A",$texto));
					
					
					$this->view->render($this, 'contenido');
				}else{
					header("Location: ".URL."User/registro");
				}
			}else{
				header("Location: ".URL);
			}
		}
		
		public function campana(){
			if(Session::exist() && Session::getValue('U_ID') != null){
				$this->view->pagina = "campana";
				$this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
				$empresa = $this->model->getEmpresa(Session::getValue('U_ID'));

				if($empresa){
					$this->view->empresaData = $empresa;
					$id_empresa = $this->model->getEmpresa(Session::getValue('U_ID'));
					$this->view->contenidoData = $this->model->getContenido($id_empresa[0]['id']);

					$this->view->render($this, 'campana');
				}else{
					header("Location: ".URL."User/registro");
				}
			}else{
				header("Location: ".URL);
			}
		}
		
		public function tema(){
			if(Session::exist() && Session::getValue('U_ID') != null){
				$this->view->pagina = "tema";
				$this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
				$empresa = $this->model->getEmpresa(Session::getValue('U_ID'));

				if($empresa){
					$this->view->empresaData = $empresa;
					$id_empresa = $this->model->getEmpresa(Session::getValue('U_ID'));
					$this->view->contenidoData = $this->model->getContenido($id_empresa[0]['id']);

					$this->view->render($this, 'tema');
				}else{
					header("Location: ".URL."User/registro");
				}
			}else{
				header("Location: ".URL);
			}
		}
		
		public function orden(){
			if(Session::exist() && Session::getValue('U_ID') != null){
				$this->view->pagina = "orden";
				$this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
				$empresa = $this->model->getEmpresa(Session::getValue('U_ID'));

				if($empresa){
					$this->view->empresaData = $empresa;
					$id_empresa = $this->model->getEmpresa(Session::getValue('U_ID'));
					$this->view->contenidoData = $this->model->getContenido($id_empresa[0]['id']);

					$this->view->render($this, 'orden');
				}else{
					header("Location: ".URL."User/registro");
				}
			}else{
				header("Location: ".URL);
			}
		}
		
		public function formulario(){
			if(Session::exist() && Session::getValue('U_ID') != null){
				$this->view->pagina = "formulario";
				$this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
				$empresa = $this->model->getEmpresa(Session::getValue('U_ID'));

				if($empresa){
					$this->view->empresaData = $empresa;
					$id_empresa = $this->model->getEmpresa(Session::getValue('U_ID'));
					$this->view->contenidoData = $this->model->getContenido($id_empresa[0]['id']);

					$this->view->render($this, 'formulario');
				}else{
					header("Location: ".URL."User/registro");
				}
			}else{
				header("Location: ".URL);
			}
		}
		
		public function profile(){
			if(Session::exist() && Session::getValue('U_ID') != null){
				$this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
				$empresa = $this->model->getEmpresa(Session::getValue('U_ID'));

				if($empresa){
					$this->view->empresaData = $empresa;
					$id_empresa = $this->model->getEmpresa(Session::getValue('U_ID'));
					$this->view->contenidoData = $this->model->getContenido($id_empresa[0]['id']);

					$this->view->render($this, 'profile');
				}else{
					header("Location: ".URL."User/registro");
				}
			}else{
				header("Location: ".URL);
			}
		}
		
		public function registro(){
			if(Session::exist() && Session::getValue('U_ID') != null){
				$this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
				$this->view->empresaData = $this->model->getEmpresa(Session::getValue('U_ID'));
				$id_empresa = $this->model->getEmpresa(Session::getValue('U_ID'));
				$contenido = $this->model->getContenido($id_empresa[0]['id']);
				$this->view->contenidoData = $contenido;

				if($contenido[0]['template']){
					header("Location: ".URL."User/preview");
				}else{
					$this->view->render($this, 'registro');
				}
			}else{
				header("Location: ".URL);
			}
		}
		
		public function data(){
			if(Session::exist() && Session::getValue('U_ID') != null){
				$this->view->pagina = "data";
				$this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
				$this->view->empresaData = $this->model->getEmpresa(Session::getValue('U_ID'));
				$id_empresa = $this->model->getEmpresa(Session::getValue('U_ID'));
				$contenido = $this->model->getContenido($id_empresa[0]['id']);
				$this->view->contenidoData = $contenido;
				$this->view->contenidoFormulario = $this->model->getFormulario($id_empresa[0]['id']);
				
				if($contenido[0]['template']){
					$this->view->render($this, 'data');
					
				}else{
					header("Location: ".URL."User/registro");
				}

			}else{
				header("Location: ".URL);
			}
		}
		
		public function activarCuenta($datos){
			if(isset($datos)){
				$datos2 = explode("=", $datos);
				if(isset($datos2[0])){if($datos2[0] != ''){$mail = $datos2[0];}}
				if(isset($datos2[1])){if($datos2[1] != ''){$codigo = $datos2[1];}}
				$validacionActivacion = $this->model->validacionActivacion(array(':mail_contacto'=>$mail,':codigo'=>$codigo));

				if(!$validacionActivacion){
					echo "error";
				}else{
					$data['codigo'] = '';
					$data['estado_cuenta'] = 'activa';

					$this->model->actualizarUsuario($validacionActivacion[0]['id'],$data);
					header("Location: ".URL);
				}
			}else{
				echo "error";
			}
		}
		
		public function enviarMailConfirmacion($mail,$codigo){
			if(isset($mail) && $mail!=''){
				$email_para = $mail;
				$email_asunto = "4Pez - MAIL DE CONFIRMACIÓN";

				$email_mensaje = "<p>Activa tu cuenta ingresando al siguiente link<p></br>";
				$email_mensaje .= "<a href='".URL."User/activarCuenta/".$mail."=".$codigo."'>".URL."User/activarCuenta/".$mail."=".$codigo."</a>";

				$headers =  "From: 4Pez <4pez@airmatek.com>\r\n"."Reply-To: ".$mail."\r\n" ;
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				@mail($email_para, $email_asunto, $email_mensaje, $headers);
			}
		}
		
		
		
		
		
		
		public function enviarMailPassword($pass){
				echo $pass;
				$to = "miguel.maura@airmatek.com";
				
				$email_asunto = "FIDELIZA2 - NUEVA PASSWORD";
				
				$headers = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\r\n";
				$headers .= 'From: 4pez <4pez@airmatek.com>' . "\r\n";
				$headers .= 'Reply-To: Name ' . "\r\n";

				$email_mensaje = "<p>Hemos generado una nueva password: <p></br>";
				$email_mensaje .= "<p>".$pass."</p>";

				var_dump(mail($to,$email_asunto , $email_mensaje, $headers));
				echo 'lorem';
		
				/* $email_para = "miguel.maura@airmatek.com";
				

				$email_mensaje = "<p>Hemos generado una nueva password: <p></br>";
				$email_mensaje .= "<p>".$pass."</p>";

				$headers =  "From: FIDELIZA2 <miguel.maura@airmatek.com>\r\n"."Reply-To: ".$email_para."\r\n" ;
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

				var_dump(mail("miguel.maura@airmatek.com", $email_asunto, "test", $headers));
				echo'lolo'; */
		}
		
		
		public function preview(){
			if(Session::exist()){

				$this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
				$this->view->empresaData = $this->model->getEmpresa(Session::getValue('U_ID'));
				$id_empresa = $this->model->getEmpresa(Session::getValue('U_ID'));
				$this->view->contenidoData = $this->model->getContenido($id_empresa[0]['id']);
				$orden = $this->view->contenidoData[0]['orden'];
				$tema = $this->view->contenidoData[0]['template'];
				
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
				
				
				if($this->view->contenidoData[0]){
					$this->view->render($this, 'preview');
				}else{
					$this->view->render($this, 'profile');
				}

			}else{
				header("Location: ".URL);
			}
		}
		public function vistaPrevia($tema){
			if(Session::exist()){

				$this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
				$this->view->empresaData = $this->model->getEmpresa(Session::getValue('U_ID'));
				$id_empresa = $this->model->getEmpresa(Session::getValue('U_ID'));
				$this->view->contenidoData = $this->model->getContenido($id_empresa[0]['id']);
				$orden = $this->view->contenidoData[0]['orden'];
				/* $tema = $this->view->contenidoData[0]['template']; */
				
				$this->view->tema = $tema;
				
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
				
				
				
				
				
				if($this->view->contenidoData[0]){
					$this->view->render($this, 'vistaPrevia');
				}else{
					$this->view->render($this, 'profile');
				}

			}else{
				header("Location: ".URL);
			}
		}
		
		
		public function actualizarUsuario(){
			if($_POST['id']){
				
				$usuario = $this->model->getUsuario($_POST['id']);
				$usuario = $usuario[0];
				
				$validacionRut = $this->model->validacionRut(array(':rut'=>$_POST["rut_cliente"]));
				$validacionRut = $validacionRut[0];
				
				if(!$validacionRut || $_POST['rut_cliente']==$usuario['rut']){
					$validacionMail = $this->model->validacionMail(array(':mail_contacto'=>$_POST["mail_cliente"]));
					$validacionMail = $validacionMail[0];
					if(!$validacionMail || $_POST['mail_cliente']==$usuario['mail_contacto']){
						$fecha_registro = date('Y-m-d H:i:s');
						
						$data['nombre'] = $_POST['nombre_cliente'];
						$data['apellido_paterno'] = $_POST['apellido_p_cliente'];
						$data['apellido_materno'] = $_POST['apellido_m_cliente'];
						$data['rut'] = $_POST['rut_cliente'];
						$data['telefono'] = $_POST['fono_cliente'];
						$data['mail_contacto'] = $_POST['mail_cliente'];
						$data['password'] = $_POST['password_cliente'];
						$data['fecha_modificacion'] = $fecha_registro;

						echo $this->model->actualizarUsuario($_POST['id'],$data);
					}else{
						echo "Ya existe un usuario con ese Mail";
					}
				}else{
					echo "Ya existe un usuario con ese RUT";
				}
			}else{
				print('error al actualizar');
			}
		}
		
		public function actualizarPassword(){
			if($_POST['id']){
				
				$salt = substr(md5(uniqid(rand(), true)), 0, 9);
				$data['salt'] = $salt;
				$data['password'] = $this->encriptaPassword($salt, $_POST['password_cliente']);
				$fecha_registro = date('Y-m-d H:i:s');
				$data['fecha_modificacion'] = $fecha_registro;

				echo $this->model->actualizarUsuario($_POST['id'],$data);

			}else{
				print('error al actualizar');
			}
		}
		
		public function registrarUsuario(){
			if(isset($_POST['nombre_cliente']) && isset($_POST['apellido_p_cliente']) && isset($_POST['apellido_m_cliente']) && isset($_POST['rut_cliente']) && isset($_POST['fono_cliente']) && isset($_POST['mail_cliente']) && isset($_POST['password_cliente']) ){
				if($_POST['nombre_cliente']!='' && $_POST['apellido_p_cliente']!='' && $_POST['apellido_m_cliente']!='' && $_POST['rut_cliente']!='' && $_POST['fono_cliente']!='' && $_POST['mail_cliente']!='' && $_POST['password_cliente']!=''){
					
					$validacionRut = $this->model->validacionRut(array(':rut'=>$_POST["rut_cliente"]));
					$validacionRut = $validacionRut[0];

					if(!$validacionRut){ 

						$validacionMail = $this->model->validacionMail(array(':mail_contacto'=>$_POST["mail_cliente"]));
						$validacionMail = $validacionMail[0];

						if(!$validacionMail){
							$salt = substr(md5(uniqid(rand(), true)), 0, 9);
							$codigo = substr(md5(uniqid(rand(), true)), 0, 9);
							$fecha_registro = date('Y-m-d H:i:s');
							
							/*Creo arreglo para enviar los datos*/
							$data['nombre'] = $_POST['nombre_cliente'];
							$data['apellido_paterno'] = $_POST['apellido_p_cliente'];
							$data['apellido_materno'] = $_POST['apellido_m_cliente'];
							$data['rut'] = $_POST['rut_cliente'];
							$data['telefono'] = $_POST['fono_cliente'];
							$data['mail_contacto'] = $_POST['mail_cliente'];
							/* $data['password'] = $_POST['password_cliente']; */
							$data['salt'] = $salt;
							$data['codigo'] = $codigo;
							$data['password'] = $this->encriptaPassword($salt, $_POST['password_cliente']);
							$data['estado_cuenta'] = 'inactiva';
							$data['fecha_registro'] = $fecha_registro;

							/* $link = "s=".$data['salt']."&p=".$data['password'];
							
							$this->enviarMailConfirmacion($link);*/
							$this->enviarMailConfirmacion($_POST['mail_cliente'],$codigo);
							echo $this->model->registrarUsuario($data); 
						}else{
							echo "Ya existe un usuario con ese Mail";
						}
					}else{
						echo "Ya existe un usuario con ese RUT";
					}

				}else{
					echo "Debes completar todos los campos";
				}
			}
		}
		
		
		public function logearUsuario(){

			if(isset($_POST['rut_cliente']) && isset($_POST['password_cliente'])){
				
				/*$response = $this->model->loginUsuario("*", "rut='".$_POST["username"]."'" );*/
				$response = $this->model->loginUsuario(array(':rut'=>$_POST["rut_cliente"]));
				$response = $response[0];

				
				/* if ($response['password'] == $_POST["password_cliente"]){
					$this->createSession($response['nombre']." ".$response['apellido_p'], $response['id']);
					echo 1;
				}else{
					echo 2;
				} */
				
				/* if($response!=NULL && $response['estado_cuenta']=="activa"){ */
					$saltBase = $response['salt'];
					$passwordBase = $response['password'];

					$password = $this->encriptaPassword($saltBase, $_POST['password_cliente']);

					if($passwordBase == $password){
						$this->createSession($response['nombre']." ".$response['apellido_p'], $response['id']);
						echo 1;
					}else{
						echo 2;
					}
				/* } */
			}
		}
		
		function createSession($username, $id){
			Session::setValue('U_NAME', $username);
			Session::setValue('U_ID', $id);
		}
		
		function destroySession(){
			Session::destroy();
			header('location:'.URL);
		}
		
		public function dataBase(){
			if(Session::exist() && Session::getValue('U_ID') != null){
				$this->view->pagina = "data";
				$this->view->userData = $this->model->getUsuario(Session::getValue('U_ID'));
				$this->view->empresaData = $this->model->getEmpresa(Session::getValue('U_ID'));
				$id_empresa = $this->model->getEmpresa(Session::getValue('U_ID'));
				$contenido = $this->model->getContenido($id_empresa[0]['id']);
				$this->view->contenidoData = $contenido;
				$contenidoFormulario = $this->model->getFormulario($id_empresa[0]['id']);
				
							

							
				$headings = array('nombre','rut','email','telefono','direccion','mensaje');



					// Create a new PHPExcel object
					$objPHPExcel = new PHPExcel();
					$objPHPExcel->getActiveSheet()->setTitle('List of Users');

					$rowNumber = 1;
					$col = 'A';
					
					foreach($headings as $heading) {
					   $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$heading);
					   $col++;
					}

					// Loop through the result set
					$rowNumber = 2;
					foreach($contenidoFormulario as $row) {
					   $col = 'A';
					   foreach($row as $cell) {
						  $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$cell);
						  $col++;
					   }
					   $rowNumber++;
					}

					// Freeze pane so that the heading line will not scroll
					$objPHPExcel->getActiveSheet()->freezePane('A2');

					// Save as an Excel BIFF (xls) file
					$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

				   header('Content-Type: application/vnd.ms-excel');
				   header('Content-Disposition: attachment;filename="userList.xls"');
				   header('Cache-Control: max-age=0');

				   $objWriter->save('php://output');
				   exit();
				   
			}else{
				header("Location: ".URL);
			}
		}
	}
?>