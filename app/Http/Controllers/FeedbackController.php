<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\FeedbackRequest;
use App\Models\Product;
use App\Models\Feedback;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;


class FeedbackController extends Controller
{
    public function show() {
        $items=DB::table('feedbacks')
        ->whereNull('reply')
        ->orderBy('rating', 'asc')
        ->get();
        return view('admin.feedback.show')->with(['items'=>$items]);
    }

    public function showAll() {
        $itemss=DB::table('feedbacks')
        ->orderBy('rating', 'asc')
        ->get();
        return view('admin.feedback.showAll')->with(['itemss'=>$itemss]);
    }

    public function showReply() {
        $itemss=DB::table('feedbacks')
        ->whereNotNull('reply')
        ->orderBy('rating', 'asc')
        ->get();
        return view('admin.feedback.showReply')->with(['itemss'=>$itemss]);
    }


    public function create() {
        return view('admin.feedback.create');
    }
    public function createProcess(Request $rqst) {
        $rating = $rqst -> input('txtRating');
        $content = $rqst -> input('txtContent');
        $productId = $rqst -> input('txtProductId');
        $customerId = $rqst -> input('txtCustomerId');
       
        DB::table('feedbacks')->insert([
            // 'id' => $id,
            'rating' => $rating,
            'content' => $content,
            'product_id' => $productId,
            'customer_Id' => $customerId
        ]);
        $items=DB::table('feedbacks')->get();
        return view('admin.feedback.show')->with(['items'=>$items]);
    }

    public function update($id)
    {
        $rs = DB::table('feedbacks')
        ->where('id', $id)
        ->first();
        return view('admin.feedback.update', ['rs'=>$rs]);
    }
    public function updateProcess(Request $rqst)
    {
        $id = $rqst -> input('txtId');
        $rating = $rqst -> input('txtRating');
        $content = $rqst -> input('txtContent');
        $productId = $rqst -> input('txtProductId');
        $customerId = $rqst -> input('txtCustomerId');
        $reply = $rqst -> input('txtReply');
       
        DB::table('feedbacks') ->where('id', $id) -> update([
            // 'id' => $id,
            'rating' => $rating,
            'content' => $content,
            'product_id' => $productId,
            'customer_Id' => $customerId,
            'reply' => $reply,
        ]);
        return redirect() -> action([FeedbackController::class, 'show']);
    }

    // public function validateFeedback()
    // {
    //     if (len(input('txtReply')) <= 2){
    //         alert("Do not null");
    //         return false;
    //     }else{
    //         return true;
    //     }
    // }

    // public function createDetail(Request $id) {
    //     $rating = $rqst -> input('txtRating');
    //     $content = $rqst -> textarea('review');
    //     $productId = $id;
    //     $customerId = $rqst -> input('txtCustomerId');
       
    //     DB::table('feedbacks')->insert([
    //         'id' => $id,
    //         'rating' => $rating,
    //         'content' => $content,
    //         'product_id' => $productId,
    //         'customer_Id' => $customerId
    //     ]);
    //     $items=DB::table('feedbacks')->get();
    //     return view('admin.feedback.show')->with(['items'=>$items]);
    // }

}
