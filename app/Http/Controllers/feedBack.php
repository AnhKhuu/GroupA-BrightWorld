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

    public function reply($id){
        $rs = DB::table('feedbacks') 
            ->where('id', $id)
            ->first();
        return view('replyComment',['rs' =>$rs]);
    }

    public function replyProcess(Request $rqst){
        // $id = $rqst -> input('txtId');
        $rating = $rqst -> input('txtRating');
        $content = $rqst -> input('txtContent');
        $productId = $rqst -> input('txtProductId');
        $customerId = $rqst -> input('txtCustomerId');

        DB::table('feedbacks') -> insert([
            // 'id' => $id,
            'rating' => $rating,
            'content' => $content,
            'product_id' => $productId,
            'customer_Id' => $customerId
        ]);
        return redirect() -> action('App\Http\Controllers\feedBack@viewComment');
    }

    public function createComment(){
        return view('createComment');
    }

    public function commentProcess(Request $rqst){
        // $id = $rqst -> input('txtId');
        $rating = $rqst -> input('txtRating');
        $content = $rqst -> input('txtContent');
        $productId = $rqst -> input('txtProductId');
        $customerId = $rqst -> input('txtCustomerId');

        DB::table('feedbacks') -> insert([
            // 'id' => $id,
            'rating' => $rating,
            'content' => $content,
            'product_id' => $productId,
            'customer_Id' => $customerId
        ]);
        return redirect() -> action('App\Http\Controllers\feedBack@viewComment');
    }

    public function delete($id){
        $rs = DB::table('feedbacks') 
            ->where('id', $id)
            ->delete();
        return redirect() -> action('App\Http\Controllers\feedBack@viewComment');
    }
}
