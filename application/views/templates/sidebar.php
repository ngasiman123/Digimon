    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
          <img src="<?= base_url('assets/img/ADR.png'); ?>" alt="ADR" width="75px;">
        <div class="sidebar-brand-text mx-3">Monitoring Product</div>
      </a>
      
            <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- QUERY MENU dofactory.com to SQL ref-->
      <?php 
        $role_id = $this->session->userdata('role_id');

        $queryMenu = "SELECT `user_menu`.`id`, `menu` 
                      FROM `user_menu` JOIN `user_access_menu`
                      ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                      WHERE `user_access_menu`.`role_id` = $role_id
                      ORDER BY `user_access_menu`.`menu_id` ASC 
                      ";

        $menus = $this->db->query($queryMenu)->result_array();
                     
      ?>

      <?php foreach ($menus as $menu) : ?>
        <div class="sidebar-heading">
          <?= $menu['menu']; ?>
        </div>

        <!-- TAmpilkan submenu sesuai menu -->
        <?php 
          $menuId = $menu['id'];
          $querySubMenu = "SELECT * 
                            FROM `user_sub_menu` JOIN `user_menu`
                              ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                           WHERE `user_sub_menu`.`menu_id` = $menuId
                             AND `user_sub_menu`.`is_active` = 1
                            
          ";
          $subMenus = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach($subMenus as $subMenu) : ?>
        <?php if($title == $subMenu['title']) : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link" href="<?= base_url($subMenu['url']); ?>">
              <i class="<?= $subMenu['icon']; ?>"></i>
              <span><?= $subMenu['title']; ?></span></a>
            </li>
        <?php endforeach; ?>
        <hr class="sidebar-divider">
      <?php endforeach; ?>


      <!-- logout -->
      <div class="nav-item">
        <a href="<?= base_url('auth/logout'); ?>" class="nav-link"><i class="fas fa-fw fa-sign-out-alt"></i> Logout</a>

      </div>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
