<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\Staff;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show() {
        $carts = Cart::all();
        return view('admin.cart.show', compact('carts'));
    }

    public function create()
    {
        return view('admin.cart.create');
    }

    public function store(CartRequest $request)
    {
        Cart::create([
            'quantity' => $request->quantity,
            'customer_id' =>  $request->customer_id,
        ]);

        return to_route('admin.cart.show')->with('success', 'Cart created successfully.');
    }

}
