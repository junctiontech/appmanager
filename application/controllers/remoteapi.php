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
		if($CONNECTION!=='')
		{
			$data=json_decode($_POST['registration_info']);
			$query= "select * from registered_application where db_name='".$data->employeeOrganizationName."'";
			$sql=mysqli_query($CONNECTION,$query);
			if($sql)
			{
				$CONNECTION=mysqli_connect("localhost",'root','bitnami',$data->employeeOrganizationName);
				$date=date('d-m-Y');
				$query= "INSERT INTO newregistration VALUES('".$data->employeeName."','".$data->employeeMobileNumber."','".$data->employeePassword."','".$data->employeeIMEI."','".$data->employeeName."','".$date."')";
				$sql=mysqli_query($CONNECTION, $query);
				if($sql)
				{
					echo 'true';
				}
			}
			else
			{
				echo 'Data Base Does Not Exist';
			}
		}
		else 
		{
			echo 'Connection Not Found Server Error';
		}
		
	}
	
	function project()
	{
		//echo 'true';die;
		$CONNECTION=mysqli_connect("localhost",'root','bitnami','junction_erp');
		if($CONNECTION!=='')
		{
			$query= "select * from project";
			$sql=mysqli_query($CONNECTION,$query);
			$count=mysqli_num_rows($sql);
			//echo $count;die; 
			foreach ($sql as $data)
			{
				$results[]=$data;
				$query= "select * from task where project_id='".$data['project_id']."'";
				$sql=mysqli_query($CONNECTION,$query);
				$count=mysqli_num_rows($sql);
				if(isset($count) && $count > 0)
				{
					$datas	=	array();
					while( $result	=	mysqli_fetch_assoc( $sql ) ){
						$datas[]		=	$result;
					}
					$result	=	array(
							'project_list'	=>$results,
							'data'		=>	array(
									'task_list'	=>	$datas
							)
					);
				}
			}
			echo json_encode($result);die;
			//print_r($sqls->project_id);die;
			
			
			
			
			
			
			
			
			$query= "select * from project";
			$sql=mysqli_query($CONNECTION,$query);
			foreach ($sql as $sqls)
			{
				$results[]=$sqls;
			}
			
			print_r($results);die;
			//$result=mysqli_fetch_assoc($sql);
			while($row=mysqli_fetch_array($sql)) {
				$result[]=$row;
			}
			$querys= "select * from task";
			$sqls=mysqli_query($CONNECTION,$querys);
			//return $result;
			//$array=array();
			die;//print_r($result);die;
			if($result)
			{
				$querys= "select * from task";
				$sqls=mysqli_query($CONNECTION,$querys);
				$results=mysqli_fetch_all($sqls);
				$value=array_merge($result,$results);
				echo json_encode($value);die;
			}
		}
		else 
		{
			echo 'database does not exist';
		}
	}
	
	function project_update()
	{
		// task update body hear
	}
	
	
}



/* End of login controller */