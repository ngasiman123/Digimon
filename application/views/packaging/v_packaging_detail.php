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
                        <div class="col-lg-2"><input type="text" readonly class="form-control" value="CX0001"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"><label>Po No Customer</label></div>
                        <div class="col-lg-2"><input class="form-control" type="text" name="customer_po_no" readonly value="PO-12345-PO" ></div>
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
                                <th>No</th>
                                <th>Customer No Info</th>
                                <th>Sakura No Version</th>
                                <th>Drawing Release Date</th>
                                <th>Release By</th>
                                <th>Status Packaging</th>
                                <td>Remark</td>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>1111.1111</td>
                                <td>C-1123-V02</td>
                                <td>25-08-2019</td>
                                <td>Ade_n</td>
                                <td>Pending</td>
                                <td></td><td><a href="">img</a> | <a href="">Update</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>1111.2222</td>
                                <td>C-5523-V02</td>
                                <td>25-08-2019</td>
                                <td>Ade_n</td>
                                <td>Pending</td>
                                <td></td><td><a href="">img</a> | <a href="">Update</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <br><br>
                    <label>Note</label>
                    <input type="text" class="form-control" name="note" value="Inner Box Menggunakan Cetak Printing" readonly>
                    <br>
                    <br>
                    <button class="btn btn-info ml-1" style="float:right;" type="close">Back</button>
                </div>
            </div>
        </div>
    </div>
</form>