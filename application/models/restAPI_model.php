<?php
 class RestAPI_model extends CI_Model
 {
	  
	  function __construct()
	  {
		  parent::__construct();
		  $this->load->database();
	  }
	   
	
		
	  function insert_data($table,$data)
	  { 
			$this->db->insert($table,$data);
			return TRUE;
	  }
		
	  function get($table,$id=false)
	  {	
			if($id)
			{
				$qry=$this->db->get_where($table,$id);
				return $qry->result();
			}
			$qry=$this->db->get($table);
			return $qry->result();
	  }
		
	  function delete($data)
	  {
			$qry=$this->db->delete('registration',$data);
			if($qry)
			{
				return true;
			}
			else
			{
				return false;
			}
	  }
		
		
	   function cloneDB($database_name=false)
	   { 
			$this->db->query('CREATE DATABASE '.$database_name);
			if($_SERVER['HTTP_HOST']=="localhost"){
				//$dbname=$database_name;
				$password="";
				$username="root";
			}
			if($_SERVER['HTTP_HOST']=="junctiondev.cloudapp.net"){ 
				//$dbname=$database_name;
				$password="bitnami";
				$username="root";
			}
			if($_SERVER['HTTP_HOST']=="junctiontech.in"){
				//$dbname=$database_name;
				$password="junction4$";
				$username="junctwhx";
			}
			$connect=mysqli_connect('localhost',$username,$password,$database_name);
			$db_file=file_get_contents('school_mgt.sql');
			mysqli_multi_query($connect, $db_file);
			do {
					mysqli_store_result($connect);
			   }
			  while(mysqli_more_results($connect) && mysqli_next_result($connect));
		}
		
		
		 function set_user($data1=false,$data2=false,$database_name=false)
		{	 
			$connect=mysqli_connect('localhost','root','bitnami',$database_name);
			$result = "INSERT INTO user VALUES('','".$data1."','".$data2."','masteruser','','','Accepted','','')";
			$sql=mysqli_query($connect,$result);
			return true;
		}
 }