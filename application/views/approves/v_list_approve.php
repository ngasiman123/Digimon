<?php 
echo $this->session->flashdata("msg");
?>
<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Approves</h3></div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Request No</th>
                                    <th>Customer Name</th>
                                    <th>Customer PO No</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($listApprove as $row) { ?>
                                <tr>
                                    <td><?= $row->request_no ?></td>
                                    <td><?= $row->name ?></td>
                                    <td><?= $row->po_number_customer ?></td>
                                    <td><?= $row->user_name ?></td>
                                    <td><?=  date('d F Y',strtotime($row->created_at)) ?></td>
                                    <td>
                                        <a href="<?php echo base_url();?>approves/detail/<?php echo $row->request_header_id; ?>">Detail</a>
                                    </td>
                                </tr>
                                <?php } ?>
                                <!-- <tr>
                                    <td>RQM000001</td>
                                    <td>Allied (M) Filtration Solution Nc</td>
                                    <td>PO No: A-20190801-125</td>
                                    <td>Nurahman_1</td>
                                    <td>15 August 2019</td>
                                    <td>
                                        <a href="<?php echo base_url();?>index.php/approves/detail">Detail</a>
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