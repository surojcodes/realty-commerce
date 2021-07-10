@extends('layout.app') @section('title') Upload Data @endsection
@section('content')
<div class="container pt-5">
	<div class="heading-block center border-bottom-0">
		<h3 class="ls2 fw-bold">
			<h2 class="ls2 fw-bold">
				<span style="border-bottom: 5px solid #d90416; color: black"
					>Upload
				</span>
				<span>Data</span>
			</h2>
		</h3>
	</div>
	<div
		id="bookingForm"
		style="max-width: 750px"
		class="mx-auto border pt-5 pb-2 px-4 mb-5 shadow-sm"
	>
		@if(session('error'))	
		<div class="alert alert-dismissible fade show" style='background:#d90416;color:white' role="alert">
			<strong> <i class="icon-warning-sign"></i></strong> {{session('error')}}. 
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		@endif
		<form action="{{route('store.data')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="row">
					<div class="col-md-6 form-group">
					<label class="nott" for="template-contactform-email"
						>Email <small>*</small></label
					>
					<input
						type="email"
						class="sm-form-control"
						name="email"
						placeholder="Enter Email Address"
						required
					/>
				</div>
					<div class="col-md-6 form-group">
					<label class="nott" for="template-contactform-email"
						>Password <small>*</small></label
					>
					<input
						type="password"
						class="sm-form-control"
						name="password"
						placeholder="Enter Password"
						required
					/>
				</div>
			</div>
			<div class="row">
				<div>
          <label class="nott">Upload CSV File:</label>
          <input class="form-control form-control" name="data" type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
        </div>
			</div>

				<input
					class="button button-rounded m-0 mt-3"
					type="submit"
          value="Upload Data"
					id="upload-btn"
				/>
		</form>
	</div>
</div>
@endsection
@section('scripts')
<script>
	const button = document.querySelector('#upload-btn');
	button.addEventListener('click',()=>{
			button.innerHTML=` <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  <span class="sr-only">Uploading...</span>`
	})
</script>
@endsection
