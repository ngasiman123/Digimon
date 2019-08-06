<?php 
	// echo $this->session->flashdata("msg");
?>
<div class="row">
	<div class="col-lg-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Users</h3>
					</div>
					<div class="panel-body">
						<a href="<?php echo base_url();?>index.php/users/add" class="btn btn-info">
							Add
						</a>
						<br /><br/>
						<table id="dtuser" class="table table-bordered">
							<thead>
								<tr>
									<th>Username</th>
									<th>Name</th>
									<th>Address</th>
									<th>Email</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php ;foreach($listuser as $row) :; ?>
								<tr>
									<td><?php echo $row->user_name;?></td>
									<td><?php echo $row->name;?></td>
									<td><?php echo $row->address;?></td>
									<td><?php echo $row->email;?></td>
									<td>
										<a href="#">
											Edit
										</a> |
										<a href="#">
											Delete
										</a>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css">
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
		$("#dtuser").DataTable();
	});
</script>
