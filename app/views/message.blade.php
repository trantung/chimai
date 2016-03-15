@if (Session::has('message'))
	<div data-alert class="alert-box success">
		{{ Session::get('message') }}
		<a href="#" class="close">&times;</a>
	</div>
@endif
@if (Session::has('error'))
	<div data-alert class="alert-box alert">
		{{ Session::get('error') }}
		<a href="#" class="close">&times;</a>
	</div>
@endif
