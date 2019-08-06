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
            <!-- memanggil query join ke table access_menu dan user_menu dengan kondisi menu_header_id = 1 dan role_id sesuai dengan login -->
          <?php
            $role_id = $this->session->userdata('role_id');

            $query_menu = "SELECT user_menu.menu, user_menu.url FROM access_menu 
                            INNER JOIN user_menu on access_menu.menu_id = user_menu.menu_id 
                            WHERE user_menu.menu_header_id = 1 AND access_menu.role_id = $role_id
                            ";
            $menu = $this->db->query($query_menu)->result_array();
            foreach($menu as $m) :   
          ?>
            <a class="collapse-item" href="<?= base_url($m['url']);?>"><?= $m['menu']; ?></a>
          <?php endforeach; ?>
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
          <?php 
            $role_id =$this->session->userdata('role_id');

            $query_menu = "SELECT user_menu.menu, user_menu.url FROM access_menu
                            INNER JOIN user_menu on access_menu.menu_id = user_menu.menu_id
                            WHERE user_menu.menu_header_id = 2 AND access_menu.role_id = $role_id
                            ";
            $menu = $this->db->query($query_menu)->result_array();
            foreach($menu as $m) :
          ?>
          <a class="collapse-item" href="<?= base_url($m['url']); ?>"><?= $m['menu']; ?></a>
          </div>
          <?php endforeach; ?>
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
          <?php 
            $role_id = $this->session->userdata('role_id');

            $query_menu = "SELECT user_menu.menu, user_menu.url FROM access_menu
                            INNER JOIN user_menu on access_menu.menu_id = user_menu.menu_id
                            WHERE user_menu.menu_header_id = 3 AND access_menu.role_id = $role_id
                          ";
            $menu = $this->db->query($query_menu)->result_array();
            foreach ($menu as $m) :
          ?>
            <a class="collapse-item" href="<?= base_url($m['url']); ?>"><?= $m['menu']; ?></a>
          </div>
          <?php endforeach; ?>
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