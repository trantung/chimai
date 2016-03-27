{{ HTML::script('assets/js/fancybox/source/jquery.fancybox.js') }}
{{ HTML::style('assets/js/fancybox/source/jquery.fancybox.css') }}

{{ HTML::script('assets/js/fancybox/source/helpers/jquery.fancybox-media.js') }}

<script type="text/javascript">
$(window).load(function() {
	$('.fancybox').fancybox({
		// prevEffect : 'none',
		// nextEffect : 'none',
		closeBtn  : true,
		arrows    : true,
		nextClick : true,
	});

	$('.fancybox-media')
	.attr('rel', 'media-gallery')
	.fancybox({
		openEffect : 'none',
		closeEffect : 'none',
		prevEffect : 'none',
		nextEffect : 'none',

		arrows : false,
		helpers : {
			media : {},
			buttons : {}
		}
	});
	
});
</script>