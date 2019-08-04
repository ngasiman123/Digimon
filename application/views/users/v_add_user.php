<div class="row">
	<div class="col-lg-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<form method="post" action="#">
					<div class="panel panel-default">
						<div class="panel-heading">Add User</div>
						<div class="panel-body">
							<label>Username:</label>
							<input type="text" class="form-control" name="usr_name" placeholder="username">
							<label>Fullname:</label>
							<input type="text" class="form-control" name="nm_usr" pattern="[A-Za-z]{3,}" title="hanya boleh huruf" maxlength="50">
							<label>Password User:</label>
							<input type="password" class="form-control" name="pass_usr" maxlength="20">
							<label>Address:</label>
							<input type="text" class="form-control" name="address_usr">
							<label>Email:</label>
							<input type="text" class="form-control" name="email_usr">
							<label>Phone Number:</label>
							<input type="text" class="form-control" name="phone_usr">
							<label>Access Level:</label>
							<select name="tipe_usr" class="form-control">
								<option value="">--Choose--</option>
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
