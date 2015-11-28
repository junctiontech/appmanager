<!-- Dashboard page Start by Ankit 09 oct -->
<head>
	<style>
		body {font-family:Arial, Helvetica, sans-serif; font-size:12px;}
		 
		.fadein { 
		position:relative; height:300px; width:1000px; margin:0 auto;
		background: url("slideshow-bg.png") repeat-x scroll left top transparent;
		padding: 20px;
		 }
		.fadein img { position:absolute; left:10px; top:10px; }
	</style>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script>
		$(function(){
			$('.fadein img:gt(-2)').hide();
			setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 1500);
		});
	</script>
</head>
<body class="page-body" style="background-color:#7d3669; ">
	<noscript>
		<img src="images/error.png" height="150px" width="160px" style="margin-left:200px">
			  <h2><font color="white">Your Browser Have Dissabled Java Script Please Enable With Help Of Browser Setting....</font></h2> 
			  <style>div { color:white;display:none; }</style>
	</noscript>
	<div class="page-loading-overlay">
		<div class=""></div>
	</div>
	<div style="position: absolute; top:0;left:0;">
		<a class="btn btn-icon btn-green" style="color: white; font-size:1.1em;" href="<?php echo base_url();?>login"><i class="fa-fire">  Home</i></a>
	</div>
	<div style="position: absolute; top:0;right:0;" >
		<!--  <a class="btn btn-icon btn-green" style="color: white; font-size:1.1em;" onclick="callAjax();" data-toggle="modal" data-target="#modal-8" href="<?php echo base_url();?>login/reset_password_view"><i class="fa-fire">  Reset Password</i></a> -->
		<a class="btn btn-icon btn-green" style="color: white; font-size:1.1em;" onclick="callAjax();" data-toggle="modal" data-target="#modal-8" href="<?php echo base_url();?>admin_panel"><i class="fa-fire">  Account Login</i></a>
		<a class="btn btn-icon btn-green" style="color: white; font-size:1.1em;"  data-toggle="modal" data-target="#modal-8" href="<?php echo base_url();?>login/application_login"><i class="fa-fire">  Application Login</i></a>	
	</div>
	<div class="row ">
		<?php  if($this->session->flashdata('category_error_login')) { ?>
			<div class="row-fluid"> 
				<div class="alert alert-danger">
					<strong><?=$this->session->flashdata('category_error_login')?></strong> 
				</div>
			</div>
		<?php } ?> 
		<div class=" col-md-12"" style="margin-top:2cm;">
			<div class="col-md-4" style="color:white">
				<p align="center"><strong><h2>If You Want Use Our Application</h2></strong><br>&nbsp;<h4>Please Click Here</h4> </p>
				<a href="<?php echo base_url();?>login/application_list"><img src="images/reg_button.gif" height="50px" width="200px"></i></a>
			</div>
			<div class=" col-md-8">
				<img src="images/dashboard.png" height="100%" width="80%">
				<!--   <img src="images/image1.jpg" height="100%" width="80%">
				<img src="images/image2.png" height="100%" width="100%">
				<img src="images/image3.png" height="100%" width="100%"> -->
			</div>
			
		</div>	
		
	</div>
	<!--  <div class="row col-md-12" style="margin-left:2.4cm; margin-top:3cm;" >
		<div class="col-md-4">
			<a class="btn btn-icon btn-red" onclick="callAjax();" href="<?php echo base_url();?>admin_panel"><i class="fa-fire">   Account Login</i></a>
		</div>
		<div class="col-md-4">
			<a class="btn btn-icon btn-red" href="<?php echo base_url();?>login/application_login?id=login"><i class="fa-fire">    Application Login</i></a>
		</div>
		<div class="col-md-4">
			<a class="btn btn-icon btn-red" href="<?php echo base_url();?>login/application_login?id=reg"><i class="fa-fire">    Registration For Application</i></a>
		</div>
	</div>-->
	<div class="page-body" style="background-color:white; margin-top:5cm; height:cm">
				<p align="center" style="color:gray"><strong><h3>Our Application Are</h3></strong></p>
				<div align="center">
					<img src="images/CRM.jpg" height="50px" width="60px" style="margin:20px">
					<img src="images/ERP.PNG" height="50px" width="60px" style="margin:20px">
					<img src="images/app.jpg" height="50px" width="60px" style="margin:20px">
					<img src="images/SMS_logo.png" height="50px" width="60px" style="margin:20px">
				</div>
	</div>
</div>