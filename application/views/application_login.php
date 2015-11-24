<div class="modal-content">
	<div class="modal-header">
		<!--  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
		</br>
		<h4 class="modal-title">Application Login</h4>
		<!--  <div class="errors-container">
					<?php  if($this->session->flashdata('category_error')) { ?>
						<div class="row-fluid"> 
							<div class="alert alert-danger">
								<strong><?=$this->session->flashdata('message')?></strong> 
							</div>
						</div>
					<?php } ?>
					<?php  if($this->session->flashdata('category_success')) { ?>
						<div class="row-fluid">
							<div class="alert alert-success">
								<strong><?=$this->session->flashdata('message')?></strong> 
							</div>
						</div>
					<?php } ?>
		</div>-->
	</div>
	<div class="modal-body">
		<form role="form" method="POST"  id="ajaxcontent" class="" action="<?=base_url();?>login/login_function" style="border:#d1d1d1 1px solid; padding: 25px;">
			<div class="form-group">
				<label class="control-label" for="db_name">Data Base Name</label>
				<input type="text" class="form-control" name="db_name" id="db_name" autocomplete="off" required/>
			</div>
			<div class="form-group">
				<label class="control-label" for="username">User id</label>
				<input type="text" class="form-control" name="username" id="username" autocomplete="off" required/>
			</div>
			<div class="form-group">
				<label class="control-label" for="passwd">Password</label>
				<input type="password" class="form-control" name="password" id="passwd" autocomplete="off" required/>
			</div>
			<div class="">
				<button type="submit" class="btn btn-primary "><i class="fa-lock"></i>    Log In</button>
				<button type="button" onclick="window.location.href='<?php echo base_url();?>login'" class="btn btn-white" data-dismiss="modal">Close</button>
			</div>
		</form>
	</div>
</div>
</div>
<script src="<?php echo base_url(); ?>assets/js/xenon-custom.js"></script>