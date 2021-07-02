@extends('layout.app')
@section('title')
Search Results
@endsection
@section('content')
<div class="container pt-3">
    <div class="heading-block center border-bottom-0">
    <h2 class="ls2 fw-bold pb-2">
      <span style="border-bottom: 5px solid #d90416; color: black"
        >Results For : 
      </span>
      <span>{{$keyword}}</span>
    </h2>
    @isset($min)
      <h4> <span style="color:#d90416"> Filter</span>(Price Range) : ${{number_format($min,2)}} to ${{$max==0?'-': number_format($max,2)}}</h4>
    @endisset
    <small class="mt-2">Total Results:{{$totalMatchedListing}}</small>
    @if(session('success'))	
      <div class="alert alert-dismissible fade show" style='background:#22D172;color:white' role="alert">
        <strong> <i class="icon-check-double"></i></strong> {{session('success')}}. 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if(session('info'))	
      <div class="alert alert-dismissible fade show" style='background:#01078B;color:white' role="alert">
        <strong> <i class="icon-check-double"></i></strong> {{session('info')}}. 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <form
      id="widget-subscribe-form"
      action="{{route('search.property')}}"
      method="POST"
      class="mb-0 mt-4"
      data-animate="fadeInUp"
    >
      @csrf
      <div class="input-group mx-auto">
        <input
          type="text"
          name="keyword"
          id="widget-subscribe-form-email"
          class="form-control form-control-lg not-dark "
          placeholder="Enter City,Zip,Street Address(e.g. 1111 Glenn Dr) "
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

  	<div class="row justify-content-center my ">
      <div class="col-md-11 text-center">
        <div class="btn-group">
          <form action="/filter-price/{{$keyword}}" method="POST">
            @csrf
            <div class="row justify-content-center align-items-center text-center">
              <div class="col-md-4 ">
                Filter By Price:
              </div>
              <div class="col-md-3 col-sm-4  my-2">
                <select class="form-select" name="min" id="min">
                  <option value="0" selected>No Min</option>
                  <option value="50000" aria-label="$50k">$50k</option>
                  <option value="75000" aria-label="$75k">$75k</option>
                  <option value="100000" aria-label="$100k">$100k</option>
                  <option value="125000" aria-label="$125k">$125k</option>
                  <option value="150000" aria-label="$150k">$150k</option>
                  <option value="175000" aria-label="$175k">$175k</option>
                  <option value="200000" aria-label="$200k">$200k</option>
                  <option value="225000" aria-label="$225k">$225k</option>
                  <option value="250000" aria-label="$250k">$250k</option>
                  <option value="275000" aria-label="$275k">$275k</option>
                  <option value="300000" aria-label="$300k">$300k</option>
                  <option value="325000" aria-label="$325k">$325k</option>
                  <option value="350000" aria-label="$350k">$350k</option>
                  <option value="375000" aria-label="$375k">$375k</option>
                  <option value="400000" aria-label="$400k">$400k</option>
                  <option value="425000" aria-label="$425k">$425k</option>
                  <option value="450000" aria-label="$450k">$450k</option>
                  <option value="475000" aria-label="$475k">$475k</option>
                  <option value="500000" aria-label="$500k">$500k</option>
                  <option value="550000" aria-label="$550k">$550k</option>
                  <option value="600000" aria-label="$600k">$600k</option>
                  <option value="650000" aria-label="$650k">$650k</option>
                  <option value="700000" aria-label="$700k">$700k</option>
                  <option value="750000" aria-label="$750k">$750k</option>
                  <option value="800000" aria-label="$800k">$800k</option>
                  <option value="850000" aria-label="$850k">$850k</option>
                  <option value="900000" aria-label="$900k">$900k</option>
                  <option value="950000" aria-label="$950k">$950k</option>
                  <option value="1000000" aria-label="$1M">$1M</option>
                  <option value="1250000" aria-label="$1.25M">$1.25M</option>
                  <option value="1500000" aria-label="$1.5M">$1.5M</option>
                  <option value="1750000" aria-label="$1.75M">$1.75M</option>
                  <option value="2000000" aria-label="$2M">$2M</option>
                  <option value="2250000" aria-label="$2.25M">$2.25M</option>
                  <option value="2500000" aria-label="$2.5M">$2.5M</option>
                  <option value="2750000" aria-label="$2.75M">$2.75M</option>
                  <option value="3000000" aria-label="$3M">$3M</option>
                  <option value="3250000" aria-label="$3.25M">$3.25M</option>
                  <option value="3500000" aria-label="$3.5M">$3.5M</option>
                  <option value="3750000" aria-label="$3.75M">$3.75M</option>
                  <option value="4000000" aria-label="$4M">$4M</option>
                  <option value="4250000" aria-label="$4.25M">$4.25M</option>
                  <option value="4500000" aria-label="$4.5M">$4.5M</option>
                  <option value="4750000" aria-label="$4.75M">$4.75M</option>
                  <option value="5000000" aria-label="$5M">$5M</option>
                  <option value="6000000" aria-label="$6M">$6M</option>
                  <option value="7000000" aria-label="$7M">$7M</option>
                  <option value="8000000" aria-label="$8M">$8M</option>
                  <option value="9000000" aria-label="$9M">$9M</option>
                  <option value="10000000" aria-label="$10M">$10M</option>
                </select>
              </div>
              <div class="col-md-3 col-sm-4 my-2">
                <select class="form-select" name="max" id="max">
                  <option value="0" selected>No Max</option>
                  <option value="50000" aria-label="$50k">$50k</option>
                  <option value="75000" aria-label="$75k">$75k</option>
                  <option value="100000" aria-label="$100k">$100k</option>
                  <option value="125000" aria-label="$125k">$125k</option>
                  <option value="150000" aria-label="$150k">$150k</option>
                  <option value="175000" aria-label="$175k">$175k</option>
                  <option value="200000" aria-label="$200k">$200k</option>
                  <option value="225000" aria-label="$225k">$225k</option>
                  <option value="250000" aria-label="$250k">$250k</option>
                  <option value="275000" aria-label="$275k">$275k</option>
                  <option value="300000" aria-label="$300k">$300k</option>
                  <option value="325000" aria-label="$325k">$325k</option>
                  <option value="350000" aria-label="$350k">$350k</option>
                  <option value="375000" aria-label="$375k">$375k</option>
                  <option value="400000" aria-label="$400k">$400k</option>
                  <option value="425000" aria-label="$425k">$425k</option>
                  <option value="450000" aria-label="$450k">$450k</option>
                  <option value="475000" aria-label="$475k">$475k</option>
                  <option value="500000" aria-label="$500k">$500k</option>
                  <option value="550000" aria-label="$550k">$550k</option>
                  <option value="600000" aria-label="$600k">$600k</option>
                  <option value="650000" aria-label="$650k">$650k</option>
                  <option value="700000" aria-label="$700k">$700k</option>
                  <option value="750000" aria-label="$750k">$750k</option>
                  <option value="800000" aria-label="$800k">$800k</option>
                  <option value="850000" aria-label="$850k">$850k</option>
                  <option value="900000" aria-label="$900k">$900k</option>
                  <option value="950000" aria-label="$950k">$950k</option>
                  <option value="1000000" aria-label="$1M">$1M</option>
                  <option value="1250000" aria-label="$1.25M">$1.25M</option>
                  <option value="1500000" aria-label="$1.5M">$1.5M</option>
                  <option value="1750000" aria-label="$1.75M">$1.75M</option>
                  <option value="2000000" aria-label="$2M">$2M</option>
                  <option value="2250000" aria-label="$2.25M">$2.25M</option>
                  <option value="2500000" aria-label="$2.5M">$2.5M</option>
                  <option value="2750000" aria-label="$2.75M">$2.75M</option>
                  <option value="3000000" aria-label="$3M">$3M</option>
                  <option value="3250000" aria-label="$3.25M">$3.25M</option>
                  <option value="3500000" aria-label="$3.5M">$3.5M</option>
                  <option value="3750000" aria-label="$3.75M">$3.75M</option>
                  <option value="4000000" aria-label="$4M">$4M</option>
                  <option value="4250000" aria-label="$4.25M">$4.25M</option>
                  <option value="4500000" aria-label="$4.5M">$4.5M</option>
                  <option value="4750000" aria-label="$4.75M">$4.75M</option>
                  <option value="5000000" aria-label="$5M">$5M</option>
                  <option value="6000000" aria-label="$6M">$6M</option>
                  <option value="7000000" aria-label="$7M">$7M</option>
                  <option value="8000000" aria-label="$8M">$8M</option>
                  <option value="9000000" aria-label="$9M">$9M</option>
                  <option value="10000000" aria-label="$10M">$10M</option>
                </select>
              </div>
              <div class="col-md-2 col-sm-4 my-2">
                <button type="submit" class="button button-rounded" id="filter" style="background:#242424" disabled>Filter</button>
              </div>
          </div>
         </form>
        </div>
      </div>
    </div>

