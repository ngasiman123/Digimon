<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url(); ?>index.php/customers/save" method="post">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Add Customer</h3>
                        </div>
                        <div class="panel-body">
                            <label>Customer Code:</label>
                            <input type="text" name="customer_code" class="form-control" maxlength="6" required autocomplete="off">
                            <label>Customer Name:</label>
                            <input type="text" name="name" class="form-control" required autocomplete="off">  
                            <label>Address:</label>
                            <input type="text" name="address" class="form-control" required autocomplete="off">  
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" required autocomplete="off">  
                            <label>Phone Number:</label>
                            <input type="text" name="phone_number" class="form-control" required autocomplete="off">  
                            <br>  
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="<?= base_url(); ?>index.php/customers" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>