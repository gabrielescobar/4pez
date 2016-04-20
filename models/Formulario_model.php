<?php
	class Formulario_model extends Model{
		function __construct(){
			parent::__construct();
		}
		
		function getEmpresa($id){

			return $this->db->select("SELECT * FROM p4_empresa WHERE id = :id", array(':id'=>$id));
		}
		function getContenido($id){
			return $this->db->select("SELECT * FROM p4_contenido WHERE link = :id", array(':id'=>$id));
		}
		function generarConsulta($data){
			return $this->db->insert('p4_formulario', $data);
		}
	}
?>