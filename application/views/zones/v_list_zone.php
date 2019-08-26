<?php 
echo $this->session->flashdata("msg");
?>

<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Zones</h3>
                    </div>
                    <div class="panel-body">
                        <a href="<?= base_url(); ?>zones/add" class="btn btn-info">ADD</a>
                        <br><br>
                        <table id="dtzones" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Zone Code</th>
                                    <th>Zone Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listZone as $row): ?>
                                <tr>
                                    <td><?= $row->zone_code; ?></td>
                                    <td><?= $row->zone_name; ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>zones/edit/<?= $row->zone_code; ?>">Edit</a> | 
                                        <a href="<?= base_url(); ?>zones/delete/<?= $row->zone_code; ?>">Delete</a>
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
            $("#dtzones").DataTable();
        }
    );
</script>