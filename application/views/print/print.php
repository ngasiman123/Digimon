<form action="<?= base_url() ?>Request/update" method="post">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-heading mt-3 mx-auto"><b> Request Header</b></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2"><label>Request No :</label></div>
                        <div class="col-lg-2">
                            <input type="hidden" name="request_header_id" readonly class="form-control" value="<?= $res->request_header_id  ?>">

                           <?= $res->request_no  ?>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"><label>Request Date :</label></div>
                        <div class="col-lg-2"><?= date('d-M-Y',strtotime($res->request_date))  ?></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-2"><Label>Customer :</Label></div>
                        <div class="col-lg-2"><?= $res->customer_code ?></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"><label>Po No Customer</label></div>
                        <div class="col-lg-2"><?= $res->po_number_customer ?></div>
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
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody id="tambahform">
                        <?php foreach ($listRequesDetail as $row) { ?>
                            <tr id="item">
                                <td>
                                    <input name="request_detail_id[]" class="form-control" type="hidden" value="<?= $row->request_detail_id ?>">
                                    <?= $row->customer_info_no ?>
                                </td>
                                <td><?= $row->sakura_ref_no ?></td>
                                <td>
                                   <?= $row->manufacture_code ?>
                                </td>
                                <td>
                                    <?= $row->warehouse_code ?>
                                </td>
                                <td>
                                    <?= $row->brand_code ?>
                                </td>
                                <td><?= $row->order_qty ?></td>
                                <td><!-- <input class="form-control" type="file"> --></td>
                                <!-- <td><a href="<?php echo base_url().'request/deleterow/'.$row->request_detail_id ?>" class="btn btn-danger">-</a></td> -->
                            </tr>
                        <?php } ?>
                            
                        </tbody>
                    </table>
                    <br/>
                    <!-- <button type="button" class="btn btn-success" id="tambahdata">Add</button> -->
                    <br>
                    <br>
                    <!-- <a href="<?= base_url(); ?>request" class="btn btn-danger ml-1" style="float:right;">Cancel</a>
                    <button type="submit" class="btn btn-info ml-1" style="float:right;" type="submit">Submit</button>
                    <a href="<?= base_url() ?>request/print/<?= $res->request_header_id  ?>" class="btn btn-warning" style="float:right;" type="reset">Print</a> -->
                </div>
            </div>
        </div>
    </div>
</form>