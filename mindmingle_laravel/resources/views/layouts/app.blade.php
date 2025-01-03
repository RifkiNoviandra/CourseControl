<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="PT Mind Mingle Indonesia">
	<meta name="description" content="Learing With Mind Mingle">

	<!-- Icons Favicon -->
	<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&amp;family=Roboto:wght@400;500;700&amp;display=swap">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/font-awesome/css/all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
	{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/choices/css/choices.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/aos/aos.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/glightbox/css/glightbox.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/quill/css/quill.snow.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/stepper/css/bs-stepper.min.css') }}"> --}}

	<!-- Custom Style Per Page -->
	@stack('custom-style')

	<link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">



	<title>@yield('title')</title>

</head>

<body>
	<!-- Pre loader -->
	<div class="preloader">
		<div class="preloader-item">
			<div class="spinner-grow text-primary"></div>
		</div>
	</div>
	<!-- Header Navbar -->
	@include('layouts.partials.header')
	<!-- END Header Navbar -->

	<!-- Main Content -->
	@yield('content')
	<!-- END Main Content -->

	<!-- Footer -->
	@include('layouts.partials.footer')
	<!-- END Footer -->


	<!-- Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
	 integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
	{{-- <script src="{{ asset('assets/vendor/choices/js/choices.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
	<script src="{{ asset('assets/vendor/glightbox/js/glightbox.js') }}"></script>
	<script src="{{ asset('assets/vendor/quill/js/quill.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/stepper/js/bs-stepper.min.js') }}"></script> --}}

	<!-- Custom Script Per Page -->
	@stack('custom-script')



	<script src="{{ asset('assets/js/functions.js') }}"></script>

</body>

</html>
