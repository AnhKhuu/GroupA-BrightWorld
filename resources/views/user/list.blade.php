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
                                    <th style="text-align: center" scope="col">Image</th>
                                    <th style="text-align: center" class="p-name" scope="col">Product Name</th>
                                    <th style="text-align: center" scope="col">Price (Coupon)</th>
                                    <th style="text-align: center; width: 200px" scope="col">Quantity</th>
                                    <th style="text-align: center" scope="col">Total</th>
                                    <th style="text-align: center" scope="col">Save</th>
                                    <th style="text-align: center" scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (Session::has('Cart') != null)
                                    @foreach (Session::get('Cart')->products as $item)
                                        <tr>
                                            <td style="text-align: center"><img style="width: 200px"
                                                    src="/admin-assets/dist/img/product/{{ $item['productInfo']->img_url }}"
                                                    alt=""></td>
                                            <td style="text-align: center">
                                                <h5>{{ $item['productInfo']->name }}</h5>
                                            </td>
                                            <td style="text-align: center">
                                                @isset($sales)
                                                    @foreach ($sales as $sale)
                                                        @if ($sale->id == $item['productInfo']->sale_id)
                                                            <b
                                                                class="new-price">{{ number_format((1 - $sale->percent) * $item['productInfo']->price, 3, '.', ' ') }}đ</b>
                                                        @endif
                                                    @endforeach
                                                @endisset
                                            </td>
                                            <td style="text-align: center">
                                                <div class="pro-qty d-flex" style="text-align: center">
                                                    <input class="form-control mr-3 ml-3 w-100"
                                                        style="border-color: #FF9F15; border-radius: 10px; width: 50px; text-align: center"
                                                        id="quanty-item-{{ $item['productInfo']->id }}" type="text"
                                                        value="{{ $item['quanty'] }}">
                                                </div>
                                            </td>
                                            <td style="text-align: center">
                                                <b>{{ number_format($item['price'], 3, '.', ' ') }}₫</b></td>
                                            <td style="text-align: center">
                                                <span class="material-icons-outlined"
                                                    onclick="SaveListItemCart({{ $item['productInfo']->id }}, {{ $item['productInfo']->sale_id }}, {{ $customer->id }});">
                                                    save
                                                </span>
                                            </td>
                                            <td style="text-align: center">
                                                <span class="material-icons-outlined"
                                                    onclick="DeleteListItemCart({{ $item['productInfo']->id }});">
                                                    close
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
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
                                            Price :
                                            <span>{{ number_format(Session::get('Cart')->totalPrice, 3, '.', ' ') }}₫</span>
                                        </li>
                                    </ul>
                                    <form method="POST" action="{{ route('user.checkout') }}">
                                        @csrf
                                        <button class="proceed-btn btn w-100" type="submit">PROCEED TO CHECK OUT</button>
                                    </form>
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
        proQty.prepend('<span class="dec qtybtn" style="font-size: 24px">-</span>');
        proQty.append('<span class="inc qtybtn" style="font-size: 24px">+</span>');
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

    function SaveListItemCart(id, saleId, customerId) {
        $.ajax({
            url: 'Save-Item-List-Cart/' + id + '/' + $("#quanty-item-" + id).val() + '/' + saleId + '/' +
            customerId,
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
