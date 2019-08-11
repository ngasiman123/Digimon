<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
		<li class="nav-item">
		<a class="nav-link" href="<?php echo base_url();?>index.php/dashboard">
			<i class="menu-icon mdi mdi-television"></i>
			<span class="menu-title">Request Monitoring</span>
		</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" data-toggle="collapse" href="#master" aria-expanded="false" aria-controls="ui-basic">
			<i class="menu-icon mdi mdi-content-copy"></i>
			<span class="menu-title">Masters</span>
			<i class="menu-arrow"></i>
		</a>
		<div class="collapse" id="master">
			<ul class="nav flex-column sub-menu">
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url();?>index.php/users">User</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url();?>index.php/customers">Customer</a>
							</li>
							<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url();?>index.php/brands">Brand</a>
							</li>
							<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url();?>index.php/warehouses">Warehouse</a>
							</li>
							<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url();?>index.php/manufactures">Manufacture</a>
			</li>
			</ul>
		</div>
		</li>
		<li class="nav-item">
		<a class="nav-link" data-toggle="collapse" href="#transactions">
			<i class="menu-icon mdi mdi-backup-restore"></i>
						<span class="menu-title">Transactions</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="transactions">
			<ul class="nav flex-column sub-menu">
			<li class="nav-item">
				<a class="nav-link" href="#">Item Request</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Approve Item Request</a>
							</li>
							<li class="nav-item">
				<a class="nav-link" href="#">Drawing Spec</a>
							</li>
							<li class="nav-item">
				<a class="nav-link" href="#">Packaging</a>
							</li>
							<li class="nav-item">
				<a class="nav-link" href="#">Bill Of Material</a>
							</li>
							</li>
							<li class="nav-item">
				<a class="nav-link" href="#">Receive Master</a>
							</li>
			</ul>
		</div>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="#">
			<i class="menu-icon mdi mdi-chart-line"></i>
			<span class="menu-title">Reports</span>
					</a>
		</li>
	</ul>
</nav>
