<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="<?= base_url(); ?>index.php/Customers/Update" >
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>Edit Customer</h3></div>
                        <div class="panel-body">
                            <input type="text" class="form-control" name="customer_code" value="<?php echo $customer_code;?>" hidden>
                            <label>Customer Code</label>
                            <input type="text" value="<?= $customer_code; ?>" class="form-control" autocomplete="off" required disabled>
                            <label>Customer Name</label>
                            <input type="text" name="customer_name" value="<?= $name; ?>" class="form-control" autocomplete="off" required>
                            <label>Address</label>
                            <input type="text" name="address" value="<?= $address; ?>" class="form-control" autocomplete="off" required>
                            <label>Email</label>
                            <input type="email" name="email" value="<?= $email; ?>" class="form-control" autocomplete="off" required>
                            <label>Phone Number</label>
                            <input type="text" name="phone_number" value="<?= $phone_number; ?>" class="form-control" autocomplete="off" required>
                            <br>
                            <button class="btn btn-info" type="submit">Save</button>
                            <a href="<?= base_url(); ?>index.php/customers" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>