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
            <tr>
             <th>ID Cart</th>
            <th>ID Customer</th>
            <th>Quantity</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
            </tr>
       
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
        <td>
        <div>
            <a href="{{ route('admin.cart.update', $cart->id) }}"
                >Edit</a>
            {{-- <form
                method="POST"
                action="{{ route('admin.categories.destroy', $category->id) }}"
                onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form> --}}
        </div>
    </td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection


                     
