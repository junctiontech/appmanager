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
	 }
	function CheckAuthonticate($Filter=false,$data=false)
	{  //print_r($Filter);die;
		//echo $Filter; print_r($Filter);die;
		//echo $data;die;
		//echo $_GET['data'];
		//die; 
		print_r($Filter);die;
		
		$value=json_decode($_GET['json']);print_r($value);die;//echo $value->employeeOrganizationName;die;
		$CheckDatabaseName=$this->data['CheckDatabaseName']=$this->appmanagergateway_model->GetSingleData('registered_application',array('db_name'=>$value->employeeOrganizationName));//print_r($CheckDatabaseName);die;
		if($CheckDatabaseName)
		{
			$CheckOrganizationStatus=$this->data['CheckOrganizationStatus']=$this->appmanagergateway_model->GetSingleData('organizations',array('organization_id'=>$CheckDatabaseName[0]->organization_id,'status'=>'active'));//print_r($CheckOrganizationStatus);die;
			if($CheckOrganizationStatus)
			{
				$CheckApplicationStatus=$this->data['CheckApplicationStatus']=$this->appmanagergateway_model->GetSingleData('registered_application',array('registration_id'=>$CheckDatabaseName[0]->registration_id,'status'=>'active'));//print_r($CheckApplicationStatus);die;
				if($CheckApplicationStatus)
				{
					//$CheckApplicationUrl=$this->data['CheckApplicationurl']=$this->appmanagergateway_model->GetSingleData('applications',array('application_id'=>$CheckDatabaseName[0]->application_id));//print_r($CheckApplicationUrl);die;
					$result ='success';
					$data=array('result'=>$result,'data'=>$_GET['json']);
					$json=json_encode($data);
					if ($result){ redirect('http://junctiondev.cloudapp.net/zeroerp/remoteapi/locationUpdate?json='.$json); }
				}
				else
				{
					$result ='fail_application';
					if ($result){ redirect('http://junctiondev.cloudapp.net/zeroerp/remoteapi/locationUpdate?result='.$result); }
				}
			}
			else
			{
				$result ='fail_organization'; //redirect into function when organization not activate name not exist
				if ($result){ redirect('http://junctiondev.cloudapp.net/zeroerp/remoteapi/locationUpdate?result='.$result); }
			}
		}
		else
		{
			$result= 'fail_database';//redirect into function when database name not exist
		if (isset($result)){ redirect('http://junctiondev.cloudapp.net/zeroerp/remoteapi/locationUpdate?result='.$result); }
		}
		die;
	}
}