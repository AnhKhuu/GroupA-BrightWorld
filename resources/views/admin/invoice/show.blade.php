@extends('admin.dashboard')
@section('title')
Invoice Management
@endsection
@section('content')
<div class="d-flex justify-content-end m-2 p-2">
    <a  href="../../admin/invoice/create"
        >
        <button type="button" class="btn btn-block btn-outline-primary">New Invoice</button>
        </a>
</div>
<div class="card">
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID Invoice</th>
          <th>Invoice Number</th>
          <th>Customer ID</th>
          <th>Created At</th>
          <th>Updated At</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
            <tr >
                <td
                    >
                    {{ $invoice->id }}
                </td>
                <td
                    >
                    {{ $invoice->invoice_number }}
                </td>
                <td
                    >
                    {{ $invoice->customer_id }}
                </td>
                <td
                >
                {{ $invoice->created_at }}
            </td>
            <td
            >
            {{ $invoice->updated_at }}
        </td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection