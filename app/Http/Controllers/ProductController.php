<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function show() {
        return view('admin.product.show');
    }

    public function create() {
        return view('admin.product.create');
    }
// type_id','country_id','watt_id','brand_id','sale_id',
//'shape_id', 'name', 'unit', 'price', 'imgUrl', 'description', 'sold', 'inStock'
    public function createProcess(Request $request) {
        $data = array();
        // $newid = DB::table('products')->orderby('id','DESC')->first()->id+1;
        $data['type_id'] = $request->input('type_id');
        $data['country_id'] = $request->input('country_id');
        $data['watt_id'] = $request->input('watt_id');
        $data['brand_id'] = $request->input('brand_id');
        $data['sale_id'] = $request->input('sale_id');
        $data['shape_id'] = $request->input('shape_id');
        $data['name'] = $request->input('name');
        $data['unit'] = $request->input('unit');
        $data['price'] = $request->input('price');
        $data['description'] = $request->input('description');
        $data['sold'] = $request->input('sold');
        $data['in_stock'] = $request->input('in_stock');
        $get_image = $request->file('img_url');
        if($get_image){
            // $get_image->getClientOriginalName();
            $get_name_picture = 'product'.$data['name'].'.jpg';
            // $name_picture = current(explode('.',$get_name_picture));
            // $new_picture = $name_picture . rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $data['img_url'] = $get_name_picture;
            $get_image->move('admin-assets/dist/img/product',$get_name_picture);
        }
        DB::table('products')->insert(
            $data
        );
        if($request->all()){
            return redirect()->route('products.index')->with('success',"Created product successfully!");
        }
    }

    public function createCountry() {
        return view('admin.product.country');
    }

    public function createCountryProcess(Request $request) {
        $data = array();
        // $newid = DB::table('products')->orderby('id','DESC')->first()->id+1;
        $data['short_name'] = $request->input('short_name');
        $data['full_name'] = $request->input('full_name');
        $data['description'] = $request->input('description');
        DB::table('countries')->insert(
            $data
        );
    }

    public function createBrand() {
        return view('admin.product.brand');
    }

    public function createBrandProcess(Request $request) {
        $data = array();
        $data['short_name'] = $request->input('short_name');
        $data['full_name'] = $request->input('full_name');
        $data['description'] = $request->input('description');
        $data['address'] = $request->input('address');
        DB::table('brands')->insert(
            $data
        );
    }
}
