@extends('admin.dashboard')
@section('title')
Invoice Management
@endsection
@section('content')

<div class="card mt-5">
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID Invoice</th>
          <th>Invoice Number</th>
          <th>Customer ID</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Actions</th>

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
        <td
        >
        <div class="d-flex">
            <a class="btn btn-success mr-3" href="{{ route('admin.invoice.update', $invoice->id) }}"
                >Edit</a>
                <a class="btn btn-primary mr-3" href="{{ route('admin.invoice.view', $invoice->id) }}"
                    >View</a>
            <form
                method="POST"
                action="{{ route('admin.invoice.delete', $invoice->id) }}"
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