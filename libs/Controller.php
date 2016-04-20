<?php

	class Controller{
		function __construct(){
			Session::init();
			$this->view = new View();
			$this->loadModel();
		}

		function loadModel(){
			$model = get_class($this).'_model';
			$path = 'models/'.$model.'.php';

			if(file_exists($path)){
				require $path;
				$this->model = new $model();
			}
		}

		function encriptaPassword($salt, $password){
			$passEncriptada = sha1($salt . sha1($salt . sha1($password)));
			return $passEncriptada;
		}

		function generarPassword($longitud) {
           $key = '';
           $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
           $max = strlen($pattern)-1;
           for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
           return $key;
        }
	}

?>