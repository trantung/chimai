<script type="text/javascript">
(function($){
})(jQuery);
function removeCart(rowid)
{
	question = confirm("Are you sure you want delete?");
	if (question)
	{
        $.ajax(
        {
            type: 'post',
            url : '/removeCart',
            data:{
                'rowid' : rowid
            },
            success: function(data)
            {
                location.href = '{{ action("SiteCartController@index") }}';
            }
        });
    }
    else
    {
        return false;
    }
}
function updateCart(checkout)
{
	var rowid = $('input[name^="rowid"]').map(function () {
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

    $.ajax(
    {
        type: 'post',
        url : '/updateCart',
        data:{
            'rowid' : rowid,
            'color_id' : color_id,
            'size_id' : size_id,
            'surface_id' : surface_id,
            'qty' : qty,
            'checkout' : checkout,

        },
        success: function(data)
        {
        	if(data == 1) {
        		location.href = '{{ action("SiteCartController@checkout") }}';
        	} else {
        		location.href = '{{ action("SiteCartController@index") }}';
        	}
        }
    });
}
function printOrder(type)
{
    if(type == 1) {
        location.href = '{{ action("SiteCartController@printOrder", 1) }}';
    } else {
        location.href = '{{ action("SiteCartController@printOrder", 0) }}';
    }
}
</script>