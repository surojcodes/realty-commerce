@extends('layout.app') @section('title') Book Tour @endsection
@section('content')
<div class="container pt-5">
	<div class="heading-block center border-bottom-0">
		<h3 class="ls2 fw-bold">
			<h2 class="ls2 fw-bold">
				<span style="border-bottom: 5px solid #d90416; color: black"
					>Schedule
				</span>
				<span>Tour</span>
			</h2>
		</h3>
	</div>
	<div
		id="bookingForm"
		style="max-width: 750px"
		class="mx-auto border pt-5 pb-2 px-4 mb-5 shadow-sm"
	>
		<form action="{{route('confirm.tour')}}" method="POST">
			@csrf
			<h4 class="text-center">
				<span style="border-bottom: 2px solid #d90416">Tour Information</span>
			</h4>
			<h5>Properties:</h5>
			<ol class="list-group list-group-numbered mb-4">
			
				@foreach($items as $item)
				<li class="list-group-item d-flex justify-content-between align-items-start">
					<div class="ms-2 me-auto">
						<div class="fw-bold">{{$item['property']}}</div>
					 ${{ number_format($item['price'],2)}}
					</div>
				</li>
			@endforeach
			</ol>
			<div class="row">
				<div class="col-md-6 form-group">
					<label class="nott"
						>Pick a Date <small>* (click calender icon)</small></label
					>
					<input
						type="date"
						class="sm-form-control required"
						name="date"
						id="date"
						placeholder="Pick a date"
						required
					/>
				</div>

				<div class="col-md-6 form-group">
					<label class="nott" for="template-contactform-email"
						>Pick a Time <small>* (click clock icon)</small></label
					>
					<input
						type="time"
						class="sm-form-control"
						name="time"
						id="time"
						placeholder="Pick a time"
						required
					/>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 form-group">
					<label class="nott">Tour Style <small>*</small></label>
					<select name="style" class="form-select" id="style">
						<option value="In Person">Tour In Person</option>
						<option value="Video Call">Tour In Video Chat</option>
					</select>
				</div>
			</div>
			<h4 class="text-center my-4">
				<span style="border-bottom: 2px solid #d90416">Your Information</span>
			</h4>
			<div class="row">
				<div class="col-md-6 form-group">
					<label class="nott">Full Name <small>*</small></label>
					<input
						type="text"
						class="sm-form-control required"
						name="name"
						id="name"
						placeholder="Enter Full Name"
						required
					/>
				</div>
				@php
						$properties = json_encode($items);
				@endphp
        	<input
						type="text"
						name="items"
            value="{{$properties}}"
						hidden
					/>
						<input
							type="text"
							name="fromCart"
							value="{{Request::path()}}"
							hidden
						/>
				<div class="col-md-6 form-group">
					<label class="nott" for="template-contactform-email"
						>Email <small>*</small></label
					>
					<input
						type="email"
						class="sm-form-control"
						name="email"
						id="email"
						placeholder="Enter Email Address"
						required
					/>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 form-group">
					<label class="nott" for="template-contactform-phone"
						>Phone <small>*</small></label
					>
					<input
						type="text"
						class="sm-form-control"
						name="phone"
						id="phone"
						placeholder="Enter Phone Number"
						required
					/>
				</div>
			</div>

			<div class="col-12 form-group">
				<label class="nott" for="template-contactform-message"
					>Note <small>(optional)</small></label
				>
				<textarea
					class="required sm-form-control"
					name="note"
					id="note"
					rows="6"
					cols="30"
					placeholder="Anything else you want to say?"
				></textarea>
			</div>

			<span class="amount"
				><small class="my-4"
					>By confirming, you agree to our
					<a href="" class="text-danger"> Terms of Use</a>
					and
					<a href="" class="text-danger"> Privacy Poilicy</a>
				</small></span
			>

			<div class="col-12 form-group mt-4">
				<button
					class="button button-rounded button-large m-0"
					type="submit"
					id="confirm-tour"
				>
					Confirm Tour
				</button>
			</div>
		</form>
	</div>
</div>
@endsection
@section('scripts')
<script>
		const button = document.querySelector('#confirm-tour');
		const name = document.querySelector('#name');
		const email = document.querySelector('#email');
		const phone = document.querySelector('#phone');
		const date = document.querySelector('#date');
		const time = document.querySelector('#time');
		const note = document.querySelector('#note');
		button.addEventListener('click',()=>{
			if(name.value!=='' && email.value!==''&&phone.value!==''&&date.value!==''&&time.value!==''){
			const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			if(re.test(email.value)){	
			button.innerHTML=` <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
				<span class="sr-only">Loading...</span>`
		}
	}
});
</script>
@endsection