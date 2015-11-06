<div class="panel-body">
	<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>admin_panel/set_application">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<input type="text" class="form-control" name="app_id" value="" id="field-1" placeholder="Application ID" required>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<input type="text" class="form-control" name="app_name" value="" id="field-1" placeholder="Application Name" required>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<input type=text class="form-control" name="app_url" value="" id="field-1" placeholder="Application URL" required>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<input type=text class="form-control" name="app_login_fun" value="login/login_user" id="field-1" placeholder="Application Login Function" required>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<input type=text class="form-control" name="app_reg_fun" value="user_management/clone_db" id="field-1" placeholder="Application Registration Function" required>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<input type=text class="form-control" name="app_pwd_url" value="user_management/update_pwd_admin_user" id="field-1" placeholder="Application Password Function" required>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<input type=text class="form-control" name="app_db_size" value="User_management/get_db_size" id="field-1" placeholder="Application Database Size Function" required>
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Submit</button>
				<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
			</div>
		</div>
	</form>
</div>