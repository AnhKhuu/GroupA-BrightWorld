<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function show() {
        return view('admin.customer.customer');
    }
}