</div>
<h4 class="d-none text-center" id="loading"></h4>
<div class="container">
  <div class="row justify-content-center mb-5">
    @forelse($listings as $listing)
      <div class="col-sm-6 col-lg-3 my-3">
        <div class="card shadow-sm">
          <div style="max-height:197px;overflow:hidden;">
            <img src="{{$listing['photo']}}" class="card-img-top" alt="...">
          </div>
          <div class="card-body pb-1">
            {{-- <span class="badge bg-info text-dark mb-2 fw-normal px-2 py-1">Premium</span> --}}
            <h4 class="mb-0 h4 fw-semibold">$ {{ number_format($listing['info']['ListPrice'],2)}}</h4>
            <p class="mb-4 op-07" style="line-height: 1.65">{{$listing['info']['StreetNumber']}} {{$listing['info']['StreetName']}} {{$listing['info']['StreetSuffix']}}, {{$listing['info']['City']}}, {{$listing['info']['PostalCode']}}</p>
            <small class="ls2 fw-bold text-uppercase op-05 mb-2 d-block">Features</small>
            <div class="row g-0 mb-2 clearfix car-features">
              @php
                  $baths = $listing['info']['BathsTotal']??'N/A';
                  if($baths!='N/A'){
                    $after = (float)$baths -(float)$baths%10;
                    if(abs(($after-0.1)/0.1)<0.00001){
                      $baths = ($baths%10) + 0.5;
                    } 
                  }
              @endphp
              <div class="col-6 mb-2"><i class="icon-bed"></i> {{$listing['info']['BedsTotal']==''?'N/A':$listing['info']['BedsTotal']}}</div>
              <div class="col-6 mb-2"><i class="icon-bath"></i> {{$baths}}</div>
              <div class="col-12"></i>{{$listing['info']['LotSizeAreaSQFT']==''?'N/A':$listing['info']['LotSizeAreaSQFT']}} Sq. Ft.</div>
            </div>
          </div>
          <a href="{{route('property.single',$listing['info']['Matrix_Unique_ID'])}}" class="stretched-link"></a>
        </div>
        {{-- <div class="text-center">
        <form action="{{route('add.cart')}}" method="POST">
          @csrf
          <input type="text" name="matrix_id" value="{{$listing['info']['Matrix_Unique_ID']}}" hidden>
          <input type="text" name="property" value="{{$listing['info']['StreetNumber']}} {{$listing['info']['StreetName']}} {{$listing['info']['StreetSuffix']}}, {{$listing['info']['City']}}, {{$listing['info']['PostalCode']}}" hidden>
          <input type="text" name="image" value="{{$listing['photo']}}" hidden>
          <input type="text" name="price" value="{{$listing['info']['ListPrice']}}" hidden>
          <input type="submit" value="Add To Cart" class="button button-rounded w-100 m-0" style="background: #242424">
        </form>
        </div> --}}
      </div>
    @empty
      <h3>Sorry! No results for {{$keyword}}</h3>
    @endforelse
  </div>
