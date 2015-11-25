<?php 
if(!($this->session->userdata('userdata'))==''){ echo $this->session->userdata('userdata'); die; }?>
<!-- login page starts  -->
<!-- added by palak on 20thjune -->
<body class="page-body login-page" style="background-color: #7d3669; padding-top:2cm;">
	<div style="position: absolute; top:0;left:0;" >
		<a class="btn btn-icon btn-green" style="color: white; font-size:1.1em;" href="<?php echo base_url();?>login"><i class="fa-fire">  Home</i></a>
	</div>
	<div style="position: absolute; top:0;right:0;" >
		<a class="btn btn-icon btn-green" style="color: white; font-size:1.1em;" onclick="callAjax();" data-toggle="modal" data-target="#modal-8" href="<?php echo base_url();?>admin_panel"><i class="fa-fire">  Account Login</i></a>
		<a class="btn btn-icon btn-green" style="color: white; font-size:1.1em;"  href="<?php echo base_url();?>login/application_login"><i class="fa-fire">  Application Login</i></a>	
	</div>
<div class="page-loading-overlay">
	<div class="loader-2"></div>
</div>
<div class="page-body login-page" style="background-color: white; padding-top:;">
	<div class="row"align="center" style="color:black; padding-top:2cm">
		<p align="center"><strong><h2>Choose Your Application</h2></strong><p>
		<?php foreach ($app_list as $list){ ?>
						<div class="col-sm-3" >
							<div class="xe-widget xe-counter-block xe-counter-block-primary" >
								<div class="xe-upper">
									<div class="xe-icon">
										<i class="fa-star"></i>
									</div>
									<div class="xe-label">
										<h4><strong><a style="color: white" href="<?php echo base_url();?>login/registration_application?id=<?=$list->application_id?>"><?php echo str_replace("_", " ", $list->application_id)?></a></strong></h4>
									</div>
								</div>
								<div class="xe-lower">
									<div class="border"></div>
								</div>
							</div>
						</div>
						<?php } ?><br>
						<a href="javascript:;" ><img src="images/website.png" height="10%" width="10%" alt="sometext" style="margin:20px"></a>
						<a href="javascript:;" ><img src="images/pms.png" height="10%" width="10%"  style="margin:20px"></a>
						<a href="javascript:;" ><img src="images/sms.png" height="10%" width="10%"  style="margin:20px"></a>
	</div>
</div>
	