
<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
            <form action="<?= base_url(); ?>index.php/zones/save" method="POST">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Add Zone</h3>
                    </div>
                    <div class="panel-body">
                        <label>Zone Code:</label>
                        <input class="form-control" type="text" name="zone_code" readonly value="<?php echo $codeZone; ?>">
                        <label>Zone Name:</label>
                        <input class="form-control" type="text" name="zone_name" required autocomplete="off">
                        <br>
                        <button class="btn btn-info" type="submit">Save</button>
                        <a href="<?= base_url();?>index.php/zones" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>