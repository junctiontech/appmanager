<script type="text/javascript" src="<?php echo base_url();?>js/common_function.js"></script>
<?php $userdata = $this->session->userdata ('username'); ?>
<div align="right">
<input type="text" name="search" value="" onkeyup="search(this.value)">
</div>
<div class="row">
	<form>
		<table border="2px" witdh="100%" class="table table-small-font table-bordered table-striped" >
		<tr>
			<th>Serial Number</th>
			<th><a href="<?=base_url();?>admin_panel/sorting?id=organization_name">Organization Name</a></th>
			<th>Name</th>
			<th>Application Name</th>
			<th>Data Base Name</th>
			<th>User Name</th>
			<!--  <th colspan="2" >action</th> -->
		</tr>
		<?php $i=1; foreach($org_list as $list){ ?>
						<tr>
								<td><?=$i;?></td>
								<td><?php echo $list->organization_name;?></td>
								<td><?php echo $list->name;?></td>
								<td><?php echo $list->Username;?></td>
								<td><?php echo $list->db_name;?></td>
								<td><?php echo $list->created_on;?></td>
								<!-- <td><a href="<?php echo base_url(); ?>master/add_organization/<?=$list->registration_id; ?>"
									class="btn btn-secondary btn-sm btn-icon icon-left"> Edit </a>
									<a href="<?php echo base_url(); ?>master/delete_organization/<?=$list->registration_id; ?>"
									onClick="return confirm('Are you sure to delete this organization ? This will delete all the related records on this organization as well.')"
									class="btn btn-danger btn-sm btn-icon icon-left"> Delete 
									</a>
								</td> -->
							</tr>
							<?php $i++; } ?>
		
		</table>
	</form>
</div>



<!-- manage organization page added by palak on 20 th june -->
<!-- manage organization body starts -->
<!-- <div class="page-title">
	<div class="title-env">
		<h1 class="title">Organization Report</h1>
		<p class="description">Manage Your Report</p>
	</div>
	<div class="breadcrumb-env">
		<ol class="breadcrumb bc-1">
			<li><a href="javascript:;"><i class="fa-home"></i>Home</a></li>
			<li class="active"><strong>Manage Report</strong></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<?php  if($this->session->flashdata('category_success')) { ?>
		<div class="row-fluid">
			<div class="alert alert-success">
				<strong><?=$this->session->flashdata('message')?></strong>
			</div>
		</div>
  		<?php } ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?php if($userdata['username']=='admin'){ echo 'Hello Admin'; }else { echo $org_list[0]->organization_name; }?></h3>
				<div class="panel-options">
					<!-- <a href="<?php echo base_url(); ?>master/add_organization">
					 <button class="btn btn-theme btn-info btn-icon btn-sm"><i class="fa-plus"></i> <span>Add Organization</span>
					</button></a>-->
				<!-- </div>
			</div>
			<div class="panel-body">
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#example-1").dataTable({
							aLengthMenu: [
								[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
							]
						});
					});
				</script>
				<div class="table-responsive" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
					<table id="example-1" cellspacing="0" class="table table-small-font table-bordered table-striped">
						<thead>
							<tr>
								<th>S. no</th>
								<th>Application Name</th>
								<th>User Name</th>
								<th>User Id</th>
								<th>Database Name</th>
								<th>Application Registered Date</th>
								<?php if($userdata['username']=='admin'){ ?> <th>Data Base Size</th> <?php } ?>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>S. no.</th>
								<th>Application Name</th>
								<th>User Name</th>
								<th>User Id</th>
								<th>Database Name</th>
								<th>Application Registered Date</th>
								<?php if($userdata['username']=='admin'){ ?> <th>Data Base Size</th> <?php } ?>
								<th>Action</th>
							</tr>
						</tfoot>
						<?php $i=1; foreach($org_list as $list){ ?>
						<tbody>
							<tr>
								<td><?=$i;?></td>
								<td><?php echo $list->app_name;?></td>
								<td><?php echo $list->name;?></td>
								<td><?php echo $list->Username;?></td>
								<td><?php echo $list->db_name;?></td>
								<td><?php echo $list->created_on;?></td>
								<?php if($userdata['username']=='admin'){ ?> <td><?php echo $_GET['size']; ?></td> <?php } ?>
								<td><a href="<?php echo base_url(); ?>master/add_organization/<?=$list->reg_app_id; ?>"
									class="btn btn-secondary btn-sm btn-icon icon-left"> Edit </a>
									<a href="<?php echo base_url(); ?>master/delete_organization/<?=$list->reg_app_id; ?>"
									onClick="return confirm('Are you sure to delete this organization ? This will delete all the related records on this organization as well.')"
									class="btn btn-danger btn-sm btn-icon icon-left"> Delete 
									</a>
								</td>
							</tr>
							<?php $i++; } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div> -->
<script type="text/javascript">
function search(val)
{
	alert(val); 
}
</script>