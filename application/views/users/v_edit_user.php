<div class="row">
	<div class="col-lg-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<form method="post" action="<?php echo base_url();?>index.php/users/update">
					<div class="panel panel-default">
						<div class="panel-heading">Update User</div>
						<div class="panel-body">
							<input type="text" class="form-control" name="id" value="<?php echo $id;?>" hidden>
							<label>Username:</label>
							<input type="text" class="form-control" name="user_name" value="<?php echo $user_name;?>" required>
							<label>Fullname:</label>
							<input type="text" class="form-control" name="name" maxlength="50" value="<?php echo $name;?>"required>
							<label>Address:</label>
							<input type="text" class="form-control" name="address" value="<?php echo $address;?>"required>
							<label>Email:</label>
							<input type="text" class="form-control" name="email" value="<?php echo $email;?>"required>
							<label>Phone Number:</label>
							<input type="text" class="form-control" name="phone_number" value="<?php echo $phone_number;?>"required>
							<label>Access Level:</label>
							<select name="access_level" class="form-control">
							<?php
								$selected_salesAdmin = "";
								$selected_sales = "";
								$selected_hos = "";
								$selected_drawing = "";
								$selected_packaging = "";
								$selected_bom = "";
								$selected_hoe = "";
								$selected_systemAdmin = "";
								if ($access_level == 1){
									$selected_salesAdmin = "selected";
								}
								if ($access_level == 2){
									$selected_sales = "selected";
								}
								if ($access_level == 3){
									$selected_hos = "selected";
								}
								if ($access_level == 4){
									$selected_drawing = "selected";
								}
								if ($access_level == 5){
									$selected_packaging = "selected";
								}
								if ($access_level == 6){
									$selected_bom = "selected";
								}
								if ($access_level == 7){
									$selected_hoe = "selected";
								}
								if ($access_level == 8){
									$selected_systemAdmin = "selected";
								}
							?>
								<option value="1" <?php echo $selected_salesAdmin; ?>>Sales Admin</option>
								<option value="2" <?php echo $selected_sales; ?>>Sales</option>
								<option value="3" <?php echo $selected_hos; ?>>Head Of Sales</option>
								<option value="4" <?php echo $selected_drawing; ?>>Engineering Drawing Spec</option>
								<option value="5" <?php echo $selected_packaging; ?>>Enginering Packaging</option>
								<option value="6" <?php echo $selected_bom; ?>>Engineering Bill Of Material</option>
								<option value="7" <?php echo $selected_hoe; ?>>Head Of Engineering</option>
								<option value="8" <?php echo $selected_systemAdmin; ?>>System Admin</option>
							</select>
							<br/>
							<button type="submit" class="btn btn-primary">Save</button>
							<a href="<?php echo base_url();?>index.php/users"  class="btn btn-danger">
								Cancel
							</a>
						</div>
					</div>
				</form>			
			</div>
		</div>		
	</div>
</div>
