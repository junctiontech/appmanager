<?php 

/* Controller for login Functionality */
class Remoteapi {
	
	function locationUpdate(){
		$CONNECTION=mysqli_connect("localhost",'root','bitnami','appmanager');
		if($CONNECTION)
		{
			$data=json_decode($_POST['employeeData']);
			$imei=$data->employeeIMEI;
			foreach($data->employeeLocationList as $list)
				{
					//try{
					$result = "INSERT INTO tracking VALUES('".$imei."','".$list->employeeLocationDate."','".$list->employeeLocationTime."','".$list->employeeLocationLatitude."','".$list->employeeLocationLongitude."','".$list->employeeLocationProviderName."','".$list->employeeLocationBatteryLevel."')";
					$sql=mysqli_query($CONNECTION,$result);
					/*}catch (MYSQlException $e)
					{
						echo 'error from server';
						die;
					}finally {
						echo 'error from finally ';continue;
					} */
						
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
			$count=mysqli_num_rows($sql);
			if(isset($count) && $count > 0 )
			{
				$new_connection=mysqli_connect("localhost",'root','bitnami',$data->employeeOrganizationName);
				$query= "INSERT INTO newregistration (name,number,password,imei,androideapp,status,created_by,created_on,updated_by,updated_on) VALUES('".$data->employeeName."','".$data->employeeMobileNumber."','".$data->employeePassword."','".$data->employeeIMEI."','androide','suspend','".$data->employeeName."','".date('d-m-Y')."','','')"; //echo $query; die;
				$sql=mysqli_query($new_connection,$query);
				if($sql)
				{
					echo 'Information Registered Successfully';
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
		$CONNECTION=mysqli_connect("localhost",'root','bitnami','junction_erp');
		if($CONNECTION!=='')
		{
			$query= "select * from project";
			$sqls=mysqli_query($CONNECTION,$query);
			$count=mysqli_num_rows($sqls);
			if(isset($count) && $count > 0)
			{
					//$project_data=array();
					while($result_project=mysqli_fetch_assoc($sqls))
					{	
						$project_data[]=$result_project;	
					}
			}
					$query= "select * from task";
					$sql=mysqli_query($CONNECTION,$query);
					$count=mysqli_num_rows($sql);
					$task_data	=	array();
					if(isset($count) && $count > 0)
					{
						while($result_task=mysqli_fetch_assoc( $sql ))
						{
							$task_data[]=$result_task;
						}
					}
				 	$result	=	array(
							'project_list'		=>$project_data,
							'task_of_list'		=>	$task_data,
					);
					echo json_encode($result);
					die;
				
		}
		else 
		{
			echo 'database does not exist';
		}
	}
	
	/* Function for Update Task For Androide Application */
	function project_update()
	{
		// Todo Project Update Body Hear;
	}
	
	/* Function for Image Update For Androide Application */
	function image_project_update()
	{
		$CONNECTION=mysqli_connect("localhost",'root','bitnami','junction_erp');
		if($CONNECTION)
		{
			$value=json_decode($json);
			$query="update set task";
		}
		else
		{
			echo 'Server Error Connection Not Found';
		}
	}
	
	
	
	
	/*  Function For test For json Format For project */
	function demo()
	{
		$CONNECTION=mysqli_connect("localhost",'root','bitnami','junction_erp');
		if($CONNECTION!=='')
		{
			$query= "select * from project";
			$sqls=mysqli_query($CONNECTION,$query);
			$count=mysqli_num_rows($sqls);//echo $count;die;
			if(isset($count) && $count > 0)
			{
				while($result_project=mysqli_fetch_assoc($sqls))
				{
					$project_id=$result_project['project_id'];
					$project_description[]= $result_project['project_description'];
					$status[]= $result_project['status'];
					
					
					
					/*$project_data[]=$result_project;
					//print_r($result_project['project_id']);die;
					$query= "select * from task where project_id='".$result_project['project_id']."'";
					$sql=mysqli_query($CONNECTION,$query);
					$count=mysqli_num_rows($sql);
					$task_data	=	array();
					if(isset($count) && $count > 0)
					{
						while($result_task=mysqli_fetch_assoc( $sql ))
						{
							$task_data[]=$result_task;
						}
					}
					$local_var=array('task_of_list'=>$task_data);
					array_push($project_data,$local_var);
					echo json_encode($project_data);die;*/
				}
				$demo=array(
								'test'=>'demo',
								'testing'=>'demoing',
							);
				
				$result=array(
								'project_list'=>array('id'=>$project_id,
								'desc'=>$project_description,
								'status'=>$status,
								'task_of_list'=>$demo,	
								),
							);
				echo json_encode($result);die;
			}
					
				print_r(json_encode($datass));
				die;
	
		}
		else
		{
			echo 'database does not exist';
		}
	}
}



/* End of login controller */



