<!DOCTYPE html>
<html dir="ltr" lang="en-US">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="author" content="SemiColonWeb" />

		<link
			href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Playfair+Display:700,700i,900&display=swap"
			rel="stylesheet"
			type="text/css"
		/>
		<link
			rel="stylesheet"
			href="{{asset('css/bootstrap.css')}}"
			type="text/css"
		/>
		<link rel="stylesheet" href="{{asset('css/dark.css')}}" type="text/css" />

		<link rel="stylesheet" href="{{asset('css/design.css')}}" type="text/css" />

		<link
			rel="stylesheet"
			href="{{asset('css/font-icons.css')}}"
			type="text/css"
		/>
		<link
			rel="stylesheet"
			href="{{asset('css/animate.css')}}"
			type="text/css"
		/>
		<link
			rel="stylesheet"
			href="{{asset('css/magnific-popup.css')}}"
			type="text/css"
		/>

		<link rel="stylesheet" href="{{asset('css/fonts.css')}}" type="text/css" />

		<link rel="stylesheet" href="{{asset('css/custom.css')}}" type="text/css" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link
			rel="stylesheet"
			href="{{asset('css/colors.php?color=1c85e8')}}"
			type="text/css"
		/>
		<link rel="stylesheet" href="{{asset('style.css')}}" type="text/css" />

		<title>Hamro Realty | @yield('title')</title>
	</head>

	<body class="stretched side-push-panel">
		<div id="wrapper" class="clearfix">
			<header id="header" class="header-size-md" data-sticky-shrink="false">
				<div id="header-wrap">
					<div class="container">
						<div class="header-row justify-content-between">
							<div id="logo" class="me-lg-0">
								<a href="/" class="standard-logo"
									><img
										src="{{asset('images/logo.png')}}"
										alt="HamroRealty Logo"
								/></a>
							</div>
							<!-- #logo end -->
										@php 
											if(session('properties')){
												$count=count(session('properties'));
											}
										@endphp
							<div class="header-misc position-relative mr-sm-3">
								<a href="/cart" class="text-dark">
									<i class="icon-shopping-cart1"></i>
									<span
										class="badge rounded-pill bg-danger position-absolute"
										style="top: -12px"
										><small>{{$count??0}}</small></span
									>
								</a>
							</div>

							<div id="primary-menu-trigger">
								<svg class="svg-trigger" viewBox="0 0 100 100">
									<path
										d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"
									></path>
									<path d="m 30,50 h 40"></path>
									<path
										d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"
									></path>
								</svg>
							</div>

							<nav class="primary-menu with-arrows">
								<ul class="menu-container">
									<li
										class="{{ (request()->is('/')) ? 'menu-item current' : 'menu-item' }}"
									>
										<a class="menu-link" href="/"><div>Home</div></a>
									</li>
									<!-- <li class="menu-item"><a class="menu-link" href="demo-interior-design-studio.html"><div>Studio</div></a>
									<ul class="sub-menu-container">
										<li class="menu-item"><a class="menu-link" href="demo-interior-design-studio-single.html"><div>Minsk Belarus Studio</div></a></li>
										<li class="menu-item"><a class="menu-link" href="demo-interior-design-studio-single.html"><div>Malibu Dream Airstream</div></a></li>
										<li class="menu-item"><a class="menu-link" href="demo-interior-design-studio-single.html"><div>Modern Condo in City</div></a></li>
									</ul>
								</li> -->
									{{--
									<li class="menu-item">
										<a class="menu-link" href="/about"><div>About</div></a>
									</li>
									--}}
									<li
										class="{{ (request()->is('contact')) ? 'menu-item current' : 'menu-item' }}"
									>
										<a class="menu-link" href="/contact"><div>Contact</div></a>
									</li>
										<li
										class="{{ (request()->is('cart')) ? 'menu-item current' : 'menu-item' }}"
									>
										<a class="menu-link" href="/cart"><div>Cart</div></a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
				<div class="header-wrap-clone"></div>
			</header>

			@yield('content')

			<footer id="footer" class="dark" style="border-top: none">
				<!-- Copyrights
			============================================= -->
				<div id="copyrights">
					<div class="container">
						<div class="row justify-content-between col-mb-30">
							<div
								class="
									col-12 col-lg-auto
									text-center text-lg-start
									order-last order-lg-first
								"
							>
								<span>Dallas, Texas 75063, United States</span> <br />
								<i class="icon-phone-sign"></i>&nbsp;(469) 688-1640 <br />
								<i class="icon-email3"></i>&nbsp;info@hamrorealty.com<br />
								<br />
							</div>

							<div class="col-12 col-lg-auto text-center text-lg-end">
								<div class="copyrights-menu copyright-links">
									<a
										href="https://drive.google.com/file/d/1VcDEbaq2WF1i3VhjfZqZTRzDN2rsAskV/view"
										style="color: #aaa"
										><small
											>Consumer Complaint Against a License Holder to
											TREC</small
										></a
									>
								</div>
								<a
									href="#"
									class="
										social-icon
										inline-block
										si-small si-borderless
										mb-0
										si-facebook
									"
								>
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>

								<a
									href="#"
									class="
										social-icon
										inline-block
										si-small si-borderless
										mb-0
										si-twitter
									"
								>
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
								<a
									href="#"
									class="
										social-icon
										inline-block
										si-small si-borderless
										mb-0
										si-linkedin
									"
								>
									<i class="icon-linkedin"></i>
									<i class="icon-linkedin"></i>
								</a>
							</div>
						</div>
						<p class="text-center m-0">Copyrights &copy; 2021 Hamro Realty.</p>
					</div>
				</div>
			</footer>
		</div>

		<div id="gotoTop" class="icon-angle-up rounded-circle"></div>
		<script src="{{asset('js/jquery.js')}}"></script>
		<script src="{{asset('js/plugins.min.js')}}"></script>
		<script src="{{asset('js/functions.js')}}"></script>
		@yield('scripts')
	</body>
</html>
