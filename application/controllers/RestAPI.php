<?php

class RestAPI extendes REST_Controller
{
	function __costruct()
	{
		parent::__costruct();
		$this->model('RestAPI_model');
	}
	
	/*---------------------- Start function for check validation data ------------------------*/
	function CheckValidation()
	{
		$data=array(
			'OrganizationEmail'=>$this->input->post('OrganizationEmail'),
			'OrganizationMobile'=>$this->input->post('OrganizationMobile')
		);
		$result=$this->RestAPI_model->get('apiKey',array('organizations'=>$apiKey));
		if(count($result)>0)
		{
			$data=array(
			'DatabaseName'=>$this->input->post('DatabaseName'),
			'ApplicationAdminEmail'=>$this->input->post('ApplicationAdminEmail'),
			'ApplicationAdminMobile'=>$this->input->post('ApplicationAdminMobile')
			);
			$response=$this->RestAPI_model->get('apiKey',array('registered_application'=>$apiKey));
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
	
	
	/*---------------------- Start function for insert data ------------------------*/
	function rest_post()
	{
		$OrganizationData=$this->input->post('OrganizationData'); 
		$dataorg=json_decode($OrganizationData);
		$result=$this->Test_model->insert_data('organizations',$dataorg);
		if($result)
		{
			$ApplicationData=$this->input->post('ApplicationData'); 
			$dataApp=json_decode($ApplicationData);
			$response=$this->RestAPI_model->insert_data('registered_application',$dataApp);
			if($response)
			{
				$this->cloneDB($ApplicationData);
				//$this->response(array('DatabaseName'=>$dataApp->DatabaseName);
			}
			else
			{
				$this->response('error');
			}
		}
	}
	
	
	/*---------------------- Start function for clone database ------------------------*/
	function cloneDB($ApplicationData)
	{
		$json=json_decode($ApplicationData);
		$result=$this->RestAPI_model->cloneDB($json->DatabaseName);
		if($result)
		{
			$this->insertLicenceKey($ApplicationData);
		}
	}
	
	
	/*---------------------- Start function for insert licence key and user details ------------------------*/
	function insertLicenceKey($ApplicationData)
	{
		$json=json_decode($ApplicationData);
		$data=array(
			'Username'=>$json->ApplicationAdminEmail,
			'Password'=>$json->ApplicationAdminPassword,
			'UserType'=>'masteruser',
			);
		$response=$this->RestAPI_model->set_user($json->ApplicationAdminEmail,$json->ApplicationAdminPassword,$json->DatabaseName);
		if($response)
		{
			$this->response(array('status' => 'success',REST_Controller::HTTP_OK));
		}
	} 
}