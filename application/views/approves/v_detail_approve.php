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
                        <div class="col-lg-2"><input type="text" readonly class="form-control" value="Allied M "></div>
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
                                <th>Customer No Info</th>
                                <th>Sakura No Ref</th>
                                <th>Manufacture</th>
                                <th>Warehouse</th>
                                <th>Brand</th>
                                <th>Order Qty</th>
                                <th>Image Ref</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1111.1111</td>
                                <td>C-1123</td>
                                <td>05F3</td>
                                <td>EUF</td>
                                <td>CLD</td>
                                <td>1000</td>
                                <td><a href="">img</a></td>
                            </tr>
                            <tr>
                                <td>1111.22222</td>
                                <td>C-5523</td>
                                <td>05F3</td>
                                <td>EUF</td>
                                <td>CLD</td>
                                <td>1000</td>
                                <td><a href="">img</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <br><br>
                    <input type="text" class="form-control" name="note" placeholder="Add Note.......">
                    <br>
                    <br>
                    <button class="btn btn-danger ml-1" style="float:right;">Cancel</button>
                    <button class="btn btn-info ml-1" style="float:right;" type="submit">Submit</button>
                    <input type="checkbox" name="approve" >Approve
                    <input type="checkbox" name="reject" >Reject
                    <input type="checkbox" name="revision" >Revised
                </div>
            </div>
        </div>
    </div>
</form>