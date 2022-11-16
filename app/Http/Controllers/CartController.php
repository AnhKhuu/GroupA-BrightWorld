<?php

namespace App\Http\Controllers;

use App\CartOps;
use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class CartController extends Controller
{
    public function show()
    {

        $carts = DB::table('carts')->get();
        return view('admin.cart.show')
            ->with(['carts' => $carts]);
    }

    public function create()
    {
        $carts = DB::table('carts')->get();

        return view('admin.cart.create')
            ->with(['carts' => $carts]);
    }

    public function createProcess(Request $request)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        $data = array();
        $data['quantity'] = $request->input('quantity');
        $data['customer_id'] = $request->input('customer_id');
        $data['created_at'] = $current_date_time;
        $data['updated_at'] = $current_date_time;

        DB::table('carts')->insert(
            $data
        );
        return redirect('admin/cart/show');
    }

    public function update($id)
    {
        $carts = DB::table('carts')->get()
            ->where('id', intval($id))
            ->first();
        return view('admin.cart.update')
            ->with(['carts' => $carts]);
    }

    public function view($id)
    {
       
        $cartDetailsJoin = DB::table('cart_details')
            ->join('carts', 'cart_id', '=', 'cart_details.cart_id')
            ->join('products', 'product_id', '=', 'cart_details.product_id')
            ->first();
        return view('admin.cart.view')
            ->with(['cartDetailsJoin' => $cartDetailsJoin]);
    }

    public function updateProcess(CartRequest $request, $id)
    {
        $data = array();
        $data['quantity'] = $request->input('quantity');
        $data['customer_id'] = $request->input('customer_id');

        DB::table('carts')->where('id', intval($id))->update(
            $data
        );
        return redirect('admin/cart/show');
    }

    public function deleteProcess($id)
    {
        DB::table('carts')->where('id', '=', $id)->delete();
        return redirect('admin/cart/show');
    }

    public function AddCart(Request $req, $id, $saleId)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $sale = DB::table('sales')->where('id', '=', $saleId)->first();
        $sales = DB::table('sales')->get();

        if ($product != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new CartOps($oldCart);
            $newCart->AddCart($product, $id, $sale);
            $req->Session()->put('Cart', $newCart);
        }
        return view('user.layout')->with(['sales' => $sales]);
    }

    public function DeleteItemCart(Request $req, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new CartOps($oldCart);
        $newCart->DeleteItemCart($id);

        if (is_countable($newCart) || Count($newCart->products) > 0) {
            $req->Session()->put('Cart', $newCart);
        } else {
            $req->Session()->forget('Cart');
        }
        return view('user.layout');
    }

    public function ViewListCart()
    {
        $pro = DB::table('products')->get();
        $sales = DB::table('sales')->get();

        //hard code customer
        $userId = session('userId');
        $customer = DB::table('customers')->where('id', '=', $userId)->first();
        return view('user.list')
            ->with(['pro' => $pro])
            ->with(['customer' => $customer])
            ->with(['sales' => $sales]);
    }

    public function DeleteListItemCart(Request $req, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new CartOps($oldCart);
        $newCart->DeleteItemCart($id);

        if (Count($newCart->products) > 0) {
            $req->Session()->put('Cart', $newCart);
        } else {
            $req->Session()->forget('Cart');
        }
        return view('user.list');
    }


    public function SaveListItemCart(Request $req, $id, $quanty, $saleId, $customerId)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        $dataCart = array();
        $sale = DB::table('sales')->where('id', '=', $saleId)->first();

        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new CartOps($oldCart);
        $newCart->UpdateItemCart($id, $quanty, $sale);

        $dataCart['quantity'] = $quanty;
        $dataCart['customer_id'] = $customerId;
        $dataCart['created_at'] = $current_date_time;
        $dataCart['updated_at'] = $current_date_time;

        $req->Session()->put('Cart', $newCart);

        DB::table('carts')->insert(
            $dataCart
        );

        return redirect('/List-Carts');
    }
}
