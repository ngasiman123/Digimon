<div class="row">
    <div class="card">
        <div class="card-body">
            <form action="<?php echo base_url();?>index.php/users/delete" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3> Delete Users</h3></div>
                    <div class="panel-body">
                        <label>Are you sure delete this data Username ? <blockquote><?= $user_name; ?></blockquote></label>
                        <input type="text" class="form-control" name="id" value="<?php echo $id;?>" hidden>
                        <input type="text" class="form-control" name="user_name" value="<?php echo $user_name;?>" hidden>
                        <br>
                        <button class="btn btn-info" type="submit">Delete</button>
                        <a href="<?php echo base_url();?>index.php/users"  class="btn btn-danger">
						Cancel
						</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>