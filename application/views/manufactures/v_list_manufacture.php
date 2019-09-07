<?php 
    echo $this->session->flashdata("msg");
?>

<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Manufactures</h3>
                    </div>
                    <div class="panel-body">
                    <a href="<?php echo base_url(); ?>Manufactures/add" class="btn btn-info">ADD</a>
                    <br/><br/>
                        <table id="dtmanufacture" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Manufacture Code</th>
                                    <th>Manufacture Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listManufacture as $row): ?>
                                <tr>
                                    <td><?= $row->manufacture_code; ?></td>
                                    <td><?= $row->manufacture_name; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>Manufactures/edit/<?php echo $row->manufacture_code; ?>">Edit</a> | 
                                        <a href="<?php echo base_url(); ?>Manufactures/delete/<?php echo $row->manufacture_code; ?>">Delete</a>
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
		$("#dtmanufacture").DataTable();
	});
</script>
