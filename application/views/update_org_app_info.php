<div class="panel-body">
	<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>admin_panel/set_update_org_app_info">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-sm-2 control-label" for="field-1">Name</label>
					<div class="col-sm-10">
						<input type="hidden" name="id" value="<?=$org_list[0]->registration_id; ?>" >
						<input type="text" class="form-control" name="name" value="<?=$org_list[0]->name?>" id="field-1" placeholder="Please Enter Name">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="field-1">Username</label>
					<div class="col-sm-10">
						<input type="hidden" name="old_username" value="<?=$org_list[0]->Username; ?>" >
						<input type="hidden" name="pwd_function" value="<?=$app_info[0]->password_update_function; ?>" >
						<input type="hidden" name="app_url" value="<?=$app_info[0]->application_url; ?>" >
						<input type="hidden" name="db_name" value="<?=$org_list[0]->db_name; ?>" >
						<input type="text" class="form-control" name="username" value="<?=$org_list[0]->Username?>" id="field-1" placeholder="Please Enter Name">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="field-1">Password</label>
					<div class="col-sm-10">
						<input type=password class="form-control" name="password" value="<?php echo $org_list[0]->password;?>" id="field-1" placeholder="Please Enter Name">
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success">Submit</button>
					<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
				</div>
			</div>
		</div>
	</form>
</div>