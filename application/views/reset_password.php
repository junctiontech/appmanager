<div class="modal-content">
	<div class="modal-header">
		<!--  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
		</br>
		<h4 class="modal-title">Reset Password</h4>
		<!--  <div class="errors-container">
		</div>-->
	</div>
	<div class="modal-body">
		<form role="form" method="POST"  id="ajaxcontent" class="" action="<?=base_url();?>login/reset_password" style="border:#d1d1d1 1px solid; padding: 25px;">
			<div class="">
				<label class="control-label" for="username">Choose </label>
				<input type="radio" class="" name="panel" value="org_admin" id="username" autocomplete="off" required/>Organization Admin
				<input type="radio" class="" name="panel" value="app_admin" id="username" autocomplete="off" required/>Application Admin
			</div>
			<div class="form-group">
				<label class="control-label" for="username">Email Id</label>
				<input type="text" class="form-control" name="usermailid" id="username" autocomplete="off" required/>
			</div>
			<div class="">
				<button type="submit" class="btn btn-primary "><i class=""></i>    Send</button>
				<button type="button" onclick="window.location.href='<?php echo base_url();?>login'" class="btn btn-white" data-dismiss="modal">Close</button>
			</div>
		</form>
	</div>
</div>
</div>
<script src="<?php echo base_url(); ?>assets/js/xenon-custom.js"></script>