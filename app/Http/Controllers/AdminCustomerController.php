<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class AdminCustomerController extends Controller
{
    public function index() {
        $customers = Customer::all();
        //dd($customers);
        return view('admin.customer.listCust', compact('customers'));
    }
}
