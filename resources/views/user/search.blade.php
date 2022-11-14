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
        <div class="col-md-3 filter-desktop">
            <h1 class="mb-3">Filter</h1>
            <div class="mb-3 mb-lg-5 filter-brand">
                <h2>Type</h2>
                <div>
                        <form action="/search-product" method="GET" enctype="multipart/form-data">
                        @foreach($types as $type)
                        <label class="container-filter d-flex align-items-center justify-content-between">
                            <span class="brand-name">{{$type->description}}</span>
                            <input type="radio" name="type" value="{{$type->id}}">
                            <span class="checkmark"></span>
                            <span class="quantity">6</span>
                        </label>
                        @endforeach
                        <input type="text" placeholder="Search" name="name" value="{{$search}}" style="width: 0; height: 0; opacity: 0">
                        <button type="submit" class="btn-apply">
                            Apply
                        </button>
                    </form>
                </div>
            </div>
            <div class="mb-3 mb-lg-5 filter-brand">
                <h2>Brand</h2>
                <div>
                <form action="/search-product" method="GET" enctype="multipart/form-data">

                @foreach($brands as $brand)
                <label class="container-filter d-flex align-items-center justify-content-between">
                            <span class="brand-name">{{$brand->full_name}}</span>
                            <input type="radio" name="type" value="{{$brand->id}}">
                            <span class="checkmark"></span>
                            <span class="quantity">6</span>
                        </label>
                @endforeach
                <input type="text" placeholder="Search" name="name" value="{{$search}}" style="width: 0; height: 0; opacity: 0">
                        <button type="submit" class="btn-apply">
                            Apply
                        </button>
                    </form>
                </div>
            </div>
            <div class="mb-3 mb-lg-5 filter-brand">
                <h2>Country</h2>
                <div>
                @foreach($countries as $country)
                    <label class="container-filter d-flex align-items-center">
                        <span class="brand-name">{{$country->full_name}}</span>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                @endforeach
                </div>
            </div>
            <!-- <div class="mb-3 mb-lg-5 filter-rating">
                <h2>Ratings</h2>
                <label class="container-filter d-flex align-items-center" for="five">
                    <input type="checkbox" id="five" value="five">
                    <span class="checkmark"></span>
                    <span>
                        <span class="material-icons star">
                            star
                        </span>
                        <span class="material-icons star">
                            star
                        </span>
                        <span class="material-icons star">
                            star
                        </span>
                        <span class="material-icons star">
                            star
                        </span>
                        <span class="material-icons star">
                            star
                        </span>
                    </span>
                </label>
                <label class="container-filter d-flex align-items-center" for="four">
                    <input type="checkbox" id="four" value="four">
                    <span class="checkmark"></span>
                    <span>
                        <span class="material-icons star">
                            star
                        </span>
                        <span class="material-icons star">
                            star
                        </span>
                        <span class="material-icons star">
                            star
                        </span>
                        <span class="material-icons star">
                            star
                        </span>
                        <span class="material-icons star-outline">
                            star_outline
                        </span>
                    </span>
                </label>
                <label class="container-filter d-flex align-items-center" for="three">
                    <input type="checkbox" id="three" value="three">
                    <span class="checkmark"></span>
                    <span>
                        <span class="material-icons star">
                            star
                        </span>
                        <span class="material-icons star">
                            star
                        </span>
                        <span class="material-icons star">
                            star
                        </span>
                        <span class="material-icons star-outline">
                            star_outline
                        </span>
                        <span class="material-icons star-outline">
                            star_outline
                        </span>
                    </span>
                </label>
                <label class="container-filter d-flex align-items-center" for="two">
                    <input type="checkbox" id="two" value="two">
                    <span class="checkmark"></span>
                    <span>
                        <span class="material-icons star">
                            star
                        </span>
                        <span class="material-icons star">
                            star
                        </span>
                        <span class="material-icons star-outline">
                            star_outline
                        </span>
                        <span class="material-icons star-outline">
                            star_outline
                        </span>
                        <span class="material-icons star-outline">
                            star_outline
                        </span>
                    </span>
                </label>
                <label class="container-filter d-flex align-items-center" for="one">
                    <input type="checkbox" id="one" value="one">
                    <span class="checkmark"></span>
                    <span>
                        <span class="material-icons star">
                            star
                        </span>
                        <span class="material-icons star-outline">
                            star_outline
                        </span>
                        <span class="material-icons star-outline">
                            star_outline
                        </span>
                        <span class="material-icons star-outline">
                            star_outline
                        </span>
                        <span class="material-icons star-outline">
                            star_outline
                        </span>
                    </span>
                </label>
            </div> -->
        </div>
        <div class="col-md-9">
            <span>Number of results: {{count($pro)}}</span>
            <div class="">
                <div class="row">
                    @foreach($pro as $product)
                    <div class="item position-relative mb-4 col-4 mr-2" style="max-width: 320px">
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
    </div>
</section>
@endsection