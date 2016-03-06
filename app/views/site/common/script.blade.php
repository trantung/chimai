{{ HTML::style('assets/js/owl/owl.carousel.css') }}
{{ HTML::style('assets/js/owl/owl.theme.css') }}
{{ HTML::script('assets/js/owl/owl.carousel.min.js') }}
<script type="text/javascript">
$(window).load(function() {
	$("#homeslide").owlCarousel({
		items : 1,
		navigation : true,
		autoPlay : true,
		singleItem: true,
	});
	$("#brandslide").owlCarousel({
		items : 5,
		navigation : false,
		autoPlay : 2000,
		pagination: true,
	});
});
</script>