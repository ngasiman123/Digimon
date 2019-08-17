<form action="" method="post">
<div class="row">
	<div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                Titel
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-heading mt-3 ml-4"><b>Detail Items</b></div>
            <div class="card-body">
                <table class="table table-bordered table-bordered">
                    <thead>
                        <tr>
                            <th>Customer No Info</th>
                            <th>Sakura No Ref</th>
                            <th>Manufacture</th>
                            <th>Warehouse</th>
                            <th>Brand</th>
                            <th>Order Qty</th>
                            <th>Image Ref</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input name="customer_no_info" class="form-control" type="text" value="23.100.3344"></td>
                            <td><input name="sakura_no_ref" class="form-control" type="text" value="C-1123"></td>
                            <td>
                                <select class="form-control" name="manufacture">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="">02</option>
                                    <option value="">07</option>
                                    <option value="">04</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="warehouse">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="">EUF</option>
                                    <option value="">MTK</option>
                                    <option value="">MTS</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="brand">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="">CLS</option>
                                    <option value="">CLD</option>
                                    <option value="">SHG</option>
                                </select>
                            </td>
                            <td><input class="form-control" type="number" value="1200"></td>
                            <td><input class="form-control" type="file"></td>
                            <td><button class="btn btn-danger">-</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</form>