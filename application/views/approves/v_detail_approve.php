<form action="cek" method="post">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-heading mt-3 mx-auto"><b> Request Header</b></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2"><label>Request No :</label></div>
                        <div class="col-lg-2"><input type="text" readonly class="form-control" value="<?= $ress->request_no ?>"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"><label>Request Date :</label></div>
                        <div class="col-lg-2"><input type="text" readonly class="form-control" value="<?= date('d M Y',strtotime($ress->request_date))  ?>"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-2"><Label>Customer :</Label></div>
                        <div class="col-lg-2"><input type="text" readonly class="form-control" value="<?= $ress->name  ?> "></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"><label>Po No Customer</label></div>
                        <div class="col-lg-2"><input class="form-control" type="text" name="customer_po_no" readonly value="<?= $ress->po_number_customer ?>" ></div>
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
                                <th>Sakura No Ref</th>
                                <th>Manufacture</th>
                                <th>Warehouse</th>
                                <th>Brand</th>
                                <th>Order Qty</th>
                                <th>Image Ref</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($lisRequestDetail as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->customer_info_no ?></td>
                                <td><?= $row->sakura_ref_no ?></td>
                                <td><?= $row->manufacture_code ?></td>
                                <td><?= $row->warehouse_code ?></td>
                                <td><?= $row->brand_code ?></td>
                                <td><?= $row->order_qty ?></td>
                                <td>
                                    <a href="">img</a>
                                </td>
                            </tr>
                            <?php } ?>
                            <!-- <tr>
                                <td>1</td>
                                <td>1111.1111</td>
                                <td>C-1123</td>
                                <td>05F3</td>
                                <td>EUF</td>
                                <td>CLD</td>
                                <td>1000</td>
                                <td><a href="">img</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>1111.22222</td>
                                <td>C-5523</td>
                                <td>05F3</td>
                                <td>EUF</td>
                                <td>CLD</td>
                                <td>1000</td>
                                <td><a href="">img</a></td>
                            </tr> -->
                        </tbody>
                    </table>
                    <br><br>
                    <label>Note</label>
                    <input type="text" class="form-control" name="note" placeholder="Add Note.......">
                    <br>
                    <br>
                    <a href="<?= base_url(); ?>index.php/approves" class="btn btn-danger ml-1" style="float:right;">Cancel</a>
                    <button class="btn btn-info ml-1" style="float:right;" type="submit">Submit</button>
                    <input type="checkbox" name="approve" >Approve
                    <input type="checkbox" name="reject" >Reject
                    <input type="checkbox" name="revision" >Revised
                </div>
            </div>
        </div>
    </div>
</form>