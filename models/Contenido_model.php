<?php
	class Contenido_model extends Model{
		function __construct(){
			parent::__construct();
		}
		
		function getContenido($id){
			return $this->db->select("SELECT * FROM p4_contenido WHERE id = :id", array(':id'=>$id));
		}
		
		function validacionLink($data){
			return $this->db->select("SELECT * FROM p4_contenido WHERE link = :link ", $data);
		}
		function generarContenido($data){
		
			/* return var_dump($data); */
			/* return (var_dump($data)); */
			return $this->db->insert('p4_contenido', $data); 
		}
		
		function actualizarContenido($where,$data){
			/* return "llega al modelo"; */
			/* return 'id = '.$where.' '.var_dump($data); */
			return $this->db->update("p4_contenido",$data, "where `id`=$where"); 
		}
		
		
		
	}
?>