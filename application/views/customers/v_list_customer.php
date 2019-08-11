<?php 
echo $this->session->flashdata("msg");
?>

<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="body">
                <div class="panel panel-default">
                    <div class="panel panel-heading">
                        <h3>Customers</h3>
                    </div>
                    <div class="panel panel-body">
                        <a href="<?php echo base_url(); ?>index.php/Customers/add" class="btn btn-info">ADD</a>
                        <br><br>
                        <table id="dtcustomer" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Customer Code</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listCustomer as $row) : ?>
                                <tr>
                                    <td><?= $row->customer_code; ?></td>
                                    <td><?= $row->name; ?></td>
                                    <td><?= $row->address; ?></td>
                                    <td><?= $row->email; ?></td>
                                    <td><?= $row->phone_number; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>index.php/customers/edit<?php echo $row->customer_code; ?>">Edit</a> |
                                        <a href="">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css">
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
		$("#dtcustomer").DataTable();
	});
</script>
