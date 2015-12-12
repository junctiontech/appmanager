<?php
class AppmanagerGateway extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('AppmanagerGateway_model');
	}
	function CheckAuthonticate($Filter=false)
	{  
		$url= $_SERVER['HTTP_REFERER'];
		$CheckDatabaseName=$this->data['CheckDatabaseName']=$this->AppmanagerGateway_model->GetSingleData('registered_application',array('db_name'=>$Filter));//print_r($CheckDatabaseName);die;
		if($CheckDatabaseName)
		{
			$CheckOrganizationStatus=$this->data['CheckOrganizationStatus']=$this->AppmanagerGateway_model->GetSingleData('organizations',array('organization_id'=>$CheckDatabaseName[0]->organization_id,'status'=>'active'));//print_r($CheckOrganizationStatus);die;
			if($CheckOrganizationStatus)
			{
				$CheckApplicationStatus=$this->data['CheckApplicationStatus']=$this->AppmanagerGateway_model->GetSingleData('registered_application',array('registration_id'=>$CheckDatabaseName[0]->registration_id,'status'=>'active'));//print_r($CheckApplicationStatus);die;
				if($CheckApplicationStatus)
				{
					$result= 'success';
					if ($result){ header('location:'.$url.'?result='.$result); }
				}
				else
				{
					$result ='fail_application';
					if ($result){ header('location:'.$url.'?result='.$result); }
				}
			}
			else
			{
				$result ='fail_organization'; //redirect into function when organization not activate name not exist
				if ($result){ header('location:'.$url.'?result='.$result); }
			}
		}
		else
		{
			$result= 'fail_database';//redirect into function when database name not exist
		if (isset($result)){ header('location:'.$url.'?result='.$result); }
		}
		die;
	}
}