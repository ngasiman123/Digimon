<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
          <img src="<?= base_url('assets/img/ADR.png'); ?>" alt="ADR" width="75px;">
        <div class="sidebar-brand-text mx-3">Digital Monitoring</div>
      </a>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Master Data
      </div>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw "></i>
          <span>Master Data List :</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url();?>users">Users</a>
            <a class="collapse-item" href="<?php echo base_url();?>manufactures">Manufactures</a>
            <a class="collapse-item" href="<?php echo base_url();?>warehouses">Warehouses</a>
            <a class="collapse-item" href="<?php echo base_url();?>brands">Brands</a>
            <a class="collapse-item" href="<?php echo base_url();?>customers">Customers</a>
            <a class="collapse-item" href="<?php echo base_url();?>zones">Zones</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Transaction
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw"></i>
          <span>Transaction List :</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="#">Request Master Filter</a>
            <a class="collapse-item" href="#">Sales Approval</a>
            <a class="collapse-item" href="#">Dept Head Approval</a>
            <a class="collapse-item" href="#">Status Drawing Spec</a>
            <a class="collapse-item" href="#">Status Packaging</a>
            <a class="collapse-item" href="#">Realitation Master Filter</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Information
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInfo" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw"></i>
          <span>Information List :</span>
        </a>
        <div id="collapseInfo" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="#">Monitoring Progress</a>
            <a class="collapse-item" href="#">Pending Request Reports</a>
            <a class="collapse-item" href="#">Finish Request Reports</a>
          </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- logout -->
      <div class="nav-item">
        <a href="#" class="nav-link"><i class="fas fa-fw fa-sign-out-alt"></i> Logout</a>

      </div>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>