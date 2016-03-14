<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;libraries=places" style=""></script>
<script type="text/javascript">
var defaultLat = (document.getElementById('latitude').value!=0) ? document.getElementById('latitude').value : {{ DEFAULT_LAT }};
var defaultLng = (document.getElementById('longitude').value!=0) ? document.getElementById('longitude').value : {{ DEFAULT_LONG }};
</script>
{{ HTML::script('assets/js/gmap.js') }}