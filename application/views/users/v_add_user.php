<div class="row">
	<div class="col-lg-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<form method="post" action="<?php echo base_url();?>index.php/users/save">
					<div class="panel panel-default">
						<div class="panel-heading">Add User</div>
						<div class="panel-body">
							<label id=>Username:</label>
							<input type="text" class="form-control" name="user_name" required autocomplete="off">
							<label>Fullname:</label>
							<input type="text" class="form-control" name="name" maxlength="50" required autocomplete="off">
							<label>Password User:</label>
							<input type="password" class="form-control" name="password" maxlength="20" required>
							<label>Address:</label>
							<input type="text" class="form-control" name="address" required autocomplete="off">
							<label>Email:</label>
							<input type="text" class="form-control" name="email" required autocomplete="off">
							<label>Phone Number:</label>
							<input type="text" class="form-control" name="phone_number" required autocomplete="off">
							<label>Access Level:</label>
							<select id="access_level" name="access_level" class="form-control" onchange="level();" required>
								<option value="0">--Choose--</option>
								<option value="1">Sales Admin</option>
								<option value="2">Sales</option>
								<option value="3">Head Of Sales</option>
								<option value="4">Engineering Drawing Spec</option>
								<option value="5">Enginering Packaging</option>
								<option value="6">Enginering Bill Of Material</option>
								<option value="7">Head Of Enginering</option>
								<option value="8">System Admin</option>
							</select>
							<div id="zone_code">
								<label>Zone Code (Sales Only)</label>
								<select name="zone_code" class="form-control">
								<option value="0" selected disabled>--Choose--</option>
									<?php foreach($listZone as $row){ ?>
									<option><?= $row['zone_code']; ?></option>
									<?php } ?>
								</select>
							</div>
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
<script>
	$(document).ready(function(){
		$("#zone_code").hide();
	});

	function level(){
		var access=$("#access_level").val();
		if(access==2){
			$("#zone_code").show();
		}else{
			$("#zone_code").hide();
		}
	}

</script>