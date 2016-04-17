{{ HTML::style('assets/css/etalage.css') }}
{{ HTML::script('assets/js/etalage.js') }}
{{ HTML::script('assets/js/zoom/jquery.zoom.min.js') }}

{{ HTML::style('assets/js/owl/owl.carousel.css') }}
{{ HTML::style('assets/js/owl/owl.theme.css') }}
{{ HTML::script('assets/js/owl/owl.carousel.min.js') }}

{{ HTML::script('assets/js/fancybox/source/jquery.fancybox.js') }}
{{ HTML::style('assets/js/fancybox/source/jquery.fancybox.css') }}

<script type="text/javascript">
$(window).load(function() {
	$('.fancybox').fancybox({
		// prevEffect : 'none',
		// nextEffect : 'none',
		closeBtn  : true,
		arrows    : true,
		nextClick : true,
	});
	$("#brandslide").owlCarousel({
		items : 5,
		navigation : false,
		autoPlay : 2000,
		pagination: true,
	});
});
</script>

<script type="text/javascript">
//    var zoom_enabled = false;
//    var zoom_type = 0;
	jQuery(document).ready(function(){
		
		var src_img_width = 900;
		var src_img_height = 950;
		var width, height, thumb_position, small_thumb_count;
		small_thumb_count = 4;
		width = jQuery(".detail_image").width()-10;
		height = width;
		thumb_position = "bottom";

		$('#etalage').etalage({
			thumb_image_width: width,
			thumb_image_height: height,
			source_image_width: src_img_width,
			source_image_height: src_img_height,
			zoom_area_width: width,
			zoom_area_height: height,
			zoom_enable: false,
			small_thumbs:small_thumb_count,
			smallthumb_hide_single: false,
			smallthumbs_position: thumb_position,
			small_thumbs_width_offset: 0,
			show_hint: false,
			show_icon: false,
			autoplay: false
		});
		
		if(jQuery(window).width()<768){
			jQuery(".etalage li.etalage_thumb").zoom();
		}

	});
</script>

<script type="text/javascript">
(function($){
	addCart();
})(jQuery);
function addCart()
{
	$('#add_cart').click(function(){
        id = $('input[name=id]').val();
        $.ajax(
        {
            type:'post',
            url : '/addCart',
            data:{
                'id' : id
            },
            beforeSend: function(){
                $('#add_cart').prop('disabled', true);
                $('#add_cart').html("Please wait...");
            },
            success: function(data)
            {
                location.href = '{{ action("SiteCartController@index") }}';
            }
        });
    });
}
</script>