


        <!-- Begin Page Content -->
        <div class="container-fluid" style="overflow:scroll; height:485px;">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          
          <div class="row">
            <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?> 
            <?= $this->session->flashdata('message'); ?>
                <a href="" class="btn btn-primary mb-3" data-target="#add" data-toggle="modal">Add New Menu</a>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        <?php foreach($menu as $m): ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $m['menu']; ?></td>
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
<div class="modal fade" id="add" role="dialog">
    <div class="modal-dialog">
        
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Menu Data</h3>
                </div>
                <form action="<?= base_url('menu'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" Name="menu" placeholder="Enter Menu Name">
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