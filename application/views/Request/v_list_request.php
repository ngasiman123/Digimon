<?php 
echo $this->session->flashdata("msg");
?>
<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Request Pending </h3></div>
                    <div class="panel-body">
                        <a href="<?php echo base_url();?>Request/add" class="btn btn-info">
							Create
                        </a>
                        <br/><br/>
                        <table id="datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Request No</th>
                                    <th>Customer Name</th>
                                    <th>Customer PO No</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($listRequest as $row) { 
                                    if (empty($row->deleted_by)) { ?>
                                        
                                    <tr>
                                        <td><?= $row->request_no ?></td>
                                        <td><?= $row->name ?></td>
                                        <td><?= $row->po_number_customer ?></td>
                                        <td><?= $row->user_name ?></td>
                                        <td><?= date('d F Y',strtotime($row->created_at)) ?></td>
                                        <td>
                                        <?php if ($row->approve_status ==0) { 
                                            echo "Reject";
                                        }else if($row->approve_status ==1){
                                            echo "Waiting";
                                        }else if( $row->approve_status ==2){
                                            echo "Revision";
                                        }else if($row->approve_status==3){
                                            echo "Approve";
                                        } ?>
                                        
                                        </td>
                                        <td>
                                        <?php if ($row->approve_status ==1) { ?>
                                            <a href="<?php echo base_url();?>Request/edit/<?= $row->request_header_id ?>">Edit</a> 
                                            <!-- <a href="<?php echo base_url();?>Request/delete/<?= $row->request_header_id ?>">Delete</a> -->
                                        <?php }elseif($row->approve_status ==2){ ?>
                                            <a href="<?php echo base_url();?>Request/edit/<?= $row->request_header_id ?>">Edit</a> |
                                            <a href="<?php echo base_url();?>Request/delete/<?= $row->request_header_id ?>">Delete</a>
                                        <?php } ?>   
                                        </td>
                                    </tr>
                                <?php } } ?>
                               <!--  <tr>
                                    <td>RQM000001</td>
                                    <td>Allied (M) Filtration Solution Nc</td>
                                    <td>PO no: A-20190823-125</td>
                                    <td>Nurahman_1</td>
                                    <td>15 August 2019</td>
                                    <td>Revision</td>
                                    <td>
                                        <a href="<?php echo base_url();?>Request/delete/">Edit</a> |
                                        <a href="">Delete</a>
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

<script type="text/javascript">
    $(document).ready(function(){
        $("#datatable").Datatable();
    })
</script>