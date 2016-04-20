<?php 

	class View{
		/* Renderiza en pantalla la vista que queremos ver */
		function render($controller,$view){
			$controller = get_class($controller);
			//Ej: views/User/index.php
			require './views/'.$controller.'/'.$view.'.php';
		}
	}

?>