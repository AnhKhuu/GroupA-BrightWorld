<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function show() {

        $invoices=DB::table('invoices')->get();
        return view('admin.invoice.show')
                ->with(['invoices'=>$invoices]);
               
    }

    public function create() {
        $invoices=DB::table('invoices')->get();
      
        return view('admin.invoice.create')
                ->with(['invoices'=>$invoices]);
                
    }

    public function createProcess(Request $request) {
        $data = array();
        $data['invoice_number'] = $request->input('invoice_number');
        $data['customer_id'] = $request->input('customer_id');
       
        DB::table('invoices')->insert(
            $data
        );
    }

    public function update($id)
    {
        $invoices=DB::table('invoices')->get()
        ->where('id', intval($id))
        ->first();
        return view('admin.invoice.update')
            ->with(['invoices'=>$invoices]);
           
    }

    public function updateProcess(InvoiceRequest $request, $id)
    {
        $data = array();
        $data['invoice_number'] = $request->input('invoice_number');
        $data['customer_id'] = $request->input('customer_id');
       
        DB::table('invoices')->where('id', intval($id))->update(
            $data
        );

    }

    public function checkout($id)
    {
        $sales = DB::table('sales')->get();
        $customer = DB::table('customers')->where('id', '=', $id)->first();
        // $invoice_details=DB::table('invoce_details')
        // ->join('invoices','invoices.id','=','invoce_details.invoice_id')
        // ->join('products','products.id','=','invoce_details.product_id')
        // ->get();
        return view('user.checkout')
            ->with(['sales' => $sales])
            ->with(['customer' => $customer]);
            // ->with(['invoice_details'=>$invoice_details]);
       
    }

    public function checkoutProcess(InvoiceRequest $request)
    {
        $data = array();
        $data['invoice_number'] = $request->input('invoice_number');
        $data['customer_id'] = $request->input('customer_id');
       
        DB::table('invoices')->insert(
            $data
        );
        return redirect('/homepage');
    }

}
