<?php
	class Intranet_model extends Model{
		function __construct(){
			parent::__construct();
		}

		function loginUsuario($data){
			return $this->db->select("SELECT * FROM p4_intranet WHERE rut = :rut", $data);
		}
		
		function getUsuarios(){
			return $this->db->select("SELECT * FROM p4_cliente ", array(':id'=>''));
		}
		function getFormulario(){
			return $this->db->select("SELECT * FROM p4_formulario", array(':id'=>''));
		}
		
		function validacionRut($data){
			return $this->db->select("SELECT * FROM p4_cliente WHERE rut = :rut ", $data);
		}
		
		function validacionMail($data){
			return $this->db->select("SELECT * FROM p4_cliente WHERE mail_contacto = :mail_contacto ", $data);
		}

		function getUsuario($id){
			return $this->db->select("SELECT * FROM p4_cliente WHERE id = :id", array(':id'=>$id));
		}
		function actualizarUsuario($where,$data){
			/* return "llega al modelo"; */
			/* return 'id = '.$where.' '.var_dump($data); */
			return $this->db->update("p4_cliente",$data, "where `id`=$where"); 
		}
		
		function actualizarContenido($where,$data){
			/* return "llega al modelo"; */
			/* return 'id = '.$where.' '.var_dump($data); */
			return $this->db->update("p4_contenido",$data, "where `id`=$where"); 
		}
		
		
		function getEmpresa($id){

			return $this->db->select("SELECT * FROM p4_empresa WHERE id_cliente = :id", array(':id'=>$id));
		}

		
		function getContenido($id){
			return $this->db->select("SELECT * FROM p4_contenido WHERE id_empresa = :id", array(':id'=>$id));
		}

		
	}
?>