<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ URL::to('css/app.css') }}" rel="stylesheet">
	@yield('styles')
</head>
<body>
@include('partials.header')
<div class="container">	
	@yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@yield('scripts')
</body>
</html>