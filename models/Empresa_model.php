<?php
	class Empresa_model extends Model{
		function __construct(){
			parent::__construct();
		}
		
		function validacionRut($data){
			return $this->db->select("SELECT * FROM p4_empresa WHERE rut = :rut ", $data);
		}
		
		function validacionMail($data){
			return $this->db->select("SELECT * FROM p4_empresa WHERE mail_contacto = :mail_contacto ", $data);
		}

		
		
		
		function getEmpresa($id){

			return $this->db->select("SELECT * FROM p4_empresa WHERE id = :id", array(':id'=>$id));
		}
		function registrarEmpresa($data){
			return $this->db->insert('p4_empresa', $data);
		}
		function actualizarEmpresa($where,$data){
			/* return "llega al modelo"; */
			/* return 'id = '.$where.' '.var_dump($data); */
			return $this->db->update("p4_empresa",$data, "where `id`=$where"); 
		}
	}
?>