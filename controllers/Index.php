<?php
	class Index extends Controller{

		function __construct(){
			parent::__construct();
		}

		function index(){
			if(Session::exist()){
				header("Location: ".URL."User/data/");
			}else{
				$this->view->render($this, 'index');
			} 
			
			
		}

		function sessionDestroy(){
			Session::destroy();
		}
	}
?>