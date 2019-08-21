<nav class="sidebar sidebar-offcanvas" id="sidebar">

	<ul class="nav">
		<li class="nav-item">
		<a class="nav-link" href="<?php echo base_url();?>index.php/dashboard">
			<i class="menu-icon mdi mdi-television"></i>
			<span class="menu-title">Request Monitoring</span>
		</a>
		</li>

		<?php $sessionAccess = $this->session->userdata('access'); if ($sessionAccess['Report'][0] === 1) { ?>
		<li class="nav-item">
		<a class="nav-link" data-toggle="collapse" href="#master" aria-expanded="false" aria-controls="ui-basic">
			<i class="menu-icon mdi mdi-content-copy"></i>
			<span class="menu-title">Masters</span>
			<i class="menu-arrow"></i>
		</a>
		<div class="collapse" id="master">
			<ul class="nav flex-column sub-menu">
			<?php $sessionAccess = $this->session->userdata('access'); for ($i=0; $i < count($sessionAccess['Masters']) ; $i++) { ?>
				<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url();?>index.php/<?= $sessionAccess['Masters'][$i]?>"><?= $sessionAccess['Masters'][$i]?></a>
				</li>
			<?php } ?>
			
			</ul>
		</div>
		</li>
		<?php } ?>
		<li class="nav-item">
		<a class="nav-link" data-toggle="collapse" href="#transactions">
			<i class="menu-icon mdi mdi-backup-restore"></i>
						<span class="menu-title">Transactions</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="transactions">
			<ul class="nav flex-column sub-menu">
			<?php $sessionAccess = $this->session->userdata('access'); for ($i=0; $i < count($sessionAccess['Transaction']) ; $i++) { ?>
				<li class="nav-item">
				<a class="nav-link" href="<?= base_url();?>index.php/<?= $sessionAccess['Transaction'][$i]?>"><?= $sessionAccess['Transaction'][$i]?></a>
				</li>
			<?php } ?>
			</ul>
		</div>
		</li>
		
		
		<?php $sessionAccess = $this->session->userdata('access'); if ($sessionAccess['Report'][0] === 1) { ?>
		<li class="nav-item">
			<a class="nav-link" href="#">
			<i class="menu-icon mdi mdi-chart-line"></i>
			<span class="menu-title">Reports</span>
			<i class="menu-arrow"></i>
		</a>
		</li>
		<?php } ?>
		<li class="nav-item">
		<a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
			<span>Logout</span>
		</a>
		</li>
	</ul>
</nav>

<div id="logoutModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">Information
				</h3>
				<button class="close" data-dismiss="modal" type="close">&times;</button>
			</div>
			<div class="modal-body">
				<h5>Are you sure logout ?</h5>
			</div>
			<div class="modal-footer">
				<a href="<?php echo base_url();?>index.php/auth/logout" class="btn btn-success">Logout</a>
				<button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
