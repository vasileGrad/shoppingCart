<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	@yield('styles')
</head>
<body>
@yield('content')

<!-- Scripts -->

<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@yield('scripts')
</body>
</html>