@extends('admin.dashboard')
@section('title')
    Cart Detail Management
@endsection
@section('content')
<div class="d-flex justify-content-start m-2 p-2">
    <a href="{{ URL::previous() }}">Go Back</a>
</div>
    <div class="card mt-5">
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>ID Customer</th>
                        <th>Name Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($cartDetailsJoin as $cartDetails)
                    
                @endforeach
                    <tr>
                        <td><img src="/admin-assets/dist/img/product/{{$cartDetails->img_url}}" width="80px"></td>
                        <td>
                            {{ $cartDetails->customer_id }}
                        </td>
                        <td>
                            {{ $cartDetails->name }}
                        </td>
                        <td>
                            {{ $cartDetails->quantity }}
                        </td>
                        <td>
                            {{ $cartDetails->price }}
                        </td>
                        {{-- <td>
                            <div class="d-flex">
                                <a class="btn btn-info mr-3"
                                    href="{{ route('admin.cartDetails.update', $cartDetails->id) }}">Edit</a>
                                <a class="btn btn-primary mr-3"
                                    href="{{ route('admin.cartDetails.view', $cartDetails->id) }}">View</a>
                                <form method="POST" action="{{ route('admin.cartDetails.delete', $cartDetails->id) }}"
                                    onsubmit="return confirm('Are you sure want to delete?');">
                                    @csrf
                                    <button class="btn btn-warning" type="submit">Delete</button>
                                </form>
                            </div>
                        </td> --}}
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
