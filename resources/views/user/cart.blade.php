@if (Session::has('Cart') != null)
@foreach (Session::get('Cart')->products as $item)
    <div
        class="product-info p-2 p-lg-4 d-flex align-items-center justify-content-between">
        <img src="/admin-assets/dist/img/product/{{ $item['productInfo']->img_url }}"
            alt="">
        <div class="product-detail px-2 px-md-3">
            <p class="mb-1 mb-md-2">{{ $item['productInfo']->name }}</p>
            <div class="quantity mb-1 mb-md-2">
                <p>x <b>{{ $item['quanty'] }}</b></p>
            </div>
            <div class="price">
                <div class="new-price">
                    @isset($sales)
                        @foreach ($sales as $sale)
                            @if ($sale->id == $item['productInfo']->sale_id)
                                <span
                                    class="new-price">{{ (1 - $sale->percent) * number_format($item['productInfo']->price) }}đ</span>
                            @endif
                        @endforeach
                    @endisset

                    <div class="old-price">
                        {{ number_format($item['productInfo']->price) }}đ</div>

                </div>
            </div>
        </div>
        <span class="material-icons-outlined close"
            data-id="{{ $item['productInfo']->id }}">
            delete
        </span>
    </div>
@endforeach
<div class="select-total px-2">
    <span>total:</span>
    <h5>{{number_format(Session::get('Cart')->totalPrice)}}₫</h5>
</div>
<div class="btn-bar-cart w-100 d-flex justify-content-between my-0">
    <a href="{{url('/List-Carts')}}" class='btn buy-now w-100'>View Card</a>
</div>
@endif