<div class="row">
	<div class="col-lg-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<form method="post" action="<?php echo base_url();?>Drawing/save" enctype="multipart/form-data">
					<div class="panel panel-default">
						<div class="panel-heading">Drawing Spec</div>
						<div class="panel-body">
							<input type="hidden" name="request_detail_id" value="<?= $request_id ?>">
							<label>Customer No Info</label>
							<input type="text" class="form-control" name="cusomter_no_info" value="<?= $res->customer_info_no ?>" readonly>
							<label>Sakura No Reff</label>
							<input type="text" class="form-control" name="sakura_no_reff" value="<?= $res->sakura_ref_no ?>" readonly>
							<label>Manufacture</label>
							<input type="text" name="manufacture" value="<?= $res->manufacture_code ?>" class="form-control" readonly>
							<label>Brand</label>
							<input type="text" name="brand" value="<?= $res->brand_code ?>" class="form-control" readonly>
							<label>Image</label>
							<?php $rd_str= str_replace(".","",$res->item_images); ?>
							<a href="#" data-toggle="modal" data-target="#rd_img<?= $rd_str ?>" style="text-decoration: none;">
								<input type="text" name="" class="form-control" value="<?= $res->item_images ?>" readonly>
							</a>
							<label>Drawing Status</label>
							<select id="status"  name="status" class="form-control" onchange="status_(this);" required>
							<?php
								if (empty($res->rd_status)) { ?>
								<option value="">--pilih--</option>
								<option value="0">Pending</option>
								<option value="1">Ok</option>
								<?php }elseif($res->rd_status ==1){ ?>
								    <option value="0">Pending</option>
								    <option value="1">Ok</option>
								<?php } ?>
							</select>
							<div id="drawing">
								<label>Sakura Version No</label>
								<input type="text" class="form-control" name="sakura_version_no" value="<?= $res->sakura_version_no ?>">
					            <label class="h5">Image</label>
					            <input type="file" name="drawing_img" id="imgInp" class="form-control">
					            <div class="mt-2">
                                    <img id="blah" class="img-thumbnail" src="#" alt="your image" width="200" height="200" />
                                </div>
					         </div>

							<label>Drawing Remark</label>
								<input type="text" class="form-control" name="drawing_remark" value="<?= $res->rd_remark ?>" autocomplete="off">
							<br/>
							<button type="submit" class="btn btn-primary">Save</button>
							<a href="<?php echo base_url();?>Drawing"  class="btn btn-danger">
								Cancel
							</a>
						</div>
					</div>
				</form>			
			</div>
		</div>		
	</div>
</div>
<div id="rd_img<?= $rd_str ?>" class="modal fade " role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-primary">
        <h3 class="modal-title">Image
        </h3>
        <button class="close" data-dismiss="modal" type="close">&times;</button>
      </div>
      <div class="modal-body">
        <h5><img src="<?= base_url(); ?>uploads/<?= $res->item_images ?>" class="img img-responsive img-thumbnail"></h5>
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