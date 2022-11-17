<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;

class InvoiceController extends Controller
{
    public function show()
    {

        $invoices = DB::table('invoices')->get();
        return view('admin.invoice.show')
            ->with(['invoices' => $invoices]);
    }

    public function create()
    {
        $invoices = DB::table('invoices')->get();

        return view('admin.invoice.create')
            ->with(['invoices' => $invoices]);
    }

    public function createProcess(Request $request)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        $data = array();
        $data['invoice_number'] = $request->input('invoice_number');
        $data['customer_id'] = $request->input('customer_id');
        $data['created_at'] = $current_date_time;
        $data['updated_at'] = $current_date_time;

        DB::table('invoices')->insert(
            $data
        );
        return redirect('admin/invoice/show');
    }

    public function update($id)
    {
        $invoices = DB::table('invoices')->get()
            ->where('id', intval($id))
            ->first();
        return view('admin.invoice.update')
            ->with(['invoices' => $invoices]);
    }

    public function view($id)
    {
       
        $invoiceDetailsJoin = DB::table('invoce_details')
            ->join('invoices', 'invoice_id', '=', 'invoce_details.invoice_id')
            ->join('products', 'product_id', '=', 'invoce_details.product_id')->where('invoices.id', '=', $id)
            ->get();
            // dd($invoiceDetailsJoin);
        return view('admin.invoice.view')
            ->with(['invoiceDetailsJoin' => $invoiceDetailsJoin]);
    }
    
    public function updateProcess(InvoiceRequest $request, $id)
    {
        $data = array();
        $current_date_time = Carbon::now()->toDateTimeString();
        $data['invoice_number'] = $request->input('invoice_number');
        $data['customer_id'] = $request->input('customer_id');
        $data['updated_at'] = $current_date_time;

        DB::table('invoices')->where('id', intval($id))->update(
            $data
        );
        return redirect('admin/invoice/show');
    }

    public function deleteProcess($id)
    {
        DB::table('invoices')->where('id', '=', $id)->delete();
        return redirect('admin/invoice/show');
    }

    public function checkout()
    {
        $sales = DB::table('sales')->get();

        // hard code customer ID
        $userId = session('userId');
        $customer = DB::table('customers')->where('id', '=', $userId)->first();
        // $invoice_details=DB::table('invoce_details')
        // ->join('invoices','invoices.id','=','invoce_details.invoice_id')
        // ->join('products','products.id','=','invoce_details.product_id')
        // ->get();
        return view('user.checkout')
            ->with(['sales' => $sales])
            ->with(['customer' => $customer]);
        // ->with(['invoice_details'=>$invoice_details]);

    }

    public function checkoutProcess()
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        $dataInvoice = array();
        // $oldCart = Session('Cart') ? Session('Cart') : null;
        // $records = [];
        // foreach ($oldCart as $key => $value) {
        //     $records[$key] = $value;
        // }
        $userId = session('userId');
        $record = Invoice::latest()->first();
        $expNum = explode('-', $record->invoice_number);
        $expNum = (int)$expNum[0] += 1;
        //check first day in a year

        $dataInvoice['invoice_number'] =  $expNum;
        $dataInvoice['customer_id'] =  $userId[0];
        $dataInvoice['created_at'] = $current_date_time;
        $dataInvoice['updated_at'] = $current_date_time;
        DB::table('invoices')->insert(
            $dataInvoice
        );

        return redirect('user/checkout');
    }

    public function Success(Request $request)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        $userId = session('userId');
        $cart = DB::table('carts')->where('customer_id', '=', $userId)->orderBy('created_at', 'desc')->first();
        $invoice = DB::table('invoices')->where('customer_id', '=', $userId)->orderBy('created_at', 'desc')->first();
        $productId = $request->input('product_id');
        $dataCart = [];
        $dataInvoice = [];
        $dataCart['product_id'] = $productId;
        $dataCart['cart_id'] = $cart->id;
        $dataCart['created_at'] = $current_date_time;
        $dataCart['updated_at'] = $current_date_time;

        $dataInvoice['product_id'] = $productId;
        $dataInvoice['invoice_id'] = $invoice->id;
        $dataInvoice['quantity'] = $cart->quantity;
        $dataInvoice['created_at'] = $current_date_time;
        $dataInvoice['updated_at'] = $current_date_time;
        DB::table('cart_details')->insert(
            $dataCart
        );

        DB::table('invoce_details')->insert(
            $dataInvoice
        );
        $request->session()->forget('Cart');

        return view('user.success');
    }
}
