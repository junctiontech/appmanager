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
<body class="page-body" style="background-color:black; ">
	<div class="row">
		<?php  if($this->session->flashdata('category_error_login')) { ?>
<div class="row" >
<div class="alert alert-danger" >
<strong><?=$this->session->flashdata('category_error_login')?></strong> <?php echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";?>
</div>
</div>
<?php }?>
		<?php  if($this->session->flashdata('')) { ?>
						<div class="row-fluid"> 
							<div class="alert alert-danger">
								<strong><?=$this->session->flashdata('message')?></strong> 
							</div>
						</div>
					<?php } ?>
		<div class="fadein" style="margin-top:2cm;">
			<div class=" ">
				<img src="images/image1.jpg" height="100%" width="100%">
				<img src="images/image2.png" height="100%" width="100%">
				<img src="images/image3.png" height="100%" width="100%">
			</div>
		</div>	
	</div>
	<div class="row col-md-12" style="margin-left:2.4cm; margin-top:3cm;" >
		<div class="col-md-4">
			<a class="btn btn-icon btn-red" onclick="callAjax();" href="<?php echo base_url();?>admin_panel"><i class="fa-fire">   Account Login</i></a>
		</div>
		<div class="col-md-4">
			<a class="btn btn-icon btn-red" href="<?php echo base_url();?>login/application_login?id=login"><i class="fa-fire">    Application Login</i></a>
		</div>
		<div class="col-md-4">
			<a class="btn btn-icon btn-red" href="<?php echo base_url();?>login/application_login?id=reg"><i class="fa-fire">    Registration For Application</i></a>
		</div>
	</div>
