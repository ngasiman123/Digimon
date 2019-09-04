<div class="row">
	<div class="col-lg-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<form method="post" action="<?php echo base_url();?>Bom/save" >
					<div class="panel panel-default">
						<div class="panel-heading">Bill Of Material</div>
						<div class="panel-body">
							<input type="hidden" name="packaging_id" value="<?= $bom_id ?>" >
							<label>Customer No Info</label>
							<input type="text" class="form-control" name="cusomter_no_info" value="<?= $res->customer_info_no ?>" readonly>
							<label>Sakura No Version</label>
							<input type="text" class="form-control" name="sakura_version_no" value="<?= $res->sakura_version_no ?>" readonly>
							<label>Brand</label>
							<input type="text" name="brand" value="<?= $res->brand_code ?>" class="form-control" readonly>
							<label>Drawing</label>
							<?php $ds_str = str_replace(".","",$res->ds_img); ?>
							<a href="#" data-toggle="modal" data-target="#ds_img<?= $ds_str ?>" style="text-decoration: none">
								<input type="text" name="brand" value="<?= $res->ds_img ?>" class="form-control" readonly>
							</a>
							<label>Packaging</label>
							<?php $pc_str = str_replace(".","",$res->pc_img); ?>
							<a href="#" data-toggle="modal" data-target="#pc_img<?= $pc_str ?>" style="text-decoration: none">
								<input type="text" name="brand" value="<?= $res->pc_img ?>" class="form-control" readonly>
							</a>
							<label>BOM Status</label>
							<select id="status"  name="status" class="form-control" onchange="status_(this);" required>
							<?php
								if (empty($res->pc_status)) { ?>
								<option value="">--pilih--</option>
								<option value="0">Pending</option>
								<option value="1">Ok</option>
								<?php }elseif($res->pc_status ==1){ ?>
								    <option value="0">Pending</option>
								    <option value="1">Ok</option>
								<?php } ?>
							</select>
							<div id="drawing">
								<label>Movex Filter</label>
								<input type="text" name="movex_filter" value="" class="form-control">
								<label>Sap Filter</label>
								<input type="text" name="sap_filter" value="" class="form-control">
					         </div>
					         <label>BOM Remark</label>
					         <?php if ($res->pc_status == null) { ?>
					         	<input type="text" class="form-control" name="bom_remark" value=" " autocomplete="off">
					        <?php }else{ ?>
					        	<input type="text" class="form-control" name="bom_remark" value="<?= $res->pc_remark ?>" autocomplete="off">
					    	<?php } ?>
								
							
							<br/>
							<button type="submit" class="btn btn-primary">Save</button>
							<a href="<?php echo base_url();?>Packaging"  class="btn btn-danger">
								Cancel
							</a>
						</div>
					</div>
				</form>			
			</div>
		</div>		
	</div>
</div>
<div id="ds_img<?= $ds_str ?>" class="modal fade " role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-primary">
        <h3 class="modal-title">Image Ref
        </h3>
        <button class="close" data-dismiss="modal" type="close">&times;</button>
      </div>
      <div class="modal-body">
        <h5><img src="<?= base_url(); ?>uploads/<?= $res->ds_img ?>" class="img img-responsive img-thumbnail"></h5>
      </div>
      <div class="modal-footer">
        <!-- <a href="<?php echo base_url();?>auth/logout" class="btn btn-success">Logout</a> -->
        <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div id="pc_img<?= $ds_str ?>" class="modal fade " role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-primary">
        <h3 class="modal-title">Image Ref
        </h3>
        <button class="close" data-dismiss="modal" type="close">&times;</button>
      </div>
      <div class="modal-body">
        <h5><img src="<?= base_url(); ?>uploads/<?= $res->pc_img ?>" class="img img-responsive img-thumbnail"></h5>
      </div>
      <div class="modal-footer">
        <!-- <a href="<?php echo base_url();?>auth/logout" class="btn btn-success">Logout</a> -->
        <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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
<script type="text/javascript">
    function readURL(input) {
    
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imgInp").change(function() {
      readURL(this);
      $("#imgHide").hide();
    });
</script>