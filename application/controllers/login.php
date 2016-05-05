<?php
Class Login extends CI_Controller {
	
	 function __construct() {
		parent::__construct();
		$this->data[]='';
		$this->load->helper('url');
		$this->data['url']=base_url();
		$this->load->library('parser');
		$this->load->library('session');
		$this->load->model('login_model');
		$this->load->library('email');
		$config=array('server'=>'http://junctiondev.cloudapp.net/appmanager',
		'http_user'=>'admin',
		'http_pass'=>'1234',
		);
		$this->load->library('rest',$config);
	 }

	 /*----------------------------- Function for Dashboard view -----------------------------------*/
	function index()
	{
		$this->parser->parse('include/header',$this->data);
		$this->load->view('dashboard',$this->data);
		$this->parser->parse('include/footer_dashboard',$this->data);
	}
	
	
	 /*----------------------------- Function for Dashboard view -----------------------------------*/
	/*  function checkValidation()
	 {
		 if(isset($validation))
		 {
			 
		 }
		 $this->rest->get('get',$id);
	 } */
	
	  /*----------------------------- Function for Dashboard view -----------------------------------*/
	  function cloneDB()
	  {		//echo'hiii';die;
		  $OrganizationData=array(
							'organization_name'=>$this->input->post('organization_name'),
							'name'=>$this->input->post('name'),
							'email'=>$this->input->post('email'),
							'mobile'=>$this->input->post('mobile'),
							'address'=>$this->input->post('address'),
							'Username'=>$this->input->post('username'),
							'password'=>md5($this->input->post('password')),
							'Terms'=>$this->input->post('terms'),
							'status'=>'active',
							'created_by'=>$this->input->post('name'),
							'created_on'=>date("Y-m-d")
					 );
		$ApplicationData=array(
							'organization_id'=>460,
							'application_id'=>$this->input->post('application_id'),
							'name'=>$this->input->post('application_admin_name'),
							'email'=>$this->input->post('application_admin_email'),
							'mobile'=>$this->input->post('application_mobile'),
							'Username'=>$this->input->post('application_username'),
							'password'=>md5($this->input->post('application_password')),
							'db_name'=>trim(str_replace(' ','_',$this->input->post('db_name'))),
							'status'=>'active',
							'created_on'=>$this->input->post('application_admin_name'),
							'created_on'=>date("Y-m-d")
							);
		  $result= $this->rest->post('post',$OrganizationData,$ApplicationData);echo $result;
	  }
	  
}