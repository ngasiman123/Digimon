<tr id="remove-data">
	<td><input name="customer_no_info" class="form-control" type="text" value="23.100.3344"></td>
	<td><input name="sakura_no_ref" class="form-control" type="text" value="C-1123"></td>
	<td>
	    <select class="form-control" name="manufacture">
	        <option value="" selected disabled>Choose</option>
	        <?php foreach ($listManufacture as $row) { ?>
	           <option value="<?= $row->manufacture_code ?>"><?= $row->manufacture_code ?></option>
	        <?php } ?>
	    </select>
	</td>
	<td>
	    <select class="form-control" name="warehouse">
	        <option value="" selected disabled>Choose</option>
	        <?php foreach ($listWarehouse as $row) { ?>
	           <option value="<?= $row->warehouse_code ?>"><?= $row->warehouse_code ?></option>
	        <?php } ?>
	    </select>
	</td>
	<td>
	    <select class="form-control" name="brand">
	        <option value="" selected disabled>Choose</option>
	        <?php foreach ($listBrand as $row) { ?>
	           <option value="<?= $row->brand_code ?>"><?= $row->brand_code ?></option>
	        <?php } ?>
	    </select>
	</td>
	<td><input class="form-control" type="number" name="order_qty" value=""></td>
	<td><input class="form-control" type="file" name="image_ref"></td>
	<td><a href="#" class="btn btn-danger btn_remove" id="i">-</a></td>
</tr>
<script type="text/javascript">
	// $(document).ready(function(){
	// 	$('#remove-form').on("click","#remove-form", function(e){
	// 		e.preventDefault(); $(this).parent().remove();
	// 	});
	// });

	$(document).ready(function(){
		var i=1;

	});
	$(document).on('click','.btn_remove',function(){
		var btn_id = $(this).attr("id");
		$()
	})

      $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"name.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });  
 });  	
	
</script>