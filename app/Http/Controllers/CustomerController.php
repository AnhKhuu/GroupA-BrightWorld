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

    // public function listCust() {
    //     $customers = Customer::all();
    //     //dd($customers);
    //     return view('admin.customer.listCust', compact('customers'));
    // }

    public function login()
    {
        return view('user.log');
    }
    public function create()
    {
        return view('user.create');
    }

    public function createProcess(Request $request)
    {
        // $CustomerID = $request->input('txtCode');
        $FirstName = $request->input('txtFirstName');
        $LastName = $request->input('txtLastName');
        $PhoneNumber = $request->input('txtPhoneNumber');
        $Address = $request->input('txtAddress');
        $Zip = $request->input('txtZip');
        $Email = $request->input('txtEmail');
        $Username = $request->input('txtUserName');
        $Password = $request->input('txtPassword');
        $CreatedAt = $request->input('txtCreateAt');
        $UpdateAt = $request->input('txtUpdateAt');
        if ($request->all()) {
            DB::table('customers')->insert([
                // 'CustomerID' => $CustomerID,
                'first_name' => $FirstName,
                'last_name' => $LastName,
                'phone_number' => $PhoneNumber,
                'address' => $Address,
                'zip' => $Zip,
                'email' => $Email,
                'user_name' => $Username,
                'password' => $Password,
                'created_at' => $CreatedAt,
                'updated_at' => $UpdateAt
            ]);
            return redirect('admin/signin');
        }
        return view('user.create')->with('errors', 'Register failed');
    }

    // public function update($CustomerID)
    // {
    //     $rs = DB::table('customers')
    //         ->where('id', $CustomerID)
    //         ->first();
    //     return view('customer.update', ['rs' => $rs]);
    // }

    public function updateProcess(Request $request, $CustomerID)
    {
        $FirstName = $request->input('txtFirstName');
        $LastName = $request->input('txtLastName');
        $PhoneNumber = $request->input('txtPhoneNumber');
        $Address = $request->input('txtAddress');
        $Zip = $request->input('txtZip');
        $Email = $request->input('txtEmail');
        $Username = $request->input('txtUserName');
        $Password = $request->input('txtPassword');
        $CreatedAt = $request->input('txtCreateAt');
        $UpdateAt = $request->input('txtUpdateAt');
        $rs = DB::table('customers')
            ->where('id', $CustomerID)
            ->update([
                'first_name' => $FirstName,
                'last_name' => $LastName,
                'phone_number' => $PhoneNumber,
                'address' => $Address,
                'zip' => $Zip,
                'email' => $Email,
                'user_name' => $Username,
                'password' => $Password,
                'created_at' => $CreatedAt,
                'updated_at' => $UpdateAt
            ]);
        return back();
    }

    public function delete($CustomerID)
    {
        $rs = DB::table('customers')
            ->where('id', $CustomerID)
            ->delete();
        return redirect('admin/home');
    }

    public function checkLogin(Request $request)
    {
        $user = DB::table('customers')->where('user_name', $request->input('username'))->first();
        if ($user != null && $user->password == $request->input('password')) {
            $request->session()->push('user', $user->user_name);
            $request->session()->push('userId', $user->id);
            return redirect('/');
        }
        return back();
    }
    public function view($id)
    {
        $rs = DB::table('customers')->where('user_name', $id)->first();
        return view('user.edit', compact('rs'));
    }
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        $request->session()->forget('userId');
        return redirect('/');
    }
}
