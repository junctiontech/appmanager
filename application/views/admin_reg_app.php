<?php $userdata=$this->session->userdata('username'); ?>
<!-- add organization page added by palak on 20 th june -->
<!-- add organization body starts 
<body style="background-color: black">
<div class="page-title">
	<div class="title-env">
		<h2 class="title" style="color: white" >Registration For Your Application</h2>
		<!--  <p class="description">Add Your Organizations</p>
	</div>-->
	<!-- breadcrumbs starts 
	<div class="breadcrumb-env">
		<ol class="breadcrumb bc-1">
			<li><a href="javascript:;"><i class="fa-home"></i>Home</a></li>
			<li class="active"><strong>Manage Organization</strong></li>
			<li class="active"><strong>Add Organization</strong></li>
		</ol>
	</div>
	<!-- breadcrumbs ends 
</div>-->
<!-- page title closed -->
<!-- body container  starts -->
<div class="row">
	<div class="col-sm-12" />
<div class="panel panel-default">
	<!--  <div class="panel-heading">
		<h3 class="panel-title">Manage Organization</h3>
	</div>-->
	<div class="panel-body">
		<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>login/org_admin_registration_application">
		<div align="center" id="show_error"></div> 
			<div class="form-group">
				<?php if(isset($app_list)){ foreach($app_list as $list){ ?>
				<input type="hidden" name="organization_id" value="<?php echo $userdata['organization_id'];?>"/>
				<input type="hidden" name="app_url" value="<?php echo $list->application_url;?>"/>
				<input type="hidden" name="app_reg_fun" value="<?php echo $list->registration_function;?>"/>
				<?php } } ?>
			</div>
			<!--  <div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Organization Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="organization_name" id="field-1" placeholder="Organization Name" onchange="check_organization(this.value)" >
				</div>
			</div> -->
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1"></label>
				<div class="col-sm-10">
					<input type="hidden" name="application_id" value="<?php echo $_GET['app']; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1"></label>
				<div class="col-sm-10">
					<input type="hidden" name="organization_name" value="<?php echo $userdata['organization_name']; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1"></label>
				<div class="col-sm-10">
					<input type="hidden" name="organization_admin_email" value="<?php echo $userdata['email']; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="name" value="<?php if(isset($org_list)){ echo $org_list[0]->name; }?>" id="field-1" placeholder="Please Enter Name">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Email</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="application_admin_email" value="<?php if(isset($org_list)){ echo $org_list[0]->email; }?>" id="field-1" placeholder="Please Enter Email">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Mobile</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="mobile" value="<?php if(isset($org_list)){ echo $org_list[0]->mobile; }?>" id="field-1" placeholder="Please Enter Mobile Number">
				</div>
			</div>
			<!--  <div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Address</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="address"  placeholder="Please Enter Address" /><?php if(isset($org_list)){ echo $org_list[0]->address; }?></textarea>
				</div>
			</div>-->
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">User name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="Username" value="<?php if(isset($org_list)){ echo $org_list[0]->Username; }?>" id="field-1" placeholder="Please Enter User Name">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" name="password"  id="field-1" placeholder="Please Enter Password">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Data Base</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="db_name" value="" id="field-1" placeholder="Please Enter Data Base Name">
				</div>
			</div>
	<div class="form-group-separator"></div>
	<div class="form-group">
		<button type="submit" class="btn btn-success">Submit</button>
		<button type="reset" class="btn btn-white"
			onClick="window.history.back();">Cancel</button>
		</div>
	</form>
</div></div></div></div></div></div>
<!-- body container ends starts -->

<!-- main content div end -->

<!-- page container div end -->