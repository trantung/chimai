<script>

	function toggle(source) {
		checkboxes = document.getElementsByName('id[]');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		}
	}

	function deleteSelected()
	{
		var check = $('input:checkbox:checked.id').val();
		if(check) {
			callDeleteSelected();
		} else {
			alert('Bạn chưa chọn!');
		}
	}

	function callDeleteSelected()
	{
		confirm = confirm('Bạn có chắc chắn muốn xóa?')
		if(confirm) {
			var values1 = $('input:checkbox:checked.id').map(function () {
			  	return this.value;
			}).get();

			$.ajax(
			{
				type:'post',
				url: '/admin/contact/deleteSelected',
				data:{
					'id': values1
				},
				success: function(data)
				{
					if(data) {
						window.location.reload();
					}
				}
			});
		} else {
			window.location.reload();
		}
	}

</script>