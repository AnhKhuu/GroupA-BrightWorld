@extends('user.layout')
@section('title')
Homepage
@endsection
@section('link')
<link rel="stylesheet" href="{{ asset('admin-assets/dist/css/homepage.css') }}" />
@endsection
@section('content')
<div class="owl-carousel owl-theme banner-carousel position-relative">
        <div class="item">
            <img src="/admin-assets/dist/img/main/banner/banner.png" alt="">
        </div>
        <div class="item">
            <img src="/admin-assets/dist/img/main/banner/banner2.png" alt="">
        </div>
        <div class="item">
            <img src="/admin-assets/dist/img/main/banner/banner3.png" alt="">
        </div>
    </div>
<div class="container-lg my-3 my-lg-5">
<div class="d-flex justify-content-between align-items-center">
  <h3 class="mb-3">BEST SELLERS</h3>
</div>
<section class="product-carousel">
  <div class="owl-carousel owl-theme owl-product-carousel mb-4 mb-lg-5">
    @foreach($bestSeller as $product)
      <div class="item">
          <a href="/homepage/{{$product->id}}" class="d-block img-container">
            <img src="/admin-assets/dist/img/product/{{$product->img_url}}">
          </a>
          <a href="/homepage/{{$product->id}}">
              <p>{{$product->name}}</p>
          </a>
          <div class="price">
              <span class="old-price">{{$product->price}}</span>
              @foreach($sales as $sale)
                @if($sale->id == $product->sale_id)
              <span class="new-price">{{(1-$sale->percent)*$product->price}}</span>
                @endif
              @endforeach
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
<div class="d-flex justify-content-between align-items-center">
  <h3 class="mb-3">NEW ITEMS</h3>
</div>
<section class="product-carousel">
  <div class="owl-carousel owl-theme owl-product-carousel mb-4 mb-lg-5">
    @foreach($newItems as $product)
      <div class="item">
          <a href="/homepage/{{$product->id}}" class="d-block img-container">
            <img src="/admin-assets/dist/img/product/{{$product->img_url}}">
          </a>
          <a href="/homepage/{{$product->id}}">
              <p>{{$product->name}}</p>
          </a>
          <div class="price">
              <span class="old-price">{{$product->price}}</span>
              @foreach($sales as $sale)
                @if($sale->id == $product->sale_id)
              <span class="new-price">{{(1-$sale->percent)*$product->price}}</span>
                @endif
              @endforeach
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
</div>
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
      }, 0);
  
      setTimeout(function(){
        $(".banner-carousel").owlCarousel({
          loop: true,
          margin: 13,
          items: 1,
          autoplay: true,
          autoplayTimeout: 2000,
          autoplayHoverPause: true,
          responsiveClass: true,
          responsive: {
            0: {
              nav: false
            },
            768: {
              nav: true
            }
          }
      });
      }, 0);
</script>
@endsection