@extends('admin.dashboard')
@section('title')
Cart Management
@endsection
@section('content')
<div class="d-flex justify-content-end m-2 p-2">
    <a  href="../../admin/cart/create"
        >
        <button type="button" class="btn btn-block btn-outline-primary">New Cart</button>
        </a>
</div>
<div class="card">
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID Cart</th>
          <th>ID Customer</th>
          <th>Quantity</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($carts as $cart)
            <tr >
                <td
                    >
                    {{ $cart->id }}
                </td>
                <td
                    >
                    {{ $cart->customer_id }}
                </td>
                <td
                    >
                    {{ $cart->quantity }}
                </td>
                <td
                >
                {{ $cart->created_at }}
            </td>
            <td
            >
            {{ $cart->updated_at }}
        </td>
        <td
        >
        <div class="d-flex">
            <a class="btn btn-info mr-3" href="{{ route('admin.cart.update', $cart->id) }}"
                >Edit</a>
            <a class="btn btn-primary mr-3" href="{{ route('admin.cart.view', $cart->id) }}"
                >View</a>
            <form
                method="POST"
                action="{{ route('admin.cart.delete', $cart->id) }}"
                onsubmit="return confirm('Are you sure want to delete?');">
                @csrf
                <button class="btn btn-warning" type="submit">Delete</button>
            </form>
        </div>
    </td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection


                     
