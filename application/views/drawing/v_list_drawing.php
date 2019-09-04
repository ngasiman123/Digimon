<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Drawing & Spec </h3></div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Request No</th>
                                    <th>Customer Info No</th>
                                    <!-- <th>Sakura Ref No</th> -->
                                    <th>Customer Name</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Sales</th>
                                    <!-- <th>Order Qty</th> -->
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listDrawing as $row) { ?>
                                <tr>
                                    <td><?= $row->request_no; ?></td>
                                    <td><?= $row->customer_info_no; ?></td>
                                    <!-- <td><?= $row->sakura_ref_no; ?></td> -->
                                    <td><?= $row->customer_name; ?></td>
                                    <td><?= date('d-M-Y',strtotime($row->rh_created_at)) ?></td>
                                    <td><?= $row->user_name ?></td>
                                    <td><?= $row->sales ?></td>
                                    <!-- <td><?= $row->order_qty; ?></td> -->
                                    <td>
                                        <?php if ($row->rd_status == 1) {
                                            echo "Peding";
                                        }elseif($row->rd_status==null){
                                            echo "New";
                                        } ?>
                                    </td>
                                     <td>
                                        <a href="<?php echo base_url();?>drawing/detail/<?= $row->request_detail_id; ?>">Detail</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
