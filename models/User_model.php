<?php
	class User_model extends Model{
		function __construct(){
			parent::__construct();
		}
		
		function registrarUsuario($data){
			return $this->db->insert('p4_cliente', $data);
		}
		function loginUsuario($data){
			return $this->db->select("SELECT * FROM p4_cliente WHERE rut = :rut", $data);
		}
		
		function validacionActivacion($data){
			return $this->db->select("SELECT * FROM p4_cliente WHERE mail_contacto = :mail_contacto AND codigo = :codigo ", $data);
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
		
		
		function getEmpresa($id){

			return $this->db->select("SELECT * FROM p4_empresa WHERE id_cliente = :id", array(':id'=>$id));
		}

		
		function getContenido($id){
			return $this->db->select("SELECT * FROM p4_contenido WHERE id_empresa = :id", array(':id'=>$id));
		}
		function getFormulario($id){
			return $this->db->select("SELECT * FROM p4_formulario WHERE id_empresa = :id", array(':id'=>$id));
		}
		
	}
?>