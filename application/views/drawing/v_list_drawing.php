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
                                    <th>Customer Name</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Approved By</th>
                                    <th>Approved At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listDrawing as $row) { ?>
                                <tr>
                                    <td><?= $row->request_no ?></td>
                                    <td><?= $row->name ?></td>
                                    <td><?= $row->user_name ?></td>
                                    <td><?= date('d-M-Y',strtotime($row->created_at)); ?></td>
                                    <td><?= $row->name_approve ?></td>
                                    <td><?= date('d-M-Y',strtotime($row->approve_date)) ?></td>
                                     <td>
                                        <a href="<?php echo base_url();?>drawing/detail/<?= $row->request_header_id ?>">Detail</a>
                                    </td>
                                </tr>
                                <?php } ?>
                                <!-- <tr>
                                    <td>RQM000001</td>
                                    <td>Allied (M) Filtration Solution Nc</td>
                                    <td>Nurahman_1</td>
                                    <td>15 August 2019</td>
                                    <td>lavinia_j</td>
                                    <td>15 August 2019</td>
                                    <td>
                                        <a href="<?php echo base_url();?>index.php/drawing/detail">Detail</a>
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