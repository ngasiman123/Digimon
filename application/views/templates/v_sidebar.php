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
			<?php $sessionAccess = $this->session->userdata('access'); for ($i=0; $i < count($sessionAccess) ; $i++) { ?>
				<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url();?>index.php/<?= $sessionAccess['Masters'][$i]?>"><?= $sessionAccess['Masters'][$i]?></a>
				</li>
			<?php } ?>
			
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
				<a class="nav-link" href="<?= base_url(); ?>index.php/ItemReq">Item Request</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url(); ?>index.php/Approves">Approve Item Request</a>
							</li>
							<li class="nav-item">
				<a class="nav-link" href="<?= base_url(); ?>index.php/DrawingSpec">Drawing Spec</a>
							</li>
							<li class="nav-item">
				<a class="nav-link" href="<?= base_url(); ?>index.php/Packaging">Packaging</a>
							</li>
							<li class="nav-item">
				<a class="nav-link" href="<?= base_url(); ?>index.php/BOM">Bill Of Material</a>
							</li>
							</li>
							<li class="nav-item">
				<a class="nav-link" href="<?= base_url(); ?>index.php/ReceiveMaster">Receive Master</a>
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
