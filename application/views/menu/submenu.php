


        <!-- Begin Page Content -->
        <div class="container-fluid" style="overflow:scroll; height:485px;">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          
          <div class="row">
            <div class="col-lg">
            <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                 <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            
            <?= $this->session->flashdata('message'); ?>
                <a href="" class="btn btn-primary mb-3" data-target="#addSubMenu" data-toggle="modal">Add New Submenu</a>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Url</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Active</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        <?php foreach($subMenu as $sm): ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $sm['title']; ?></td>
                            <td><?= $sm['menu']; ?></td>
                            <td><?= $sm['url']; ?></td>
                            <td><?= $sm['icon']; ?></td>
                            <td><?= $sm['is_active']; ?></td>
                            <td>
                            <a href="" class="badge badge-success">Edit</a>
                            <a href="" class="badge badge-danger">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- modal add -->
<div class="modal fade" id="addSubMenu" role="dialog">
    <div class="modal-dialog">
        
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Submenu Data</h3>
                </div>
                <form action="<?= base_url('menu/submenu'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" Name="title" placeholder="Enter Submenu Title Name">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="" disabled selected>- Select Menu -</option>
                            <?php foreach($menu as $m): ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" Name="url" placeholder="Enter Submenu url Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" Name="icon" placeholder="Enter Submenu icon Name">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" checked>
                            <label for="is_active" class="form-check-label">Active ?</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
    </div>
</div>