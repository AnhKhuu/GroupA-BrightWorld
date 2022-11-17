@extends('admin.dashboard')
@section('title')
    Invoice Detail Management
@endsection
@section('content')
    <div class="d-flex justify-content-start m-2 p-2">
        <a href="{{ URL::previous() }}">Go Back</a>
    </div>
    <div class="card mt-5 m-2 p-2">
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>ID Invoice</th>
                        <th>ID Product</th>
                        <th>Name Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($invoiceDetailsJoin as $invoiceDetails)
                    
                @endforeach
                    <tr>
                        <td><img src="/admin-assets/dist/img/product/{{$invoiceDetails->img_url}}" width="80px"></td>
                        <td>
                            {{ $invoiceDetails->invoice_id }}
                        </td>
                        <td>
                            {{ $invoiceDetails->product_id }}
                        </td>
                        <td>
                            {{ $invoiceDetails->name }}
                        </td>
                        <td>
                            {{ $invoiceDetails->quantity }}
                        </td>
                        <td>
                            {{ $invoiceDetails->price, 3, '.', ' ' }}đ
                        </td>
                        <td>
                            {{ number_format($invoiceDetails->quantity * $invoiceDetails->price, 3, '.', ' ') }}đ
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
