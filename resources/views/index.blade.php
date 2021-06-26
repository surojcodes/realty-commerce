@extends('layout.app')
@section('title')
    Home
@endsection
@section('content')
<section class="slider-element min-vh-75 shadow-sm" style="background: url('https://images.unsplash.com/photo-1594540992254-0e2239661647?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80') center center no-repeat; background-size: cover;">
			<div class="slider-inner">

				<div class="vertical-middle">
					<div class="container">

						<div class="center mx-auto" style="max-width: 700px;">
							<div class="emphasis-title">
								<h1 class="font-secondary" style="color: #FFF; font-size: 76px; font-weight: 900; text-shadow: 0 7px 10px rgba(0,0,0,0.07), 0 4px 4px rgba(0,0,0,0.2);">Hamro Realty</h1>
								<p style="font-weight: 300; ; color: #FFF; text-shadow: 0 -4px 20px rgba(0, 0, 0);">Buy with 
								Hamro Realty, We will help you save thousands</p>
							</div>
							<div class="subscribe-widget" data-loader="button">
								<div class="widget-subscribe-form-result"></div>
								<form id="widget-subscribe-form" action="include/subscribe.php" method="post" class="mb-0" data-animate="fadeInUp">
									<div class="input-group mx-auto">
										<input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control form-control-lg not-dark required email" placeholder="Enter City or Zip... " style="border: 0; box-shadow: none; overflow: hidden;">
										<button href="#" class="button " type="submit" style="border-radius: 3px;">Search</button>
									</div>
								</form>
							</div>
						</div>

					</div>
				</div>

			</div>
		</section>

		<section id="content">
			<div class="content-wrap pt-0 clearfix">
				<div class="container topmargin-lg bottommargin-lg clearfix">
					<div class="mx-auto" style="max-width: 960px">
						<div class="heading-block center border-bottom-0">
							<h2 class="ls2 fw-bold">Hamro Realty Cash Rebate</h2>
						</div>
						<div class="tabs tabs-alt tabs-responsive tabs-justify clearfix" id="tab">
							<div class="tab-container">
								<div class="clearfix">
									<div class="d-flex justify-content-center align-items-center">
										<div class="story-box-image">
											<img src="{{asset('/images/rebate.jpg')}}" alt="rebate-scheme">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

@endsection