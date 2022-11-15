@extends('admin.dashboard')
@section('title')
    Cart Management
@endsection
@section('content')
    <div class="d-flex justify-content-end m-2 p-2">
        <a href="../../admin/cartDetail/create">
            <button type="button" class="btn btn-block btn-outline-primary">New Cart</button>
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>ID Customer</th>
                        <th>Name Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="/admin-assets/dist/img/product/{{$cartDetailsJoin->img_url}}" width="80px"></td>
                        <td>
                            {{ $cartDetailsJoin->customer_id }}
                        </td>
                        <td>
                            {{ $cartDetailsJoin->name }}
                        </td>
                        <td>
                            {{ $cartDetailsJoin->quantity }}
                        </td>
                        <td>
                            {{ $cartDetailsJoin->price }}
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
