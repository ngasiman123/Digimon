<?php

?>
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
                                    <th>Customer Name</th>
                                    <th>Customer PO No</th>
                                    <th>Sales</th>
                                    <th>Packaging Release</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php foreach ($listRequest as $row) { ?>
                                <tr>
                                    <td><?= $row->request_no  ?></td>
                                    <td><?= $row->name  ?></td>
                                    <td><?= $row->po_number_customer  ?></td>
                                    <td><?= $row->sales  ?></td>
                                    <td><?= $row->updated_at  ?></td>
                                    <td>
                                        <a href="<?php echo base_url();?>bom/detail/<?= $row->request_header_id ?>">Detail</a>
                                    </td>
                                    </td>

                                </tr>
                                <?php } ?> -->
                                <tr>
                                    <td>RQM000001</td>
                                    <td>Allied (M) Filtration Solution Nc</td>
                                    <td>PO no: A-20190823-125</td>
                                    <td>Lavinia_j</td>
                                    <td>17 Agustus 2019</td>
                                    <td>
                                        <a href="<?= base_url(); ?>index.php/bom/detail">Detail</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
