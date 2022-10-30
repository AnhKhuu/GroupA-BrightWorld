@extends('admin.dashboard')
@section('title')
Create Invoices Management
@endsection
@section('content')
<div class="card card-primary m-2 p-2">
    <div class="card-header">
      <h3 class="card-title">Forms</h3>
    </div>
    <form method="POST" action="{{ route('admin.invoice.store') }}" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
       
        <div class="form-group">
            <label for="invoice_number">Invoice Number</label>
            <input type="number" class="form-control" id="invoice_number" name="invoice_number">
          </div>
          @error('customer_id')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          <div class="form-group">
            <label for="customer_id">Customer ID</label>
            <input type="number" class="form-control" id="customer_id" name="customer_id">
          </div>
       
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </form>
  </div>
@endsection