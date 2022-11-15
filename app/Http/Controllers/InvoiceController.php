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

    public function checkoutProcess(InvoiceRequest $request)
    {
        // $current_date_time = Carbon::now()->toDateTimeString();
        $dataInvoice = array();
        // $oldCart = Session('Cart') ? Session('Cart') : null;
        // $records = [];
        // foreach ($oldCart as $key => $value) {
        //     $records[$key] = $value;
        // }
        $userId = session('userId');
        $record = Invoice::latest()->first();
        $expNum = explode('-', $record->invoice_number);

        //check first day in a year
        if (date('l', strtotime(date('Y-01-01')))) {
            $nextInvoiceNumber = date('Y') . '-0001';
        } else {
            //increase 1 with last invoice number
            $nextInvoiceNumber = $expNum[0] . '-' . $expNum[1] + 1;
        }

        $dataInvoice['invoice_number'] = $nextInvoiceNumber;
        $dataInvoice['customer_id'] =  $userId;
        // $dataInvoice['created_at'] = $current_date_time;
        // $dataInvoice['updated_at'] = $current_date_time;
        DB::table('invoices')->insert(
            $dataInvoice
        );

        $request->session()->forget('Cart');
        return redirect('user/success');
    }

    public function Success()
    {
        return view('user.success');
    }
}
