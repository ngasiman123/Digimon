<form action="#" method="post">
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
                        <div class="col-lg-2"><input type="text" readonly class="form-control" value="Allied M"></div>
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
                                <th>Brand</th>
                                <th>Created Master At</th>
                                <th>Movex Filter Master</th>
                                <th>SAP Filter Master</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>1111.1111</td>
                                <td>C-1123-V23</td>
                                <td>CLS</td>
                                <td>25-Aug-2019</td>
                                <td>1111.1111   UF</td>
                                <td>EUF1-CLS1-C-1123-V23</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>2222.1111</td>
                                <td>C-2223-V23A</td>
                                <td>CLS</td>
                                <td>25-Aug-2019</td>
                                <td>2222.1111    TF</td>
                                <td>EUF1-CLS1-C-2223-V23A</td>
                            </tr>
                        </tbody>
                    </table>
                    <br><br>
                    <button class="btn btn-success">Confirm</button>
                    <a href="<?= base_url(); ?>index.php/receive" class="btn btn-info ml-1" style="float:right;" type="close">Back</a>
                </div>
            </div>
        </div>
    </div>
</form>