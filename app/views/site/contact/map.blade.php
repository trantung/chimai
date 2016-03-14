<input id="latitude" type="hidden" value="{{ DEFAULT_LAT }}">
<input id="longitude" type="hidden" value="{{ DEFAULT_LONG }}">
<div class="map">
<div id="mapview" style="height: 300px; width: 100%; max-width: 100%;"></div>
</div>
@include('googlemap_script')