<?php
class Login_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
		// select data for behalf on database name
	function login($filter,$data)
	{
		$this->db->select('*');
		$qry=$this->db->get_where($filter,$data);
		return $qry->result();
	}
	
	/*function for count application in application list*/
	
	function app_list($filter=false)
	{ 
		if($filter)
		{
			$qry=$this->db->get_where('applications',array('application_id'=>$filter));
			return $qry->result();
		}
		else
		{
		$this->db->select('*');
		$qry=$this->db->get('applications');
		return $qry->result();
		}
	}
	
	 /* function for list of database name from central database */
    function list_dbname($table=false,$data=false)
    {
    	$this->db->select('db_name');
    	$this->db->where('app_name',$data);
    	$qry=$this->db->get($table);
    	return $qry->result();
    } 
	
	/* function for get application information */
	function get_application_info()
	{
		$this->db->select('*');
		$qry=$this->db->get('application_manage');
		return $qry->result();
	}
	
	/* function for new user create */
	function set_registration_application($table=false,$data=false)
	{
		//print_r($data['db_name']);die;
		//$central_db=$this->load->database('central_db', TRUE);
		//$qry=$central_db->insert('sw_registration',$data);
		$this->db->insert($table,$data);
		$id= $this->db->insert_id();
		return $id;
		die;
		/*if($qry)
		{
			$this->db->query("CREATE DATABASE $db_name");
			$exdb=mysqli_connect('localhost','root','',$db_name);
			$sqlSource = file_get_contents('school_mgt.sql');
			mysqli_multi_query($exdb,$sqlSource);
			do
			{
				mysqli_store_result($exdb);
			}
			while(mysqli_more_results($exdb) && mysqli_next_result($exdb));
			$qry="INSERT INTO `user`(`Username`, `Password`, `UserType`) VALUES ('".$data['username']."','".$data['password']."','masteruser')";
			$query=mysqli_query($exdb,$qry) or die(mysql_error());
				
		}
		return true;*/
	}
	
	// connect for server database particular organization 
	function daynamic_db($data,$db_name)
	{	
	//print_r($data);die;
		//$this->load->database();
		//$this->load->database('default',TRUE);
		//$this->db->select('*');
		//$qry=$this->db->get_where('user',$data);
		//return $qry->result();
		$con=mysqli_connect('localhost','root','',$db_name);
		if($con)
		{
			$qry="select * from user where Username='".$data['Username']."' and Password='".$data['Password']."'";
			$query=mysqli_query($con,$qry);
			$result=mysqli_fetch_array($query);
			return $result;
		}
	}
	
	/*	function for check organization	*/
	function verification_new_user($val,$field_name)
	{
		if($field_name=='Organization')
		{
			$data=array('organization_name'=>$val);
		}
		if($field_name=='Email')
		{
			$data=array('email'=>$val);
		}
		if($field_name=='Username')
		{	
			$data=array('Username'=>$val);
		}
		if($field_name=='Database name')
		{
			$qry=$this->db->get_where('registered_application',array('db_name'=>$val));
			return $qry->result();
		}
		$qry=$this->db->get_where('organizations',$data);
		return $qry->result();
	}
	
	/*	function for check organization	*/
	
	function get_organization_id($org_name)
	{
		$this->db->select('*');
		$qry=$this->db->get_where('organizations',array('organization_name'=>$org_name));
		//print_r($qry);die;
		return $qry->result();
	}
	
	/* function for update application status by gmail */
	function activate_org($table=false,$filter=false)
	{
		$this->db->where($filter);
		$qry=$this->db->update($table,array('status'=>'active'));
		return true;
	}
}