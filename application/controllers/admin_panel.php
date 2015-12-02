<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Admin_panel extends CI_Controller{
 	function __construct()
 	{
 		parent::__construct();
 		$this->data[]='';
 		$this->load->helper('url');
 		$this->data['url']=base_url();
		$this->load->library('parser');
		$this->load->library('session');
		$this->load->model('admin_model');
		$this->load->model('login_model');
	}

 	/* Function for login Admin area view.......................................................................*/
 	function index()
 	{
 		$this->parser->parse('include/header',$this->data);
 		$this->load->view('admin_login',$this->data);
 	}
 	
 	/* Function for verify Admin for his account area view.......................................................................*/
 	function verify_admin()
 	{
 		error_reporting('0');
 		$userid=$this->input->post('username');
 		if('admin'== $userid && 'admin'== $this->input->post('password'))
 		{
 			$this->session->set_userdata('username',array('username'=>'admin'));
 			$this->session->userdata('username');
 			redirect('admin_panel/admin_dashboard');
 		}
 		elseif($userid && $this->input->post('password'))
 		{
 			$data=array(
 					'Username'=>$this->input->post('username'),
 					'Password'=>md5($this->input->post('password'))
 			);
 			$query=$this->admin_model->verify_admin('organizations',$data);
 			if($query[0]->status!=='suspend') 
 			{
	 			$qry=$this->admin_model->org_list($query[0]->organization_id);
	 				if($qry){ 
				 			$session_data=array(
				 										'username'=>$userid,
				 										'organization_id'=>$qry[0]->organization_id,
				 										'organization_name'=>$qry[0]->organization_name,
				 										'app_name'=>$qry[0]->application_id,
				 										'email'=>$qry[0]->email
				 									   );
				 					$this->session->set_userdata('username',$session_data);
				 					$this->session->userdata('username');
	 						}
	 					else{
	 						$session_data=array(
	 								'username'=>$userid,
	 								'organization_id'=>$query[0]->organization_id,
				 					'organization_name'=>$query[0]->organization_name,
	 						);
	 						$this->session->set_userdata('username',$session_data);
	 						$this->session->userdata('username');
	 						}
	 			if($query)
	 			{
	 				redirect('admin_panel/admin_dashboard');
	 			}
 				else
 				{
	 				?> <script>alert('Your User id And Password Not Correct');</script> <?php
	 					redirect('login','refresh');
 				}
 			}
 			else
 			{
 				?> <script>alert('Your Organization Deactivated Please Contact Your Addministration Department');</script> <?php
 			//	$this->session->set_flashdata('category_error','message');
 				//$this->session->set_flashdata('message','Your Organization Deactivated Please Contact Your Addministration Department');
 				redirect('login','refresh');
 			}
 		}
 		else 
 		{
 			//$this->session->set_flashdata('category_error','message');
 			//$this->session->set_flashdata('message','please enter correct user id and password');	
 			?> <script>alert('Your User id And Password Not Correct');</script> <?php
 			redirect('login','refresh');
 		}
	 		
 	}
 	
 	/* Function for Admin panel dashboard area view.......................................................................*/
 	function admin_dashboard()
 	{
 		if (!$this->session->userdata('username')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect(base_url());}
 		$this->parser->parse('include/header',$this->data);
 		$this->parser->parse('include/left_menu',$this->data);
 		$this->load->view('admin_dashboard',$this->data);
 		$this->parser->parse('include/footer',$this->data);
 	}
 	
 	/* Function for Super Admin panel area view.......................................................................*/
 	
 	function manage_admin()
 	{
 		
 		/* code for when server update response his password */
 		error_reporting('0');
 		if(isset($_GET['session']) && $_GET['session']!=='')
 		{
 			$data=array('Username'=>$_GET['session']);
 			$query=$this->admin_model->verify_admin('organizations',$data);
 			$qry=$this->admin_model->org_list($query[0]->organization_id);
 			$session_data=array(
 					'username'=>$_GET['session'],
 					'organization_id'=>$qry[0]->organization_id,
 					'app_name'=>$qry[0]->application_id,
 					'email'=>$qry[0]->email, 
 			);
 			$this->session->set_userdata('username',$session_data);
 			$this->session->set_flashdata('category_success', 'success message');
 			$this->session->set_flashdata('message', $this->config->item("user").' Application Password Update successfully');
 			redirect('admin_panel/manage_admin');
 		} 
 		$username=$this->session->userdata('username');
 		if($username['username']=='admin')
 		{ 
 			$org_list=$this->data['org_list']=$this->admin_model->org_list();
 		}
 		else  
	 	{	
	 		if($username['organization_id']!=='')
	 		{
 				$org_list=$this->data['org_list']=$this->admin_model->org_list($username['organization_id']);
	 		}
	 	}
	 	if (!$this->session->userdata('username')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect(base_url());}
 		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('manage_admin',$this->data);
		$this->parser->parse('include/footer',$this->data);
 	}
 	
 	/* Function For update organization information with organization admin panel.....................................*/
 	function set_update_org_app_info($id=false,$status=false)
 	{
 		if (!$this->session->userdata('username')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect(base_url());}
 		$userdata=$this->session->userdata('username');
 		if($userdata['username']=='admin')
 		{
 			$data=array('registration_id'=>$id);
 			$qry=$this->admin_model->update_status_org('registered_application',$data);
 			$data=array(
 					'status'=>$status,
 			);
 			$qry=$this->admin_model->set_update_org_app_info('organizations',$data,array('organization_id'=>$qry[0]->organization_id));
 			$this->session->set_flashdata('category_success', 'success message');
 			$this->session->set_flashdata('message', $this->config->item("user").' Application '.$status.' successfully');
 			redirect('admin_panel/manage_admin');
 		}
 		if(isset($status) && !$status=='' && $userdata['username']!=='admin')
 		{
 			$data=array(
 					'status'=>$status,
 			);
 			$qry=$this->admin_model->set_update_org_app_info('registered_application',$data,array('registration_id'=>$id));
 			$this->session->set_flashdata('category_success', 'success message');
 			$this->session->set_flashdata('message', $this->config->item("user").' Application '.$status.' successfully');
 			redirect('admin_panel/manage_admin');
 		}
 		$id=$this->input->post('id');
 		if($id)
 		{
 			$url=   $this->input->post('app_url').$this->input->post('pwd_function');
 			$data=array(
 					'name'=>$this->input->post('name'),
 					'Username'=>$this->input->post('username'),
 					'password'=>md5($this->input->post('password')),
 			);
 			$qry=$this->admin_model->set_update_org_app_info('registered_application',$data,$id);
 			if($qry)
 			{
 				$data=array(
 						'session'=>$userdata['username'],
 						'new_username'=>$this->input->post('username'),
 						'password'=>md5($this->input->post('password')),
 						'old_username'=>$this->input->post('old_username'),
 						'db_name'=>$this->input->post('db_name'),
 				);
 				$json=json_encode($data);
 				redirect($url.'?data='.$json);
 				//die;
 			}
 			$this->session->set_flashdata('category_success', 'success message');
 			$this->session->set_flashdata('message', $this->config->item("user").' Application Information Update successfully');
 			redirect('admin_panel/manage_admin');		
 		}
 	}
 	
 /* Function For delete Application by organization admin */
 	function delete_app_org($id=false)
 	{
 		error_reporting('0');
 		if(isset($_GET['json'])&&$_GET['json'])
 		{
 			$data=$_GET['json'];
 			$var=json_decode($data);
 			$this->admin_model->dlt_org_app('registered_application',array('registration_id'=>$var->reg_app_id));
 			$data=array('organization_name'=>$var->session);
 			$query=$this->admin_model->verify_admin('organizations',$data);//print_r($query);
 			$qry=$this->admin_model->org_list($query[0]->organization_id);//print_r($qry);
 			$session_data=array(
 					'username'=>$var->session,
 					'organization_id'=>$query[0]->organization_id,
 					'app_name'=>$qry[0]->application_id,
 					'email'=>$query[0]->email
 			);//print_r($session_data);die;
 			$this->session->set_userdata('username',$session_data);
 			$this->session->set_flashdata('category_success', 'success message');
 			$this->session->set_flashdata('message', $this->config->item("user").' Application delete successfully');
 			?> <script>alert('Your Application Delete Successfully');</script> <?php
 			if (!$this->session->userdata('username')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect(base_url());}
 			redirect('admin_panel/manage_admin','refresh');
 		}
 		if (!$this->session->userdata('username')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect(base_url()); }
 		$userdata=$this->session->userdata('username');
 		$reg_app_info=$this->data['reg_app_info']=$this->admin_model->get_single_org_app_info('registered_application',$id);
 		$app_info=$this->data['app_info']=$this->login_model->app_list($reg_app_info[0]->application_id);
 		$url=$app_info[0]->application_url.$app_info[0]->delete_function;
 		$data=array(
 				'session'=>$userdata['username'],
 				'reg_app_id'=>$id,
 				'db_name'=>$reg_app_info[0]->db_name,
 		);
 		$json=json_encode($data);
 		redirect($url.'?data='.$json);
 	}
 /* Function For Report Genrate Organization Admin and Super admin........................................................*/
 	function report($size=false)
 	{
 		$username=$this->session->userdata('username');
 		/*if(isset($_GET['size']))
 		{
 		//$org_list=$this->data['org_list']=$this->admin_model->org_list();
 		$this->session->set_userdata('username',array('username'=>'admin'));
 		$username=$this->session->userdata('username');
 		}*/
 		if($username['username']=='admin')
 		{
 			//$org_list=$this->data['org_list']=$this->admin_model->org_list();
	 			if(!($_GET['size']))
	 		{
	 				//redirect('http://localhost/SMS/User_management/get_db_size?db_name=kna_school');
	 				//$this->session->set_userdata('username','admin');
	 				//$this->session->userdata('username');
	 				//if(isset($_GET['size'])){ echo $_GET['size'];die; }
	 		}
 			
 		}
 		else 
 		{
 			
 			$org_list=$this->data['org_list']=$this->admin_model->org_list($username['organization_id']);
 		}
 		$this->parser->parse('include/header',$this->data);
 		$this->parser->parse('include/left_menu',$this->data);
 		$this->load->view('report',$this->data);
 		$this->parser->parse('include/footer',$this->data);
 	}	
 	
 	/* Function For Sorting list......................................................................................*/
 	function sorting()
 	{
 			$org_list=$this->data['org_list']=$this->admin_model->sorting($_GET['id']);
 			redirect('Admin_panel/report');
 	}
 	
 	/* Function For manage application in admin case view.....................................................*/
 	function manage_application()
 	{
 		
 		$userdata=$this->session->userdata('username');
 		if(isset($userdata['username']) && $userdata['username']!=='admin')
 		{
 			$org_list=$this->data['org_list']=$this->admin_model->org_list($userdata['organization_id']);
 		}
 		else {
 				//$app_list=$this->data['app_list']=$this->login_model->app_list();
 		}
 		if (!$this->session->userdata('username')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect(base_url());}
 		$app_list=$this->data['app_list']=$this->login_model->app_list();
 		$this->parser->parse('include/header',$this->data);
 		$this->parser->parse('include/left_menu',$this->data);
 		$this->load->view('manage_application',$this->data);
 		$this->parser->parse('include/footer',$this->data);
 	}
 	
 	/* Function For Add new application controle by super admin */
 	function add_application()
 	{
 		if (!$this->session->userdata('username')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect(base_url());}
 		$this->parser->parse('include/header',$this->data);
 		$this->parser->parse('include/left_menu',$this->data);
 		$this->load->view('add_application',$this->data);
 		$this->parser->parse('include/footer',$this->data);
 	}
 	
 	/* Function For application registration view in admin case..................................................*/
 	function admin_reg_app()
 	{	
 		if (!$this->session->userdata('username')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect(base_url());}
 		$userdata=$this->session->userdata('username');
 		$org_list=$this->data['org_list']=$this->admin_model->org_list($userdata['organization_id']);print_r($org_list);die;
 		$app_list=$this->data['app_list']=$this->login_model->app_list($_GET['app']);  // application information get for registration url
 		$this->parser->parse('include/header',$this->data);
 		$this->parser->parse('include/left_menu',$this->data);
 		$this->load->view('admin_reg_app',$this->data);
 		$this->parser->parse('include/footer',$this->data);
 	}
 	
 	/* Function For Set Application Detail */
 	function set_application()
 	{
 		
 		$userdata=$this->session->userdata('username');
 		$data=array(
 				'application_id'=>$this->input->post('app_id'),
 				'app_name'=>$this->input->post('app_name'),
 				'application_url'=>$this->input->post('app_url'),
 				'login_function'=>$this->input->post('app_login_fun'),
 				'registration_function'=>$this->input->post('app_reg_fun'),
 				'password_update_function'=>$this->input->post('app_pwd_url'),
 				'db_size_function'=>$this->input->post('app_db_size'),
 				'created_by'=>$userdata['username'],
 				'created_on'=>date("Y-m-d"),
 				);
 		$app_info=$this->admin_model->set_application('applications',$data);
 		$this->session->set_flashdata('category_success', 'success message');
 		$this->session->set_flashdata('message', $this->config->item("user").' Application Insert Successfully');
 		redirect('admin_panel/manage_application');
 	}
 	
 	/* Function For View Application Information Behalf On id.......................................................*/
 	function update_org_app_info($id=false)
 	{ 
 		if (!$this->session->userdata('username')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect(base_url());}
 		$org_list=$this->data['org_list']=$this->admin_model->get_single_org_app_info('registered_application',$id);
 		$app_info=$this->data['app_info']=$this->login_model->app_list($org_list[0]->application_id);
 		$this->parser->parse('include/header',$this->data);
 		$this->parser->parse('include/left_menu',$this->data);
 		$this->load->view('update_org_app_info',$this->data);
 		$this->parser->parse('include/footer',$this->data);
 	}
 	
 	/* Function for account settings view */
 	function acc_setting($info=false)
 	{
 		if (!$this->session->userdata('username')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect(base_url());}
 		$this->parser->parse('include/header',$this->data);
 		$this->parser->parse('include/left_menu',$this->data);
 		$this->load->view('acc_setting',$this->data);
 		$this->parser->parse('include/footer',$this->data);
 	
 	}
 	
 	/* Function for change password */
 	function change_pass($info=false)
 	{
 		$username=$user_session_data = $this->session->userdata('username');
 		$data=array(
 				'password'=>md5($this->input->post('old_password'))
 		);
 		$check=$this->data['check']=$this->admin_model->verify_admin('organizations',$data);
 		if($check)
 		{
 			$data = array(
 					'password' => md5($this->input->post('password'))
 			);
 			$filter=array(
 					'organization_id' => $username['organization_id']
 			);
 			$this->admin_model->set_update_org_app_info('organizations',$data,$filter);
 			$this->session->set_flashdata('category_success', 'success');
 			$this->session->set_flashdata('message', $this->config->item("user").'Password updated successfully');
 			redirect('admin_panel/manage_admin');
 		}
 		else {
 			$this->session->set_flashdata('category_error', 'success');
 			$this->session->set_flashdata('message', $this->config->item("user").'Old Password Does Not Match');
 			redirect('admin_panel/acc_setting');
 		}
 	
 	}
 	
 }
