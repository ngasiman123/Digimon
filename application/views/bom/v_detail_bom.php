<form action="cek" method="post">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-heading mt-3 mx-auto"><b> Request Header</b></div>
                <!-- <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2"><label>Request No :</label></div>
                        <div class="col-lg-2"><input type="text" readonly class="form-control" value="<?= $res->request_no  ?>"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"><label>Request Date :</label></div>
                        <div class="col-lg-2"><input type="text" readonly class="form-control" value="<?= date('d-M-Y',strtotime($res->request_date));  ?>"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-2"><Label>Customer :</Label></div>
                        <div class="col-lg-2"><input type="text" readonly class="form-control" value="<?= $res->customer_code ?>"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"><label>Po No Customer</label></div>
                        <div class="col-lg-2"><input class="form-control" type="text" name="customer_po_no" readonly value="<?= $res->po_number_customer  ?>" ></div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-heading mt-3 mx-auto"><b>Detail Items</b></div>
                <div class="card-body table-responsive">
                <table class="table table-bordered table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Customer No Info</th>
                                <th>Sakura No Version</th>
                                <th>Brand</th>
                                <th>Order Qty</th>
                                <th>Drawing</th>
                                <th>Drawing Release</th>
                                <th>Packaging</th>
                                <th>Packaging Release</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php foreach ($listDetail as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->customer_info_no ?></td>
                                <td><?= $row->sakura_ref_no ?></td>
                                <td><?= $row->brand_code ?></td>
                                <td><?= $row->order_qty ?></td>
                                <td><?= $row->item_images ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="">Update</a></td>
                            </tr>
                            <?php } ?> -->
                            <tr>
                                <td>1</td>
                                <td>1111.1111</td>
                                <td>C-1123-V23</td>
                                <td>CLS</td>
                                <td>850</td>
                                <td><a href="">image</a></td>
                                <td>25-Aug-2019</td>
                                <td><a href="">Inner Box</a> | <a href="">Outter Box</a></td>
                                <td>25-Aug-2019</td>
                                <td><a href="">Update</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>2222.1111</td>
                                <td>C-2223-V23A</td>
                                <td>CLS</td>
                                <td>1300</td>
                                <td><a href="">image</a></td>
                                <td>25-Aug-2019</td>
                                <td><a href="">Inner Box</a> | <a href="">Outter Box</a></td>
                                <td>25-Aug-2019</td>
                                <td><a href="">Update</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <a href="<?= base_url(); ?>index.php/bom" class="btn btn-info ml-1" style="float:right;" type="close">Back</a>
                </div>
            </div>
        </div>
    </div>
</form>