<?php 
echo $this->session->flashdata("msg");
?>
<form action="cek" method="post">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-heading mt-3 mx-auto"><b> Request Header</b></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2"><label>Request No :</label></div>
                        <div class="col-lg-2"><input type="text" readonly class="form-control" value="<?= $res->request_no  ?>"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"><label>Request Date :</label></div>
                        <div class="col-lg-2"><input type="text" readonly class="form-control" value="<?= date('d-M-Y',strtotime($res->created_at))  ?>"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-2"><Label>Customer :</Label></div>
                        <div class="col-lg-2"><input type="text" readonly class="form-control" value="<?= $res->customer_code ?>"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"><label>Po No Customer</label></div>
                        <div class="col-lg-2"><input class="form-control" type="text" name="customer_po_no" readonly value="<?= $res->po_number_customer ?>" ></div>
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
                                <th>Brand</th>
                                <th>Drawing Status</th>
                                <th>Drawing Remark</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listDetail as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->customer_info_no ?></td>
                                <td><?= $row->sakura_ref_no ?></td>
                                <td><?= $row->manufacture_code ?></td>
                                <td><?= $row->brand_code ?></td>
                                <td>
                                <?php if (empty($row->draw_status)) {
                                    
                                }else{
                                    if ($row->draw_status ==1) {
                                        echo "Ok";
                                    }else if($row->draw_status==0){
                                        echo "Pending";
                                    }
                                } ?>
                                </td>
                                <td><?= $row->draw_remark ?></td>
                                <td>
                                    <?php $str = str_replace(".","",$row->item_images); ?>
                                    <a href="#" data-toggle="modal" data-target="#dw_image<?= $str ?>">image</a> |
                                    <?php if (empty($row->draw_status)) { ?>
                                    <a href="#" data-toggle="modal" data-target="#updateModal<?= $row->request_detail_id ?>">Update</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                            <!-- <tr>
                                <td>1</td>
                                <td>1111.1111</td>
                                <td>C-1123</td>
                                <td>05F3</td>
                                <td>CLS</td>
                                <td>Hold</td>
                                <td>No Good Test</td>
                                <td><a href="">image</a> | <a href="">Update</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>2222.1111</td>
                                <td>C-2223</td>
                                <td>05F3</td>
                                <td>CLH</td>
                                <td>Pending</td>
                                <td>T.Test Tresure</td>
                                <td><a href="">Image</a> | <a href="">Update</a></td>
                            </tr> -->
                        </tbody>
                    </table>
                    <br><br>
                    <label>Note</label>
                    <input type="text" class="form-control" name="note" value="<?= $note->approve_note ?>" readonly>
                    <br>
                    <br>
                    <a href="<?= base_url(); ?>index.php/drawing" class="btn btn-info ml-1" style="float:right;" type="close">Back</a>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
foreach ($listDetail as $row) { ?>
<div id="updateModal<?= $row->request_detail_id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-primary">
        <button class="close" data-dismiss="modal" type="close">&times;</button>
      </div>
      <form action="<?php echo base_url(); ?>Drawing/updaterow" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
          <label class="h5">Sakura Version No</label>
          <input type="hidden" name="request_detail_id" value="<?= $row->request_detail_id ?>" class="form-control">
          <input type="text" name="sakura_version" class="form-control">
          <label class="h5">Drawing Status</label>
          <select id="status"  name="status" class="form-control" onchange="status_(this);" required>
            <?php
            if (empty($row->draw_status)) { ?>
            <option value="">-pilih--</option>
            <option value="0">Pending</option>
            <option value="1">Ok</option>
            <?php }else{ 
                if ($row->draw_status ==0) { ?>
                <option value="0">Pending</option>
                <option value="1">Ok</option>
                <?php }elseif($row->draw_status==1){ ?>
                <option value="1">Ok</option>
                <option value="0">Pending</option>
                <?php }
            } ?>
          </select>
          <div class="">
            <label class="h5">Drawing Remark</label>
            <input type="text" name="drawing_remark" value="<?= $row->draw_remark ?>" class="form-control">
          </div>
          <div id="drawing">
            <label class="h5">img</label>
            <input type="file" name="drawing_img" value="" class="form-control">
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save</button>
        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php $str = str_replace(".","",$row->item_images); ?>
<div id="dw_image<?= $str ?>" class="modal fade " role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-primary">
        <h3 class="modal-title">Image Ref
        </h3>
        <button class="close" data-dismiss="modal" type="close">&times;</button>
      </div>
      <div class="modal-body">
        <h5><img src="<?= base_url(); ?>uploads/<?= $row->item_images ?>" class="img img-responsive img-thumbnail"></h5>
      </div>
      <div class="modal-footer">
        <!-- <a href="<?php echo base_url();?>auth/logout" class="btn btn-success">Logout</a> -->
        <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<script>
    $(document).ready(function(){
        $("#drawing").hide();
    });

    function status_(){
        var val=$("#status").val();
        if(val==1){
           $("#drawing").show();
        }else{
            $("#drawing").hide();
        }
    }

</script>