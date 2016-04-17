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
            type:'post',
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
function updateCart()
{
	var rowid = $('input[name^="rowid"]').map(function () {
			return this.value;
		}).get();
	var color_id = $('input[name^="color_id"]').map(function () {
			return this.value;
		}).get();
	var size_id = $('input[name^="size_id"]').map(function () {
			return this.value;
		}).get();
	var surface_id = $('input[name^="surface_id"]').map(function () {
			return this.value;
		}).get();
	var qty = $('input[name^="qty"]').map(function () {
			return this.value;
		}).get();
	
    $.ajax(
    {
        type:'post',
        url : '/updateCart',
        data:{
            'rowid' : rowid,
            'color_id' : color_id,
            'size_id' : size_id,
            'surface_id' : surface_id,
            'qty' : qty,
            
        },
        success: function(data)
        {
            location.href = '{{ action("SiteCartController@index") }}';
        }
    });
}

</script>