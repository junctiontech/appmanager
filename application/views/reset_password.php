<div class="modal-content">
	<div class="modal-header">
		<!--  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
		</br>
		<h4 class="modal-title">Admin Account Login</h4>
		<!--  <div class="errors-container">
		</div>-->
	</div>
	<div class="modal-body">
		<form role="form" method="POST"  id="ajaxcontent" class="" action="<?=base_url();?>login/reset_password_view" style="border:#d1d1d1 1px solid; padding: 25px;">
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