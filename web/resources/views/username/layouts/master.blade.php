<!DOCTYPE html>
<html lang="en">
<head>
	<base href="/">
    <!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="user/img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Karma Shop</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="user/css/linearicons.css">
	<link rel="stylesheet" href="user/css/font-awesome.min.css">
	<link rel="stylesheet" href="user/css/themify-icons.css">
	<link rel="stylesheet" href="user/css/bootstrap.css">
	<link rel="stylesheet" href="user/css/owl.carousel.css">
	<link rel="stylesheet" href="user/css/nice-select.css">
	<link rel="stylesheet" href="user/css/nouislider.min.css">
	<link rel="stylesheet" href="user/css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="user/css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="user/css/magnific-popup.css">
	<link rel="stylesheet" href="user/css/main.css">
</head>
<body>  
	@include("user.partial.banner")
	@include("user.partial.header")
    	
	
	@yield('content')

	@include('user.partial.footer')
	
	<script src="user/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="user/js/vendor/bootstrap.min.js"></script>
	<script src="user/js/jquery.ajaxchimp.min.js"></script>
	<script src="user/js/jquery.nice-select.min.js"></script>
	<script src="user/js/jquery.sticky.js"></script>
	<script src="user/js/nouislider.min.js"></script>
	<script src="user/js/countdown.js"></script>
	<script src="user/js/jquery.magnific-popup.min.js"></script>
	<script src="user/js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="user/js/gmaps.min.js"></script>
	<script src="user/js/main.js"></script>
</body>
</html>