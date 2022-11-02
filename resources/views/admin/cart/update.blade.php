@extends('admin.dashboard')
@section('title')
Update Cart
@endsection
@section('content')
<div class="card card-primary m-2 p-2">
    <div class="card-header">
      <h3 class="card-title">Forms</h3>
    </div>
    <form method="POST" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
       
        <div class="form-group">
            <label for="customer_id">Customer ID</label>
            <input type="number" class="form-control" id="customer_id" name="customer_id" value="{{ $carts->customer_id }}">
          </div>
          @error('customer_id')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $carts->quantity }}">
          </div>
       
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
@endsection