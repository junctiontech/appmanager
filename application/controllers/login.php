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
	 }

	 /* Function for Dashboard view.....................................................................*/
	function index()
	{
		$this->parser->parse('include/header',$this->data);
		$this->load->view('dashboard',$this->data);
		$this->parser->parse('include/footer_dashboard',$this->data);
	}
	
	/* Function for login Application view.....................................................................*/
	function application_login()
	{
		//$app_list=$this->data['app_list']=$this->login_model->app_list();
		//if(isset($_GET['id'])&&!$_GET['id']=='login'&&!$_GET['id']=='reg')
		//{ 
		//	$list_dbname=$this->data['list_dbname']=$this->login_model->list_dbname($_GET['id']);
		//}
	//	$this->parser->parse('include/header',$this->data);
		$this->load->view('application_login',$this->data);
		//$this->parser->parse('include/footer_dashboard',$this->data);
	}
	
	/* Function for login Application List.....................................................................*/
	function application_list()
	{
		$app_list=$this->data['app_list']=$this->login_model->app_list();
		if(isset($_GET['id'])&&!$_GET['id']=='login'&&!$_GET['id']=='reg')
		{
			$list_dbname=$this->data['list_dbname']=$this->login_model->list_dbname($_GET['id']);
		}
		$this->parser->parse('include/header',$this->data);
		$this->load->view('application_list',$this->data);
		$this->parser->parse('include/footer_dashboard',$this->data);
	}
	
	/* Function For registration Application view for new organization.......................................................*/
	function registration_application()
	{  
		$this->parser->parse('include/header',$this->data);
		$app_list=$this->data['app_list']=$this->login_model->app_list($_GET['id']);
		$this->load->view('registration_application',$this->data);		
	}
	
	/* function for activate account with help of mail  */
	function activate_org($id=false)
	{
		$activate_org=$this->data['activate_org']=$this->login_model->activate_org('registered_application',array('registration_id'=>$id));
		if($activate_org)
		{
			?><script>alert('Your Application Activate Please Login With Your Credentials');</script><?php
			redirect('http://junctiondev.cloudapp.net/appmanager','refresh');
		}
	}
	
		/* Function For insert organization and application information diffrent table and server application user table.........................................................*/
	function set_registration_application()
	{
		$org_id=$this->input->post('org_id');
		$org_name=$this->input->post('organization_name');
		$email=$this->input->post('email');
		$username=$this->input->post('username');
		$db_name=str_replace(' ','_',$this->input->post('db_name'));
		$url=$this->input->post('app_url').$this->input->post('app_reg_fun');
		if($db_name)
		{
			if(isset($org_id) && $org_id=='')
			{  
				$data=array(
							'organization_name'=>$this->input->post('organization_name'),
							'name'=>$this->input->post('name'),
							'email'=>$this->input->post('email'),
							'mobile'=>$this->input->post('mobile'),
							'address'=>$this->input->post('address'),
							'Username'=>$this->input->post('username'),
							'password'=>md5($this->input->post('password')),
							'status'=>'active',
							'created_by'=>$this->input->post('name'),
							'created_on'=>date("Y-m-d")
						   );
				// variable name take org_id because org_id also avilabe and put same variable name so its easy otherwise condition put into $data_registered_app array in org_id variable with condition
				$org_id=$this->data['set_new_user']=$this->login_model->set_registration_application('organizations',$data); // insert data into organization table
				if($org_id)
				{
					$data=array(
							'organization_id'=>$org_id,
							'organization_name'=>$this->input->post('organization_name'),
							'organization_admin_UserName'=>$this->input->post('username'),
							'organization_admin_password'=>$this->input->post('password'),
							'organization_admin_mobile'=>$this->input->post('mobile'),
							'organization_admin_email'=>$this->input->post('email'),
							'application_id'=>$this->input->post('application_name'),
							'application_admin_name'=>$this->input->post('application_admin_name'),
							'application_admin_username'=>$this->input->post('application_username'),
							'application_admin_password'=>$this->input->post('application_password'),
							'application_admin_email'=>$this->input->post('application_email'),
							'application_admin_mobile'=>$this->input->post('application_mobile'),
							'db_name'=>trim($db_name),
							'url'=>$url
					);
					$json=json_encode($data);
					redirect('http://junctiondev.cloudapp.net/appmanager/login/org_admin_registration_application?data='.$json);
				}
				
			}
			
		}	
	
	}
	
	/* function for registration application............................................................................*/
	function org_admin_registration_application() 
	{
		if(isset($_GET['data']) && $_GET['data']!=='')
		{
			$data=json_decode($_GET['data']);
		}
		else
		{
			$url=$this->input->post('app_url').$this->input->post('app_reg_fun');
			$array=array(
							'organization_id'=>$this->input->post('organization_id'),
							'organization_name'=>$this->input->post('organization_name'),
							'organization_admin_email'=>$this->input->post('organization_admin_email'),
							'application_id'=>$this->input->post('application_id'),
							'application_admin_name'=>$this->input->post('application_admin_name'),
							'application_admin_email'=>$this->input->post('application_admin_email'),
							'application_admin_mobile'=>$this->input->post('application_mobile'),
							'application_admin_username'=>$this->input->post('application_username'),
							'application_admin_password'=>$this->input->post('application_password'),
							'db_name'=>trim(str_replace(' ','_',$this->input->post('db_name'))),
							'url'=>$url,
						);
			$json=json_encode($array);
			$data=json_decode($json);
		}
		$data_registered_app=array(
				'organization_id'=>$data->organization_id,
				'application_id'=>$data->application_id,
				'name'=>$data->application_admin_name,
				'Username'=>$data->application_admin_username,
				'password'=>md5($data->application_admin_password),
				'email'=>$data->application_admin_email,
				'mobile'=>$data->application_admin_mobile,
				'db_name'=>$data->db_name,
				'status'=>'suspend',
				'created_by'=>$data->application_admin_name,
				'created_on'=>date("Y-m-d")
		);
		$set_new_user=$this->data['set_new_user']=$this->login_model->set_registration_application('registered_application',$data_registered_app);
		/* Create Array For convert into json and send data for application servar */
		$data_user=array(
				'registration_id'=>$set_new_user,
				'organization_id'=>$data->organization_id,
				'organization_name'=>$data->organization_name,
				'organization_admin_UserName'=>$data->organization_admin_UserName,
				'organization_admin_password'=>$data->organization_admin_password,
				'organization_admin_mobile'=>$data->organization_admin_mobile,
				'organization_admin_email'=>$data->organization_admin_email,
				'application_id'=>$data->application_id,
				'application_admin_email'=>$data->application_admin_email,
				'application_admin_mobile'=>$data->application_admin_mobile,
				'application_admin_username'=>$data->application_admin_username,
				'application_admin_password'=>$data->application_admin_password,
				'db_name'=>$data->db_name,
				'UserType'=>'masteruser'
		);	
		$json= json_encode($data_user);// create json for sending purpose
		redirect($data->url.'?data='.$json);
		
	}

	
	/* function for check organization information is already exist in database .......................................................*/
	function verification_new_user()
	{
		$val= $this->input->post('val');
		$field_name= $this->input->post('field_name');
		$check_org=$this->data['check_org']=$this->login_model->verification_new_user($val,$field_name);
		if($check_org)
		{
			if($check_org && $field_name!=='Database name'){
			?>
				<span id="txt" class="alert alert-danger"> Your <?=$field_name; ?> Already Exist If you want to used same organization for new Application Please Login then registered for Application <?=$field_name; ?></span>
			<?php 
			}
			if($check_org && $field_name=='Database name')
			{
				?>
					<span id="txt" class="alert alert-danger"> Your <?=$field_name; ?> Already Exist Please Try With Another DataBase Name </span>
				<?php
			}
		}
	}
	

	
	/* Function for user login for his application to verify all detail central server and application server.....................................................................................*/
	function login_function()
	{	//print_r($_POST['json']);die;
		if(isset($_POST) && isset($_POST['json'])==''){
			$json=$_POST;	
			$data=json_encode($json);
			$value=json_decode($data);
		}
		else
		{	
			$json=$_POST['json'];
			$value=json_decode($json); 
			$url_name=$value->device;
			
			
		}	
		if(isset($_SERVER['HTTP_REFERER']) && isset($value->device)!=='')
		{
			$url_name=$_SERVER['HTTP_REFERER'];// take and save in which url user login for application
		}   
			if(!$value->db_name)                    //Super Admin Case if login into Application
			{
				if('admin'==$this->input->POST['username'] && 'admin'==$this->input->post('password'))
				{
					$this->session->set_userdata(array('username'=>'admin'));
					$this->session->userdata('username');
				}
			}
			elseif($value->db_name)
			{
				$app_info=$this->login_model->login('registered_application',array('db_name'=>$value->db_name));
				if($app_info)
				{
					$status_org_info=$this->login_model->login('organizations',array('organization_id'=>$app_info[0]->organization_id));   // hear check organization status is active or not
					$app_url_info=$this->login_model->login('applications',array('application_id'=>$app_info[0]->application_id));		  // get application url and redirect into server
					if($status_org_info[0]->status=='active') 
					{
						if($app_info[0]->status=='active')  // check status application active or not
						{
							$explode=explode("@",$value->username);  
							if(count($explode)>= 2)  
							{ 
								$data=array(
												'url'=>$url_name,
												'database_name'=>$value->db_name,
												'username'=>$value->username,
												'password'=>$value->password,
												'organization_id'=>$status_org_info[0]->organization_id,
												'organization_name'=>str_replace(' ','_',$status_org_info[0]->organization_name),
										    );
							}
							else
							{ 
								$data=array(
										'url'=>$url_name,
										'database_name'=>$value->db_name,
										'username'=>$value->username,
										'password'=>md5($value->password),
										'organization_id'=>$status_org_info[0]->organization_id,
										'organization_name'=>str_replace(' ','_',$status_org_info[0]->organization_name),
								);
							} 
							$value=json_encode($data);
							$url=$app_url_info[0]->application_url.$app_url_info[0]->login_function;
							redirect($url.'?json='.$value);
						}
						else 
						{
							?><script>alert('Your Application Not Active');</script><?php 
								//echo 'not active organization';
							redirect($url_name,'refresh');
						}
					}
					else
					{
						// todo hear msg show if Organization suspend by super admin then redirect
						?><script>alert('Your Organization Not Active');</script><?php 
						//echo 'not active organization';
						redirect($url_name,'refresh');
				
					}
				}
				else
				{
					?><script>alert('Data Base does not exist');</script><?php 
					redirect($url_name,'refresh');
				}
			}
			else
			{
				
				
			}
		
	}

	/* Function For Application Result Show Message If Success Or Not */
	function result_application()
	{
		$json=json_decode($_GET['json']);
		if(isset($json->code) && $json->code=='500')
		{
			$result=$this->login_model->result_application($json->organization_id);
			if($result)
			{	
				?><script>alert('Servar Error Please Try Again !!!!');</script><?php 
				redirect('http://junctiondev.cloudapp.net/appmanager','refresh');
			}	
		}
		if(isset($json->code)&& $json->code=='200')
		{
			$json=json_decode($_GET['json']);
			$code_application_id=md5($json->registration_id);
			$subject="Zero Erp:-  Please Activate Your Account ";
			$message= " <html><body><h3>Hello:  Organization Administrator </h3><p> Your Organization is Successfully Registered Some Important Details Are <br> Organization Name:- <b>$json->organization_name  </b><br> Database Name-: <b>$json->database_name  </b><br>  User Name-: <b>$json->organization_admin_UserName  </b><br> Password:- <b>$json->organization_admin_password </b><br> Mobile:-  <b>$json->organization_admin_mobile </b><br> </p><p><h3>Please Click In This Link And Activate Your Account  :)</h3></p><p> http://junctiondev.cloudapp.net/appmanager/login/activate_org/$json->registration_id/$code_application_id</p></body></html>";
			$name='Junction Software Pvt Ltd';
			/*
			 This example shows settings to use when sending via Google's Gmail servers.
			 */
			
			//SMTP needs accurate times, and the PHP time zone MUST be set
			//This should be done in your php.ini, but this is how to do it if you don't have access to that
			date_default_timezone_set('Etc/UTC');
			
			require 'PHPMailer/PHPMailerAutoload.php';
			
			//Create a new PHPMailer instance
			$mail = new PHPMailer;
			
			//Tell PHPMailer to use SMTP
			$mail->isSMTP();
			
			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$mail->SMTPDebug = 0;
			
			//Ask for HTML-friendly debug output
			$mail->Debugoutput = 'html';
			
			//Set the hostname of the mail server
			$mail->Host = 'smtp.gmail.com';
			
			//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
			$mail->Port = 587;
			
			//Set the encryption system to use - ssl (deprecated) or tls
			$mail->SMTPSecure = 'tls';
			
			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;
			
			//Username to use for SMTP authentication - use full email address for gmail
			$mail->Username = "dev4junction@gmail.com";
			
			//Password to use for SMTP authentication
			$mail->Password = 'initial1$';
			
			//Set who the message is to be sent from
			$mail->setFrom($json->organization_admin_email,$name);
			
			//Set an alternative reply-to address
			$mail->addReplyTo('dev4junction@gmail.com', $name);
			
			//Set who the message is to be sent to
			$mail->addAddress($json->organization_admin_email);
			
			//Set the subject line
			$mail->Subject = $subject;
			
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$mail->msgHTML($message);
			
			//Replace the plain text body with one created manually
			$mail->AltBody = 'This is a plain-text message body';
			
			//Attach an image file
			//$mail->addAttachment($uploadfile,$filename);
			
			//send the message, check for errors
			if (!$mail->send())
			{
				print "We encountered an error sending your mail";
					
			}
			else
			{
				$subjects="junctionerp :- Your Application Registered Successfully";
				$messages= " <html><body><h3>Hello: Application Administrator </h3><p>Your Application is Successfully Registered Some Important Details Are <br> Organization Name:- <b>$json->organization_name</b> <br> User Name:- <b>$json->application_admin_username</b> <br> Password:- <b>$json->application_admin_password <br> </b> Database Name:- <b>$json->database_name</b> <br> Mobile Number:- <b>$json->application_admin_mobile </b> <br> </p><p><h3>Please Click In This Link And Login With Use Of Those Userid, Password And Database :)</h3>http://junctiondev.cloudapp.net/appmanager</p></body></html>";
				$names='Junction Software Pvt Ltd';
					
				/*
				 This example shows settings to use when sending via Google's Gmail servers.
				 */
			
				//SMTP needs accurate times, and the PHP time zone MUST be set
				//This should be done in your php.ini, but this is how to do it if you don't have access to that
				//	date_default_timezone_set('Etc/UTC');
			
				//require 'PHPMailer/PHPMailerAutoload.php';
			
				//Create a new PHPMailer instance
				//$mail = new PHPMailer;
			
				//Tell PHPMailer to use SMTP
				//$mail->isSMTP();
			
				//Enable SMTP debugging
				// 0 = off (for production use)
				// 1 = client messages
				// 2 = client and server messages
				//$mail->SMTPDebug = 0;
			
				//Ask for HTML-friendly debug output
				//	$mail->Debugoutput = 'html';
			
				//Set the hostname of the mail server
				//$mail->Host = 'smtp.gmail.com';
			
				//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
				//	$mail->Port = 587;
			
				//Set the encryption system to use - ssl (deprecated) or tls
				//$mail->SMTPSecure = 'tls';
			
				//Whether to use SMTP authentication
				//$mail->SMTPAuth = true;
			
				//Username to use for SMTP authentication - use full email address for gmail
				//$mail->Username = "dev4junction@gmail.com";
			
				//Password to use for SMTP authentication
				//	$mail->Password = 'initial1$';
			
				//Set who the message is to be sent from
				$mail->setFrom($json->application_admin_email,$names);
					
				//Set an alternative reply-to address
				$mail->addReplyTo('dev4junction@gmail.com', $names);
			
				//Set who the message is to be sent to
				$mail->addAddress($json->application_admin_email);
			
				//Set the subject line
				$mail->Subject = $subjects;
			
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				$mail->msgHTML($messages);
			
				//Replace the plain text body with one created manually
				$mail->AltBody = 'This is a plain-text message body';
			
				//Attach an image file
				//$mail->addAttachment($uploadfile,$filename);
			
				//send the message, check for errors
				if (!$mail->send()) 
				{
					print "We encountered an error sending your mail";
						
				}
				else
				{
					?><script> alert('Your Application Registered Successfully Please Activate Your Application With Help Of Registered Email !!!!');</script><?php
					redirect('http://junctiondev.cloudapp.net/appmanager','refresh');
				}
			}
		}
	}
	
	/* function for logout for admin dashboard...........................................................................*/
	function logout()
	{
		$url=$this->session->userdata('url');
		$this->data['user_data']=$this->session->userdata('user_data');
		$userdata=$this->session->userdata('user_data');
		$unset_userdata=$this->session->unset_userdata($userdata);
		$this->session->sess_destroy();
		redirect('login');
	}

	function reset_password_view()
	{
		$this->parser->parse('include/header',$this->data);
		$this->load->view('reset_password',$this->data);
	}
	
	function reset_password()
	{
		$UserEmail=$this->input->post('usermailid');
		$EmailOrg=$this->login_model->get_reset_password('organizations',array('email'=>$UserEmail));
		$code=substr(md5(microtime()),rand(0,26),5);
		if($EmailOrg)
		{
			$updatePassword=$this->login_model->set_reset_password('organizations',array('email'=>$UserEmail),array('password'=>$code));
		}
		else
		{
			$EmailRegApp=$this->login_model->set_reset_password('registered_application',array('email'=>$UserEmail));
			if($EmailRegApp)
			{
				$updatePassword=$this->login_model->set_reset_password('registered_application',array('email'=>$UserEmail),array('password'=>$code));
			}
			else 
			{
				?><script> alert('Email Id Does Not Exist');</script><?php
				 redirect('http://junctiondev.cloudapp.net/appmanager','refresh');
			}
		}
		if($updatePassword)
		{
			$subject=" Zero Erp:- Reset Your Password ";
			$message= " <html><body><h3>Hello: Administrator </h3><p> Please Use This Temporary Password And Reset Your Password <br> Temporary Password:- <b>$code  </b><br> </p><p><h3>Please Click In This Link And Update Your Password   :)</h3></p><p> http://junctiondev.cloudapp.net/appmanager/login/activate_org</p></body></html>";
			$name='Junction Software Pvt Ltd';
			/*
			 This example shows settings to use when sending via Google's Gmail servers.
			 */
			//SMTP needs accurate times, and the PHP time zone MUST be set
			//This should be done in your php.ini, but this is how to do it if you don't have access to that
			date_default_timezone_set('Etc/UTC');
				
			require 'PHPMailer/PHPMailerAutoload.php';
				
			//Create a new PHPMailer instance
			$mail = new PHPMailer;
				
			//Tell PHPMailer to use SMTP
			$mail->isSMTP();
				
			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$mail->SMTPDebug = 0;
				
			//Ask for HTML-friendly debug output
			$mail->Debugoutput = 'html';
				
			//Set the hostname of the mail server
			$mail->Host = 'smtp.gmail.com';
				
			//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
			$mail->Port = 587;
				
			//Set the encryption system to use - ssl (deprecated) or tls
			$mail->SMTPSecure = 'tls';
				
			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;
				
			//Username to use for SMTP authentication - use full email address for gmail
			$mail->Username = "dev4junction@gmail.com";
				
			//Password to use for SMTP authentication
			$mail->Password = 'initial1$';
				
			//Set who the message is to be sent from
			$mail->setFrom($UserEmail,$name);
				
			//Set an alternative reply-to address
			$mail->addReplyTo('dev4junction@gmail.com', $name);
				
			//Set who the message is to be sent to
			$mail->addAddress($UserEmail);
				
			//Set the subject line
			$mail->Subject = $subject;
				
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$mail->msgHTML($message);
				
			//Replace the plain text body with one created manually
			$mail->AltBody = 'This is a plain-text message body';
				
			//Attach an image file
			//$mail->addAttachment($uploadfile,$filename);
				
			//send the message, check for errors
			if (!$mail->send())
			{
				print "We encountered an error sending your mail";
					
			}
			?><script> alert('Please Check Your Registered Email');</script><?php
				redirect('http://junctiondev.cloudapp.net/appmanager','refresh');
		}
		else 
		{
			?><script> alert('Email Id Does Not Exist');</script><?php
					   redirect('http://junctiondev.cloudapp.net/appmanager','refresh');
		}
			
	}
	
	function UpdatePassword()
	{
		$TempPassword=$this->input->post('temp_password');
		if($TempPassword)
		{
			$EmailOrg=$this->login_model->get_reset_password('organizations',array('email'=>$UserEmail));
		}
	}
}