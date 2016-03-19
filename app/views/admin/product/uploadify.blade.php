<?php $timestamp = time();?>
{{ HTML::style('adminlte/plugins/uploadify/uploadify.css') }}
{{ HTML::script('adminlte/plugins/uploadify/jquery.uploadify.min.js') }}
<script type="text/javascript">

	function deleteImage(id){
		// confirm = confirm('Bạn có chắc chắn muốn xóa?')
		// if(confirm) {
			$.ajax(
			{
				type : 'post',
				url : '{{ url("admin/product/color_delete_image") }}',
				data : {
					'id' : id
				},
				beforeSend: function(){
		            $('#load_msg_'+id).html('Đang xóa...');
		        },
				success: function(responseText)
				{
					$('#load_msg_'+id).html('');
					var object = document.getElementById("box_images").childNodes[1];
					object.innerHTML = responseText;
				}
			});
		// }
	}

	function updateText(id){
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/product/color_update_text") }}',
			data : {
				'id' : id,
				'name' : $('#name_'+id).val(),
				'weight_number' : $('#weight_number_'+id).val()
			},
			beforeSend: function(){
	            $('#load_msg_'+id).html('Đang sửa...');
	        },
			success: function(responseText)
			{
				$('#load_msg_'+id).html('');	
				$('#success_msg_'+id).fadeIn(1000);
            	$('#success_msg_'+id).fadeOut(1200, 'linear');
    //         	var object = document.getElementById("box_images").childNodes[1];
				// object.innerHTML = responseText;
			}
		});
	}

	function uploadify(){
		var process_url  = $('#process_url').val();
		$('#file_upload').uploadify({
			'swf'               : '{{ url("adminlte/plugins/uploadify/uploadify.swf") }}',
		    'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5(UNIQUE_SALT . $timestamp);?>'
			},
		    'multi'    		    : true,
			'uploader'          : process_url,
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
				if(process_url === '{{ url("admin/product/color_upload_image") }}')
				{
					$.ajax(
					{
						type : 'post',
						url : '{{ url("admin/product/color_get_image") }}',
						success: function(responseText)
						{
							var object = document.getElementById("box_images").childNodes[1];
							object.innerHTML = responseText;
						}
					});
				}
			}
		});
	}

	(function($){
		setTimeout(function () {
	        uploadify();
	    }, 0);
	})(jQuery);

</script>

<style>
	#box_images ul {
		padding: 0;
	}
	#box_images ul li {
		list-style: none;
		float: left;
		width: 22%;
		margin: 3px;
	}
	.box-image {
		
	}
	.box-image img {
		height: auto;
		width: 100%;
		max-width: 100%;
	}
	.box-text {
	    margin-top: 10px;
    	margin-bottom: 10px;
	}
	.box-text input {
		width: 100%;
	}
	.box-text .row {
		margin-bottom: 3px;
	}
	.box-action span {
		display: none;
		font-weight: bold;
		color: red;
	}
</style>