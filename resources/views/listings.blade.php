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
    <small class="mt-2">Total Results:{{$totalMatchedListing}}</small>
    @if(session('success'))	
      <div class="alert alert-dismissible fade show" style='background:#22D172;color:white' role="alert">
        <strong> <i class="icon-check-double"></i></strong> {{session('success')}}. 
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
          placeholder="Enter City or Zip... "
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
              <div class="col-6 mb-2"><i class="icon-bed"></i> {{$listing['info']['BedsTotal']==''?'N/A':$listing['info']['BedsTotal']}}</div>
              <div class="col-6 mb-2"><i class="icon-bath"></i> {{$listing['info']['BathsTotal']==''?'N/A':$listing['info']['BathsTotal']}}</div>
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
	const button = document.querySelector('#submit-btn');
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
  cards.forEach(card=>card.addEventListener('click',()=>{
    loading.innerHTML=`
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
      <span class="sr-only">Loading...</span>
    `
    loading.setAttribute('class','d-block text-center');

  }))
</script>

@endsection