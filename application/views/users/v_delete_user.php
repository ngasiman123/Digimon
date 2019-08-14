<div class="row">
	<div class="col-lg-6 grid-margin">
		<div class="card">
			<div class="card-body">
				<form method="post" action="<?php echo base_url();?>index.php/users/deleteProcess">
					<div class="panel panel-default">
						<div class="panel-heading"> <h3 style="color:red;"><strong> Warning</strong></h3></div>
						<div class="panel-body">
							<input type="text" class="form-control" name="id" value="<?php echo $id;?>" hidden>
							<label>Are you sure delete this data Username ? </label>
                            <br><br> <blockquote style="background-color:silver;"><?php echo $user_name;?></blockquote> 
							<input type="text" class="form-control" name="user_name" value="<?php echo $user_name;?>" hidden>
							<input type="text" class="form-control" name="name" maxlength="50" value="<?php echo $name;?>" hidden>
							<input type="text" class="form-control" name="address" value="<?php echo $address;?>" hidden>
							<input type="text" class="form-control" name="email" value="<?php echo $email;?>" hidden>
							<input type="text" class="form-control" name="phone_number" value="<?php echo $phone_number;?>" hidden>
                            <input type="text" class="form-control" name="access_level" value="<?php echo $access_level;?>" hidden>
							<br/>
							<button type="submit" class="btn btn-success">Delete</button>
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
