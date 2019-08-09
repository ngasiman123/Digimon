<div class="row">
	<div class="col-lg-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<form method="post" action="<?php echo base_url();?>index.php/users/save">
					<div class="panel panel-default">
						<div class="panel-heading">Add User</div>
						<div class="panel-body">
							<label>Username:</label>
							<input type="text" class="form-control" name="user_name">
							<label>Fullname:</label>
							<input type="text" class="form-control" name="name" maxlength="50">
							<label>Password User:</label>
							<input type="password" class="form-control" name="password" maxlength="20">
							<label>Address:</label>
							<input type="text" class="form-control" name="address">
							<label>Email:</label>
							<input type="text" class="form-control" name="email">
							<label>Phone Number:</label>
							<input type="text" class="form-control" name="phone_number">
							<label>Access Level:</label>
							<select name="access_level" class="form-control">
								<option value="0">--Choose--</option>
								<option value="1">Sales</option>
								<option value="2">Admin</option>
								<option value="3">Head Of Sales</option>
								<option value="4">Assisten Head Of Sales</option>
								<option value="5">Enginering</option>
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
