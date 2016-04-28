<script type="text/javascript">
	(function($){
		
	})(jQuery);

	function orderAddProduct() {
		code = $('input[name=code]').val();
		email = $('input[name=email]').val();
		payment = $('select[name=payment]').val();
		status = $('select[name=status]').val();
		message = $('textarea[name=message]').val();
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
				var r = setValueOrderId(responseText);
				if(r == 1) {
					reloadOrderListProduct(responseText);
				}
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
		return 1;
	}

	function reloadOrderListProduct(orderId)
	{
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/orders/reloadOrderListProduct") }}',
			data : {
				'orderId' : orderId,
			},
			beforeSend: function() {
	            $('#orderListProduct').html('Đang load...');
	        },
			success: function(responseText)
			{
				// var object = document.getElementById("orderListProduct").childNodes[1];
				var object = document.getElementById("orderListProduct");
				object.innerHTML = responseText;
			}
		});
	}

	function loadOrderListProduct()
	{
		orderId = $('input[name=orderId]').val();
		if(orderId) {
			reloadOrderListProduct(orderId);
		}
	}

	function removeOrderProduct(productId)
	{
		question = confirm("Are you sure you want delete?");
		if (question)
		{
			orderId = $('input[name=orderId]').val();
			$.ajax(
			{
				type : 'post',
				url : '{{ url("admin/orders/removeOrderProduct") }}',
				data : {
					'orderId' : orderId,
					'productId' : productId,
				},
				beforeSend: function() {
		            $('#orderListProduct').html('Đang load...');
		        },
				success: function(responseText)
				{
					// var object = document.getElementById("orderListProduct").childNodes[1];
					var object = document.getElementById("orderListProduct");
					object.innerHTML = responseText;
				}
			});
		}
		else
	    {
	        return false;
	    }
	}

	function updateOrderProduct()
	{
		alert('123');
	}

</script>