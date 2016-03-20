<?php $timestamp = time();?>

<input type="file" name="color_file_upload" id="color_file_upload" />
<p>Kích thước: {{ IMAGE_PRODUCT_COLOR_WIDTH }}x{{ IMAGE_PRODUCT_COLOR_HEIGHT }} / Dung lượng < 1Mb / Định dạng: jpg, jpeg, gif, png</p>
<div id="color_box_images" class="box_images">
    <ul>
        @if(isset($images))
            {{ $images }}
        @endif
    </ul>
</div>
<div class="clearfix"></div>

<script type="text/javascript">

	function deleteImageColor(id){
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/product/color_delete_image") }}',
			data : {
				'id' : id
			},
			beforeSend: function(){
	            $('#color_load_msg_'+id).html('Đang xóa...');
	        },
			success: function(responseText)
			{
				$('#color_load_msg_'+id).html('');
				var object = document.getElementById("color_box_images").childNodes[1];
				object.innerHTML = responseText;
			}
		});
	}

	function updateTextColor(id){
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/product/color_update_text") }}',
			data : {
				'id' : id,
				'name' : $('#color_name_'+id).val(),
				'weight_number' : $('#color_weight_number_'+id).val()
			},
			beforeSend: function(){
	            $('#color_load_msg_'+id).html('Đang sửa...');
	        },
			success: function(responseText)
			{
				$('#color_load_msg_'+id).html('');	
				$('#color_success_msg_'+id).fadeIn(1000);
            	$('#color_success_msg_'+id).fadeOut(1200, 'linear');
    //         	var object = document.getElementById("color_box_images").childNodes[1];
				// object.innerHTML = responseText;
			}
		});
	}

	function uploadifyColor(){
		$('#color_file_upload').uploadify({
			'swf'               : '{{ url("adminlte/plugins/uploadify/uploadify.swf") }}',
		    'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5(UNIQUE_SALT . $timestamp);?>',
					'product_id': {{ $productId }}
			},
		    'multi'    		    : true,
			'uploader'          : '{{ url("admin/product/color_upload_image") }}',
			'fileTypeExt'       : '*.jpg; *.jpeg; *.gif; *.png',
			'fileTypeDesc'      : 'Image Files (.JPG, .JPEG, .GIF, .PNG)',
			'fileSizeLimit'     : '1MB',
			'removeTimeout'     : 1,
			'buttonText'        : 'Chọn ảnh',
			'onUploadSuccess'   : function(file, data, response) {
	        	// alert('The file was saved to: ' + data);
		    },
			'onQueueComplete': function ()
			{
				$.ajax(
				{
					type : 'post',
					url : '{{ url("admin/product/color_get_image") }}',
					data : {
						'product_id' : {{ $productId }}
					},
					success: function(responseText)
					{
						var object = document.getElementById("color_box_images").childNodes[1];
						object.innerHTML = responseText;
					}
				});
			}
		});
	}

	(function($){
		setTimeout(function () {
	        uploadifyColor();
	    }, 0);
	})(jQuery);

</script>
