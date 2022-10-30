<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//Access DB class

class feedBack extends Controller
{
    public function viewComment(){
        $items = DB::table('feedbacks') ->get();
        return view('viewComment') -> with(['items' => $items]);
    }
}
