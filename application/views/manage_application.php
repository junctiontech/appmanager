<div class="col-sm-12">
		<?php  if($this->session->flashdata('category_success')) { ?>
		<div class="row-fluid">
			<div class="alert alert-success">
				<strong><?=$this->session->flashdata('message')?></strong>
			</div>
		</div>
  		<?php } ?>
<?php $userdata=$this->session->userdata('username');if($userdata['username'] && $userdata['username']=='admin'){ ?>
<div align="right">
	<a class="btn btn-success" href="<?=base_url();?>admin_panel/add_application">Add Application</a>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<?php foreach ($app_list as $list){ ?>
					<div class="xe-widget xe-counter-block xe-counter-block-primary" >
					<?php //foreach($org_list as $listing){ ?>
						<div class="xe-upper">
							<div class="xe-icon">
								<i class="fa-star"></i>
							</div>
							<div class="xe-label">
								<h4><strong><a style="color: white"  href=" javascript:;<?php //echo base_url();?>admin_panel/admin_reg_app?app=<? //=$list->application_id;  ?>"><?=$list->application_id;  ?></a></strong></h4>
							</div>
						</div>
						<div class="xe-lower">
							<div class="border"><?php //foreach ($org_list as $listing){ if($listing->application_id==$list->application_id){ echo $list->application_id.' Application Used Recently'; } }?></div>
						</div>
						<?php //} ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php } else{ ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<?php foreach ($app_list as $list){ ?>
					<div class="xe-widget xe-counter-block xe-counter-block-primary" >
					<?php //foreach($org_list as $listing){ ?>
						<div class="xe-upper">
							<div class="xe-icon">
								<i class="fa-star"></i>
							</div>
							<div class="xe-label">
								<h4><strong><a style="color: white" <?php foreach ($org_list as $listing){ if($listing->application_id==$list->application_id){ ?> href="javascript:;" <?php } }  ?> href="<?php echo base_url();?>admin_panel/admin_reg_app?app=<?=$list->application_id;  ?>"><?=$list->application_id;  ?></a></strong></h4>
							</div>
						</div>
						<div class="xe-lower">
							<div class="border"><?php foreach ($org_list as $listing){ if($listing->application_id==$list->application_id){ echo $list->application_id.' Application Used Recently'; } }?></div>
						</div>
						<?php //} ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>