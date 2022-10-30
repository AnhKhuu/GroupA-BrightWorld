<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatelogueController extends Controller
{
    public function show() {
        return view('admin.catelogue');
    }
}
