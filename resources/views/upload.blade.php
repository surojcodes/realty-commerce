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
		<form action="{{route('store.data')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div>
          <label class="form-label">Upload CSV File</label>
          <input class="form-control form-control-lg" name="data" type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
        </div>
			</div>

				<input
					class="button button-rounded button-large m-0 my-3"
					type="submit"
          value="Upload Data"
				/>
		</form>
	</div>
</div>
@endsection
