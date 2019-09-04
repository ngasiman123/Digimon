<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Bill Of Material</h3></div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Request No</th>
                                    <!-- <th>Customer Info No</th> -->
                                    <!-- <th>Sakura Ref No</th> -->
                                    <th>Customer Name</th>
                                    <th>Customer PO No</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Sales</th>
                                    <!-- <th>Packaging Release</th> -->
                                    <!-- <th>Order Qty</th> -->
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listBom as $row) { ?>
                                <tr>
                                    <td><?= $row->request_no; ?></td>
                                    <td><?= $row->name; ?></td>
                                    <td><?= $row->po_number_customer; ?></td>
                                    <td><?= $row->user_name; ?></td>
                                    <td><?= date('d-M-Y',strtotime($row->created_at)); ?></td>
                                    <td><?= $row->sales; ?></td>
                                    <td><?= date('d-M-Y',strtotime($row->pc_created_at)) ?></td>
                                    <td>
                                    <?php if ($row->pc_status == null) {
                                        echo "New";
                                    }elseif($row->pc_status==1){
                                        echo "Pending";
                                    } ?>
                                    </td>
                                     <td>
                                        <a href="<?php echo base_url();?>Bom/detail/<?= $row->pc_id; ?>">Detail</a>
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
