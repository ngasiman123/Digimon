<?php 
echo $this->session->flashdata("msg");
?>

<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Brands</h3>
                    </div>
                    <div class="panel-body">
                    <a href="<?php echo base_url(); ?>index.php/Brands/add" class="btn btn-info">ADD</a>
                    <br/><br/>
                        <table id="dtbrand" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Brand Code</th>
                                    <th>Brand Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listBrand as $row): ?>
                                <tr>
                                    <td><?= $row->brand_code; ?></td>
                                    <td><?= $row->brand_name; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>index.php/Brands/edit<?php echo $row->brand_code; ?>">Edit</a> | 
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
		$("#dtbrand").DataTable();
	});
</script>
