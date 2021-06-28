@extends('layout.app')
@section('title')
Single Property
@endsection
@section('content')
<div class="container">
  <section id="slider" class="slider-element dark " style="background-image: url('{{$photos[3]}}'); background-size: cover; height: 450px; background-position:center center">
			<div class="container clearfix" style="z-index: 2;">
				<div class="real-estate-info-wrap">
					<div class="heading-block mb-0 border-bottom-0 d-md-flex d-block align-items-center justify-content-around">
						<h2 class="text-white"> {{$data['StreetNumber']}} {{$data['StreetName']}} {{$data['StreetSuffix']}}, {{$data['City']}}, {{$data['PostalCode']}}</span></h2>
						<div class="d-flex flex-shrink-1" data-lightbox="gallery">
							<a href="{{$photos[3]}}" class="button button-color button-rounded nott m-0 fw-medium align-self-end" data-lightbox="gallery-item"><i class="icon-picture"></i> View Gallery</a>
							 @foreach($photos as $photo)
                <a href="{{$photo}}" class="d-none" data-lightbox="gallery-item"></a>
              @endforeach
						</div>
					</div>
					<div class="real-estate-price mx-5"><h3>$ {{ number_format($data['ListPrice'],2)}}</h3></div>
				</div>
			</div>
			<div class="video-wrap" style="position: absolute; top: 0; left: 0; height: 100%;z-index: 1">
				<div class="video-overlay" style="background:linear-gradient(180deg,rgba(0,0,0,.3) 0,transparent 40%,transparent 60%,rgba(0,0,0,.8));"></div>
			</div>
		</section>
		<section id="content">
			<div class="content-wrap pt-0">
				<div class="section mt-0" style="padding: 30px 0">
					<div class="container clearfix">
						<div class="row">
							<div class="col-md-2 col-6 center">
								<i class="icon-money-check-alt i-plain i-large mx-auto mb-0"></i>
								<h5 class="my-1">$ {{ number_format($data['ListPrice'],2)}}</h5>
							</div>
							<div class="col-md-2 col-6 center">
								<i class="icon-bed i-plain i-large mx-auto mb-0"></i>
								<h5 class="my-1">{{$data['BedsTotal']==''?'N/A':$data['BedsTotal']}}</h5>
							</div>
							<div class="col-md-2 col-6 center">
								<i class="icon-map-marked-alt i-plain i-large mx-auto mb-0"></i>
								<h5 class="my-1">{{$data['LotSizeAreaSQFT']==''?'N/A':$data['LotSizeAreaSQFT']}} Sq. Ft.</h5>
							</div>
							<div class="col-md-2 col-6 center">
								<i class="icon-bath i-plain i-large mx-auto mb-0"></i>
								<h5 class="my-1">{{$data['BathsTotal']==''?'N/A':$data['BathsTotal']}}</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="container clearfix">
					<div class="row gutter-40 col-mb-80">
						<div class="postcontent col-lg-8">
							<p>{{$data['PublicRemarks']}}</p>
              <small>Listed by {{$data['ListAgentFullName']}} • {{$data['ListOfficeName']}} <br>
                Source:NTREIS</small>
							<h4 class="mb-0 topmargin">Property Details for {{$data['StreetNumber']}} {{$data['StreetName']}} {{$data['StreetSuffix']}}, {{$data['City']}}, {{$data['PostalCode']}} </h4>
							<div class="line line-sm mt-1 mb-3"></div>
							<div class="row clearfix">
								<div class="col-md-6">
									<ul class="iconlist">
										<li class="mb-1"><i class="icon-line2-check"></i><strong>Construction year </strong>: {{$data['YearBuilt']==''?'N/A':$data['YearBuilt']}}</li>
										<li class="mb-1"><i class="icon-line2-check"></i><strong>Lot Size</strong>: {{$data['LotSizeAreaSQFT']==''?'N/A':$data['LotSizeAreaSQFT']}}Sq.Ft.</li>
                    	<li class="mb-1"><i class="icon-line2-check"></i><strong>Property Type</strong>: {{$data['PropertyType']==''?'N/A':$data['PropertyType']}}</li>
										<li class="mb-1"><i class="icon-line2-check"></i><strong>Style</strong>: {{$data['StructuralStyle']==''?'N/A':$data['StructuralStyle']}}</li>
									</ul>
								</div>
								<div class="col-md-6">
									<ul class="iconlist">
										<li class="mb-1"><i class="icon-line2-check"></i><strong>Bedrooms</strong>: {{$data['BedsTotal']==''?'N/A':$data['BedsTotal']}}</li>
									  <li class="mb-1"><i class="icon-line2-check"></i><strong>Total rooms</strong>: {{$data['RoomCount']==''?'N/A':$data['RoomCount']}}</li>
										<li class="mb-1"><i class="icon-line2-check"></i><strong>Total Baths</strong>: {{$data['BathsTotal']==''?'N/A':$data['BathsTotal']}}</li>
										<li class="mb-1"><i class="icon-line2-check"></i><strong>Pool</strong>:{{$data['PoolYN']==''?'N/A':($data['PoolYN']=='1'?'Yes':'No')}} </li>

									</ul>
								</div>
							</div>
							<div class="line line-sm mt-1 mb-3"></div>
	            <h4 class="mb-0 topmargin">School Details for {{$data['StreetNumber']}} {{$data['StreetName']}} {{$data['StreetSuffix']}}, {{$data['City']}}, {{$data['PostalCode']}} </h4>
							<div class="line line-sm mt-1 mb-3"></div>
							<div class="row clearfix">
								<div class="col-md-10">
									<ul class="iconlist">
                    <li class="mb-1"><i class="icon-line2-check"></i><strong>School District</strong>: {{$data['SchoolDistrict']==''?'N/A':$data['SchoolDistrict']}}</li>
                    <li class="mb-1"><i class="icon-line2-check"></i><strong>Elementary School</strong>: {{$data['ElementarySchoolName']==''?'N/A':$data['ElementarySchoolName']}}</li>
                    <li class="mb-1"><i class="icon-line2-check"></i><strong>High School</strong>: {{$data['HighSchoolName']==''?'N/A':$data['HighSchoolName']}}</li>
                    <li class="mb-1"><i class="icon-line2-check"></i><strong>Intermediate School</strong>: {{$data['IntermediateSchoolName']==''?'N/A':$data['IntermediateSchoolName']}}</li>
                    <li class="mb-1"><i class="icon-line2-check"></i><strong>Junior High School</strong>: {{$data['JuniorHighSchoolName']==''?'N/A':$data['JuniorHighSchoolName']}}</li>
                    <li class="mb-1"><i class="icon-line2-check"></i><strong>Middle School</strong>: {{$data['MiddleSchoolName']==''?'N/A':$data['MiddleSchoolName']}}</li>
                    <li class="mb-1"><i class="icon-line2-check"></i><strong>Primary School</strong>: {{$data['PrimarySchoolName']==''?'N/A':$data['PrimarySchoolName']}}</li>
                    <li class="mb-1"><i class="icon-line2-check"></i><strong>Senior High School</strong>: {{$data['SeniorHighSchoolName']==''?'N/A':$data['SeniorHighSchoolName']}}</li>
									</ul>
								</div>
							</div>

              <div class="line line-sm mt-1 mb-3"></div>
	            <h4 class="mb-0 topmargin">Other Details for {{$data['StreetNumber']}} {{$data['StreetName']}} {{$data['StreetSuffix']}}, {{$data['City']}}, {{$data['PostalCode']}} </h4>
							<div class="line line-sm mt-1 mb-3"></div>
							<div class="row clearfix">
								<div class="col-md-10">
									<ul class="iconlist">
                    <li class="mb-1"><i class="icon-line2-check"></i><strong>Utilities</strong>: {{$data['Utilities']==''?'N/A':$data['Utilities']}}</li>
										<li class="mb-1"><i class="icon-line2-check"></i><strong>Security</strong>: {{$data['SecurityFeatures']==''?'N/A':$data['SecurityFeatures']}}</li>
                    <li class="mb-1"><i class="icon-line2-check"></i><strong>Half Baths</strong>: {{$data['BathsHalf']==''?'N/A':$data['BathsHalf']}}</li>
                    <li class="mb-1"><i class="icon-line2-check"></i><strong>Full Baths</strong>: {{$data['BathsFull']==''?'N/A':$data['BathsFull']}}</li>
                    <li class="mb-1"><i class="icon-line2-check"></i><strong>Pool Features</strong>: {{$data['LastListPrice']==''?'N/A':$data['LastListPrice']}}</li>


									</ul>
								</div>
							</div>

						</div>
						<div class="sidebar sticky-sidebar-wrap col-lg-4" style="margin-bottom: 5rem;">
							<div class="sidebar-widgets-wrap">
								<div class="sticky-sidebar">
										<div class="card bg-light">
											<div class="card-header">Go tour this home</div>
											<div class="card-body">
												<div class="form-result"></div>
													<a href="tour.html" class="button  button-rounded w-100 m-0" >Book Tour</a>
                          <p class="mt-3 mb-1" style="font-size: 0.8rem;">Its free, with no obligation - cancel anytime</p>
											</div>
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
</div>
@endsection