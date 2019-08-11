<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url(); ?>index.php/manufactures/save" method="post">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Add Manufactures</h3>
                        </div>
                        <div class="panel-body">
                            <label>Manufacture Code:</label>
                            <input type="text" name="manufacture_code" class="form-control" maxlength="3" required autocomplete="off">
                            <label>Manufacture Name:</label>
                            <input type="text" name="manufacture_name" class="form-control" required autocomplete="off">  
                            <br>  
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="<?= base_url(); ?>index.php/manufacture" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>