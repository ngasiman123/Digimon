<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="#">
          <img src="<?php echo base_url();?>/assets/images/company/ss.jpg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="#">
          <img src="<?php echo base_url();?>/assets/images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text"><?= $this->session->userdata('user'); ?></span>
              <img class="img-xs rounded-circle" src="<?php echo base_url();?>/assets/images/faces/no-avatar.png" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
             <a class="dropdown-item" data-toggle="modal" data-target="#changePassword">
                Change Password
              </a>
              <a class="dropdown-item " href="#" data-toggle="modal" data-target="#logoutModal">
                Log Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>

    <div id="logoutModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header modal-primary">
            <h3 class="modal-title">Information
            </h3>
            <button class="close" data-dismiss="modal" type="close">&times;</button>
          </div>
          <div class="modal-body">
            <h5>Are you sure logout ?</h5>
          </div>
          <div class="modal-footer">
            <a href="<?php echo base_url();?>auth/logout" class="btn btn-success">Logout</a>
            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>

    <div id="changePassword" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header modal-primary">
            <h3 class="modal-title">Change Password
            </h3>
            <button class="close" data-dismiss="modal" type="close">&times;</button>
          </div>
          <form action="<?php echo base_url(); ?>auth/updatePassword" method="POST">
          <div class="modal-body">
            <h5></h5>
            
              <!-- <label class="h5">Old Password</label>
              <input type="password" name="old_password" class="form-control"> -->
              <label class="h5">New Password</label>
              <input type="password" name="new_password" class="form-control">
              <div class="hidden">
                <label class="h5">id</label>
              <input type="text" name="id" value="<?= $this->session->userdata('id'); ?>" class="form-control">
              </div>
            
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <
