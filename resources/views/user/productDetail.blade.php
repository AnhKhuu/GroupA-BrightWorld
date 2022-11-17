@extends('user.layout')
@section('title')
    Homepage
@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/product-detail.css') }}" />
@endsection
@section('content')
    <section class="product-detail container-lg my-3 my-lg-5">
        <div class="row">
            <div class="col-lg-6">
                <img src="/admin-assets/dist/img/product/{{ $pro->img_url }}" class="w-100 img-desktop" />
                <div class="owl-carousel owl-theme product-detail-carousel">
                    <div class="item">
                        <img src="/admin-assets/dist/img/product/{{ $pro->img_url }}" alt="">
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-1">
                                  <div class="w-100 mb-5">
                                    <img src="/admin-assets/dist/img/product/{{ $pro->img_url }}" alt="" class="w-100 img-gallery">
                                  </div>
                                </div> -->
            <div class="product-information col-lg-5 ps-lg-5">
                <p class="product-name pt-3 pb-2 my-0">{{ $pro->name }}</p>
                
                <div>
                        <span>{{ $pro->sold }}</span>
                        <span>Sold</span>
                    </div>
                <div class="price">
                    @foreach ($sales as $sale)
                        @if ($sale->id == $pro->sale_id)
                            <span class="new-price">{{ (1 - $sale->percent) * $pro->price }}</span>
                        @endif
                    @endforeach
                    <div class="old-price">{{ $pro->price }}</div>
                </div>
                <div class="detail mt-3">
                    <div class="d-flex justify-content-between" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseDescription" aria-expanded="false" aria-controls="collapseDescription">
                        <span class="product-description">Product Description</span>
                        <span class="material-icons-outlined">
                            expand_more
                        </span>
                    </div>
                    <div class="collapse" id="collapseDescription">
                        <ul>
                            <li>{{ $pro->description }}</li>
                        </ul>
                    </div>
                </div>
                <div class="quantity mb-3">
                    <label for="quantity">
                        <h2>Quantity</h2>
                        <div id="change-item-cart">
                            @if (Session::has('Cart') != null)
                                @foreach (Session::get('Cart')->products as $item)
                                    @if ($pro->id == $item['productInfo']->id)
                                        <span class="px-4">{{ $item['quanty'] }}</span>
                                    @endif
                                @endforeach
                            @endif

                        </div>
                    </label>
                </div>
                <div class="btn-bar d-flex justify-content-between my-0">
                    <button class="btn add-to-cart d-flex flex-column align-items-center me-lg-4">
                        <span class="material-icons-outlined">
                            add_shopping_cart
                        </span>
                        <a onclick="AddCart({{ $pro->id }}, {{ $pro->sale_id }})" href="javascript:">Add to cart</a>
                    </button>
                    <a href="{{ route('user.checkout', $pro->id) }}" class="btn buy-now">
                        Buy now
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product-review col-lg-7">
                <div class="product-rating p-2 p-lg-3">
                    <h2>Product Ratings</h2>
                    <span class="star-rating">
                        <span class="star-rating" id="productRating">
                        </span>
                    </span>
                    <!-- Feedback -->
                    <div class="reviewer">
                        <div class="d-flex justify-content-between mb-2 mb-lg-3">
                            <div class="reviewer-ava">
                                <img src="/admin-assets/dist/img/avatar.png" alt="">
                            </div>
                            <div class="reviewer-brief p-2 p-lg-3">
                                <h3 class="reviewer-name">Anh</h3>
                                <span class="star-rating">
                                    <span class="star-rating" id="productRating">
                                        <span>
                                            <!-- <div star-static-rating rating-value="rating.current" max="rating.max"></div> -->
                                            star
                                        </span>
                                    </span>
                                </span>
                                <p class="reviewer-cmt m-0 p-0">
                                    Good
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="my-3">
                    <h3>Your rating</h3>
                    <span class="star-rating">
                        <div class=col-md-12>
                            <div>
                                <div>star</div>
                            </div>
                        </div>
                    </span>
            </div>
            </span>
            <div class="comment">
                <h3>Your review</h3>
                <textarea name="review" id="review" class="p-2 p-lg-3"
                    placeholder="Please let us know how do you feel about this product...">
                </textarea>
                <button class="px-3 submit-btn d-flex align-items-center justify-content-center mt-2 mb-4">
                    Submit
                </button>
            </div>
            </form>
        </div>
        <div class="related-product">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="mb-3">RELATED PRODUCT</h1>
            </div>
            <section class="product-carousel">
                <div class="owl-carousel owl-theme owl-product-carousel mb-4 mb-lg-5">
                    @foreach ($relatedProduct as $product)
                        @if ($product->id != $pro->id)
                            <div class="item">
                                <a href="/homepage/{{ $product->id }}" class="d-block img-container">
                                    <img src="/admin-assets/dist/img/product/{{ $product->img_url }}">
                                </a>
                                <a href="/homepage/{{ $product->id }}">
                                    <p>{{ $product->name }}</p>
                                </a>
                                <div class="price">
                                    <span class="old-price">{{ $product->price }}</span>
                                    @foreach ($sales as $sale)
                                        @if ($sale->id == $product->sale_id)
                                            <span class="new-price">{{ (1 - $sale->percent) * $product->price }}</span>
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
                        @endif
                    @endforeach
                </div>
            </section>
        </div>
    </section>
@endsection
@section('script')
    <script>
        setTimeout(function() {
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
            })
        }, 0);

        setTimeout(function() {
            $('.product-detail-carousel').owlCarousel({
                loop: true,
                items: 1,
                responsiveClass: true,
                responsive: {
                    992: {
                        dots: false
                    }
                }
            })
        }, 1000);
    </script>
    <script>
        function AddCart(id, saleId) {
            $.ajax({
                url: 'Add-Cart/' + id + '/' + saleId,
                type: 'GET',
            }).done(function(response) {
                RenderCart(response);
                alertify.success('Đã thêm mới sản phẩm');
                setTimeout(function() {
                    location.reload();
                }, 600);
            });
        }

        function RenderCart(response) {
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
        }
    </script>
@endsection
