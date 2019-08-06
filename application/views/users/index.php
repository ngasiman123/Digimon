<!-- Begin Page Content -->
        <div class="container-fluid style="overflow:scroll; height:485px;"">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Users Data</h1>
            </div>

            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <button class="btn btn-success" data-toggle="modal" data-target="#modalAddUsers">Add New</button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php $no = 1; foreach ($users as $user) :
                    # code...
                  ?>
                  <tbody>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $user->user_name ?></td>
                      <td><?= $user->name ?></td>
                      <td><?= $user->email ?></td>
                      <td><?= $user->phone_number ?></td>
                      <td>
                        <button class="btn btn-info btn-sm">Detail</button>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                      </td>
                    </tr>
                  </tbody>
                  <?php endforeach; ?>
                </table>
              </div>
            </div>
          </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Add Data modals -->
      <div class="modal fade" id="modalAddUsers" tabindex="-1" role="dialog" aria-labelledby="Add Data Users" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addDataUsers">Add Data Users</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="<?= base_url() ?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="usernm">Username</label>
              <input type="text" class="form-control" name="usernm" id="usernm">
            </div>
            <div class="form-group">
              <label for="name">Full Name</label>
              <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
              <label for="pass">Password</label>
              <input type="text" class="form-control" name="pass" id="pass">
            </div>
            <div class="form-group">
              <label for="zone">Zone Code</label>
              <select class="form-control" name="zone" id="zone">
               <option value="">ZN01</option>
               <option value="">ZN02</option>
              </select>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" id="address">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="text" class="form-control" name="phone" id="phone">
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-success" type="submit">Save</button>
          </div>
          </form>
        </div>
      </div>
    </div>