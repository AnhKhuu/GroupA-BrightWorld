@extends('user.layout')
@section('title')
Homepage
@endsection
@section('link')
<link rel="stylesheet" href="{{ asset('admin-assets/dist/css/homepage.css') }}" />
@endsection
@section('content')
<div class="d-flex justify-content-between align-items-center">
  <h1 class="mb-3">BEST SELLERS</h1>
  {{$sale->percent}}
</div>
<section class="product-carousel">
  <div class="owl-carousel owl-theme owl-product-carousel mb-4 mb-lg-5">
    @foreach($pro as $product)
      <div class="item">
          <a href="#!/Homepage/{{$product->id}}" class="d-block img-container">
            <img src="/admin-assets/dist/img/product/{{$product->img_url}}">
          </a>
          <a href="#!/Homepage/{{$product->id}}">
              <p>{{$product->name}}</p>
          </a>
          <div class="price">
              <span class="old-price">{{$product->price}}</span>
              <!-- <span class="new-price">{{(1-$product->sale)*$product->price}}</span> -->
          </div>
          <div class="d-flex align-items-center justify-content-between  mt-2">
              <!-- <span class="star-rating">
                  <span ng-repeat="rating in $product->starRating">
                    <div star-static-rating rating-value="rating.current" max="rating.max"></div>
                  </span>
              </span> -->
              <span class="favorite">
                  <span class="material-icons heart-outline">
                      favorite_border
                  </span>
              </span>
          </div>
      </div>
    @endforeach
  </div>
</section>
@endsection
@section('script')
<script>
  setTimeout(function () {
          $('.owl-product-carousel').owlCarousel({
              loop: false,
              margin: 13,
              responsiveClass: true,
              nav: true,
              dots: false,
              responsive: {
                  0: {
                      items: 2
                  },
                  768: {
                      items: 3
                  },
                  992: {
                      items: 4,
                      margin: 16
                  }
              }
          }
          )
      }, 1000);
</script>
@endsection