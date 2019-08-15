<div class="row">
    <div class="col-lg-6 grid-margin">
        <div class="card">
            <div class="card-body">
            <form action="<?= base_url(); ?>index.php/brands/deleteControl" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 style="color:red;"><b>Warning !</b></h3></div>
                    <div class="panel-body">
                        <label>Are you sure delete this brand data ?</label>
                        <input type="text" name="brand_code" value="<?= $brand_code; ?>" hidden>
                        <input type="text" name="brand_name" value="<?= $brand_name; ?>" hidden>
                        <blockquote>Brand Code: <?= $brand_code; ?></blockquote>
                        <blockquote>Brand Name: <?= $brand_name; ?></blockquote>
                        <br>
                        <button class="btn btn-success" type="submit">Delete</button>
                        <a href="<?= base_url(); ?>index.php/brands" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>