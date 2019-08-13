<div class="row">
	<div class="col-lg-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<form method="post" action="<?php echo base_url();?>index.php/manufactures/update">
					<div class="panel panel-default">
						<div class="panel-heading">Update Manufacutre</div>
						<div class="panel-body">
							<label>manufacture Code: <?php echo $manufacture_code;?></label>
							<input type="text" class="form-control" name="manufacture_code" value="<?php echo $manufacture_code;?>" required>
							<label>manufacture name:</label>
							<input type="text" class="form-control" name="manufacture_name" autocomplete="off" maxlength="50" value="<?php echo $manufacture_name;?>" required>
							<br/>
							<button type="submit" class="btn btn-primary">Save</button>
							<a href="<?php echo base_url();?>index.php/manufactures"  class="btn btn-danger">
								Cancel
							</a>
						</div>
					</div>
				</form>			
			</div>
		</div>		
	</div>
</div>
