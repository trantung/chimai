<!DOCTYPE html>
<html>
	@include('site.common.header')
	<body>
		@include('site.common.top')
		@include('site.common.nav')

		@yield('content')

		@include('site.common.bottom')
		@include('site.common.footer')
	</body>
</html>