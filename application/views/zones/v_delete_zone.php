<div class="row">
    <div class="col-lg-6 grid-margin">
        <div class="card">
            <div class="card-body">
            <form action="<?= base_url(); ?>index.php/zones/deleteControl" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 style="color:red;"><b>Warning !</b></h3></div>
                    <div class="panel-body">
                        <label>Are you sure delete this data zone ?</label>
                        <input type="text" name="zone_code" value="<?= $zone_code; ?>" hidden>
                        <input type="text" name="zone_name" value="<?= $zone_name; ?>" hidden>
                        <blockquote>Zone Code: <?= $zone_code; ?></blockquote>
                        <blockquote>Zone Name: <?= $zone_name; ?></blockquote>
                        <br>
                        <button class="btn btn-success" type="submit">Delete</button>
                        <a href="<?= base_url(); ?>index.php/zones" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>