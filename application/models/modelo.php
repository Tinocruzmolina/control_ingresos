<?php 
class Modelo extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function nombre_usuario($id){
	$query = $this->db->query("select username from ci_usuarios where id=".$id);
	$row = $query->row();
	return $row->username;
	}
	
	//obras
	
	function guardar_obra($datos){	
	$this->db->insert('ci_obra', $datos);
	}
	
}