<script type="text/javascript">
	(function($){
		
	})(jQuery);

	function orderAddProduct() {
		email = $('input[name=email]').val();
		code = $('input[name=code]').val();
		payment = $('input[name=payment]').val();
		status = $('input[name=status]').val();
		message = $('input[name=message]').val();
		orderId = $('input[name=orderId]').val();
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
				'orderId' : orderId,
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
				setValueOrderId(responseText)
			}
		});
	}

	function setValueOrderId(responseText)
	{
		if(responseText == 'empty') {
			alert('Chưa nhập đủ dữ liệu.');
			return;
		}
		if(responseText == 'email') {
			alert('Email không tồn tại.');
			return;
		}
		if(responseText == 'code') {
			alert('Mã sản phẩm không tồn tại.');
			return;
		}
		$('input[name=orderId]').val(responseText);
		return;
	}

</script>