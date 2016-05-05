<script type="text/javascript">
	(function($){
		orderId = $('input[name=orderId]').val();
		reloadOrderListProduct(orderId);
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
				$('input[name=code]').val('');
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
		var id = $('input[name^="id"]').map(function () {
			return this.value;
		}).get();
		var color_id = $('select[name^="color_id"]').map(function () {
			return this.value;
		}).get();
		var size_id = $('select[name^="size_id"]').map(function () {
			return this.value;
		}).get();
		var surface_id = $('select[name^="surface_id"]').map(function () {
			return this.value;
		}).get();
		var qty = $('input[name^="qty"]').map(function () {
			return this.value;
		}).get();
		var amount = $('input[name^="amount"]').map(function () {
			return this.value;
		}).get();
		discount = $('input[name=discount]').val();
		totalAmount = $('input[name=totalAmount]').val();
		discount_id = $('select[name=discount_id]').val();
		discount = $('input[name=discount]').val();
		total = $('input[name=total]').val();
		orderId = $('input[name=orderId]').val();
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/orders/updateOrderProduct") }}',
			data : {
				'id' : id,
				'color_id' : color_id,
				'size_id' : size_id,
				'surface_id' : surface_id,
				'qty' : qty,
				'amount' : amount,
				'discount' : discount,
				'totalAmount' : totalAmount,
				'discount_id' : discount_id,
				'discount' : discount,
				'total' : total,
				'order_id' : orderId,
			},
			beforeSend: function() {
	            $('#load_msg').html('Đang sửa...');
	        },
			success: function(responseText)
			{
				$('#load_msg').html('');
				var object = document.getElementById("orderListProduct");
				object.innerHTML = responseText;
			}
		});
	}

</script>