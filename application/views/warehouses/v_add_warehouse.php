<?php
echo $this->session->flashdata("msg");
?>

<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
            <form action="<?= base_url(); ?>index.php/Warehouses/Save" method="POST">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Add Warehouse</h3>
                    </div>
                    <div class="panel-body">
                        <label>Warehouse Code:</label>
                        <input class="form-control" type="text" name="warehouse_code" maxlength="3" required autocomplete="off">
                        <label>Warehouse Name:</label>
                        <input class="form-control" type="text" name="warehouse_name" required autocomplete="off">
                        <br>
                        <button class="btn btn-info" type="submit">Save</button>
                        <a href="<?= base_url();?>index.php/warehouses" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>