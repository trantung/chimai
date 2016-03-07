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
});
</script>