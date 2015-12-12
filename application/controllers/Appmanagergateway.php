<?php
class Appmanagergateway extends CI_Controller
{
 	function __construct() {
		parent::__construct();
		$this->data[]='';
		$this->load->helper('url');
		$this->data['url']=base_url();
		$this->load->library('parser');
		$this->load->library('session');
		$this->load->model('appmanagergateway_model');
		//$this->load->library('email');
	 }
	function CheckAuthonticate($Filter=false)
	{  
		echo $Filter;die;
		//$url= $_SERVER['HTTP_REFERER']; echo $url;die;
		$CheckDatabaseName=$this->data['CheckDatabaseName']=$this->appmanagergateway_model->GetSingleData('registered_application',array('db_name'=>$Filter));//print_r($CheckDatabaseName);die;
		if($CheckDatabaseName)
		{
			$CheckOrganizationStatus=$this->data['CheckOrganizationStatus']=$this->appmanagergateway_model->GetSingleData('organizations',array('organization_id'=>$CheckDatabaseName[0]->organization_id,'status'=>'active'));//print_r($CheckOrganizationStatus);die;
			if($CheckOrganizationStatus)
			{
				$CheckApplicationStatus=$this->data['CheckApplicationStatus']=$this->appmanagergateway_model->GetSingleData('registered_application',array('registration_id'=>$CheckDatabaseName[0]->registration_id,'status'=>'active'));//print_r($CheckApplicationStatus);die;
				if($CheckApplicationStatus)
				{
					$result= 'success';
					if ($result){ header('location:http://junctiondev.cloudapp.net/zeroerp/remoteapi/test?result='.$result); }
				}
				else
				{
					$result ='fail_application';
					if ($result){ header('location:location:http://junctiondev.cloudapp.net/zeroerp/remoteapi/test?result='.$result); }
				}
			}
			else
			{
				$result ='fail_organization'; //redirect into function when organization not activate name not exist
				if ($result){ header('location:location:http://junctiondev.cloudapp.net/zeroerp/remoteapi/test?result='.$result); }
			}
		}
		else
		{
			$result= 'fail_database';//redirect into function when database name not exist
		if (isset($result)){ header('location:location:http://junctiondev.cloudapp.net/zeroerp/remoteapi/test?result='.$result); }
		}
		die;
	}
}