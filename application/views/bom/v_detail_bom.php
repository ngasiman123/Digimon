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
                        <div class="col-lg-2"><input type="text" readonly class="form-control" value="<?= date('d-M-Y',strtotime($res->request_date));  ?>"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-2"><Label>Customer :</Label></div>
                        <div class="col-lg-2"><input type="text" readonly class="form-control" value="<?= $res->customer_code ?>"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"><label>Po No Customer</label></div>
                        <div class="col-lg-2"><input class="form-control" type="text" name="customer_po_no" readonly value="<?= $res->po_number_customer  ?>" ></div>
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
                                <th>Customer No Info</th>
                                <th>Sakura No Version</th>
                                <th>Brand</th>
                                <th>Order Qty</th>
                                <th>Drawing</th>
                                <th>Drawing Release</th>
                                <th>Packaging</th>
                                <th>Packaging Release</th>
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
                                <td><a href="#" data-toggle="modal" data-target="#draw_img">image</a></td>
                                <td><?= $row->ds_remark ?></td>
                                <td>
                                    <?php 
                                        $str = str_replace(".","",$row->inner_box_spec);
                                        $str2 = str_replace(".","",$row->outter_box_spec); 

                                    ?>
                                    <a href="#" data-toggle="modal" data-target="#draw_img<?= $str ?>">Inner Box</a> | 
                                    <a href="#" data-toggle="modal" data-target="#draw_img<?= $str2 ?>">Outter Box</a>
                                </td>
                                <td><?= date('d-M-Y',strtotime($row->pc_create_at)); ?></td>
                                <td>
                                <?php if ($row->bom_status =='') { ?>
                                    <a href="#" data-toggle="modal" data-target="#pc_id<?= $row->packaging_id ?>">Update</a>
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
                                <td><a href="">image</a></td>
                                <td>25-Aug-2019</td>
                                <td><a href="">Inner Box</a> | <a href="">Outter Box</a></td>
                                <td>25-Aug-2019</td>
                                <td><a href="">Update</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>2222.1111</td>
                                <td>C-2223-V23A</td>
                                <td>CLS</td>
                                <td>1300</td>
                                <td><a href="">image</a></td>
                                <td>25-Aug-2019</td>
                                <td><a href="">Inner Box</a> | <a href="">Outter Box</a></td>
                                <td>25-Aug-2019</td>
                                <td><a href="">Update</a></td>
                            </tr> -->
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <a href="<?= base_url(); ?>index.php/bom" class="btn btn-info ml-1" style="float:right;" type="close">Back</a>
                </div>
            </div>
        </div>
    </div>
</form>



<?php
foreach ($listDetail as $row) { ?>
    <div id="pc_id<?= $row->packaging_id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-primary">
        <button class="close" data-dismiss="modal" type="close">&times;</button>
      </div>
      <form action="<?php echo base_url(); ?>BOM/updaterow" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
          <input type="hidden" name="packaging_id" value="<?= $row->packaging_id ?>" class="form-control">
          <label class="h5">BOM Status</label>
          <select id="status" onchange="status_(this);" name="status" class="form-control" required>
            <?php
            if (empty($row->bom_status)) { ?>
            <option value="">-pilih--</option>
            <option value="0">Pending</option>
            <option value="1">Ok</option>
            <?php }else{ 
                if ($row->bom_status ==0) { ?>
                <option value="0">Pending</option>
                <option value="1">Ok</option>
                <?php }elseif($row->bom_status==1){ ?>
                <option value="1">Ok</option>
                <option value="0">Pending</option>
                <?php }
            } ?>
          </select>
          <div id="img">
              <label class="h5">Movex Filter</label>
              <input type="file" name="movex_filter" value="" class="form-control">
              <label class="h5">Sap Filter</label>
              <input type="file" name="sap_filter" value="" class="form-control">
          </div>
          
          <div class="">
            <label class="h5">BOM Remark</label>
            <input type="text" name="bom_remark" value="<?= $row->bom_remark ?>" class="form-control">
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

<?php 
$str = str_replace(".","",$row->inner_box_spec);
$str2 = str_replace(".","",$row->outter_box_spec); 
?>

<div id="draw_img<?= $str ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-primary">
        <h3 class="modal-title">Inner Box Spec
        </h3>
        <button class="close" data-dismiss="modal" type="close">&times;</button>
      </div>
      <div class="modal-body">
        <h5><img src="<?= base_url(); ?>uploads/<?= $row->inner_box_spec ?>" class="img img-responsive img-thumbnail"></h5>
      </div>
      <div class="modal-footer">
        <!-- <a href="<?php echo base_url();?>auth/logout" class="btn btn-success">Logout</a> -->
        <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="draw_img<?= $str2 ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-primary">
        <h3 class="modal-title">Image Ref
        </h3>
        <button class="close" data-dismiss="modal" type="close">&times;</button>
      </div>
      <div class="modal-body">
        <h5><img src="<?= base_url(); ?>uploads/<?= $row->outter_box_spec ?>" class="img img-responsive img-thumbnail"></h5>
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