        <!-- Begin Page Content -->
        <div class="container-fluid style="overflow:scroll; height:485px;"">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Customers Data</h1>
            </div>

            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="#" class="btn btn-success btn-sm">Add New</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Customer Code</th>
                      <th>Customer Name</th>
                      <th>Customer Zone</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php $no = 1; foreach ($customers as $cust):?>
                  <tbody>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $cust->customer_code ?></td>
                      <td><?= $cust->name ?></td>
                      <td><?= $cust->zona_code ?></td>
                      <td><?= $cust->email ?></td>
                      <td><?= $cust->phone_number ?></td>
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

    