<?php 	
	class Acceso{	
		static function palabrasReservadas($palabra){
			$respuesta = true;
			$lista = array("User","Index","Formulario","Intranet","Empresa","Contenido");
			foreach($lista as $reservada){
				if($palabra == $reservada){
					$respuesta=false;
				}
			}
			return $respuesta;
		}	
	}
?>