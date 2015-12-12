<?php
class AppmanagerGateway_model extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function GetSingleData($table=false,$filter=false)
	{
		$this->db->where($filter);
		$query=$this->db->get($table);
		return $query->result();
	} 
}