@extends('layout.app')
@section('title')
Cart
@endsection
@section('content')
<section id="content">
<div class="container pt-3">
    <div class="heading-block center border-bottom-0 mb-0">
    <h2 class="ls2 fw-bold pb-2">
      <span style="border-bottom: 5px solid #d90416; color: black"
        >Your  
      </span>
      <span>Tour Cart</span>
    </h2>
    <small class="mt-2">Total Items:{{$count}}</small>
    </div>
    @if(session('success'))	
      <div class="alert alert-dismissible fade show" style='background:#22D172;color:white' role="alert">
        <strong> <i class="icon-check-double"></i></strong> {{session('success')}}. 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    </div>
<h4 class="d-none text-center" id="loading"></h4>
  <div class="content-wrap pt-4">
    <div class="container">
      <table class="table cart mb-5 ">
        <thead>
          <tr>
            <th class="cart-product-remove">Remove</th>
            <th class="cart-product-thumbnail">Image</th>
            <th class="cart-product-name">Property</th>
            <th class="cart-product-price">Price</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($items as $item)
            <tr class="cart_item">
            <td class="cart-product-remove">
              <a href="/delete-item/{{$item['matrix_id']}}" class="remove" title="Remove this item"><i class="icon-trash2 icon-2x"></i></a>
            </td>

            <td class="cart-product-thumbnail">
              <a href="/property/{{$item['matrix_id']}}" class='prop-image'><img width="100" height="100" src="{{$item['image']}}" alt="Not Available"></a>
            </td>

            <td class="cart-product-name">
              <a href="#">{{$item['property']}}</a>
            </td>

            <td class="cart-product-price">
              <span class="amount">${{ number_format($item['price'],2)}}</span>
            </td>
          </tr>
          @empty
            <tr class="text-center">
              <td colspan="4">No items in cart.</td>
            </tr>
          @endforelse
          <tr class="cart_item">
            <td colspan="6">
              <div class="row justify-content-between py-2 col-mb-30">
                <div class="col-lg-auto ps-lg-0">
                </div>
                @if($count>0)
                <div class="col-lg-auto pe-lg-0">
									<a href="/clear-cart" id='clear-cart' class="button button-3d m-0">Clear Cart</a>
                  <a href="/schedule-cart" class="button button-3d mt-2 mt-sm-0 me-0" id='schedule-cart' style="background:#242424">Schedule Tour For Cart Properties</a> <br>
                </div>
                @endif
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
@section('scripts')
<script>
  const images = document.querySelectorAll('.prop-image');
  const bins = document.querySelectorAll('.remove');
  const loading = document.querySelector('#loading');
  const clearBtn = document.querySelector('#clear-cart');
  const scheduleBtn = document.querySelector('#schedule-cart');

  images.forEach(image=>image.addEventListener('click',()=>{
    loading.innerHTML=`
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
      <span class="sr-only">Loading...</span>
    `
    loading.setAttribute('class','d-block text-center my-2');
  }))
   bins.forEach(bin=>bin.addEventListener('click',()=>{
    loading.innerHTML=`
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
      <span class="sr-only">Removing...</span>
    `
    loading.setAttribute('class','d-block text-center my-2');
  }))

  if(clearBtn){
		clearBtn.addEventListener('click',()=>{
				clearBtn.innerHTML=` <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		<span class="sr-only">Clearing...</span>`
		})
	}
  if(scheduleBtn){
		scheduleBtn.addEventListener('click',()=>{
				scheduleBtn.innerHTML=` <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		<span class="sr-only">Loading...</span>`
		})
	}
</script>

@endsection