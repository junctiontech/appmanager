<body>				
<div id="dialogoverlay"></div>
<div id="dialogbox">
  <div>
    <div id="dialogboxhead"></div>
    <div id="dialogboxbody"></div>
    <div id="dialogboxfoot"></div>
  </div>
</div>
</body>
<!-- add organization page added by palak on 20 th june -->
<!-- add organization body starts -->
<body style="background-color: black">
<div class="page-title">
	<div class="title-env">
		<h2 class="title" style="color: white" >Registration For Your Application</h2>
		<!--  <p class="description">Add Your Organizations</p>-->
	</div>
	<!-- breadcrumbs starts 
	<div class="breadcrumb-env">
		<ol class="breadcrumb bc-1">
			<li><a href="javascript:;"><i class="fa-home"></i>Home</a></li>
			<li class="active"><strong>Manage Organization</strong></li>
			<li class="active"><strong>Add Organization</strong></li>
		</ol>
	</div>
	<!-- breadcrumbs ends -->
</div>
<!-- page title closed -->
<!-- body container  starts -->
<div class="row">
	<div class="col-sm-12" />
<div class="panel panel-default">
	<!--  <div class="panel-heading">
		<h3 class="panel-title">Manage Organization</h3>
	</div>-->
	<div class="panel-body">
		<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>login/set_registration_application">
		<div align="center" id="show_error">
		</div>
			<div class="form-group">
				<?php if(isset($app_list)){ foreach($app_list as $list){ ?>
				<input type="hidden" name="app_url" value="<?php echo $list->application_url;?>"/>
				<input type="hidden" name="app_reg_fun" value="<?php echo $list->registration_function;?>"/>
				<input type="hidden" name="app_name" value="<?php echo $list->application_id;?>"/>
				<?php } } ?>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Organization Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="organization_name" id="org" placeholder="Organization Name" onchange="check_organization(this.value,this.id)" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="name" id="field-1" placeholder="Please Enter Name" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" name="email" data-mask="email" id="email" placeholder="Please Enter Email" onchange="check_email(this.value,this.id)" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Mobile</label>
				<div class="col-sm-10">
					<input type="number" pattern=""  class="form-control" data-mask="phone" name="mobile" id="field-1" placeholder="Please Enter Mobile Number" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Address</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="address" placeholder="Please Enter Address" required/></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">User name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="username" id="field-1" placeholder="Please Enter User Name" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" name="password" id="field-1" placeholder="Please Enter Password" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Data Base</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="db_name" id="db_name" placeholder="Please Enter Data Base Name" onchange="check_dbname(this.value,this.id)" required>
				</div>
			</div>
			<!-- <div class="form-group" align="right">
				<div align="center" class="col-sm-1" style="background-color:yellow">
					<?php //$value=md5(microtime()); $code=substr($value,0,5); echo $code; $this->session->set_userdata('code',$code); $session= $this->session->userdata('code');?>
				</div>
				<div  class="col-sm-3" >
					<input type="text" class="form-control" name="code" id="field-1" placeholder="Please Enter captcha code" onchange="captcha_code(this.value)">
				</div>	
			</div> -->
	<div class="form-group">
		<button type="submit" class="btn btn-success">Submit</button>
		<button type="reset" class="btn btn-white"
			onClick="window.history.back();">Cancel</button>
		</div>
	</form>


</div>
<!-- body container ends starts -->
</div>
<!-- main content div end -->
</div>
<!-- page container div end -->