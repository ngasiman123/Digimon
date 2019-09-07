<div class="row">
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
		<div class="card card-statistics">
		<div class="card-body">
			<div class="clearfix">
			<div class="float-left">
				<i class="mdi mdi-cube text-danger icon-lg"></i>
			</div>
			<div class="float-right">
				<p class="mb-0 text-right">Item Request</p>
				<div class="fluid-container">
				<h3 class="font-weight-medium text-right mb-0"><?= count($itemRequest); ?></h3>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
		<div class="card card-statistics">
		<div class="card-body">
			<div class="clearfix">
			<div class="float-left">
				<i class="mdi mdi-receipt text-warning icon-lg"></i>
			</div>
			<div class="float-right">
				<p class="mb-0 text-right">Item Request Approve</p>
				<div class="fluid-container">
				<h3 class="font-weight-medium text-right mb-0"><?= count($itemApprove); ?></h3>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
		<div class="card card-statistics">
		<div class="card-body">
			<div class="clearfix">
			<div class="float-left">
				<i class="mdi mdi-poll-box text-success icon-lg"></i>
			</div>
			<div class="float-right">
				<p class="mb-0 text-right">Drawing Spec</p>
				<div class="fluid-container">
				<h3 class="font-weight-medium text-right mb-0"><?= count($itemDrawing) ?></h3>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
		<div class="card card-statistics">
		<div class="card-body">
			<div class="clearfix">
			<div class="float-left">
				<i class="mdi mdi-account-location text-info icon-lg"></i>
			</div>
			<div class="float-right">
				<p class="mb-0 text-right">Packaging</p>
				<div class="fluid-container">
				<h3 class="font-weight-medium text-right mb-0"><?= count($itemPackaging) ?></h3>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Item Request</h4>
				<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
					<tr>
						<th>
						    Request No
						</th>
						<th>
						    Customer Info No
						</th>
						<th>
						    Customer Name
						</th>
						<th>
						    Created By
						</th>
						<th>
						    Request Status
						</th>
						<th>
						    Drawing Spec Status
						</th>
						<th>
					        Packaging Status
						</th>
						<th>
						    BOM Status
						</th>
						<th>
						    Sales Name
						</th>
					</tr>
					</thead>
					<tbody>
                    <?php foreach ($listDashboard as $row) { ?>
					<tr>
						<td><?= $row->request_no; ?></td>
						<td><?= $row->customer_info_no; ?></td>
						<td><?= $row->customer_name; ?></td>
						<td><?= $row->created_by; ?></td>
						<td><?= $row->request_status; ?></td>
						<td><?= $row->drawing_spec_status; ?></td>
						<td><?= $row->packaging_status; ?></td>
						<td><?= $row->bom_status; ?></td>
						<td><?= $row->receive_status; ?></td>
					</tr>
                    <?php } ?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
