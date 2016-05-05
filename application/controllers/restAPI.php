<?php
include(APPPATH.'libraries/REST_Controller.php');
class RestAPI 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('RestAPI_model');
	}
	
	function data_post() 
	{
		echo 'hiii';die;
	}
	/*---------------------- Start function for check validation data ------------------------*/
	/* function CheckValidation()
	{
		$data=array(
			'OrganizationEmail'=>$this->input->post('OrganizationEmail'),
			'OrganizationMobile'=>$this->input->post('OrganizationMobile')
		);
		$result=$this->restAPI_model->get('apiKey',array('organizations'=>$apiKey));
		if(count($result)>0)
		{
			$data=array(
			'DatabaseName'=>$this->input->post('DatabaseName'),
			'ApplicationAdminEmail'=>$this->input->post('ApplicationAdminEmail'),
			'ApplicationAdminMobile'=>$this->input->post('ApplicationAdminMobile')
			);
			$response=$this->restAPI_model->get('apiKey',array('registered_application'=>$apiKey));
			if(count($response)>0)
			{
				return 'success';
			}
			else
			{
				return 'error';
			}
		}
		else 
		{
			return 'error';
		}
	}
	 */
	
	/*---------------------- Start function for insert data ------------------------*/
	/* function data_post()
	{	echo 'dsff';
		$this->response(array('status' => 'failed'));die; */
		//$this->response(array('status' => 'failed'));die;
		/* $OrganizationData=$this->input->post('OrganizationData'); 
		$dataorg=json_decode($OrganizationData);print_r($dataorg);die;
		$result=$this->restAPI_model->insert_data('organizations',$dataorg);
		if($result)
		{
			$ApplicationData=$this->input->post('ApplicationData'); 
			$dataApp=json_decode($ApplicationData);
			$response=$this->restAPI_model->insert_data('registered_application',$dataApp);
			if($response)
			{
				$this->cloneDB($ApplicationData);
				//$this->response(array('DatabaseName'=>$dataApp->DatabaseName);
			}
			else
			{
				$this->response('error');
			}
		} */
	//}
	
	
	/*---------------------- Start function for clone database ------------------------*/
	/* function cloneDB($ApplicationData)
	{
		$json=json_decode($ApplicationData);
		$result=$this->restAPI_model->cloneDB($json->DatabaseName);
		if($result)
		{
			$this->insertLicenceKey($ApplicationData);
		}
	} */
	
	
	/*---------------------- Start function for insert licence key and user details ------------------------*/
	/* function insertLicenceKey($ApplicationData)
	{
		$json=json_decode($ApplicationData);
		$data=array(
			'Username'=>$json->ApplicationAdminEmail,
			'Password'=>$json->ApplicationAdminPassword,
			'UserType'=>'masteruser',
			);
		$response=$this->restAPI_model->set_user($json->ApplicationAdminEmail,$json->ApplicationAdminPassword,$json->DatabaseName);
		if($response)
		{
			$this->response(array('status' => 'success',REST_Controller::HTTP_OK));
		}
	}  */
}