<?php

?>
<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Receive</h3></div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Request No</th>
                                    <th>Customer Name</th>
                                    <th>Customer PO No</th>
                                    <th>Sales</th>
                                    <th>Created Master By</th>
                                    <th>Created Master At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listRequest as $row) { ?>
                                <tr>
                                    <td><?= $row->request_no  ?></td>
                                    <td><?= $row->name ?></td>
                                    <td><?= $row->po_number_customer ?></td>
                                    <td><?= $row->user_name ?></td>
                                    <td><?= $row->po_create ?></td>
                                    <td>
                                        <?= date('d-M-Y',strtotime($row->created_at)) ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url();?>Receive/detail/<?= $row->request_header_id ?>">Detail</a>
                                    </td>
                                </tr>
                                <?php } ?>
                                <!-- <tr>
                                    <td>RQM000001</td>
                                    <td>Allied (M) Filtration Solution Nc</td>
                                    <td>PO no: A-20190823-125</td>
                                    <td>Lavinia_j</td>
                                    <td>Didik_a</td>
                                    <td>25-Aug-2019</td>
                                    <td>
                                        <a href="<?php echo base_url();?>index.php/Receive/detail">Detail</a>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
