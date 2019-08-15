<div class="row">
    <div class="col-lg-6 grid-margin">
        <div class="card">
            <div class="card-body">
            <form action="<?= base_url(); ?>index.php/customers/deleteControl" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 style="color:red;"><b>Warning !</b></h3></div>
                    <div class="panel-body">
                        <label>Are you sure delete this customer data ?</label>
                        <input type="text" name="customer_code" value="<?= $customer_code; ?>" hidden>
                        <input type="text" name="name" value="<?= $name; ?>" hidden>
                        <input type="text" name="address" value="<?= $address; ?>" hidden>
                        <input type="text" name="email" value="<?= $email; ?>" hidden>
                        <input type="text" name="phone_number" value="<?= $phone_number; ?>" hidden>
                        <blockquote>Customer Code: <?= $customer_code; ?></blockquote>
                        <blockquote>Customer Name: <?= $name; ?></blockquote>
                        <br>
                        <button class="btn btn-success" type="submit">Delete</button>
                        <a href="<?= base_url(); ?>index.php/customers" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>