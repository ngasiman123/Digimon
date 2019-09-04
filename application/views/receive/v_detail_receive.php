<div class="row">
	<div class="col-lg-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<form method="post" action="<?php echo base_url();?>Receive/confirm" >
					<div class="panel panel-default">
						<div class="panel-heading">Receive</div>
						<div class="panel-body">
							<input type="hidden" name="bom_id" value="<?= $bom_id ?>" >
							<label>Customer No Info</label>
							<input type="text" class="form-control" name="cusomter_no_info" value="<?= $res->customer_info_no ?>" readonly>
							<label>Sakura No Info</label>
							<input type="text" class="form-control" name="sakura_version_no" value="<?= $res->sakura_version_no ?>" readonly>
							<label>Sakura No Version</label>
							<input type="text" class="form-control" name="sakura_version_no" value="<?= $res->sakura_version_no ?>" readonly>
							<label>Brand</label>
							<input type="text" name="brand" value="<?= $res->brand_code ?>" class="form-control" readonly>
							<label>Movex Filter Master</label>
							<input type="text" name="brand" value="<?= $res->movex_filter_master ?>" class="form-control" readonly>
							<label>Sap Filter Master</label>
							<input type="text" name="brand" value="<?= $res->sap_filter_master ?>" class="form-control" readonly>
							<br/>
							<button type="submit" class="btn btn-success">Confirm</button>
							<a href="<?php echo base_url();?>Packaging"  class="btn btn-danger">
								Cancel
							</a>
						</div>
					</div>
				</form>			
			</div>
		</div>		
	</div>
</div>