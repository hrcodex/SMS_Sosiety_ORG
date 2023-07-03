<!DOCTYPE HTML>
<html lang="en-US">
<head>
    @include('frontend.includes.meta')
	<title>@yield('title')</title>	
	@include('frontend.includes.style')	
</head>
<body>
    @include('frontend.includes.header_top')	
    @include('frontend.includes.header')	
	
	@yield('body')

    <!-- Fixed arrow at bottom page -->
	<div class="container container-up-arrow"><div class="fixed-up-arrow"><a href="#home"><i class="fa fa-arrow-up"></i>Top</a></div></div>
	
	<!-- Footer Section -->
    @include('frontend.footer.footer')
	<!-- Footer section end -->

    @include('frontend.includes.script')
    @yield('script')
</body>
</html>