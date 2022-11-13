@extends('user.layout')
@section('title')
    Homepage
@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/homepage.css') }}" />
@endsection
@section('content')

    <div class="container mt-5">
        @if (Session::has('Cart') != null)
            <div class="row">
                <div class="col-lg-12" id="list-cart">
                    <div class="cart-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th class="p-name" scope="col">Product Name</th>
                                    <th scope="col">Price (Coupon)</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Save</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Session::get('Cart')->products as $item)
                                    <tr>
                                        <td><img style="width: 200px"
                                                src="/admin-assets/dist/img/product/{{ $item['productInfo']->img_url }}"
                                                alt=""></td>
                                        <td>
                                            <h5>{{ $item['productInfo']->name }}</h5>
                                        </td>
                                        <td>
                                            @isset($sales)
                                                @foreach ($sales as $sale)
                                                    @if ($sale->id == $item['productInfo']->sale_id)
                                                        <span
                                                            class="new-price">{{ (1 - $sale->percent) * number_format($item['productInfo']->price) }}đ</span>
                                                    @endif
                                                @endforeach
                                            @endisset
                                        </td>
                                        <td>
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input id="quanty-item-{{ $item['productInfo']->id }}" type="text"
                                                        value="{{ $item['quanty'] }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ number_format($item['price']) }}₫</td>
                                        <td>
                                            <span class="material-icons-outlined"
                                                onclick="SaveListItemCart({{ $item['productInfo']->id }}, {{ $item['productInfo']->sale_id }});">
                                                save
                                            </span>
                                        </td>
                                        <td>
                                            <span class="material-icons-outlined"
                                                onclick="DeleteListItemCart({{ $item['productInfo']->id }});">
                                                close
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row mb-5">
                        <div class="col-lg-4 offset-lg-8">
                            <div class="proceed-checkout">
                                @if (Session::has('Cart') != null)
                                    <ul style="list-style-type: none">
                                        <li class="subtotal">Total
                                            Quantity :<span>{{ Session::get('Cart')->totalQuanty }}</span>
                                        </li>
                                        <li class="cart-total">Total
                                            Price : <span>{{ number_format(Session::get('Cart')->totalPrice) }}₫</span>
                                        </li>
                                    </ul>
                                    <a href="{{ route('user.checkout', $customer->id) }}" class="proceed-btn">PROCEED TO CHECK
                                        OUT</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>

<script>
    $(document).ready(function() {
        var proQty = $('.pro-qty');
        proQty.prepend('<span class="dec qtybtn">-</span>');
        proQty.append('<span class="inc qtybtn">+</span>');
        proQty.on('click', '.qtybtn', function() {
            var $button = $(this);
            var oldValue = $button.parent().find('input').val();
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            $button.parent().find('input').val(newVal);
        });
    });

    function DeleteListItemCart(id) {
        $.ajax({
            url: 'Delete-Item-List-Cart/' + id,
            type: 'GET',
        }).done(function(response) {
            RenderListCart(response);
            setTimeout(function() {
                location.reload();
            }, 300);
        });
    }

    function SaveListItemCart(id, saleId) {
        $.ajax({
            url: 'Save-Item-List-Cart/' + id + '/' + $("#quanty-item-" + id).val() + '/' + saleId,
            type: 'GET',
        }).done(function(response) {
            RenderListCart(response);
            setTimeout(function() {
                location.reload();
            }, 300);
        });
    }

    function RenderListCart(response) {
        $("#list-cart").empty();
        $("#list-cart").html(response);
    }
</script>


</body>

</html>
