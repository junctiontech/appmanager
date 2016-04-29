<?php
if(isset($_POST['submit']))
{
    $ch = curl_init(); // create curl handle
	$url = "http://junctiondev.cloudapp.net/appmanager/login/set_registration_application";
  /**
   * For https, there are more options that you must define, these you can get from php.net 
   */
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query(array(
											'organization_name'=>$_POST['organization_name'],
											'name'=>$_POST['name'],
											'email'=>$_POST['email'],
											'mobile'=>$_POST['mobile'],
											'address'=>$_POST['address'],
											'username'=>$_POST['username'],
											'application_name'=>$_POST['application_name'],
											'terms'=>'Accepted',
											'password'=>$_POST['password'],
											'db_name'=>$_POST['db_name'],
											'application_admin_name'=>$_POST['application_admin_name'],
											'application_email'=>$_POST['application_email'],
											'application_mobile'=>$_POST['application_mobile'],
											'application_username'=>$_POST['application_username'],
											'application_password'=>$_POST['application_password'],
										)));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FRESH_CONNECT, true); 
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,30); //timeout in seconds
  curl_setopt($ch,CURLOPT_TIMEOUT, 30); // same for here. Timeout in seconds.
  $response = curl_exec($ch);

  curl_close ($ch); //close curl handle
	echo  $response;
	
	//if($response)
	//{
		/* $ch2=curl_init();
				$url2 = "http://junctiondev.cloudapp.net/sms/user_management/clone_db";
		  /**
		   * For https, there are more options that you must define, these you can get from php.net 
		   */
		 /*  curl_setopt($ch2,CURLOPT_URL,$url2);
		  curl_setopt($ch2,CURLOPT_POST, true);
		  curl_setopt($ch2,CURLOPT_POSTFIELDS, http_build_query(array(
													'database_name'=>$response,
												)));
		  curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);
		  curl_setopt($ch2,CURLOPT_RETURNTRANSFER, true);
		  curl_setopt($ch2, CURLOPT_FRESH_CONNECT, true); 
		  curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "POST");
		  curl_setopt($ch2,CURLOPT_CONNECTTIMEOUT ,30); //timeout in seconds
		  curl_setopt($ch2,CURLOPT_TIMEOUT, 30); // same for here. Timeout in seconds.
		  $response2 = curl_exec($ch2);

		  curl_close ($ch2); //close curl handle
			echo  $response2; */ */
	//}
}
?>
<html>
	<body>
		<form class="form-horizontal" method="POST" action="">
		org name:-
		<input type="text" class="" name="organization_name" id="org" placeholder="Organization Name" onchange="check_organization(this.value,this.id)" required >
		name:-
		<input type="text" class="form-control" name="name" id="name" placeholder="Please Enter Name" required>
		<div align="center" id="show_error"></div>
		<!-- <div id="dialogoverlay"></div>
		<div id="dialogbox">
  			<div>
			    <div id="dialogboxhead"></div>
			    <div id="dialogboxbody"></div>
			    <div id="dialogboxfoot"></div>
  			</div>
		</div> 
			<div class="form-group">
				<?php if(isset($app_list)){ foreach($app_list as $list){ ?>
				<input type="hidden" name="app_url" value="<?php echo $list->application_url;?>"/>
				<input type="hidden" name="app_reg_fun" value="<?php echo $list->registration_function;?>"/>
				<input type="hidden" name="application_name" value="<?php echo $list->application_id;?>"/>
				<?php } } ?>
			</div>-->
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Application Id</label>
				<div class="col-sm-10">
					<input type="input" class="form-control" name="application_name" placeholder="Please Enter Email" value="School" onchange="" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Email</label>
				<div class="col-sm-10">
					<input type="input" class="form-control" name="email" data-mask="email" id="email" placeholder="Please Enter Email" onchange="" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Mobile</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Please Enter Mobile Number" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Address</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="address" placeholder="Please Enter Address" required /></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">User name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="username" id="username" placeholder="Please Enter User Name" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" name="password" id="password" placeholder="Please Enter Password" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Data Base</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="db_name" id="db_name" placeholder="Please Enter Data Base Name" onchange="check_dbname(this.value,this.id)" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-6 control-label" for="field-1"><b>If Application Registration Deatail Is Same So Please Click Checkbox</b> </label>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="application_admin_name" id="app_admin_name" placeholder="Please Enter Application Admin Name" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Email</label>
				<div class="col-sm-10">
					<input type="input" class="form-control" name="application_email" data-mask="app_email" id="app_email" placeholder="Please Enter Application Admin Email " required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Mobile</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="application_mobile" id="app_mobile" placeholder="Please Enter Application Admin Mobile Number" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">User name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="application_username" id="app_username" placeholder="Please Enter Application Admin User Name" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" name="application_password" id="app_password" placeholder="Please Enter Application Admin Password" required>
				</div>
			</div>
	<div class="form-group">
		<input type="submit" name="submit" value="Submit" />
		<button type="reset" class="btn btn-white"
			onClick="window.history.back();">Cancel</button>
		</div>
	</form>
	</body>
</html>