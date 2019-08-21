<form action="cek" method="post">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-heading mt-3 mx-auto"><b> Request Header</b></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2"><label>Request No :</label></div>
                        <div class="col-lg-2"><input type="text" readonly class="form-control" value="<?= time();  ?>"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"><label>Request Date :</label></div>
                        <div class="col-lg-2"><input type="text" readonly class="form-control" value="<?= date('d-M-Y');  ?>"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-2"><Label>Customer :</Label></div>
                        <div class="col-lg-2">
                            <Select class="form-control" name="customer_code">
                                <option value="" disabled selected>-Choose-</option>
                                <option value="CX0001">CX0001</option>
                            </Select></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"><label>Po No Customer</label></div>
                        <div class="col-lg-2"><input class="form-control" type="text" name="customer_po_no" autocomplete="off" placeholder="Enter PO No..." ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-heading mt-3 mx-auto"><b>Detail Items</b></div>
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
                    <br/>
                    <button class="btn btn-success">Add</button>
                    <br>
                    <br>
                    <button class="btn btn-danger ml-1" style="float:right;">Cancel</button>
                    <button class="btn btn-warning ml-1" style="float:right;" type="submit">Submit</button>
                    <button class="btn btn-info" style="float:right;" type="reset">Print</button>
                </div>
            </div>
        </div>
    </div>
</form>