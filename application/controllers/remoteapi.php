<?php 

/* Controller for login Functionality */
class Remoteapi {
	
	function locationUpdate(){
		$CONNECTION=mysqli_connect("localhost",'root','bitnami','appmanager');
		if($CONNECTION)
		{
			$data=json_decode($_POST['employeeData']);
			$imei=$data->employeeIMEI;//echo $imei;
			foreach ($data->employeeLocationList as $list)
				{
					$result = "INSERT INTO tracking VALUES('".$imei."','".$list->employeeLocationDate."','".$list->employeeLocationTime."','".$list->employeeLocationLatitude."','".$list->employeeLocationLongitude."','".$list->employeeLocationProviderName."','".$list->employeeLocationBatteryLevel."')";
					$sql=mysqli_query($CONNECTION,$result);
				}
				if($sql)
				{
					/*$data=array(
							
							'code'=>'200',
							'result'=>'true',
								);
					print_r($data);die;*/
					 echo 'true'; die;
				}
				else 
				{
					/*$data=array(
					
							'code'=>'400',
							'result'=>'false',
					);*/
					echo 'false'; die;
				}
		}
		else
		{
			echo 'connection error';
		}
	}
	
	/* Function For Moblie Application Registration */
	function employeeRegister()
	{
		$CONNECTION=mysqli_connect("localhost",'root','bitnami','appmanager');
		if($_POST['employeeOrganizationName']!=='')
		{
			$query= "select * from registered_application where db_name='".$_POST['employeeOrganizationName']."'";
			$sql=mysqli_query($CONNECTION,$query);
			if($sql)
			{
				$CONNECTION=mysqli_connect("localhost",'root','bitnami',$_POST['employeeOrganizationName']);
				$date=date('d-m-Y');
				$query= "INSERT INTO newregistration VALUES('".$_POST['employeeName']."','".$_POST['employeeMobileNumber']."','".$_POST['employeePassword']."','".$_POST['employeeIMEI']."','".$_POST['employeeName']."','".$date."')";
				$sql=mysqli_query($CONNECTION, $query);
				if($sql)
				{
					echo 'true';
				}
			}
			else {
					echo 'Data Base does Not Exist';
				}
		}
		else 
		{
			echo 'Server Error';
		}
		//echo $_POST['employeeName'];echo $_POST['employeeMobileNumber'];echo $_POST['employeePassword'];echo $_POST['employeeOrganizationName'];echo $_POST['employeeIMEI']; die;
	}
	
	function project()
	{
		//echo 'true';die;
		$CONNECTION=mysqli_connect("localhost",'root','bitnami','junction_erp');
		if($CONNECTION!=='')
		{
			$query= "select * from project";
			$sql=mysqli_query($CONNECTION,$query);//print_r($sql);die;
			//$result=mysqli_num_rows($sql);print_r($result);die;
			echo json_encode($sql);die;
			if($sql)
			{
				$query= "select * from task";
				$sql=mysqli_query($CONNECTION,$query);
			}
		}
		else {
			echo 'database does not exist';
		}
	}
	
	function task_update()
	{
		// task update body hear
	}
	
	
}


/* End of login controller */