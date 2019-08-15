<div class="row">
    <div class="col-lg-6 grid-margin">
        <div class="card">
            <div class="card-body">
            <form action="<?= base_url(); ?>index.php/manufactures/deleteControl" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 style="color:red;"><b>Warning !</b></h3></div>
                    <div class="panel-body">
                        <label>Are you sure delete this data manufacture ?</label>
                        <input type="text" name="manufacture_code" value="<?= $manufacture_code; ?>" hidden>
                        <input type="text" name="manufacture_name" value="<?= $manufacture_name; ?>" hidden>
                        <blockquote>Manufacture Code: <?= $manufacture_code; ?></blockquote>
                        <blockquote>manufacture Name: <?= $manufacture_name; ?></blockquote>
                        <br>
                        <button class="btn btn-success" type="submit">Delete</button>
                        <a href="<?= base_url(); ?>index.php/warehouses" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>