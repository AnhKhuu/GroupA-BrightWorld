<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index()
    {
        $bestSeller=DB::table('products')->orderBy('sold', 'desc')->get();
        $newItems=DB::table('products')->orderBy('created_at', 'desc')->get();
        $watts=DB::table('watts')->get();
        $shapes=DB::table('shapes')->get();
        $sales=DB::table('sales')->get();
        $types=DB::table('types')->get();
        $countries=DB::table('countries')->get();
        $brands=DB::table('brands')->get();
        return view('user.index')
                ->with(['bestSeller'=>$bestSeller])
                ->with(['newItems'=>$newItems])
                ->with(['watts'=>$watts])
                ->with(['shapes'=>$shapes])
                ->with(['sales'=>$sales])
                ->with(['types'=>$types])
                ->with(['countries'=>$countries])
                ->with(['brands'=>$brands]);
    }

    // public function test() {
    //     return view('user.test');
    // }

    // public function search(Request $request){
    //     // Get the search value from the request
    //     $search = $request->input('search');
    //     return view('user.search');
    // }

    public function heart() {
        return view('heart');
    }

    public function test() {
        return view('user.test');
    }

    public function search(Request $request) {
        $search = $request->input('name');
        $pro = DB::table('products')->where('name', 'like', '%'.$search.'%')->get();
        $watts=DB::table('watts')->get();
        $shapes=DB::table('shapes')->get();
        $sales=DB::table('sales')->get();
        $types=DB::table('types')->get();
        $countries=DB::table('countries')->get();
        $brands=DB::table('brands')->get();
        if($pro) {
            return view('user.search')->with(['pro'=>$pro])->with(['watts'=>$watts])
            ->with(['shapes'=>$shapes])
            ->with(['sales'=>$sales])
            ->with(['types'=>$types])
            ->with(['countries'=>$countries])
            ->with(['brands'=>$brands]);
        } else {
            return view('user.search')->with('cantFind', 'The product that you found does not exit!');
        }
    }
    // public function search(Request $request) {
    //     $search = $request->input('product_id');
    //     $products = DB::table('products')->where('name', 'like', '%'.$search.'%')->get();
    //     if($products) {
    //         return view('user.search')->with('products', $products);
    //     } else {
    //         return view('user.search')->with('cantFind', 'The product that you found does not exit!');
    //     }
    // }

    // public function searchProcess($search) {
    //     $products = DB::table('products')->where('name', 'like', '%'.$search.'%')->get();
    //     if($products) {
    //         return view('user.search')->with('products', $products);
    //     } else {
    //         return view('user.search')->with('cantFind', 'The product that you found does not exit!');
    //     }
    // }

    public function productDetail($id)
    {
        $watts=DB::table('watts')->get();
        $shapes=DB::table('shapes')->get();
        $sales=DB::table('sales')->get();
        $types=DB::table('types')->get();
        $countries=DB::table('countries')->get();
        $brands=DB::table('brands')->get();
        $pro = DB::table('products')
        ->where('id', intval($id))
        ->first();
        $relatedProduct = DB::table('products')->where('type_id', $pro->type_id)->get();
        return view('user.productDetail')
                ->with(['pro'=>$pro])
                ->with(['relatedProduct'=>$relatedProduct])
                ->with(['watts'=>$watts])
                ->with(['shapes'=>$shapes])
                ->with(['sales'=>$sales])
                ->with(['types'=>$types])
                ->with(['countries'=>$countries])
                ->with(['brands'=>$brands]);
    }

    public function showByBrand($id)
    {
        $watts=DB::table('watts')->get();
        $shapes=DB::table('shapes')->get();
        $sales=DB::table('sales')->get();
        $types=DB::table('types')->get();
        $countries=DB::table('countries')->get();
        $brands=DB::table('brands')->get();
        $pro = DB::table('products')->where('brand_id', intval($id))->get();
        return view('user.showByBrand')
                ->with(['pro'=>$pro])
                ->with(['watts'=>$watts])
                ->with(['shapes'=>$shapes])
                ->with(['sales'=>$sales])
                ->with(['types'=>$types])
                ->with(['countries'=>$countries])
                ->with(['brands'=>$brands]);
    }

    public function showByCountry($id)
    {
        $watts=DB::table('watts')->get();
        $shapes=DB::table('shapes')->get();
        $sales=DB::table('sales')->get();
        $types=DB::table('types')->get();
        $countries=DB::table('countries')->get();
        $brands=DB::table('brands')->get();
        $pro = DB::table('products')->where('country_id', intval($id))->get();
        return view('user.showByCountry')
                ->with(['pro'=>$pro])
                ->with(['watts'=>$watts])
                ->with(['shapes'=>$shapes])
                ->with(['sales'=>$sales])
                ->with(['types'=>$types])
                ->with(['countries'=>$countries])
                ->with(['brands'=>$brands]);
    }

    public function showByShape($id)
    {
        $watts=DB::table('watts')->get();
        $shapes=DB::table('shapes')->get();
        $sales=DB::table('sales')->get();
        $types=DB::table('types')->get();
        $countries=DB::table('countries')->get();
        $brands=DB::table('brands')->get();
        $pro = DB::table('products')->where('shape_id', intval($id))->get();
        return view('user.showByShape')
                ->with(['pro'=>$pro])
                ->with(['watts'=>$watts])
                ->with(['shapes'=>$shapes])
                ->with(['sales'=>$sales])
                ->with(['types'=>$types])
                ->with(['countries'=>$countries])
                ->with(['brands'=>$brands]);
    }

    public function showByWatt($id)
    {
        $watts=DB::table('watts')->get();
        $shapes=DB::table('shapes')->get();
        $sales=DB::table('sales')->get();
        $types=DB::table('types')->get();
        $countries=DB::table('countries')->get();
        $brands=DB::table('brands')->get();
        $pro = DB::table('products')->where('watt_id', intval($id))->get();
        return view('user.showByWatt')
                ->with(['pro'=>$pro])
                ->with(['watts'=>$watts])
                ->with(['shapes'=>$shapes])
                ->with(['sales'=>$sales])
                ->with(['types'=>$types])
                ->with(['countries'=>$countries])
                ->with(['brands'=>$brands]);
    }

    public function showByType($id)
    {
        $watts=DB::table('watts')->get();
        $shapes=DB::table('shapes')->get();
        $sales=DB::table('sales')->get();
        $types=DB::table('types')->get();
        $countries=DB::table('countries')->get();
        $brands=DB::table('brands')->get();
        $pro = DB::table('products')->where('type_id', intval($id))->get();
        return view('user.showByType')
                ->with(['pro'=>$pro])
                ->with(['watts'=>$watts])
                ->with(['shapes'=>$shapes])
                ->with(['sales'=>$sales])
                ->with(['types'=>$types])
                ->with(['countries'=>$countries])
                ->with(['brands'=>$brands]);
    }

    public function show()
    {
        $pro=DB::table('products')->get();
        $watts=DB::table('watts')->get();
        $shapes=DB::table('shapes')->get();
        $sales=DB::table('sales')->get();
        $types=DB::table('types')->get();
        $countries=DB::table('countries')->get();
        $brands=DB::table('brands')->get();
        return view('admin.product.show')
                ->with(['pro'=>$pro])
                ->with(['watts'=>$watts])
                ->with(['shapes'=>$shapes])
                ->with(['sales'=>$sales])
                ->with(['types'=>$types])
                ->with(['countries'=>$countries])
                ->with(['brands'=>$brands]);
    }

    public function create() {
        $watts=DB::table('watts')->get();
        $shapes=DB::table('shapes')->get();
        $sales=DB::table('sales')->get();
        $types=DB::table('types')->get();
        $countries=DB::table('countries')->get();
        $brands=DB::table('brands')->get();
        return view('admin.product.create')
                ->with(['watts'=>$watts])
                ->with(['shapes'=>$shapes])
                ->with(['sales'=>$sales])
                ->with(['types'=>$types])
                ->with(['countries'=>$countries])
                ->with(['brands'=>$brands]);
    }

    public function createProcess(Request $request) {
        $data = array();
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
        $current_date_time = Carbon::now()->toDateTimeString();
        $data['created_at'] = $current_date_time;
        $data['updated_at'] = $current_date_time;
        $get_image = $request->file('img_url');
        if($get_image){
            $get_name_picture = $data['name'].'.jpg';
            $data['img_url'] = $get_name_picture;
            $get_image->move('admin-assets/dist/img/product',$get_name_picture);
        }
        DB::table('products')->insert(
            $data
        );
        if($request->all()){
            return redirect('/admin/product')->with('success',"Created product successfully!");
        }
    }

    public function update($id)
    {
        $watts=DB::table('watts')->get();
        $shapes=DB::table('shapes')->get();
        $sales=DB::table('sales')->get();
        $types=DB::table('types')->get();
        $countries=DB::table('countries')->get();
        $brands=DB::table('brands')->get();
        $pro = DB::table('products')
        ->where('id', intval($id))
        ->first();
        return view('admin.product.update')
            ->with(['pro'=>$pro])
            ->with(['watts'=>$watts])
            ->with(['shapes'=>$shapes])
            ->with(['sales'=>$sales])
            ->with(['types'=>$types])
            ->with(['countries'=>$countries])
            ->with(['brands'=>$brands]);
    }

    public function updateProcess(ProductsRequest $request, $id)
    {
        $data = array();
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
        $current_date_time = Carbon::now()->toDateTimeString();
        $data['updated_at'] = $current_date_time;
        if($get_image){
            $get_name_picture = $data['name'].'.jpg';
            $data['img_url'] = $get_name_picture;
            $get_image->move('admin-assets/dist/img/product',$get_name_picture);
        }
        DB::table('products')->where('id', intval($id))->update(
            $data
        );
        if($request->all()){
            return redirect('/admin/product')->with('success',"Update product successfully!");
        }
    }

    public function deleteProcess($id)
    {
        DB::table('products')->where('id', intval($id))->delete();
        return redirect('/admin/product')->with('success',"Delete product successfully!");
    }

    // Country
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
    // Brand
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
    // Watt
    public function createWatt() {
        return view('admin.product.watt');
    }

    public function createWattProcess(Request $request) {
        $data = array();
        $data['measure'] = $request->input('measure');
        DB::table('watts')->insert(
            $data
        );
    }
    // Type
    public function createType() {
        return view('admin.product.type');
    }

    public function createTypeProcess(Request $request) {
        $data = array();
        $data['description'] = $request->input('description');
        DB::table('types')->insert(
            $data
        );
    }

    // Sale
    public function createSale() {
        return view('admin.product.sale');
    }

    public function createSaleProcess(Request $request) {
        $data = array();
        $data['percent'] = $request->input('percent');
        DB::table('sales')->insert(
            $data
        );
    }

    // Shape
    public function createShape() {
        return view('admin.product.shape');
    }

    public function createShapeProcess(Request $request) {
        $data = array();
        $data['shape_desc'] = $request->input('shape_desc');
        DB::table('shapes')->insert(
            $data
        );
    }
}
