<?php 
    echo $this->session->flashdata("msg");
?>

<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Warehouses</h3>
                    </div>
                    <div class="panel-body">
                        <a href="<?= base_url(); ?>Warehouses/add" class="btn btn-info">ADD</a>
                        <br><br>
                        <table id="dtwarehouse" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Warehouse Code</th>
                                    <th>Warehouse Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listWarehouse as $row): ?>
                                <tr>
                                    <td><?= $row->warehouse_code; ?></td>
                                    <td><?= $row->warehouse_name; ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>index.php/warehouses/edit/<?= $row->warehouse_code; ?>">Edit</a> | 
                                        <a href="<?= base_url(); ?>index.php/warehouses/delete/<?= $row->warehouse_code; ?>">Delete</a>
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

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/dataTables.bootstrap.css">
<script src="<?= base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function()
        {   
            $("#dtwarehouse").DataTable();
        }
    );
</script>