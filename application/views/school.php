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
<body class="page-body" style="background-color:white; ">
	<noscript>
		<img src="images/error.png" height="150px" width="160px" style="margin-left:200px">
			  <h2><font color="white">Your Browser Have Dissabled Java Script Please Enable With Help Of Browser Setting....</font></h2> 
			  <style>div { color:white;display:none; }</style>
	</noscript>
	<div class="page-loading-overlay">
		<div class=""></div>
	</div>
	<div style="position: absolute; top:0;left:0;">
		<a class="btn btn-icon btn-green" style="color: white; font-size:1.1em;" href="<?php echo base_url();?>login/school"><i class="fa-fire">  Home</i></a>
	</div>
	<div style="position: absolute; top:0;right:0;" >
		<a class="btn btn-icon btn-green" style="color: white; font-size:1.1em;" onclick="callAjax();" data-toggle="modal" data-target="#modal-8" href="<?php echo base_url();?>login/reset_password_view"><i class="fa-fire">  Reset Password</i></a>
		<a class="btn btn-icon btn-green" style="color: white; font-size:1.1em;" onclick="callAjax();" data-toggle="modal" data-target="#modal-8" href="<?php echo base_url();?>admin_panel"><i class="fa-fire">  Account Login</i></a>
		<a class="btn btn-icon btn-green" style="color: white; font-size:1.1em;"  data-toggle="modal" data-target="#modal-8" href="<?php echo base_url();?>login/application_login"><i class="fa-fire">  Application Login</i></a>	
	</div>
	<div class="row ">
			<div class="container">
		<?php  if($this->session->flashdata('category_error_login')) { ?>
			<div class="row-fluid"> 
				<div class="alert alert-danger">
					<strong><?=$this->session->flashdata('category_error_login')?></strong> 
				</div>
			</div>
		<?php } if(!empty($schooldetail)){ 
		
			foreach($schooldetail as $detail)?>
			<div class="col-md-12" style="top:100px">
			<h2 class="text-center" style ="font-family:Edwardian Script ITC; font-size:58px; color:#339559"><b><?=isset ($detail->organization_name) ?$detail->organization_name:''?></b></H2>			
			</div>
			
			<?php }?>
			<div class="col-md-12" style="top:100px">
				<?php if(!empty($studentshow->Image)){?>
			<img src="<?=base_url();?>/uploaded_images/<?=isset($studentshow->Image) ?$studentshow->Image:''?>" class="avatar img-circle img-thumbnail" style="height:200px; width:200px; margin-top:-100px;"  alt="user image">
				<?php } else {?>
				<img src="<?=base_url();?>/assets/images/user-2.png" style="height:200px; width:200px">
				<?php } ?>
			</div>
			<div class="col-md-12" style="top:100px">
			<h2 class="text-center" style ="font-family:Edwardian Script ITC; font-size:58px; color:#339559"><b> Virtue alone Enobles<b></h2>
			</div>
		</div>	
		
	</div>
	
</div>	
</body>

