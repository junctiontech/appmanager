<!-- add organization page added by palak on 20 th june -->
<!-- add organization body starts -->
<body style="background-color: #7d3669" >
<!--  <div class="page-loading-overlay">
	<div class="loader-2"></div>
</div>-->
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
<div class="row" >
	<div class="col-sm-12" />
<div class="panel panel-default">
	<!--  <div class="panel-heading">
		<h3 class="panel-title">Manage Organization</h3>
	</div>-->
	<div class="panel-body">
		<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>login/set_registration_application">
		<div align="center" id="show_error"></div>
		<!-- <div id="dialogoverlay"></div>
		<div id="dialogbox">
  			<div>
			    <div id="dialogboxhead"></div>
			    <div id="dialogboxbody"></div>
			    <div id="dialogboxfoot"></div>
  			</div>
		</div> -->
		<input type="hidden" name="id" value="<?php echo $this->data['id']; ?>"/>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="field-1">Email Id</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="useremailid" id="app_usermailid" placeholder="Please Enter Email" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="field-1">Temporary Password</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="temp_password" id="app_temp_password" placeholder="Please Enter Temporary Password" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="field-1">New Password</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="new_password" id="app_new_password" placeholder="Please Enter New Password" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="field-1">Confirm Password</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="confirm_password" id="app_conf_password" placeholder="Please Enter Confirm Password" required>
			</div>
		</div>
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