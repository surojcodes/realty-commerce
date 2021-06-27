@extends('layout.app')
@section('title')
Search Results
@endsection
@section('content')
<div class="container pt-5">
    <div class="heading-block center border-bottom-0">
    <h2 class="ls2 fw-bold">
      <span style="border-bottom: 5px solid #d90416; color: black"
        >Results For : 
      </span>
      <span>{{$keyword}}</span>
    </h2>
    <small>Total Results:{{$totalMatchedListing}}</small>

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
          class="form-control form-control-lg not-dark "
          placeholder="Enter City or Zip... "
          style="border: 0; box-shadow: none; overflow: hidden"
          required
        />
      
        <input
          class="button"
          type="submit"
          style="border-radius: 3px"
          value='Search'
        />

      </div>
    </form>

  </div>
</div>
<div class="container">
  <div class="row justify-content-center mb-5">
    @forelse($listings as $listing)
      <div class="col-sm-6 col-lg-3 my-3">
        <div class="card shadow-sm">
          <div style="max-height:197px;overflow:hidden;">
            <img src="{{$listing['photo']}}" class="card-img-top" alt="...">
          </div>
          <div class="card-body">
            {{-- <span class="badge bg-info text-dark mb-2 fw-normal px-2 py-1">Premium</span> --}}
            <h4 class="mb-0 h4 fw-semibold">$ {{ number_format($listing['info']['ListPrice'],2)}}</h4>
            {{-- <p class="mb-4 op-07" style="line-height: 1.65">Competently embrace dynamic intellectual capital.</p> --}}
            <small class="ls2 fw-bold text-uppercase op-05 mb-2 d-block">Features</small>
            <div class="row g-0 mb-2 clearfix car-features">
              <div class="col-6 mb-2"><i class="icon-bed"></i> {{$listing['info']['BedsTotal']==''?'N/A':$listing['info']['BedsTotal']}}</div>
              <div class="col-6 mb-2"><i class="icon-bath"></i> {{$listing['info']['BathsTotal']==''?'N/A':$listing['info']['BathsTotal']}}</div>
              <div class="col-12"></i>{{$listing['info']['LotSizeAreaSQFT']==''?'N/A':$listing['info']['LotSizeAreaSQFT']}} Sq. Ft.</div>
            </div>
          </div>
          <a href="#" class="stretched-link"></a>
        </div>
      </div>
    @empty
      <h3>Sorry! No results for {{$keyword}}</h3>
    @endforelse
  </div>
</div>
@endsection