<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    // public function show() {
    //     return view('admin.customer.customer');
    // }

    // public function listCust(){
    //     $items = DB::table('customers')->get();
    //     return view('admin.customer.listCust')->with(['items'=>$items]);
    // }

    public function listCust() {
        $customers = Customer::all();
        //dd($customers);
        return view('admin.customer.listCust', compact('customers'));
    }

    public function create(){
        return view('admin.customer.create');
    }

    public function createProcess(Request $request){
        $CustomerID = $request -> input('txtCode');
        $FirstName = $request -> input('txtFirstName');
        $LastName = $request -> input('txtLastName');
        $PhoneNumber = $request -> input('txtPhoneNumber');
        $Address = $request -> input('txtAddress');
        $Zip = $request -> input('txtZip');
        $Email = $request -> input('txtEmail');
        $Username = $request -> input('txtUserName');
        $Password = $request -> input('txtPassword');
        $CreatedAt = $request -> input('txtCreateAt');
        $UpdateAt = $request -> input('txtUpdateAt');
        DB::table('customers') -> insert([
            'CustomerID' => $CustomerID,
            'FirstName' => $FirstName,
            'LastName' => $LastName,
            'PhoneNumber' => $PhoneNumber,
            'Address' => $Address,
            'Zip' => $Zip,
            'Email' => $Email,
            'Username' => $Username,
            'Password' => $Password,
            'CreatedAt' => $CreatedAt,
            'UpdateAt' => $UpdateAt
        ]);
        return redirect() -> action('CustomerController@customer');
    }

    public function update($CustomerID){
        $rs = DB::table('customers')
            -> where('id', $CustomerID)
            -> first();
        return view('customer.update', ['rs' => $rs]);
    }

    public function updateProcess(Request $request, $CustomerID){
        $FirstName = $request -> input('txtFirstName');
        $LastName = $request -> input('txtLastName');
        $PhoneNumber = $request -> input('txtPhoneNumber');
        $Address = $request -> input('txtAddress');
        $Zip = $request -> input('txtZip');
        $Email = $request -> input('txtEmail');
        $Username = $request -> input('txtUserName');
        $Password = $request -> input('txtPassword');
        $CreatedAt = $request -> input('txtCreateAt');
        $UpdateAt = $request -> input('txtUpdateAt');
        $rs = DB::table('customer')
            -> where('id', $CustomerID)
            -> update([
                'FirstName' => $FirstName,
                'LastName' => $LastName,
                'PhoneNumber' => $PhoneNumber,
                'Address' => $Address,
                'Zip' => $Zip,
                'Email' => $Email,
                'Username' => $Username,
                'Password' => $Password,
                'CreatedAt' => $CreatedAt,
                'UpdateAt' => $UpdateAt
            ]);
        return redirect() -> action('CustomerController@customer');
    }

    public function delete($CustomerID){
        $rs = DB::table('customers')
            -> where('id', $CustomerID)
            -> delete();
        return redirect() -> action('CustomerController@customer');
    }
}
