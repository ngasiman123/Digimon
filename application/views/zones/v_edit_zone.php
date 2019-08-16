<div class="row">
	<div class="col-lg-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="<?php echo base_url();?>index.php/zones/update">
					<div class="panel panel-default">
						<div class="panel-heading">Update Zones</div>
						<div class="panel-body">
							<input type="text" class="form-control" name="zone_code" value="<?php echo $zone_code;?>" hidden>
                            <label>Zone Code:</label>
							<input type="text" class="form-control" value="<?php echo $zone_code;?>" required disabled>
							<label>Zone Name:</label>
							<input type="text" class="form-control" name="zone_name" autocomplete="off" value="<?php echo $zone_name;?>" required>
							<br/>
							<button type="submit" class="btn btn-primary">Save</button>
							<a href="<?php echo base_url();?>index.php/zones"  class="btn btn-danger">
								Cancel
							</a>
						</div>
					</div>
				</form>			
			</div>  
		</div>		
	</div>
</div>
