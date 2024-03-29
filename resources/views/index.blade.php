@extends('layout.app') @section('title') Home @endsection @section('content')
<section
	class="slider-element min-vh-75 shadow-sm"
	style="
		background: url('https://images.unsplash.com/photo-1594540992254-0e2239661647?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80')
			center center no-repeat;
		background-size: cover;
	"
>
	<div class="slider-inner">
		<div class="vertical-middle">
			<div class="container">
				<div class="center mx-auto" style="max-width: 700px">
					<div class="emphasis-title">
						<h1
							class="font-secondary"
							style="
								color: #fff;
								font-size: 76px;
								font-weight: 900;
								text-shadow: 0 7px 10px rgba(0, 0, 0, 0.07),
									0 4px 4px rgba(0, 0, 0, 0.2);
							"
						>
							<span style='color:#d90416'>Hamro</span> Realty
						</h1>
						<p
							style="
								font-weight: 300;
								color: #fff;
								text-shadow: 0 -4px 20px rgba(0, 0, 0);
							"
						>
							<strong>Buy with Hamro Realty, We will help you save thousands</strong>
						</p>
					</div>
					@if(session('error'))	
					<div class="alert alert-dismissible fade show" style='background:#d90416;color:white' role="alert">
						<strong> <i class="icon-warning-sign"></i></strong> {{session('error')}}. 
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif
					@if(session('success'))	
					<div class="alert alert-dismissible fade show" style='background:#22D172;color:white' role="alert">
						<strong> <i class="icon-check-double"></i></strong> {{session('success')}}. 
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif
						<form
							id="widget-subscribe-form"
							action="{{route('search.property')}}"
							method="GET"
							class="mb-0"
							data-animate="fadeInUp"
						>
							<div class="input-group mx-auto">
								<input
									type="text"
									id="widget-subscribe-form-email"
									name="keyword"
									class="form-control form-control-lg not-dark "
									placeholder="Enter City, Zip, Street Address(e.g. 1111 Glenn Dr)... "
									style="border: 0; box-shadow: none; overflow: hidden"
									required
								/>
								<button
									class="button"
									type="submit"
									id="submit-btn"
									style="border-radius: 3px"
								>
								Search
							</button>
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="row pt-5 bg-light">
		<div class="col-lg-6 col-md-8 mx-auto text-center">
			<p class="lead">	<strong>		Texas Law requires that all the real estate licensees provide the attached information about the brokerage services to prospective buyers, tenants, sellers and landlords
</strong></p>
			<p>
					<a class="button button-rounded button-large m-0" href="{{asset('storage/info.pdf')}}">
			Click here to view
		</a> <br> <br>
		<a
			href="https://drive.google.com/file/d/1VcDEbaq2WF1i3VhjfZqZTRzDN2rsAskV/view"
			><small
				>Consumer Complaint Against a License Holder to
				TREC</small
			></a
		>
			</p>
		</div>
</div>
<section id="content">
	<div class="content-wrap pt-0 pb-0 clearfix">
		<div class="container topmargin-lg bottommargin-lg clearfix">
			<div class="mx-auto" style="max-width: 960px">
				<div class="heading-block center border-bottom-0">
					<h2 class="ls2 fw-bold">
						<span style="border-bottom: 5px solid #d90416; color: black"
							>Hamro Realty
						</span>
						<span>Cash Rebate</span>
					</h2>
				</div>
				<div
					class="tabs tabs-alt tabs-responsive tabs-justify clearfix"
					id="tab"
				>
					<div class="tab-container">
						<div class="clearfix">
							<div class="d-flex justify-content-center align-items-center">
								<div class="story-box-image">
									<img
										src="{{asset('/images/rebate.jpg')}}"
										alt="rebate-scheme"
									/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="pb-5 pt-5" style="background: #eee">
		<div class="container">
			<div class="heading-block center border-bottom-0 pb-4">
				<h2 class="ls2 fw-bold">
					<span style="border-bottom: 5px solid #d90416; color: black"
						>Hamro Realty
					</span>
					<span> Team</span>
				</h2>
			</div>
			<div class="row col-mb-50 mb-0">
				<div class="col-lg-6">
					<div
						class="team team-list row align-items-center justify-content-center"
					>
						<div class="team-image col-sm-6 mb-3" style="max-width: 250px">
							<img
								src="{{asset('images/prabin.jpg')}}"
								alt="Prabin Maharjan"
								class="rounded rounded-circle"
							/>
						</div>
						<div class="team-desc col-sm-6">
							<div class="team-title text-center">
								<h4>Prabin Maharjan</h4>
								<span>Owner/Broker</span>
							</div>
							<div class="text-center">
								<p class="mt-4">
									<strong>
										TREC Company #<span style='color:#d90416'> 9009620</span> <br>
										TREC License #<span style='color:#d90416'> 671318</span>
									</strong>
								</p>
							</div>
							<div class="d-flex justify-content-center my-2">
								<a href="#" class="social-icon si-rounded si-small si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a href="#" class="social-icon si-rounded si-small si-twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
								{{-- <a href="#" class="social-icon si-rounded si-small si-gplus">
									<i class="icon-gplus"></i>
									<i class="icon-gplus"></i>
								</a> --}}
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div
						class="team team-list row align-items-center justify-content-center"
					>
						<div
							class="team-image col-sm-6 text-center mb-3"
							style="max-width: 250px"
						>
							<img
								src="{{asset('images/suman.jpg')}}"
								alt="Prabin Maharjan"
								class="rounded-circle"
							/>
						</div>
						<div class="team-desc col-sm-6">
							<div class="team-title text-center">
								<h4>Suman Shrestha</h4>
								<span>Lead Agent</span>
							</div>
							<div class="text-center">
								<p class="mt-4">
									<strong>TREC License # <span style='color:#d90416'>687441</span></strong>
								</p>
							</div>
							<div class="d-flex justify-content-center">
								<a href="#" class="social-icon si-rounded si-small si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a href="#" class="social-icon si-rounded si-small si-twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
								{{-- <a href="#" class="social-icon si-rounded si-small si-gplus">
									<i class="icon-gplus"></i>
									<i class="icon-gplus"></i>
								</a> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
@section('scripts')
<script>
	const button = document.querySelector('#submit-btn');
	const searchText = document.querySelector('#widget-subscribe-form-email');
	button.addEventListener('click',()=>{
		if(searchText.value!==''){
			button.innerHTML=` <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  <span class="sr-only">Loading...</span>`
			searchText.setAttribute('readonly',true);
		}
	})
</script>

@endsection