<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function checkLogin(Request $request)
    {
        $userName = $request->input('name');
        $password = $request->input('password');
        $admin = DB::table('account_admin')->where('name', $userName)->first();
        if ($admin != null && $admin->password == $password) {            
                $request->session()->push('admin', $admin->name);
            return redirect()->route('home');
        } else {
            return view('admin.login')->with(['message' => 'Wrong username or password']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect('admin');
    }
}
