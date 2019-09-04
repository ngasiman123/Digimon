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
                        <div class="col-lg-2"><input type="text" readonly class="form-control" value="<?= date('d-M-Y',strtotime($res->request_date))  ?>"></div>
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
                <div class="card-body table-responsive">
                <table class="table table-bordered table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <!-- <th>Customer No Info</th> -->
                                <th>Sakura No Version</th>
                                <th>Brand</th>
                                <!-- <th>Order Qty</th> -->
                                <th>Drawing</th>
                                <th>Drawing Release</th>
                                <th>Packaging Status</th>
                                <th>Packaging Remark</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listDetail as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->customer_info_no ?></td>
                                <td><?= $row->sakura_version_no ?></td>
                                <td><?= $row->brand_code ?></td>
                                <td><?= $row->order_qty ?></td>
                                <td>
                                    <?php $str = str_replace(".","",$row->ds_img); ?>
                                    <a href="#" data-toggle="modal" data-target="#dw_image<?= $str ?>">image</a>
                                </td>
                                <td><?= date('d-M-Y',strtotime($row->ds_create)) ?></td>
                                <td>
                                <?php if ($row->status=='') {
                                    
                                }else{
                                    if ($row->status ==1) {
                                        echo "Ok";
                                    }elseif($row->status==0){
                                        echo "Pending";
                                    }
                                } ?>
                                </td>
                                <td><?= $row->pac_remark ?></td>
                                <td>
                                <?php if (empty($row->status)) { ?>
                                    <a href="#" data-toggle="modal" data-target="#modalUpdate<?= $row->request_detail_id ?>">Update</a>
                                <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                            <!-- <tr>
                                <td>1</td>
                                <td>1111.1111</td>
                                <td>C-1123-V23</td>
                                <td>CLS</td>
                                <td>850</td>
                                <td>
                                    <?php $str = str_replace(".","",$row->item_images); ?>
                                    <a href="#" data-toggle="modal" data-target="#dw_image<?= $str ?>">image</a>
                                </td>
                                <td>25-Aug-2019</td>
                                <td>Pending</td>
                                <td>Approval Cust</td>
                                <td></td>
                            </tr> -->
                            <!-- <tr>
                                <td>2</td>
                                <td>2222.1111</td>
                                <td>C-2223-V23A</td>
                                <td>CLS</td>
                                <td>1300</td>
                                <td><a href="">image</a></td>
                                <td>25-Aug-2019</td>
                                <td>Pending</td>
                                <td>Approval Desain</td>
                                <td><a href="">Update</a></td>
                            </tr> -->
                        </tbody>
                    </table>
                    <br><br>
                    <label>Note</label>
                    <input type="text" class="form-control" name="note" value="<?= $res->approve_note ?>" readonly>
                    <br>
                    <br>
                    <a href="<?= base_url(); ?>packaging" class="btn btn-info ml-1" style="float:right;" type="close">Back</a>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
foreach ($listDetail as $row) { ?>
    <div id="modalUpdate<?= $row->request_detail_id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-primary">
        <button class="close" data-dismiss="modal" type="close">&times;</button>
      </div>
      <form action="<?php echo base_url(); ?>Packaging/updaterow" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
            <input type="hidden" name="drawing_spec_id" value="<?= $row->draw_id ?>">
          <label class="h5">Packaging Status</label>
          <input type="hidden" name="packaging_id" value="<?= $row->packaging_id ?>">

          <select id="status" onchange="status_(this);" name="packaging_status" class="form-control" required>
            <?php
            if ($row->pac_status=='') { ?>
            <option value="">-pilih--</option>
            <option value="0">Pending</option>
            <option value="1">Ok</option>
            <?php }else{ 
                if ($row->pac_status ==0) { ?>
                <option value="0">Pending</option>
                <option value="1">Ok</option>
                <?php }elseif($row->pac_status==1){ ?>
                <option value="1">Ok</option>
                <option value="0">Pending</option>
                <?php }
            } ?>
          </select>
          <div id="img">
               <label class="h5">Inner BOX Spec</label>
              <input type="file" name="inner_box" value="" class="form-control">
              <label class="h5">Outter BOX Spec</label>
              <input type="file" name="outter_box" value="" class="form-control">
          </div>
          <div class="">
            <label class="h5">Packaging Remark</label>
          <input type="text" name="packaging_remark" value="<?= $row->pac_remark ?>" class="form-control">
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

<?php $str = str_replace(".","",$row->ds_img); ?>
<div id="dw_image<?= $str ?>" class="modal fade " role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-primary">
        <h3 class="modal-title">Image Ref
        </h3>
        <button class="close" data-dismiss="modal" type="close">&times;</button>
      </div>
      <div class="modal-body">
        <h5><img src="<?= base_url(); ?>uploads/<?= $row->ds_img ?>" class="img img-responsive img-thumbnail"></h5>
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
        $("#img").hide();
    });

    function status_(){
        var val=$("#status").val();
        if(val==1){
           $("#img").show();
        }else{
            $("#img").hide();
        }
    }

</script>