<div class="row">
	<div class="col-lg-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<form method="post" action="<?php echo base_url();?>index.php/brands/update">
					<div class="panel panel-default">
						<div class="panel-heading">Update Brand</div>
						<div class="panel-body">
                            <label>Brand Code:</label>
							<input type="text" class="form-control" name="brand_code" autocomplete="off" maxlength="3" value="<?php echo $brand_code;?>" disabled>
							<label>Brand Name:</label>
							<input type="text" class="form-control" name="brand_name" autocomplete="off" value="<?php echo $brand_name;?>" required>
							<br/>
							<button type="submit" class="btn btn-primary">Save</button>
							<a href="<?php echo base_url();?>index.php/brands"  class="btn btn-danger">
								Cancel
							</a>
						</div>
					</div>
				</form>			
			</div>
		</div>		
	</div>
</div>
