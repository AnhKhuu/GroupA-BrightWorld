<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function show() {
        $invoices = Invoice::all();
        return view('admin.invoice.show', compact('invoices'));
    }

    public function create() {
        return view('admin.invoice.create');
    }

    public function store(InvoiceRequest $request)
    {
        Invoice::create([
            'invoice_number' => $request->invoice_number,
            'customer_id' =>  $request->customer_id,
        ]);

        return to_route('admin.invoice.show')->with('success', 'Invoice created successfully.');
    }
}
