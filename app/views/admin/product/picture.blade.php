<?php $timestamp = time();?>

<input type="file" name="picture_file_upload" id="picture_file_upload" />
<p>Kích thước: {{ IMAGE_PRODUCT_PICTURE_WIDTH }}x{{ IMAGE_PRODUCT_PICTURE_HEIGHT }} / Dung lượng < 1Mb / Định dạng: jpg, jpeg, gif, png</p>
<div id="picture_box_images" class="box_images">
    <ul>
        @if(isset($images))
            {{ $images }}
        @endif
    </ul>
</div>
<div class="clearfix"></div>

<script type="text/javascript">

	function deleteImagePicture(id){
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/product/picture_delete_image") }}',
			data : {
				'id' : id,
				'product_id': {{ $productId }}
			},
			beforeSend: function(){
	            $('#picture_load_msg_'+id).html('Đang xóa...');
	        },
			success: function(responseText)
			{
				$('#picture_load_msg_'+id).html('');
				var object = document.getElementById("picture_box_images").childNodes[1];
				object.innerHTML = responseText;
			}
		});
	}

	function updateTextPicture(id){
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/product/picture_update_text") }}',
			data : {
				'id' : id,
				'name' : $('#picture_name_'+id).val(),
				'weight_number' : $('#picture_weight_number_'+id).val(),
				'product_id': {{ $productId }}
			},
			beforeSend: function(){
	            $('#picture_load_msg_'+id).html('Đang sửa...');
	        },
			success: function(responseText)
			{
				$('#picture_load_msg_'+id).html('');	
				$('#picture_success_msg_'+id).fadeIn(1000);
            	$('#picture_success_msg_'+id).fadeOut(1200, 'linear');
    //         	var object = document.getElementById("picture_box_images").childNodes[1];
				// object.innerHTML = responseText;
			}
		});
	}

	function uploadifyPicture(){
		$('#picture_file_upload').uploadify({
			'swf'               : '{{ url("adminlte/plugins/uploadify/uploadify.swf") }}',
		    'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5(UNIQUE_SALT . $timestamp);?>',
					'product_id': {{ $productId }}
			},
		    'multi'    		    : true,
			'uploader'          : '{{ url("admin/product/picture_upload_image") }}',
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
					url : '{{ url("admin/product/picture_get_image") }}',
					data : {
						'product_id' : {{ $productId }}
					},
					success: function(responseText)
					{
						var object = document.getElementById("picture_box_images").childNodes[1];
						object.innerHTML = responseText;
					}
				});
			}
		});
	}

	(function($){
		setTimeout(function () {
	        uploadifyPicture();
	    }, 0);
	})(jQuery);

</script>
