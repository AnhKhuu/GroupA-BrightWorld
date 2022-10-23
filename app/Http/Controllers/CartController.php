<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function index()
    {
        return view('show', [
            'staff' => Staff::class]);
    }
}
