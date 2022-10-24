<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show() {
        return view('admin.product.show');
    }

    public function create() {
        return view('admin.product.create');
    }
}
