<script type="text/javascript">
	(function($){
		
	})(jQuery);

	function orderAddProduct() {
		email = $('input[name=email]').val();
		code = $('input[name=code]').val();
		payment = $('input[name=payment]').val();
		status = $('input[name=status]').val();
		message = $('input[name=message]').val();
		if(email == '') {
			alert('Chưa nhập email');
			return;
		}
		if(code == '') {
			alert('Chưa nhập mã sản phẩm');
			return;
		}

		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/orders/orderAddProduct") }}',
			data : {
				'code' : code,
				'email' : email,
				'payment' : payment,
				'status' : status,
				'message' : message,
			},
			beforeSend: function() {
	            $('#load_msg').html('Đang thêm...');
	        },
			success: function(responseText)
			{
				$('#load_msg').html('');
				// var object = document.getElementById("orderListProduct").childNodes[1];
				var object = document.getElementById("orderListProduct");
				object.innerHTML = responseText;
			}
		});
	}
</script>