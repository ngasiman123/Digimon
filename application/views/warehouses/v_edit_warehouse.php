<div class="row">
	<div class="col-lg-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="<?php echo base_url();?>index.php/Warehouses/update">
					<div class="panel panel-default">
						<div class="panel-heading">Update Warehouses</div>
						<div class="panel-body">
                            <label>Warehouse Code:</label>
							<input type="text" class="form-control" name="warehouse_code" autocomplete="off" maxlength="3" value="<?php echo $warehouse_code;?>" required>
							<label>Warehouse Name:</label>
							<input type="text" class="form-control" name="warehouse_name" autocomplete="off" value="<?php echo $warehouse_name;?>" required>
							<br/>
							<button type="submit" class="btn btn-primary">Save</button>
							<a href="<?php echo base_url();?>index.php/warehouses"  class="btn btn-danger">
								Cancel
							</a>
						</div>
					</div>
				</form>			
			</div>  
		</div>		
	</div>
</div>
