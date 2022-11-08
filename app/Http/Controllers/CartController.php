<?php

namespace App\Http\Controllers;

use App\CartOps;
use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function show() {

        $carts=DB::table('carts')->get();
        return view('admin.cart.show')
                ->with(['carts'=>$carts]);
               
    }

    public function create() {
        $carts=DB::table('carts')->get();
      
        return view('admin.cart.create')
                ->with(['carts'=>$carts]);
                
    }

    public function createProcess(Request $request) {
        $current_date_time = Carbon::now()->toDateTimeString(); 
        $data = array();
        $data['quantity'] = $request->input('quantity');
        $data['customer_id'] = $request->input('customer_id');
        $data['created_at'] =$current_date_time;
        $data['updated_at'] = $current_date_time;
       
        DB::table('carts')->insert(
            $data
        );
    }

    public function update($id)
    {
        $carts=DB::table('carts')->get()
        ->where('id', intval($id))
        ->first();
        return view('admin.cart.update')
            ->with(['carts'=>$carts]);
           
    }

    public function updateProcess(CartRequest $request, $id)
    {
        $data = array();
        $data['quantity'] = $request->input('quantity');
        $data['customer_id'] = $request->input('customer_id');
       
        DB::table('carts')->where('id', intval($id))->update(
            $data
        );

    }

    public function addToCart($id)
    {
       $product = Product::find($id);
       $cart = new CartOps();
       $cart -> addToCart($product);
       return back();
    }

    // public function showCart()
    // {
    //     $cart = session('cart', [
    //         'total_price'=>0,
    //         'items'=> collect()
    //     ]);
    //     return view('user.layout', compact('cart'));
    // }
}

