<?php
class Admin_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	/* Function for Verify Organization Admin user id and password.......................................................................*/
	function verify_admin($table,$data)
	{
		$qry=$this->db->get_where($table,$data);
		return $qry->result();
	}
	
	/* Function for show organization list for particular organization Admin and super admin.......................................................................*/
	function org_list($data=false)
	{
		
		if($data)			// when organization admin login admin panel and create session in admin login part
		{ 
			$qry=$this->db->query("select organizations.*,registered_application.* from organizations,registered_application where organizations.organization_id=$data && registered_application.organization_id=$data");
			return $qry->result();
		}
		else
		{
			$qry=$this->db->query("select organizations.*,registered_application.* from organizations,registered_application where organizations.organization_id=registered_application.organization_id");
			return $qry->result();
		}
	}
	
	/* function for sorting..............................................................................*/
	function sorting($id=false)
	{
		$qry=$this->db->query("select sw_registration.*,registered_application.* from sw_registration,registered_application where sw_registration.organization_id=registered_application.organization_id ORDER BY $id ASC ");
		return $qry->result();
	}
	
	/* Function for get single application information for organization .......................................................................*/
	function get_single_org_app_info($table=false,$id=false)
	{
		$qry=$this->db->get_where($table,array('registration_id'=>$id));
		return $qry->result();
	}
	
	/* Function for update information for organization registered application.......................................................................*/
	function set_update_org_app_info($table,$data,$filter)
	{
		$this->db->where($filter);
		$this->db->update($table,$data);
		return true;
	}
	
	/* Function For insert application by super admin*/
	function set_application($table=false,$data=false)
	{
		$this->db->insert($table,$data);
		return true;
	}
	
	/* Function for delete organization application detail in consaole manage application............................................*/
	function dlt_org_app($table=false,$data=false)
	{
		$this->db->delete($table,$data);
		return true;
	}
	
	/* Function For retrive data from registration application behalf on registration id in update case status by super admin */
	function update_status_org($table,$data)
	{
		$qry=$this->db->get_where($table,$data);
		return $qry->result();
	}
}