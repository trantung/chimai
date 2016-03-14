<script>

	$(document).ready(function() {
	    checkInputNumber();
	});

	function toggle(source) {
		checkboxes = document.getElementsByName('news_id[]');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		}
	}

	function checkInputNumber()
	{
		$('.onlyNumber').keypress(function(e) {
	        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	           	return false;
		    }
	    });
	}

	function updateIndexData()
	{
		var values1 = $('input:checkbox.box_id').map(function () {
		  	return this.value;
		}).get();

		var values2 = $('input[name^="weight_number"]').map(function () {
		  	return this.value;
		}).get();

		$.ajax(
		{
			type:'post',
			url: '{{ url("/admin/box/menu/updateIndexData") }}',
			data:{
				'box_id': values1,
				'weight_number': values2,
				'status': values3,
			},
			success: function(data)
			{
				if(data) {
					window.location.reload();
				}
			}
		});
		// window.location.reload();
	}

	function updateNewsIndexSelected()
	{
		var values1 = $('input:checkbox:checked.news_id').map(function () {
		  	return this.value;
		}).get();

		$.ajax(
		{
			type:'post',
			url: '{{ url("/admin/news/updateNewsIndexSelected") }}',
			data:{
				'news_id': values1
			},
			success: function(data)
			{
				if(data) {
					window.location.reload();
				}
			}
		});
		// window.location.reload();
	}

	function countLengh() {
	    var x = document.getElementById("fname");
	    var count = x.value.length;
		var div = document.getElementById('divID');
		div.innerHTML = count;
	}

	function updateIndexData()
	{
		var values1 = $('input:checkbox.box_id').map(function () {
		  	return this.value;
		}).get();

		var values2 = $('input[name^="weight_number"]').map(function () {
		  	return this.value;
		}).get();

		var values3 = $('select[name^="status"]').map(function () {
		  	return this.value;
		}).get();
		$.ajax(
		{
			type:'post',
			url: '{{ url("/admin/box/menu/updateIndexData") }}',
			data:{
				'box_id': values1,
				'weight_number': values2,
				'status': values3,
			},
			success: function(data)
			{
				if(data) {
					window.location.reload();
				}
			}
		});
	}
</script>