</div>
@endsection
@section('scripts')
<script>
	const filter = document.querySelector('#filter');
	const min = document.querySelector('#min');
	const max = document.querySelector('#max');
  const enableFilter = ()=>{
    if(min.value!=0 || max.value!=0){
      filter.disabled = false;
    }else{
      filter.disabled = true;
    }
  }
	const button = document.querySelector('#submit-btn');

  min.addEventListener('change',enableFilter);
  max.addEventListener('change',enableFilter);


	const searchText = document.querySelector('#widget-subscribe-form-email');
  const cards = document.querySelectorAll('.stretched-link');
  const loading = document.querySelector('#loading');
	button.addEventListener('click',()=>{
		if(searchText.value!==''){
			button.innerHTML=` <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
      <span class="sr-only">Loading...</span>`
			searchText.setAttribute('readonly',true);
		}
	})
  filter.addEventListener('click',()=>{
    console.log(min.value,max.value)
		if(min.value!=0 || max.value!=0 ){
			filter.innerHTML=` <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
      <span class="sr-only">Loading...</span>`
		}
	})
  cards.forEach(card=>card.addEventListener('click',()=>{
    loading.innerHTML=`
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
      <span class="sr-only">Loading...</span>
    `
    loading.setAttribute('class','d-block text-center');

  }))
</script>

@endsection