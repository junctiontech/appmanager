<?php
class Appmanagergateway_model extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function GetSingleData($table=false,$filter=false)
	{
		$this->db->where($filter);
		$query=$this->db->get($table);//print_r($query);die;
		return $query->result();
	} 
}