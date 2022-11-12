@extends('user.layout')
@section('title')
Homepage
@endsection
@section('link')
<link rel="stylesheet" href="{{ asset('admin-assets/dist/css/search.css') }}" />
@endsection
@section('content')
<section class="product-category container my-3 my-lg-5">
    <div class="row">
        <div class="">
            <span>Number of results: {{count($pro)}}</span>
            <div class="row">
                    @foreach($pro as $product)
                    <div class="item position-relative col-3 mr-4">
                        <a class="img-container d-block" href="/homepage/{{$product->id}}">
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
                                <span ng-repeat="rating in product.starRating">
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
        </div>
    </div>
</section>
@endsection