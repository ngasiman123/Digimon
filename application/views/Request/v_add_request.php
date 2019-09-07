 <?php
        echo form_open_multipart('Request/save');
        ?>
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-heading mt-3 mx-auto"><b> Request Header</b></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2"><label>Request No :</label></div>
                        <div class="col-lg-2"><input type="text" readonly name="request_no" class="form-control" value="<?= $pola  ?>"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"><label>Request Date :</label></div>
                        <div class="col-lg-2"><input type="text" name="request_date" readonly class="form-control" value="<?= date('d-M-Y');  ?>"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-2"><Label>Customer :</Label></div>
                        <div class="col-lg-2">
                            <Select class="form-control" name="customer_code" required>
                                <option value="" disabled selected>-Choose-</option>
                                <?php foreach($listCustomer as $row){ ?>
                                    <option value="<?= $row->customer_code ?>"><?= $row->customer_code ?></option>
                                    <?php } ?>
                            </Select></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"><label>Po No Customer</label></div>
                        <div class="col-lg-2"><input class="form-control" type="text" name="customer_po_no" autocomplete="off" placeholder="Enter PO No..." required></div>
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
                                <th>Customer No Info</th>
                                <th>Sakura No Ref</th>
                                <th>Manufacture</th>
                                <th>Warehouse</th>
                                <th>Brand</th>
                                <th>Order Qty</th>
                                <th>Image Ref</th>
                                <th>Action</th>
                            </tr>
                        </thead>
	                        <tbody id="tambahform">
	                            <tr id="item">
                                <td><input name="customer_no_info[]" class="form-control name_list" type="text" value=""></td>
                                <td><input name="sakura_no_ref[]" class="form-control name_list" type="text" value=""></td>
                                <td>
                                    <select class="form-control name_list" name="manufacture[]">
                                        <option value="" selected disabled>Choose</option>
                                        <?php foreach ($listManufacture as $row) { ?>
                                           <option value="<?= $row->manufacture_code ?>"><?= $row->manufacture_code ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control name_list" name="warehouse[]">
                                        <option value="" selected disabled>Choose</option>
                                        <?php foreach ($listWarehouse as $row) { ?>
                                           <option value="<?= $row->warehouse_code ?>"><?= $row->warehouse_code ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control name_list" name="brand[]">
                                        <option value="" selected disabled>Choose</option>
                                        <?php foreach ($listBrand as $row) { ?>
                                           <option value="<?= $row->brand_code ?>"><?= $row->brand_code ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td><input class="form-control name_list" type="number" name="order_qty[]" value=""></td>
                                <td><input class="form-control name_list" type="file" name="image_ref[]"></td>
                                <td><button class="btn btn-danger" id="remove-form">-</button></td>
                            </tr>
                            <tr id="items"></tr>
                        </tbody>
                    </table>
                    <br/>
                    <button type="button" class="btn btn-success" id="tambahdata">Add</button>
                    <br><br>
                    <a href="<?= base_url(); ?>index.php/request" class="btn btn-danger ml-1" style="float:right;">Cancel</a>
                    <button class="btn btn-info ml-1" style="float:right;" type="submit">Submit</button>
                    <!-- <button class="btn btn-success" style="float:right;">Print</button> -->
                </div>
            </div>
        </div>
    </div>
<?php echo form_close(); ?>
<script type="text/javascript">

    // $('#tambahdata').click(function() {
    //     $.ajax({
    //        url: '<?php echo base_url(); ?>Request/append',
    //        success: function(html) {
    //           $("#tambahform").append(html);
    //        } 
    //     });
    // });

$(document).ready(function(){  
  var i=1;  
  $('#tambahdata').click(function(){  
       i++;  
       $('#tambahform').append('<tr id="row'+i+'">'
       	+'<td><input name="customer_no_info[]" class="form-control name_list" type="text" value=""></td>'
       	+'<td><input name="sakura_no_ref[]" class="form-control name_list" type="text" value=""></td>'
       	+'<td>'
            +'<select class="form-control name_list" name="manufacture[]">'
                +'<option value="" selected disabled>Choose</option>'
                +'<?php foreach ($listManufacture as $row) { ?>'
                   +'<option value="<?= $row->manufacture_code ?>"><?= $row->manufacture_code ?></option>'
                +'<?php } ?>'
            +'</select>'
        +'</td>'
        +' <td>'
            +'<select class="form-control name_list" name="warehouse[]">'
                +'<option value="" selected disabled>Choose</option>'
                +'<?php foreach ($listWarehouse as $row) { ?>'
                   +'<option value="<?= $row->warehouse_code ?>"><?= $row->warehouse_code ?></option>'
                +'<?php } ?>'
            +'</select>'
        +'</td>'
        +'<td>'
            +'<select class="form-control name_list" name="brand[]">'
                +'<option value="" selected disabled>Choose</option>'
                +'<?php foreach ($listBrand as $row) { ?>'
                   +'<option value="<?= $row->brand_code ?>"><?= $row->brand_code ?></option>'
                +'<?php } ?>'
            +'</select>'
        +'</td>'
        +'<td><input class="form-control name_list" type="number" name="order_qty[]" value=""></td>'
        +'<td><input class="form-control name_list" type="file" name="image_ref[]"></td>'
       	+'<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">-</button></td></tr>');  
  });  
  $(document).on('click', '.btn_remove', function(){  
       var button_id = $(this).attr("id");   
       $('#row'+button_id+'').remove();  
  });
});  


    
</script>