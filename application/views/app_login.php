<?php if(!($this->session->userdata('userdata'))==''){ echo $this->session->userdata('userdata'); die; }?>
<!-- login page starts  -->
<!-- added by palak on 20thjune -->
<body class="page-body login-page" style="background-color: black; padding-top:1cm;">
	<div class="login-container" >
		<div class="row">
			<div class="col-sm-9">
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						// Reveal Login form
						setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);
							// Set Form focus
						$("form#login .form-group:has(.form-control):first .form-control").focus();
					});
				</script>
					<!-- Errors container -->
				<div class="errors-container">
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
				</div>
					<!-- Add class "fade-in-effect" for login form effect -->
					<?php  if((isset($_GET['id']))  && $_GET['id']=='login' || $_GET['id']=='reg' && $_GET['id']!=='SMS' && $_GET['id']!=='junctionERP' ){  ?>
					<div class="row">
						<div class="col-md-12">
						<?php if($_GET['id']=='reg'){ ?>
							<strong><h3>Please Choose Application For Registration Your Organization</h3></strong><?php } else{ ?>
							<strong><h3>Please Choose Application For Login Your Organization</h3></strong>
							<?php } ?><br>
						</div>
						<?php foreach ($app_list as $list){ ?>
						<div class="col-sm-6" >
							<div class="xe-widget xe-counter-block xe-counter-block-primary" >
								<div class="xe-upper">
									<div class="xe-icon">
										<i class="fa-star"></i>
									</div>
									<div class="xe-label">
									<?php if($_GET['id']=='login'){ ?>
										<h4><strong><a style="color: white"	 href="<?php echo base_url();?>login/application_login?id=<?=$list->application_id?>"><?=$list->application_id?></a></strong></h4>
									<?php } else{ ?>
										<h4><strong><a style="color: white" href="<?php echo base_url();?>login/registration_application?id=<?=$list->application_id?>"><?=$list->application_id?></a></strong></h4>
									<?php } ?>
									</div>
								</div>
								<div class="xe-lower">
									<div class="border"></div>
								</div>
							</div>
						</div>
						<?php } ?>
						<!--  <div class="col-sm-6" >
							<div class="xe-widget xe-counter-block xe-counter-block-primary" >
								<div class="xe-upper">
									<div class="xe-icon">
										<i class="fa-star"></i>
									</div>
									<div class="xe-label">
									<?php if($_GET['id']=='reg'){ ?>
										<h4><strong><a style="color: white"	 href="<?php echo base_url();?>login/registration_application?app=SMS">SMS</a></strong></h4>
									<?php } else{ ?>
										<h4><strong><a style="color: white" href="<?php echo base_url();?>login/application_login?id=1">SMS</a></strong></h4>
									<?php } ?>
									</div>
								</div>
								<div class="xe-lower">
									<div class="border"></div>
								</div>
							</div>
						</div>
						<div class="col-sm-6" >
							<div class="xe-widget xe-counter-block xe-counter-block-primary" >
								<div class="xe-upper">
									<div class="xe-icon">
										<i class="fa-star"></i>
									</div>
									<div class="xe-label">
									<?php if($_GET['id']=='reg'){ ?>
										<h4><strong><a style="color: white" href="<?php echo base_url();?>login/registration_application?app=junctionERP">Junction ERP</a></strong></h4>
									<?php } else{ ?>
										<h4><strong><a style="color: white" href="<?php echo base_url();?>login/application_login?id=1">Junction ERP</a></strong></h4>
									<?php } ?>
									</div>
								</div>
								<div class="xe-lower">
									<div class="border"></div>
								</div>
							</div>
						</div>-->
					</div>
					<?php  } if(isset($_GET['id']) &&  $_GET['id']=='SMS' || $_GET['id']=='junctionERP' || isset($_GET['status']) || $_GET['id']=='PMS') { ?>
					<?php if(isset($_GET['status']) && $_GET['status']!==''){ ?>
					<div align="center" style="color: red"><span>Your User id and Password Not Correct Please Re Enter</span></div>
					<?php } ?>
					<?php  if($this->session->flashdata('message')) { ?>
						<div class="row-fluid">
							<div class="alert alert-danger">
								<strong><?=$this->session->flashdata('message')?></strong> 
							</div>
						</div>
					<?php } ?>
					<div class="" style="background-color: white;">
			  			<form method="post" role="form"  class="login-form fade-in-effect" action="<?=base_url();?>login/login_function">
						<div class="login-header">
							<img src="<?php echo base_url(); ?>assets/images/junctionerplogo.png" alt="" width="300" />
							<p>Dear user, log in to access your application</p>
						</div>
						<!-- <div class="form-group">
							<select class="form-control selectboxit" id="" name="db_name">
								<option></option>
								<optgroup label="Organizations">
								<?php foreach($list_dbname as $list){?>
									<option value="<?php echo $list->db_name?>"><?php echo $list->db_name; ?></option>
								<?php } ?>
								</optgroup>
							</select>
						</div>  -->
						<div class="form-group">
							<label class="control-label" for="db_name">Data Base Name</label>
							<input type="text" class="form-control" name="db_name" id="db_name" autocomplete="off" />
						</div>
						<div class="form-group">
							<label class="control-label" for="username">User id</label>
							<input type="text" class="form-control" name="username" id="username" autocomplete="off" />
						</div>
						<div class="form-group">
							<label class="control-label" for="passwd">Password</label>
							<input type="password" class="form-control" name="password" id="passwd" autocomplete="off" />
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-theme btn-block text-left">
								<i class="fa-lock"></i>Log In
							</button>
						</div>
						<!-- <div class="login-footer">
								<a href="login/forget_pwd">Forgot your password?</a>
								<br>New User ? <a href="<?php echo base_url(); ?>login"> Sign Up</a>
						</div> -->
					</form>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<footer class="main-footer sticky footer-type-1" style="margin-right: 0px;">
					<div class="footer-inner">
						<!-- Add your copyright text here -->
						<div class="footer-text text-black" >
								&copy; <?php echo date("Y"); ?> 
								<strong >Junction ERP.Copyright<a href="http://junctiontech.in/" target="_blank"> Junction Software Pvt.Ltd	</a></strong> 
								Mobile Number- 8109069226 				
						</div>
							<!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
							<div class="go-up">
								<a href="javascript:;" rel="go-top">
									<i class="fa-angle-up"></i>
								</a>
						  </div>
					</div>
				</footer>
			</div>
		</div>
	</div>
	<div class="modal  custom-width fade" id="modal-6" data-backdrop="static" >
		<div class="modal-dialog" style="width: 75%">
			<div class="modal-content">
			</div>
		</div>
	</div>	
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/xenon-custom.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/TweenMax.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/resizeable.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/joinable.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/xenon-api.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/xenon-toggles.js"></script>
	<!-- select 2 Scripts -->
	<script src="<?php echo base_url(); ?>assets/js/select2/select2.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
	<!-- select 2 Scripts -->
<!-- login container ends -->